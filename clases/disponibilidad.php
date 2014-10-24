<?php
class Disponibilidad
{
	var $Id;     //se declaran los atributos de la clase, que son los atributos del horario
	var $IdDocente;
	Var $IdModulo;

    public static function getDisponibilidad() 
		{
			$obj_disponibilidad=new sQuery();
			$obj_disponibilidad->executeQuery("select * from disponibilidades"); // ejecuta la consulta para traer al horario

			return $obj_disponibilidad->fetchAll(); // retorna todos los horarios
		}

	function Disponibilidad($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_disponibilidad=new sQuery();
			$result=$obj_disponibilidad->executeQuery("select * from disponibilidades where id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->IdDocente=$row['IdAsignatura'];
			$this->IdModulo=$row['IdModulo'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getIdDocente()
	 { return $this->IdDocente;}
	function getIdModulo()
	 { return $this->IdModulo;}
	 
		// metodos que setean los valores
	function setIdDocente($val)
	 {  $this->IdDocente=$val;}
	function setIdModulo($val)
	 {  $this->IdModulo=$val;}

    function save()
    {
        if($this->Id)
        {$this->updateDisponibilidad();}
        else
        {$this->insertDisponibilidad();}
    }
	
	private function updateDisponibilidad()	// actualiza el horario cargado en los atributos
	{
			$obj_disponibilidad=new sQuery();
			$query="update disponibilidad set IdDocente='$this->IdDocente', IdModulo='$this->IdModulo'";
			$obj_disponibilidad->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_disponibilidad->getAffect(); // retorna todos los registros afectados
	
	}

	private function insertDisponibilidad()	// inserta el horario cargado en los atributos
	{
			$obj_disponibilidad=new sQuery();
			$query="insert into disponibilidad ( IdDocente, IdModulo )values('$this->IdDocente', '$this->IdModulo')";
			
			$obj_disponibilidad->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_disponibilidad->getAffect(); // retorna todos los registros afectados
	
	}	

	function deleteDisponibilidad()	// elimina el horario
	{
			$obj_disponibilidad=new sQuery();
			$query="delete from disponibilidad where Id=$this->Id";
			$obj_disponibilidad->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_disponibilidad->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
