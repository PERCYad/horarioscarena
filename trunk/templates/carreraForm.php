<h2><?php echo $view->label ?></h2>

<form name ="carrera" id="carrera" method="POST" action="carreras.php">
    <input type="hidden" name="Id" id="Id" value="<?php print $view->carrera->getId(); ?>">
    <div>
        <label>Carrera</label>
        <input type="text" name="Carrera" id="Carrera" value = "<?php print $view->carrera->getCarrera(); ?>" autofocus>
    </div>
    <div>
        <label>Curso</label>
        <input type="text" name="Curso" id="Curso" value = "<?php print $view->carrera->getCurso(); ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
