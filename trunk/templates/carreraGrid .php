<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Anio</th>
			<th>Editar</th>
			<th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->carrera as $carrera):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $carrera['Id'];?></td>
                <td><?php echo $carrera['Nombre'];?></td>
                <td><?php echo $carrera['Anio'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $carrera['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $carrera['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--div class="bar"-->
    <a id="new" class="button" href="javascript:void(0);">Nueva Carrera</a><br><br>
<!--/div-->
