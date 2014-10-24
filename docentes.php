<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/docente.php");
$action='docente';
if(isset($_POST['action']))
{$action=$_POST['action'];}

//cambiar horario por docente 
$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template
$view->tabla='docentes';


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'docente':
        $view->docente=Docente::getDocentes(); // trae todos los horarios
        $view->contentTemplate="templates/docentesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->docente=Docente::getDocentes();
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $Apellidos=cleanString($_POST['Apellidos']);
        $Nombres=cleanString($_POST['Nombres']);
        $Correo=cleanString($_POST['Correo']);
		
        $Id=new Docente($Id);
        $Docente->setApellidos($Apellidos);
        $Docente->setNombre($Nombre);
        $Docente->setCorreo($Correo);

        $Docente->save();
        break;
    case 'nuevo':
        $view->docente=new Docente();
        $view->label='Nuevo Docente';
        $view->disableLayout=true;
        $view->contentTemplate="templates/docenteForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar Docente';
        $view->docente=new Docente($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/docenteForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $Id=intval($_POST['Id']);
        $docente=new Docente($Id);
        $docente->deleteDocente();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
