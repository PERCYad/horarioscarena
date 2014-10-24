<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Apellidos</th>
            <th>Nombres</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->docente as $docente):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $docente['Id'];?></td>
                <td><?php echo $docente['Apellidos'];?></td>
                <td><?php echo $docente['Nombres'];?></td>
                <td><?php echo $docente['Correo'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $docente['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $docente['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
