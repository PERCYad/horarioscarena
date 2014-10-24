<?php
class asignatura
{
    var $Id;
	var $IdCarrera;     //se declaran los atributos de la clase, que son los atributos del horario
	Var $Modulos;
	Var $Asignados;
	Var $IdDocente;

    public static function getAsignaturas() 
		{
			$obj_asignatura=new sQuery();
			$obj_asignatura->executeQuery("select * from asignaturas"); // ejecuta la consulta para traer a asignatura

			return $obj_asignatura->fetchAll(); // retorna todos las asignaturas
		}

	function Asignatura($nro=0) // declara el constructor, si trae el numero de horario lo busca , si no, trae todos las asignaturas
	{
		if ($nro!=0)
		{
			$obj_asignatura=new sQuery();
			$result=$obj_asignatura->executeQuery("select * from asignaturas where id = $nro"); // ejecuta la consulta para traer a asignatura 
			$row=mysql_fetch_array($result);
			$this->Id=$row['Id'];
			$this->IdCarrera=$row['IdCarrera'];
			$this->Modulos=$row['Modulos'];
			$this->Asignados=$row['Asignados'];
			$this->IdDocente=$row['Fin'];
		}
	}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->Id;}
	function getIdCarrera()
	 { return $this->IdCarrera;}
	function getModulos()
	 { return $this->Modulos;}
	function getAsignados()
	 { return $this->Asignados;}
	 function getIdDocente()
	 { return $this->IdDocente;}
	 
		// metodos que setean los valores
	 
	function setIdCarrera($val)
	 { $this->IdCarrera=$val;}
	function setModulos($val)
	 {  $this->Modulos=$val;}
	function setAsignados($val)
	 {  $this->Asignados=$val;}
	function setIdDocente($val)
	 {  $this->IdDocente=$val;}

    function save()
    {
        if($this->Id)
        {$this->updateAsignatura();}
        else
        {$this->insertAsignatura();}
    }
	
	private function updateAsignatura()	// actualiza asignatura cargado en los atributos
	{
			$obj_asignatura=new sQuery();
			$query="update asignaturas set IdCarrera='$this->IdCarrera', ModuloS='$this->ModuloS', asinados='$this->Asignados', IdDocente='$this->IdDocente' where Id = $this->Id";
			$obj_asignatura->executeQuery($query); // ejecuta la consulta para traer a asignatura 
			return $obj_asignatura->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertAsignatura()	// inserta asignatura cargado en los atributos
	{
			$obj_asignatura=new sQuery();
			$query="insert into asignaturas( IdCarrera, Modulos, Asignados, IdDocente )values('$this->IdCarrera', '$this->Modulos','$this->Asignados','$this->IdDocente')";
			
			$obj_asignatura->executeQuery($query); // ejecuta la consulta para traer a asignatura 
			return $obj_asignatura->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteAsignatura()	// elimina el asignatura
	{
			$obj_asignatura=new sQuery();
			$query="delete from asignaturas where Id=$this->Id";
			$obj_asignatura->executeQuery($query); // ejecuta la consulta para  borrar asignatura
			return $obj_asignatura->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
