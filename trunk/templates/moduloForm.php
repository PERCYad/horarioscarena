<h2><?php echo $view->label ?></h2>
<form name ="modulo" id="modulo" method="POST" action="modulos.php">
    <input type="hidden" name="Id" id="Id" value="<?php print $view->modulo->getId() ?>">
    <div>
        <label>IdDia</label>
        <input type="text" name="IdDia" id="IdDia"value = "<?php print $view->modulo->getIdDia() ?>">
    </div>
        <label>Inicio</label>
        <input type="text" name="Inicio" id="Inicio" value = "<?php print $view->modulo->getInicio() ?>">
    </div>
    <div>
        <label>Fin</label>
        <input type="text" name="Fin" id="Fin" value = "<?php print $view->modulo->getFin() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
