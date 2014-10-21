<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/asignaturas.php");
$action='asignatura';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'index':
        $view->asignaturas=Asignatura::getAsignaturas(); // trae todos los asignatura
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->asignatura=Asignatura::getAsignaturas();
        $view->contentTemplate="templates/AsignaturasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveClient':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=cleanString($_POST['IdCarrera']);
        $Anio=cleanString($_POST['IdDia']);
        $IdAsignatura=cleanString($_POST['IdAsignatura']);
        $Modulo=cleanString($_POST['IdModulo']);
        $Asignados=cleanString($_POST['IdInicio']);
        $IdDocentes=cleanString($_POST['IdFin']);
		
        $Id=new Asignatura($Id);
        $asignatura->setIdCarrera($IdCarrera);
        $asignatura->setIdAnio($IdDia);
        $asignatura->setIdAsignatura($IdAsignatura);
        $asignatura->setModulo($IdModulo);
        $asignatura->setAsignados($IdInicio);
        $asignatura->setIdDocente($IdFin);

        $asignatura->save();
        break;
    case 'newClient':
        $view->Asignaturas=new Aignatura();
        $view->label='Nuevo Asignatura';
        $view->disableLayout=true;
        $view->contentTemplate="templates/asignaturaForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editClient':
        $editId=intval($_POST['Id']);
        $view->label='Editar Asignatura';
        $view->Asignatura=new Asignatura($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/asignaturaForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deleteClient':
        $Id=intval($_POST['Id']);
        $asignatura=new Asignatura($Id);
        $asignatura->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
