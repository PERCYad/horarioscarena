<h2><?php echo $view->label ?></h2>

<form name ="carreras" id="carreras" method="POST" action="index.php">
   
   <input type="hidden" name="id" id="id" value="<?php print $view->carreras->getId() ?>">
    <div>
        <label>Nombre</label>
        <input type="text" name="nombre" id="nombre" value = "<?php print $view->carreras->getNombre() ?>">
    </div>
    
    <div>
        <label>Anio</label>
        <input type="text" name="Anio" id="Anio" value = "<?php print $view->carreras->getPeso() ?>">
    </div>
    <div class="buttonsBar">
        <input id="cancel" type="button" value ="Cancelar" />
        <input id="submit" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
