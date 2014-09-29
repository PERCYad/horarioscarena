<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de Nacimiento</th>
            <th>Peso</th>
            <th>Editar</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($view->horarios as $horario):  // uso la otra sintaxis de php para templates ?>
            <tr>
                <td><?php echo $horario['id'];?></td>
                <td><?php echo $horario['nombre'];?></td>
                <td><?php echo $horario['apellido'];?></td>
                <td><?php echo $horario['fecha_nac'];?></td>
                <td><?php echo $horario['peso'];?></td>
                <td><a class="edit" href="javascript:void(0);" data-id="<?php echo $horario['id'];?>">Editar</a></td>
                <td><a class="delete" href="javascript:void(0);" data-id="<?php echo $horario['id'];?>">Borrar</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!--div class="bar"-->
    <a id="new" class="button" href="javascript:void(0);">Nuevo Horario</a><br><br>
<!--/div-->
<!--
<div class="bar">
    <a style="background-color:#fbc2c4;color:brown" class="button" href="http://www.tutorialjquery.com/ejemplo-de-altas-bajas-y-modificaciones-con-php-ajax-y-jquery">Descargar</a>
</div>
-->
