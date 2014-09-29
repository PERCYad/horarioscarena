<?php
/**
 * Autor: Lucas Forchino
 * Web: http://www.tutorialjquery.com
 *
 */
include_once ("clases/clase.php");// incluyo las clases a ser usadas
include_once ("clases/horario.php");
$action='index';
if(isset($_POST['action']))
{$action=$_POST['action'];}


$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template


// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'index':
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
        $id=intval($_POST['id']);
        $nombre=cleanString($_POST['nombre']);
        $apellido=cleanString($_POST['apellido']);
        $fecha=cleanString($_POST['fecha']);
        $peso=cleanString($_POST['peso']);
        $horario=new Horario($id);
        $horario->setNombre($nombre);
        $horario->setApellido($apellido);
        $horario->setFecha($fecha);
        $horario->setPeso($peso);
        $horario->save();
        break;
    case 'newClient':
        $view->client=new Horario();
        $view->label='Nuevo Horario';
        $view->disableLayout=true;
        $view->contentTemplate="templates/horarioForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editClient':
        $editId=intval($_POST['id']);
        $view->label='Editar Horario';
        $view->client=new Horario($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/horarioForm.php"; // seteo el template que se va a mostrar
        break;
    case 'deleteClient':
        $id=intval($_POST['id']);
        $client=new Horario($id);
        $client->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
