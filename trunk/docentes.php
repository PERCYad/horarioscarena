<?php
//GRUPO PRETTO - TESTA - RODRIGUEZ
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/docente.php");
$action='docente';
if(isset($_POST['action']))
{$action=$_POST['action'];}

//cambiar horario por docente 
$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'docente':
        $view->docente=docente::getdocente(); // trae todos los horarios
        $view->contentTemplate="templates/docentesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->docentes=Horario::getDocentes();
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveDocente':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=cleanString($_POST['IdCarrera']);
        $IdDia=cleanString($_POST['IdDia']);
        $IdAsignatura=cleanString($_POST['IdAsignatura']);
        $IdModulo=cleanString($_POST['IdModulo']);
        $IdInicio=cleanString($_POST['IdInicio']);
        $IdFin=cleanString($_POST['IdFin']);
		
        $Id=new Docente($Id);
        $docente->setIdCarrera($IdCarrera);
        $docente->setIdDia($IdDia);
        $docente->setIdAsignatura($IdAsignatura);
        $docente->setIdModulo($IdModulo);
        $docente->setInicio($IdInicio);
        $docente->setFin($IdFin);

        $docente->save();
        break;
    case 'newDocente':
        $view->Horarios=new Docente();
        $view->label='Nuevo Docente';
        $view->disableLayout=true;
        $view->contentTemplate="templates/docenteForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editDocente':
        $editId=intval($_POST['Id']);
        $view->label='Editar Docente';
        $view->Docente=new Docente($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/docenteForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deleteDocente':
        $Id=intval($_POST['Id']);
        $docente=new Docente($Id);
        $docente->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
