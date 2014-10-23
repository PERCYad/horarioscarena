<?php
class Horario
{
	//se declaran los atributos de la clase, que son los atributos del horario
	var $Id;
	var $Nombre;
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
			$result=$obj_carrera->executeQuery("select * from carreras where id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->Nombre=$row['Nombre'];
			$this->Curso=$row['Curso'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getNombre()
	 { return $this->IdNombre;}
	function getCurso()
	 { return $this->Curso;}
	 
		// metodos que setean los valores
	function setNombre($val)
	 {  $this->Nombre=$val;}
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
			$query="update carreras set IdNombre='$this->Nombre', Curso='$this->Curso'";
			$obj_carrera->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_carrera->getAffect(); // retorna todos los registros afectados
	
	}

	private function insertCarrera()	// inserta el horario cargado en los atributos
	{
			$obj_carrera=new sQuery();
			$query="insert into carreras( Nombre, Curso )values('$this->Nombre', '$this->Carrera')";
			
			$obj_carrera->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_carrera->getAffect(); // retorna todos los registros afectados
	
	}	
	
	function delete()	// elimina el horario
	{
			$obj_carrera=new sQuery();
			$query="delete from carreras where Id=$this->Id";
			$obj_carrera->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_carrera->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
