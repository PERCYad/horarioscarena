<?php
class Modulo
{
	//se declaran los atributos de la clase, que son los atributos del horario
	var $Id;
	var $IdDia;
	Var $Inicio;
	Var $Fin;

    public static function getModulos() 
		{
			$obj_modulo=new sQuery();
			$obj_modulo->executeQuery("select * from modulos"); // ejecuta la consulta para traer al horario

			return $obj_modulo->fetchAll(); // retorna todos los horarios
		}

	function Modulo($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_modulo=new sQuery();
			$result=$obj_modulo->executeQuery("select * from modulo where Id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->IdDia=$row['IdDia'];
			$this->Inicio=$row['Inicio'];
			$this->Fin=$row['Fin'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getIdDia()
	 { return $this->IdDia;}
	function getInicio()
	 { return $this->Inicio;}
	function getFin()
	 { return $this->Fin;}
	 
		// metodos que setean los valores
	function setIdDia($val)
	 {  $this->IdDia=$val;}
	function setInicio($val)
	 {  $this->Incio=$val;}
	function setFin($val)
	 {  $this->Fin=$val;}

    function save()
    {
        if($this->Id)
        {$this->updateModulo();}
        else
        {$this->insertModulo();}
    }
	
	private function updateModulo()	// actualiza el horario cargado en los atributos
	{
			$obj_modulo=new sQuery();
			$query="update modulos set IdDia='$this->IdDia', Inicio='$this->Inicio', Fin='$this->Fin' where Id = $this->Id";
			$obj_horario->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}

	private function insertModulo()	// inserta el horario cargado en los atributos
	{
			$obj_modulo=new sQuery();
			$query="insert into modulos( IdDia, Incio, Fin )values('$this->IdDia','$this->Inicio','$this->Fin')";
			
			$obj_modulo->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_modulo->getAffect(); // retorna todos los registros afectados
	
	}	
	
	function delete()	// elimina el horario
	{
			$obj_modulo=new sQuery();
			$query="delete from modulo where Id=$this->Id";
			$obj_modulo->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_modulo->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
