<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>IdCarrera</th>
            <th>IdAsignatura</th>
            <th>IdModulo</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->horario as $horario):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $horario['Id'];?></td>
                <td><?php echo $horario['IdCarrera'];?></td>
                <td><?php echo $horario['IdAsignatura'];?></td>
                <td><?php echo $horario['IdModulo'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $horario['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $horario['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
