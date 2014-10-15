<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Correo</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->horarios as $horario):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $horario['Id'];?></td>
                <td><?php echo $horario['Apellidos'];?></td>
                <td><?php echo $horario['Nombres'];?></td>
                <td><?php echo $horario['Correo'];?></td>
                <td><?php echo $horario['Inicio'];?></td>
                <td><?php echo $horario['Fin'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $horario['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $horario['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--div class="bar"-->
    <a id="new" class="button" href="javascript:void(0);">Nuevo Horario</a><br><br>
<!--/div-->
