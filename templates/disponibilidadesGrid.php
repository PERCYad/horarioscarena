<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>IdDocente</th>
            <th>IdDia</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->disponibilidad as $disponibilidad):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $disponibilidad['Id'];?></td>
                <td><?php echo $disponibilidad['IdDocente'];?></td>
                <td><?php echo $disponibilidad['IdDia'];?></td>
                <td><?php echo $disponibilidad['Inicio'];?></td>
                <td><?php echo $disponibilidad['Fin'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $disponibilidad['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $disponibilidad['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--div class="bar"-->
    <a id="new" class="button" href="javascript:void(0);">Nueva Disponibilidad</a><br><br>
<!--/div-->
