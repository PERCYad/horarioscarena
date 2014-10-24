<h2><?php echo $view->label ?></h2>
<form name ="asignatura" id="asignatura" method="POST" action="index.php">
    <input type="hidden" name="Id" id="Id" value="<?php print $view->asignatura->getId() ?>">
    <div>
        <label>IdCarrera</label>
        <input type="text" name="IdCarrera" id="IdCarrera"value = "<?php print $view->asignatura->getIdCarrera() ?>">
    </div>
    <div>
        <label>Modulos</label>
        <input type="text" name="Modulos" id="Modulos" value = "<?php print $view->asignatura->getModulos() ?>">
    </div>
    <div>
        <label>Asignados</label>
        <input type="text" name="Asignados" id="Asignados" value = "<?php print $view->asignatura->getAsignados() ?>">
    </div>
    <div>
        <label>IdDocente</label>
        <input type="text" name="IdDocente" id="IdDocente" value = "<?php print $view->asignatura->getIdDocente() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
