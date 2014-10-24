<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>IdDocente</th>
            <th>IdModulo</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->disponibilidad as $disponibilidad):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $disponibilidad['Id'];?></td>
                <td><?php echo $disponibilidad['IdDocente'];?></td>
                <td><?php echo $disponibilidad['IdModulo'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $disponibilidad['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $disponibilidad['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
