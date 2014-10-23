<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/asignatura.php");
$action='asignaturas';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'asignaturas':
	$view->tabla="asignaturas";
        $view->asignatura=Asignatura::getAsignaturas(); // trae todos los asignatura
        $view->contentTemplate="templates/asignaturasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refrescarGrilla':
        $view->disableLayout=true; // no usa el layout
        $view->asignatura=Asignatura::getAsignaturas();
        $view->contentTemplate="templates/AsignaturasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=cleanString($_POST['IdCarrera']);
        $Anio=cleanString($_POST['Anio']);
        $IdAsignatura=cleanString($_POST['IdAsignatura']);
        $Modulos=cleanString($_POST['Modulos']);
        $Asignados=cleanString($_POST['Asignados']);
        $IdDocentes=cleanString($_POST['IdDocentes']);
		
        $Id=new Asignatura($Id);
        $Asignatura->setIdCarrera($IdCarrera);
        $Asignatura->setIdAnio($Anio);
        $Asignatura->setIdAsignatura($IdAsignatura);
        $Asignatura->setModulos($Modulos);
        $Asignatura->setAsignados($Asignados);
        $Asignatura->setIdDocente($IdDocentes);

        $Asignatura->save();
        break;
    case 'nuevo':
        $view->asignatura=new Aignatura();
        $view->label='Nueva Asignatura';
        $view->disableLayout=true;
        $view->contentTemplate="templates/asignaturaForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar Asignatura';
        $view->asignatura=new Asignatura($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/asignaturaForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
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
