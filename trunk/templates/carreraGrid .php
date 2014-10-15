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
        <?php foreach ($view->carreras as $carreras):  ?>
            <tr>
                <td><?php echo $carreras['Id'];?></td>
                <td><?php echo $carreras['Nombre'];?></td>
                <td><?php echo $carreras['Anio'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $carreras['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $carreras['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--div class="bar"-->
    <a id="new" class="button" href="javascript:void(0);">Nueva Carrera</a><br><br>
<!--/div-->
