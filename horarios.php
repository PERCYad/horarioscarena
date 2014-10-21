<?php
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/horario.php");
$action='index';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view = new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout = false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'horarios':
        $view->horarios=Horario::getHorarios(); // trae todos los horarios
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->horarios=Horario::getHorarios();
        $view->contentTemplate="templates/horariosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveClient':
        // limpio todos los valores antes de guardarlos
        // por ls dudas venga algo raro
        $Id=intval($_POST['Id']);
        $IdCarrera=cleanString($_POST['IdCarrera']);
        $IdDia=cleanString($_POST['IdDia']);
        $IdAsignatura=cleanString($_POST['IdAsignatura']);
        $IdModulo=cleanString($_POST['IdModulo']);
        $IdInicio=cleanString($_POST['IdInicio']);
        $IdFin=cleanString($_POST['IdFin']);
		
        $Id=new Horario($Id);
        $horario->setIdCarrera($IdCarrera);
        $horario->setIdDia($IdDia);
        $horario->setIdAsignatura($IdAsignatura);
        $horario->setIdModulo($IdModulo);
        $horario->setInicio($IdInicio);
        $horario->setFin($IdFin);

        $horario->save();
        break;
    case 'newClient':
        $view->Horarios=new Horario();
        $view->label='Nuevo Horario';
        $view->disableLayout=true;
        $view->contentTemplate="templates/horarioForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editClient':
        $editId=intval($_POST['Id']);
        $view->label='Editar Horario';
        $view->Horarios=new Horario($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/horarioForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deleteClient':
        $Id=intval($_POST['Id']);
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
