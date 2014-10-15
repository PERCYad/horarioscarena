<?php
class disponibilidad
{
	var $Id;     //se declaran los atributos de la clase, que son los atributos del horario
	var $IdDia;
	var $IdDocente;
	Var $Inicio;
	Var $Fin;

    public static function getdisponibilidad() 
		{
			$obj_disponibilidad=new sQuery();
			$obj_disponibilidad->executeQuery("select * from disponibilidad"); // ejecuta la consulta para traer al horario

			return $obj_disponibilidad->fetchAll(); // retorna todos los horarios
		}

	function disponibilidad($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_disponibilidad=new sQuery();
			$result=$obj_disponibilidad->executeQuery("select * from disponibilidad where id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->IdDia=$row['IdDia'];
			$this->IdDocente=$row['IdAsignatura'];
			$this->Inicio=$row['Inicio'];
			$this->Fin=$row['Fin'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getIdDia()
	 { return $this->IdDia;}
	function getIdDocente()
	 { return $this->IdDocente;}
	function getInicio()
	 { return $this->Inicio;}
	function getFin()
	 { return $this->Fin;}
	 
		// metodos que setean los valores
	function setIdDia($val)
	 {  $this->IdDia=$val;}
	function setIdDocente($val)
	 {  $this->IdDocente=$val;}
	function setInicio($val)
	 {  $this->Incio=$val;}
	function setFin($val)
	 {  $this->Fin=$val;}

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
			$query="update disponibilidad set IdDocente='$this->IdDocente', IdDia='$this->IdDia', Inicio='$this->Inicio', Fin='$this->Fin' where Id = $this->Id";
			$obj_disponibilidad->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_disponibilidad->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertDisponibilidad()	// inserta el horario cargado en los atributos
	{
			$obj_disponibilidad=new sQuery();
			$query="insert into disponibilidad ( IdDocente, IdDia,Incio, Fin )values('$this->IdDocente', '$this->IdDia','$this->Inicio','$this->Fin')";
			
			$obj_disponibilidad->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_disponibilidad->getAffect(); // retorna todos los registros afectados
	
	}	
	function delete()	// elimina el horario
	{
			$obj_disponibilidad=new sQuery();
			$query="delete from disponibilidad where Id=$this->Id";
			$obj_disponibilidad->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_disponibilidad->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
