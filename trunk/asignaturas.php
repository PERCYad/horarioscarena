<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/asignatura.php");
$action='asignatura';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template
$view->tabla="Asignaturas";
$view->label='Nueva Asignatura';


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'asignatura':
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
        $IdCarrera=intval($_POST['IdCarrera']);
        $Modulos=intval($_POST['Modulos']);
        $Asignados=intval($_POST['Asignados']);
        $IdDocente=intval($_POST['IdDocente']);
		
        $Asignatura=new Asignatura($Id);
        $Asignatura->setIdCarrera($IdCarrera);
        $Asignatura->setModulos($Modulos);
        $Asignatura->setAsignados($Asignados);
        $Asignatura->setIdDocent($IdDocente);

        $Asignatura->save();
        break;
    case 'nuevo':
        $view->asignatura=new Asignatura();
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
        $asignatura->deleteAsignatura();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
