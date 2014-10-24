<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/horario.php");
$action='horario';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'horario':
        $view->tabla="horarios";
		$view->horario=Horario::getHorarios(); // trae todos los horarios
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
	case 'refrescarGrilla':
        $view->disableLayout=true; // no usa el layout
        $view->horario=Horario::getHorarios();
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'grabar':
 		// limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=intval($_POST['IdCarrera']);
        $IdAsignatura=intval($_POST['IdAsignatura']);
        $IdModulo=intval($_POST['IdModulo']);
		
        $Id=new Horario($Id);
        $Horario->setIdCarrera($IdCarrera);
        $Horario->setIdAsignatura($IdAsignatura);
        $Horario->setIdModulo($IdModulo);

        $Horario->save();
        break;
    case 'nuevo':
        $view->horario=new Horario();
        $view->label='Nuevo Horario';
        $view->disableLayout=true;
        $view->contentTemplate="templates/horarioForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editar':
        $editId=intval($_POST['Id']);
        $view->label='Editar Horario';
        $view->horario=new Horario($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/horarioForm.php"; // seteo el template que se va a mostrar
        break;
    case 'borrar':
        $Id=intval($_POST['Id']);
        $view->label='Eliminar Horario';
        $horario=new Horario($Id);
        $horario->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
