<h2><?php echo $view->label ?></h2>
<form name ="client" id="client" method="POST" action="index.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->horario->getId() ?>">
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value = "<?php print $view->horario->getNombre() ?>">
    </div>
    <div>
        <label>Apellido</label>
        <input type="text" name="apellido" id="apellido"value = "<?php print $view->horario->getApellido() ?>">
    </div>
    <div>
        <label>Fecha</label>
        <input type="text" name="fecha" id="fecha" value = "<?php print $view->horario->getFecha() ?>">
    </div>
    <div>
        <label>Peso</label>
        <input type="text" name="peso" id="peso" value = "<?php print $view->horario->getPeso() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
