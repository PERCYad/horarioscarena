<?php
class Horario
{
	//se declaran los atributos de la clase, que son los atributos del horario
	var $Id;
	var $IdCarrera;
	var $IdAsignatura;
	Var $IdModulo;

    public static function getHorarios() 
		{
			$obj_horario=new sQuery();
			$obj_horario->executeQuery("select * from horarios"); // ejecuta la consulta para traer al horario

			return $obj_horario->fetchAll(); // retorna todos los horarios
		}

	function Horario($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_horario=new sQuery();
			$result=$obj_horario->executeQuery("select * from horarios where id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->IdCarrera=$row['IdCarrera'];
			$this->IdAsignatura=$row['IdAsignatura'];
			$this->IdModulo=$row['IdModulo'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getIdCarrera()
	 { return $this->IdCarrera;}
	function getIdAsignatura()
	 { return $this->IdAsignatura;}
	function getIdModulo()
	 { return $this->IdModulo;}
	 
		// metodos que setean los valores
	function setIdAsignatura($val)
	 {  $this->IdAsignatura=$val;}
	function setIdModulo($val)
	 {  $this->IdModulo=$val;}

    function save()
    {
        if($this->Id)
        {$this->updateHorario();}
        else
        {$this->insertHorario();}
    }
	
	private function updateHorario()	// actualiza el horario cargado en los atributos
	{
			$obj_horario=new sQuery();
			$query="update horarios set IdCarrera='$this->IdCarrera', IdAsignatura='$this->IdAsignatura', IdModulo='$this->IdModulo' where Id = $this->Id";
			$obj_horario->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}

	private function insertHorario()	// inserta el horario cargado en los atributos
	{
			$obj_horario=new sQuery();
			$query="insert into horarios( IdCarrera, IdAsignatura, IdModulo )values('$this->IdCarrera', '$this->IdAsignatura', '$this->IdModulo')";
			
			$obj_horario->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}	
	
	function delete()	// elimina el horario
	{
			$obj_horario=new sQuery();
			$query="delete from horarios where Id=$this->Id";
			$obj_horario->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
