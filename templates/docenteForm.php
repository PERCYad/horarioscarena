<h2><?php echo $view->label ?></h2>

<form name ="docente" id="horario" method="POST" action="docente.php">
    <input type="hidden" name="Id" id="Id" value="<?php print $view->docente->getId() ?>">
    <div>
        <label>Apellidos</label>
        <input type="text" name="Apellidos" id="Apellidos"value = "<?php print $view->docente->getApellidos() ?>" autofocus>
    </div>
    <div>
        <label>Nombres</label>
        <input type="text" name="Nombres" id="Nombres" value = "<?php print $view->docente->getNombres() ?>">
    </div>
    <div>
        <label>Correo</label>
        <input type="text" name="Correo" id="Correo" value = "<?php print $view->docente->getCorreo() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
