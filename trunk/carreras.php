<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/carrera.php");
$action='carreras';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template
$view->tabla="Carreras";
$view->label='Nueva Carrera';


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'carrera':
		$view->carrera=Carrera::getCarreras(); // trae todos los horarios
        $view->contentTemplate="templates/carrerasGrid.php"; // seteo el template que se va a mostrar
        break;
	case 'refrescarGrilla':
        $view->disableLayout=true; // no usa el layout
        $view->carrera=Carrera::getCarreras();
        $view->contentTemplate="templates/carrerasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
 		// limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
		$Id=intval($_POST['Id']);
        $Carrera=cleanString($_POST['Carrera']);
        $Curso=cleanString($_POST['Curso']);
		
        $Carrera=new Carrera($Id);
        $Carrera->setCarrera($Carrera);
        $Carrera->setCurso($Curso);

        $Carrera->save();
        break;
    case 'nuevo':
		$view->carrera=new Carrera();
        $view->label='Nueva Carrera';
        $view->disableLayout=true;
        $view->contentTemplate="templates/carreraForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar Carrera';
        $view->carrera=new Carrera($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/carreraForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $Id=intval($_POST['Id']);
        $view->label='Eliminar Carrera';
        $carrera=new Carrera($Id);
        $carrera->deleteCarrera();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
