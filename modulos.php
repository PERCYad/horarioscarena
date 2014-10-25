<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/modulo.php");
$action='modulo';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template
$view->tabla="Módulos";
$view->label='Nuevo Módulo';


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'modulo':
		$view->modulo=Modulo::getModulos(); // trae todos los horarios
        $view->contentTemplate="templates/modulosGrid.php"; // seteo el template que se va a mostrar
        break;
	case 'refrescarGrilla':
        $view->disableLayout=true; // no usa el layout
        $view->modulo=Modulo::getModulos();
        $view->contentTemplate="templates/modulosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdDia=intval($_POST['IdDia']);
        $IdInicio=cleanString($_POST['Inicio']);
        $IdFin=cleanString($_POST['Fin']);
		
        $Id=new Modulo($Id);
        $Modulo->setIdDia($IdDia);
        $Modulo->setInicio($Inicio);
        $Modulo->setFin($Fin);

        $Modulo->save();
        break;
    case 'nuevo':
        $view->modulo=new Modulo();
        $view->label='Nuevo Módulo';
        $view->disableLayout=true;
        $view->contentTemplate="templates/moduloForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar Módulo';
        $view->modulo=new Modulo($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/moduloForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $Id=intval($_POST['Id']);
        $modulo=new Modulo($Id);
        $modulo->deleteModulos();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
