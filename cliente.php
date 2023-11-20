<?php include_once "encabezado.php" ?>
<?php
include_once "./services/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM cliente;");
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
    <div class="col-xs-12">
        <hr><h1>Clientes</h1><hr>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RFC</th>
                        <th>Correo</th>
                        <th>Método de Pago</th>
                        <th>Ciudad</th>
                        <th>Fecha Alta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clientes as $cliente){ ?>
                    <tr>
                        <td><?php echo $cliente->cliente_ID ?></td>
                        <td><?php echo $cliente->strNombre ?></td>
                        <td><?php echo $cliente->strRFC ?></td>
                        <td><?php echo $cliente->strCorreo ?></td>
                        <td><?php echo $cliente->strMetodoPago ?></td>
                        <td><?php echo $cliente->strCiudad ?></td>
                        <td><?php echo $cliente->dFechaAlta ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
</div>
<?php include_once ("pie.php");?>