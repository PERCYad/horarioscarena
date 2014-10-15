<?php
class docente
{
	var $Id;     //se declaran los atributos de la clase, que son los atributos del horario
	var $Apellidos;
	var $Nombres;
	Var $Inicio;
	Var $Fin;

    public static function getdocentes() 
		{
			$obj_docente=new sQuery();
			$obj_docente->executeQuery("select * from docentes"); // ejecuta la consulta para traer al horario

			return $obj_docente->fetchAll(); // retorna todos los docentes
		}

	function docente($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_docente=new sQuery();
			$result=$obj_docente->executeQuery("select * from docentes where id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->Apellidos=$row['Apellidos'];
			$this->IdDia=$row['IdDia'];
			$this->IdAsignatura=$row['IdAsignatura'];
			$this->Inicio=$row['Inicio'];
			$this->Fin=$row['Fin'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getApellidos()
	 { return $this->Apellidos;}
	function getIdDia()
	 { return $this->IdDia;}
	function getIdAsignatura()
	 { return $this->IdAsignatura;}
	function getInicio()
	 { return $this->Inicio;}
	function getFin()
	 { return $this->Fin;}
	 
		// metodos que setean los valores
	function setApellidos($val)
	 { $this->Apellidos=$val;}
	function setIdDia($val)
	 {  $this->IdDia=$val;}
	function setIdAsignatura($val)
	 {  $this->IdAsignatura=$val;}
	function setInicio($val)
	 {  $this->Incio=$val;}
	function setFin($val)
	 {  $this->Fin=$val;}

    function save()
    {
        if($this->Id)
        {$this->updatedocente();}
        else
        {$this->insertdocente();}
    }
	
	private function updatedocente()	// actualiza el horario cargado en los atributos
	{
			$obj_docente=new sQuery();
			$query="update docentes set Apellidos='$this->Apellidos', IdDia='$this->IdDia', IdAsignatura='$this->IdAsignatura', Inicio='$this->Inicio', Fin='$this->Fin' where Id = $this->Id";
			$obj_docente->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_docente->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertdocente()	// inserta el horario cargado en los atributos
	{
			$obj_docente=new sQuery();
			$query="insert into docentes( Apellidos, IdDia, IdAsignatura, Incio, Fin )values('$this->Apellidos', '$this->IdDia','$this->IdAsignatura','$this->Inicio','$this->Fin')";
			
			$obj_docente->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_docente->getAffect(); // retorna todos los registros afectados
	
	}	
	function delete()	// elimina el horario
	{
			$obj_docente=new sQuery();
			$query="delete from docentes where Id=$this->Id";
			$obj_docente->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_docente->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
