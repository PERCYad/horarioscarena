<?php
class Carrera
{
	//se declaran los atributos de la clase, que son los atributos del horario
	var $Id;
	var $Carrera;
	var $Curso;

    public static function getCarreras() 
		{
			$obj_carrera=new sQuery();
			$obj_carrera->executeQuery("select * from carreras"); // ejecuta la consulta para traer al horario

			return $obj_carrera->fetchAll(); // retorna todos los horarios
		}

	function Carrera($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_carrera=new sQuery();
			$result=$obj_carrera->executeQuery("select * from carreras where Id=$nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->Carrera=$row['Carrera'];
			$this->Curso=$row['Curso'];
		}
	}
	
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getCarrera()
	 { return $this->Carrera;}
	function getCurso()
	 { return $this->Curso;}
	 
		// metodos que setean los valores
	function setCarrera($val)
	 {  $this->Carrera=$val;}
	function setCurso($val)
	 {  $this->Curso=$val;}

    function save()
    {
        if($this->Id)
        {$this->updateCarrera();}
        else
        {$this->insertCarrera();}
	}
	
	private function updateCarrera()	// actualiza el horario cargado en los atributos
	{
		$obj_carrera=new sQuery();
		$query="update carreras set Carrera='$this->Carrera', Curso='$this->Curso' where Id=$this->Id";
		$obj_carrera->executeQuery($query); // ejecuta la consulta para traer al horario 
		return $obj_carrera->getAffect(); // retorna todos los registros afectados
	}

	private function insertCarrera()	// inserta el horario cargado en los atributos
	{
		$obj_carrera=new sQuery();
		$query="insert into carreras(Carrera, Curso) values('$this->Carrera', '$this->Curso')";
		$obj_carrera->executeQuery($query); // ejecuta la consulta para traer al horario 
		return $obj_carrera->getAffect(); // retorna todos los registros afectados
	}	
	
	function deleteCarrera()	// elimina el horario
	{
		$obj_carrera=new sQuery();
		$query="delete from carreras where Id=$this->Id";
		$obj_carrera->executeQuery($query); // ejecuta la consulta para  borrar el horario
		return $obj_carrera->getAffect(); // retorna todos los registros afectados
	}	
	
}
