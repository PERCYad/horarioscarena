<h2><?php echo $view->label ?></h2>
<form name ="docente" id="horario" method="POST" action="index.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->docente->getId() ?>">
    <div>
        <label>Id</label>
        <input type="text" name="Id" id="Id" value = "<?php print $view->docente->getId() ?>">
    </div>
    <div>
        <label>Apellidos</label>
        <input type="text" name="Apellidos" id="Apellidos"value = "<?php print $view->horario->getApellidos() ?>">
    </div>
    <div>
        <label>Nombres</label>
        <input type="text" name="Nombres" id="Nombres" value = "<?php print $view->horario->getNombres() ?>">
    </div>
    <div>
        <label>Correo</label>
        <input type="text" name="Correo" id="Correo" value = "<?php print $view->horario->getCorreo() ?>">
    </div>
	 <div>
        <label>Inicio</label>
        <input type="text" name="Inicio" id="Inicio" value = "<?php print $view->horario->getInicio() ?>">
    </div>
    <div>
        <label>Fin</label>
        <input type="text" name="Fin" id="Fin" value = "<?php print $view->horario->getFin() ?>">
    </div>
   
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
