<h2><?php echo $view->label ?></h2>
<form name ="disponibilidad" id="Id" method="POST" action="index.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->horario->getId() ?>">
    <div>
        <label>Id</label>
        <input type="text" name="Id" id="Id" value = "<?php print $view->disponibilidad->getId() ?>">
    </div>
    <div>
        <label>IdDocente</label>
        <input type="text" name="IdDocente" id="IdDocente" value = "<?php print $view->disponibilidad->getIdDocente() ?>">
    </div>
    <div>
        <label>IdDia</label>
        <input type="text" name="IdDia" id="IdDia" value = "<?php print $view->disponibilidad->getIdDia() ?>">
    </div>
    
    <div>
        <label>Inicio</label>
        <input type="text" name="Inicio" id="Inicio" value = "<?php print $view->disponibilidad->getInicio() ?>">
    </div>
    <div>
        <label>Fin</label>
        <input type="text" name="Fin" id="Fin" value = "<?php print $view->disponibilidad->getFin() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
