<h2><?php echo $view->table ?></h2>
<form name ="disponibilidad" id="disponibilidades" method="POST" action="disponibilidades.php">
    <input type="hidden" name="Id" id="id" value="<?php print $view->disponibilidad->getId() ?>">
    <div>
        <label>Nombre</label>
        <input type="text" name="Nombre" id="Nombre" value = "<?php print $view->disponibilidad->getNombre() ?>">
    </div>
    <div>
        <label>Curso</label>
        <input type="text" name="Cursoa" id="Curso" value = "<?php print $view->disponibilidad->getCurso() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
