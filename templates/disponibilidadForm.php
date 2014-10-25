<h2><?php echo $view->tabla ?></h2>

<form name ="disponibilidad" id="disponibilidad" method="POST" action="disponibilidades.php">
    <input type="hidden" name="Id" id="Id" value="<?php print $view->disponibilidad->getId() ?>">
    <div>
        <label>IdDocente</label>
        <input type="text" name="IdDocente" id="IdDocente" value = "<?php print $view->disponibilidad->getIdDocente() ?>">
    </div>
    <div>
        <label>IdModulo</label>
        <input type="text" name="IdModulo" id="IdModulo" value = "<?php print $view->disponibilidad->getIdModulo() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
