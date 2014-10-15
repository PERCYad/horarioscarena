<h2><?php echo $view->label ?></h2>
<form name ="horario" id="horario" method="POST" action="index.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->horario->getId() ?>">
    <div>
        <label>IdCarrera</label>
        <input type="text" name="IdCarrera" id="IdCarrrera" value = "<?php print $view->horario->getIdCarrera() ?>">
    </div>
    <div>
        <label>IdDia</label>
        <input type="text" name="IdDia" id="IdDia"value = "<?php print $view->horario->getIdDia() ?>">
    </div>
    <div>
        <label>IdAsignatura</label>
        <input type="text" name="IdAsignatura" id="IdAsignatura" value = "<?php print $view->horario->getIdAsignatura() ?>">
    </div>
    <div>
        <label>IdModulo</label>
        <input type="text" name="IdModulo" id="IdModulo" value = "<?php print $view->horario->getIdModulo() ?>">
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
