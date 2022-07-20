<?php
require 'config/config.php';
require 'config/database.php';
require './vendor/autoload.php';

MercadoPago\SDK::setAccessToken(TOKEN_MP);
$preference = new MercadoPago\preference();
$productos_mp = array();

$db = new Database();
$con = $db->conectar();

$producto = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if ($producto != null){
  foreach ($producto as $clave => $cantidad){

    $sql = $con->prepare("SELECT id, nombre, precio, descuento, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1");
    $sql->execute([$clave]);
    $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
  }
} else{
	header("Location: index.php");
	exit;
}

//session_destroy();
include 'cabeceras/cabeceraPagos/header.php';
?>


    <!-- Cart Items -->
    <div class="container cart">
		<div class="row">
			<div class="col-6">
				<h2>Detalles de pago</h2>
        <div class="row">
			    <div class="col-12">
				    <div id="paypal-button-container"></div>
			    </div>
        </div>
        <div class="row">
			    <div class="col-12">
          <div class="checkout-btn"></div>
			    </div>
        </div>
      </div>
	  <div class="col-6">	
      <table>
        <tr>
          <th>Producto</th>
          <th>Subtotal</th>
        </tr>
         
              <?php if($lista_carrito == null){
                echo '<tr><td colspan="5" class="text-center"><b>Lista vacia</b></td></tr>';
              } else{
                $total = 0;
                foreach($lista_carrito as $producto){
                  $_id = $producto['id'];
                  $nombre = $producto['nombre'];
                  $precio = $producto['precio'];
                  $descuento = $producto['descuento'];
                  $cantidad = $producto['cantidad'];
                  $precio_desc = $precio - (($precio * $descuento) /100) ;
                  $subtotal = $cantidad * $precio_desc;
                  $total += $subtotal;
                  $total_paypal = $total / 3.99;

                  $item = new MercadoPago\Item();
                  $item->id = $_id;
                  $item->title = $nombre;
                  $item->quantity = $cantidad;
                  $item->unit_price = $precio_desc;
                  $item->currency_id = "COP";

                  array_push($productos_mp, $item);
                  unset($item);
                
              ?>
            <tr>
              <td>
                <div class="cart-info">
                  <div>
                    <p><?php echo $nombre; ?></p>
                  </div>
                </div>
              </td>
              <td>
                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"> <?php echo MONEDA . number_format($subtotal,2, '.', ','); ?></div>
              </td>
              <?php } ?>
            </tr>
            
          
          
      </table>
				</div>
      <div class="total-price">
        <table>
          <tr>
            <td>Total</td>
            <td colspan="3"></td>
            <td colspan="2">
              <p class="h2" id="total"><b><?php echo MONEDA . number_format($total, 2, '.', ','); ?></b></p>
            </td>
          </tr>
    <?php } ?>
        </table>
        
      </div>
	  </div>
</div>

 <?php include 'cabeceras/cabeceraPagos/footer.php'; ?>