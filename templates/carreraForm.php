<h2><?php echo $view->label ?></h2>

<form name ="carrera" id="carrera" method="POST" action="carreras.php">
   
   <input type="hidden" name="id" id="id" value="<?php print $view->carreras->getId() ?>">
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value = "<?php print $view->carreras->getNombre() ?>">
    </div>
    
    <div>
        <label>Curso</label>
        <input type="text" name="Curso" id="Curso" value = "<?php print $view->carreras->getCurso() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
