<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>IdDia</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->modulo as $modulo):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $modulo['Id'];?></td>
                <td><?php echo $modulo['IdDia'];?></td>
                <td><?php echo $modulo['Inicio'];?></td>
                <td><?php echo $modulo['Fin'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $modulo['Id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $modulo['Id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
	</tbody>
</table>
