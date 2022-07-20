<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id_transaccion = isset($_GET['key']) ? $_GET['key'] : '0';

$error = '';
if($id_transaccion == ''){
    $error = 'Error al procesar la peticion';
} else{
    $sql = $con->prepare("SELECT count(id) FROM compra WHERE id_transaccion=? AND status=?");
    $sql->execute([$id_transaccion, 'COMPLETED']);
    if($sql->fetchColumn() > 0){

        $sql = $con->prepare("SELECT id, fecha, email, total FROM compra WHERE id_transaccion=? AND status=? LIMIT 1");
        $sql->execute([$id_transaccion, 'COMPLETED']);
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        $idCompra = $row['id'];
        $total = $row['total'];
        $fecha = $row['fecha'];

        $sqlDet = $con->prepare("SELECT nombre, precio, cantidad FROM detalle_compra WHERE id_compra = ?");
        $sqlDet->execute([$idCompra]);
    }else{
        $error = 'Error al comprobar la compra';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon1.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./styles.css" />
    <title>Tienda W.P Technology S.A.S</title>
  </head>

  <body>
  <span class="ir-arriba "><img src="./images/cheveron-up.png" class="ir-arriba"></span>
  <!-- Navigation -->
  <nav class="nav">
    <div class="wrapper container">
      <div class="logo"><a href="index.php"><img src="./images/logo2.png"/></a></div>
      <ul class="nav-list">
        <div class="top">
          <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
        </div>
        <li><a href="index.php">Inicio</a></li>
        <li class="active"><a href="productos.php">Productos</a></li>
        <li>
          <a href="" class="desktop-item">Articulos <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showMega" />
          <label for="showMega" class="mobile-item">Articulos <span><i class="fas fa-chevron-down"></i></span></label>
          <div class="mega-box">
            <div class="content">
              <div class="row">
                <img src="./images/productos.jpeg" alt="" />
              </div>
              <div class="row">
                <header>Para Computadores</header>
                <ul class="mega-links">
                  <li><a href="#">Shop With Background</a></li>
                  <li><a href="#">Shop Mini Categories</a></li>
                  <li><a href="#">Shop Only Categories</a></li>
                  <li><a href="#">Shop Icon Categories</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Para Celulares</header>
                <ul class="mega-links">
                  <li><a href="#">Sidebar</a></li>
                  <li><a href="#">Filter Default</a></li>
                  <li><a href="#">Filter Drawer</a></li>
                  <li><a href="#">Filter Dropdown</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Redes y TV</header>
                <ul class="mega-links">
                  <li><a href="#">Layout Zoom</a></li>
                  <li><a href="#">Layout Sticky</a></li>
                  <li><a href="#">Layout Sticky 2</a></li>
                  <li><a href="#">Layout Sccroll</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li><a href="">Blog</a></li>
        <li>
          <a href="" class="desktop-item">Vendors <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop1" />
          <label for="showdrop1" class="mobile-item">Vendors <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu1">
            <li><a href="">Vendor Store listings</a></li>
            <li><a href="">Store Details</a></li>
          </ul>
        </li>

        <li>
          <a href="" class="desktop-item">Page <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop2" />
          <label for="showdrop2" class="mobile-item">Page <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu2">
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Faq</a></li>
            <li><a href="">Page 404</a></li>
          </ul>
        </li>
        <!-- icons -->
        <li class="icons">
          <span>
            <a href="cart.php"><img src="./images/shoppingBag.svg" alt="" />
            <span id="num_cart" clase="badge bg-secondary"><?php echo $num_cart; ?></span>
            </a>
          </span>
          <span><img src="./images/search.svg" alt="" /></span>
        </li>
      </ul>
      <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
  </nav>
  <main>
      <div class="container cart">

            <?php if(strlen($error) > 0){ ?>
            <div class="row">
                <div class="col">
                    <h3><?php echo $error; ?></h3>
                </div>
            </div>

            <?php } else { ?>
        

        <div class="row">
            <div class="col">
                <b>Folio de la compra: </b><?php echo $id_transaccion; ?><br>
                <b>Fecha de compra: </b><?php echo $fecha; ?><br>
                <b>Total: </b><?php echo MONEDA . number_format($total, 2, '.', ','); ?><br>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cantidad</th>
                            <th>Producto</th>
                            <th>Importe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row_det = $sqlDet->fetch(PDO::FETCH_ASSOC)) {  
                            $importe = $row_det['precio'] * $row_det['cantidad']; ?> 
                            <tr>
                                <td><?php echo $row_det['cantidad']; ?></td>
                                <td><?php echo $row_det['nombre']; ?></td>
                                <td><?php echo $importe; ?></td>
                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
        </div>
    </main>
    <!-- Footer -->
  <footer id="footer" class="section footer">
    <div class="container">
      <div class="footer-container">
        <div class="footer-center">
          <h3>SERVICIOS</h3>
          <a href="#">Venta de suministros</a>
          <a href="#">Reparación de computador</a>
          <a href="#">Servicio móvil</a>
          <a href="#">Soluciones de red</a>
          <a href="#">Apoyo técnico</a>
        </div>
        <div class="footer-center">
          <h3>INFORMACION</h3>
          <a href="#">Sobre Nosotros</a>
          <a href="#">Política de privacidad</a>
          <a href="#">Términos y condiciones</a>
          <a href="#">Contactanos</a>
          <a href="#">Mapa del sitiop</a>
        </div>
        <div class="footer-center">
          <h3>MIS CUENTAS</h3>
          <a href="#">Bancolombia</a>
          <a href="#">Nequi</a>
          <a href="#">Daviplata</a>
          <a href="#">Movii</a>
          <a href="#">Paypal</a>
        </div>
        <div class="footer-center">
          <h3>CONTACTANOS</h3>
          <div>
            <span>
              <i class="fas fa-map-marker-alt"></i>
            </span>
          Cll.7 con Kr.9 - 111 AP1 Calle 20 de Julio, Santa Ana, Isla de Barú, Cartagena, Colombia
          </div>
          <div>
            <span>
              <i class="far fa-envelope"></i>
            </span>
            wptehnology@outlook.es
          </div>
          <div>
            <span>
              <i class="fas fa-phone"></i>
            </span>
            +57 350 6696519
          </div>
          <div class="payment-methods">
            <img src="./images/payment.png" alt="">
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="copyright">
      <p>Copyright&#169 2021 Todods los derechos reservados <a href="#">Market Solutions Oviedo</a></p>
   </div>
  </footer>
  <!-- End Footer -->
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
    <!-- Custom Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/arriba.js"></script>
</body>
</html>