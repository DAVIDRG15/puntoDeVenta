<?php include_once "encabezado.php" ?>
<?php
include_once "./services/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM proveedor;");
$proveedores = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="container">
        <div class="col-xs-12">
        <hr>
            <h1>Proveedores</h1>
        <hr>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>RFC</th>
                        <th>Ciudad</th>
                        <th>Fecha Alta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($proveedores as $proveedor){ ?>
                    <tr>
                        <td><?php echo $proveedor->proveedor_ID ?></td>
                        <td><?php echo $proveedor->strNombre ?></td>
                        <td><?php echo $proveedor->strRFC ?></td>
                        <td><?php echo $proveedor->strCiudad ?></td>
                        <td><?php echo $proveedor->dFechaAlta ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php include_once ("pie.php");?>