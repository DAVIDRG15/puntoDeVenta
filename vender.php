<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="container col-md-10">
	<div class="col-xs-12">
	<hr>	
		<h1>Vender</h1>
	<hr>
		<?php
		if (isset($_GET["status"])) {
			if ($_GET["status"] === "1") {
		?>
				<div class="alert alert-success">
					<strong>¡Correcto!</strong> Venta realizada correctamente
				</div>
			<?php
			} else if ($_GET["status"] === "2") {
			?>
				<div class="alert alert-info">
					<strong>Venta cancelada</strong>
				</div>
			<?php
			} else if ($_GET["status"] === "3") {
			?>
				<div class="alert alert-info">
					<strong>Ok</strong> Producto quitado de la lista
				</div>
			<?php
			} else if ($_GET["status"] === "4") {
			?>
				<div class="alert alert-warning">
					<strong>Error:</strong> El producto que buscas no existe
				</div>
			<?php
			} else if ($_GET["status"] === "5") {
			?>
				<div class="alert alert-danger">
					<strong>Error: </strong>El producto está agotado
				</div>
			<?php
			} else {
			?>
				<div class="alert alert-danger">
					<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
				</div>
		<?php
			}
		}
		?>
		<br>
		<form method="post" action="./services/agregarAlCarrito.php">
			<label for="codigo">Código del producto: </label><br><br>
			<input autocomplete="off" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">
		</form>
		<br><br>
		<table class="table table-bordered table-success table-striped">
			<thead class="text-center">
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody class="text-center">
				<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
					$granTotal += $producto->total;
				?>
					<tr>
						<td><?php echo $producto->id ?></td>
						<td><?php echo $producto->codigo ?></td>
						<td><?php echo $producto->descripcion ?></td>
						<td><?php echo "$".$producto->precioVenta ?></td>
						<td>
							<form action="./services/cambiar_cantidad.php" method="post">
								<input name="indice" type="hidden" value="<?php echo $indice; ?>">
								<input min="1" name="cantidad" class="form-control" required type="number" step="1" value="<?php echo $producto->cantidad; ?>">
							</form>
						</td>
						<td><?php echo "$".$producto->total ?></td>
						<td><a class="btn btn-danger" href="<?php echo "./services/quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table><br>

		<h3>Total:
			<?php echo "$".$granTotal; ?>
		</h3><br>
		<form action="./services/terminarVenta.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
			<button type="submit" class="btn btn-success">Aceptar</button>
			<a href="./services/cancelarVenta.php" class="btn btn-danger">Cancelar</a>
		</form>
	</div>
</div>
<?php include_once ("pie.php");?>