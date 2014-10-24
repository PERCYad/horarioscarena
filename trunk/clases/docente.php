<?php
class Docente
{
	var $Id;     //se declaran los atributos de la clase, que son los atributos del horario
	var $Apellidos;
	var $Nombres;
	var $Correo;

    public static function getDocentes() 
		{
			$obj_docente=new sQuery();
			$obj_docente->executeQuery("select * from docentes"); // ejecuta la consulta para traer al horario

			return $obj_docente->fetchAll(); // retorna todos los docentes
		}

	function Docente($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos los horarios
	{
		if ($nro!=0)
		{
			$obj_docente=new sQuery();
			$result=$obj_docente->executeQuery("select * from docentes where id = $nro"); // ejecuta la consulta para traer al horario 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->Apellidos=$row['Apellidos'];
			$this->Nombres=$row['Nombre'];
			$this->Correo=$row['Correo'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getApellidos()
	 { return $this->Apellidos;}
	function getNombres()
	 { return $this->Nombres;}
	 function getCorreo()
	 { return $this->Correo;}
	 
		// metodos que setean los valores
	function setApellidos($val)
	 { $this->Apellidos=$val;}
	function setNombres($val)
	 {  $this->Nombres=$val;}
	function setCorreo($val)
	 {  $this->Correo=$val;}

    function save()
    {
        if($this->Id)
        {$this->updateDocente();}
        else
        {$this->insertDocente();}
    }
	
	private function updateDocente()	// actualiza el horario cargado en los atributos
	{
			$obj_docente=new sQuery();
			$query="update docentes set Apellidos='$this->Apellidos', Nombre='$this->Nombres', Correo='$this->Correo' where Id = $this->Id";
			$obj_docente->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_docente->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertDocente()	// inserta el horario cargado en los atributos
	{
			$obj_docente=new sQuery();
			$query="insert into docentes( Apellidos, Nombre, Correo', '$this->Apellidos','$this->Nombres','$this->Correo')";
			
			$obj_docente->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_docente->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteDocente()	// elimina el horario
	{
			$obj_docente=new sQuery();
			$query="delete from docentes where Id=$this->Id";
			$obj_docente->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_docente->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
