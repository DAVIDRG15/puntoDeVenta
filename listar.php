<?php include_once "encabezado.php" ?>
<?php
include_once "./services/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container">
	<div class="col-xs-12">
		<hr>
			<h1>Productos</h1>
	    <hr><br>
			<div>
				<a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
			</div><br>
			<br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Código</th>
						<th>Descripción</th>
						<th>Precio de compra</th>
						<th>Precio de venta</th>
						<th>Existencia</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($productos as $producto){ ?>
					<tr>
						<td><?php echo $producto->id ?></td>
						<td><?php echo $producto->codigo ?></td>
						<td><?php echo $producto->descripcion ?></td>
						<td><?php echo $producto->precioCompra ?></td>
						<td><?php echo $producto->precioVenta ?></td>
						<td><?php echo $producto->existencia ?></td>
						<td><a class="btn btn-warning" href="<?php echo "./services/editar.php?id=" . $producto->id?>"><i class="fa fa-edit"></i></a></td>
						<td><a class="btn btn-danger" href="<?php echo "./services/eliminar.php?id=" . $producto->id?>"><i class="fa fa-trash"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
</div>
<?php include_once ("pie.php");?>