<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/disponibilidad.php");
$action='disponibilidad';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template
$view->tabla='Disponibilidades';
$view->label='Nueva disponibilidad';


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'disponibilidad':
        $view->disponibilidad=Disponibilidad::getDisponibilidad(); // trae todos los horarios
        $view->contentTemplate="templates/disponibilidadesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refrescarGrilla':
        $view->disableLayout=true; // no usa el layout
        $view->disponibilidad=Disponibilidad::getDisponibilidad();
        $view->contentTemplate="templates/disponibilidadesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdDocente=intval($_POST['IdDocente']);
        $IdModulo=intval($_POST['IdModulo']);
		
        $Disponibilidad=new Disponibilidad($Id);
        $Disponibilidad->setIdDocente($IdDocente);
        $Disponibilidad->setModulo($IdModulo);

        $Disponibilidad->save();
        break;
    case 'nuevo':
        $view->disponibilidad=new Disponibilidad();
        $view->label='Nueva disponibilidad';
        $view->disableLayout=true;
        $view->contentTemplate="templates/disponibilidadForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar disponibilidad';
        $view->disponibilidad=new disponibilidad($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/disponibilidadForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $Id=intval($_POST['Id']);
        $disponibilidad=new disponibilidad($Id);
        $disponibilidad->deleteDisponibilidad();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
