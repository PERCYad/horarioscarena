<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/carreras.php");
$action='carreras';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'carreras':
		$view->tabla='carreras';
        $view->carrera=Carrera::getcarreras(); // trae todos los horarios
        $view->contentTemplate="templates/carrerasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->carrera=Carrera::getcarreras();
        $view->contentTemplate="templates/carrerasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=cleanString($_POST['Nombre']);
        $IdDia=cleanString($_POST['Anio']);
        
		
        $Id=new Carrera($Id);
        $Carrera->setNombre($Nombre);
        $Carrera->setAnio($Anio);
        
        $Carrera->save();
        break;
    case 'nuevo':
        $view->carrera=new Carrera();
        $view->label='Nueva carrera';
        $view->disableLayout=true;
        $view->contentTemplate="templates/carreraForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar carrera';
        $view->carrera=new carreras($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/carreraForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $Id=intval($_POST['Id']);
        $carrera=new Carrera($Id);
        $carrera->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
