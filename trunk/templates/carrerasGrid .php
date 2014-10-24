<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Carrera</th>
            <th>Curso</th>
			<th>Editar</th>
			<th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->carrera as $carrera):  ?>
            <tr>
                <td><?php echo $carrera['Id'];?></td>
                <td><?php echo $carrera['Carrera'];?></td>
                <td><?php echo $carrera['Curso'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $carrera['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $carrera['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
