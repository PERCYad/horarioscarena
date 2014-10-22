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
        $view->carreras=carreras::getcarreras(); // trae todos los horarios
        $view->contentTemplate="templates/carrerasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->carreras=carreras::getcarreras();
        $view->contentTemplate="templates/carrerasGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveClient':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=cleanString($_POST['Nombre']);
        $IdDia=cleanString($_POST['Anio']);
        
		
        $Id=new Carrera($Id);
        $carrera->setNombre($Nombre);
        $carrera->setAnio($Anio);
        

        $carreras->save();
        break;
    case 'newClient':
        $view->carreras=new carrera();
        $view->label='Nueva carrera';
        $view->disableLayout=true;
        $view->contentTemplate="templates/carreraForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editClient':
        $editId=intval($_POST['Id']);
        $view->label='Editar carrera';
        $view->carreras=new carreras($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/carreraForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deleteClient':
        $Id=intval($_POST['Id']);
        $carrera=new carrera($Id);
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
