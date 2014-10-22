<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/disponibilidad.php");
$action='disponibilidad';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'disponibilidad':
        $view->disponibilidad=disponibilidad::getdisponibilidad(); // trae todos los horarios
        $view->contentTemplate="templates/disponibilidadGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->disponibilidad=disponibilidad::getdisponibilidad();
        $view->contentTemplate="templates/disponibilidadGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveDisponibilidad':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdDia=cleanString($_POST['IdDia']);
        $IdDocente=cleanString($_POST['IdDocente']);
        $IdInicio=cleanString($_POST['IdInicio']);
        $IdFin=cleanString($_POST['IdFin']);
		
        $Id=new disponibilidad($Id);
        $disponibilidad->setIdDia($IdDia);
        $disponibilidad->setIdDocente($IdDocente);
        $disponibilidad->setInicio($IdInicio);
        $disponibilidad->setFin($IdFin);

        $disponibilidad->save();
        break;
    case 'newdisponibilidad':
        $view->disponibilidad=new disponibilidad();
        $view->label='Nueva disponibilidad';
        $view->disableLayout=true;
        $view->contentTemplate="templates/disponibilidadForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editDisponibilidad':
        $editId=intval($_POST['Id']);
        $view->label='Editar disponibilidad';
        $view->disponibilidad=new disponibilidad($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/disponibilidadForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deletedisponibilidad':
        $Id=intval($_POST['Id']);
        $disponibilidad=new disponibilidad($Id);
        $disponibilidad->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
