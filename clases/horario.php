<?php
class horario
{
	var $nombre;     //se declaran los atributos de la clase, que son los atributos del horario
	var $apellido;
	var $fecha;
	Var $peso;
	Var $id;

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
			$this->id=$row['id'];
			$this->nombre=$row['nombre'];
			$this->apellido=$row['apellido'];
			$this->fecha=$row['fecha_nac'];
			$this->peso=$row['peso'];
		}
	}
		
		// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getNombre()
	 { return $this->nombre;}
	function getApellido()
	 { return $this->apellido;}
	function getFecha()
	 { return $this->fecha;}
	function getPeso()
	 { return $this->peso;}
	 
		// metodos que setean los valores
	function setNombre($val)
	 { $this->nombre=$val;}
	function setApellido($val)
	 {  $this->apellido=$val;}
	function setFecha($val)
	 {  $this->fecha=$val;}
	function setPeso($val)
	 {  $this->peso=$val;}

    function save()
    {
        if($this->id)
        {$this->updateHorario();}
        else
        {$this->insertCliente();}
    }
	private function updateHorario()	// actualiza el horario cargado en los atributos
	{
			$obj_horario=new sQuery();
			$query="update horarios set nombre='$this->nombre', apellido='$this->apellido',fecha_nac='$this->fecha',peso='$this->peso' where id = $this->id";
			$obj_horario->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}
	private function insertHorario()	// inserta el horario cargado en los atributos
	{
			$obj_horario=new sQuery();
			$query="insert into horarios( nombre, apellido, fecha_nac,peso)values('$this->nombre', '$this->apellido','$this->fecha','$this->peso')";
			
			$obj_horario->executeQuery($query); // ejecuta la consulta para traer al horario 
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}	
	function delete()	// elimina el horario
	{
			$obj_horario=new sQuery();
			$query="delete from horarios where id=$this->id";
			$obj_horario->executeQuery($query); // ejecuta la consulta para  borrar el horario
			return $obj_horario->getAffect(); // retorna todos los registros afectados
	
	}	
	
}
