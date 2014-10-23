<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/disponibilidad.php");
$action='disponibilidades';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'disponibilidades':
		$view->tabla='disponibilidades';
        $view->disponibilidad=Disponibilidad::getdisponibilidad(); // trae todos los horarios
        $view->contentTemplate="templates/disponibilidadesGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refrescarGrilla':
        $view->disableLayout=true; // no usa el layout
        $view->disponibilidad=Disponibilidad::getdisponibilidad();
        $view->contentTemplate="templates/disponibilidadGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdDia=cleanString($_POST['IdDia']);
        $IdDocente=cleanString($_POST['IdDocente']);
        $IdInicio=cleanString($_POST['IdInicio']);
        $IdFin=cleanString($_POST['IdFin']);
		
        $Id=new Disponibilidad($Id);
        $Disponibilidad->setIdDia($IdDia);
        $Disponibilidad->setIdDocente($IdDocente);
        $Disponibilidad->setInicio($IdInicio);
        $Disponibilidad->setFin($IdFin);

        $Disponibilidad->save();
        break;
    case 'nueva':
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
