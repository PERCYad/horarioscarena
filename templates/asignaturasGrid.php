<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>IdCarrera</th>
            <th>Anio</th>
            <th>IdAsignatura</th>
            <th>Modulos</th>
            <th>Asignados</th>
            <th>IdDocente</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->asignatura as $asignatura):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $asignatura['Id'];?></td>
                <td><?php echo $asignatura['IdCarrera'];?></td>
                <td><?php echo $asignatura['Anio'];?></td>
                <td><?php echo $asignatura['IdAsignatura'];?></td>
                <td><?php echo $asignatura['Modulos'];?></td>
                <td><?php echo $asignatura['Asignados'];?></td>
                <td><?php echo $asignatura['IdDocente'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $asignatura['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $asignatura['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
