<h2><?php echo $view->label ?></h2>

<form name ="horario" id="horario" method="POST" action="horarios.php">
    <input type="hidden" name="Id" id="Id" value="<?php print $view->horario->getId() ?>">
    <div>
        <label>IdCarrera</label>
        <input type="text" name="IdCarrera" id="IdCarrrera" value = "<?php print $view->horario->getIdCarrera() ?>">
    </div>
    <div>
        <label>IdAsignatura</label>
        <input type="text" name="IdAsignatura" id="IdAsignatura" value = "<?php print $view->horario->getIdAsignatura() ?>">
    </div>
    <div>
        <label>IdModulo</label>
        <input type="text" name="IdModulo" id="IdModulo" value = "<?php print $view->horario->getIdModulo() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
