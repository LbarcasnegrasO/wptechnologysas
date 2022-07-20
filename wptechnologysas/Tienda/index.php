<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$sql = $con->prepare("SELECT id, nombre, precio FROM productos WHERE activo=1");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

//session_destroy();
include 'cabeceras/header.php';
?>


  <div class="hero">
    <div class="left">
      <span>Ventas Exclusivas</span>
      <h1>HASTA 50% DE DESCUENTO</h1>
      <small>Obtén todas las ofertas exclusivas para la temporada</small>
      <a href="productos.php">Ver colección </a>
    </div>
    <div class="right">
      <img src="./images/img-productos-a.png" alt="" />
    </div>
  </div>

  <!-- Promotion -->

  <section class="section promotion">
    <div class="title">
      <h2>Colecciones de la tienda</h2>
      <span>Select from the premium product and save plenty money</span>
    </div>

    <div class="promotion-layout container">
      <div class="promotion-item">
        <img src="./images/promo1.jpg" alt="" />
        <div class="promotion-content">
          <h3>FOR MEN</h3>
          <a href="productos.php">COMPRAR AHORA</a>
        </div>
      </div>

      <div class="promotion-item">
        <img src="./images/promo2.jpg" alt="" />
        <div class="promotion-content">
          <h3>CASUAL SHOES</h3>
          <a href="productos.php">COMPRAR AHORA</a>
        </div>
      </div>

      <div class="promotion-item">
        <img src="./images/promo3.jpg" alt="" />
        <div class="promotion-content">
          <h3>FOR WOMEN</h3>
          <a href="productos.php">COMPRAR AHORA</a>
        </div>
      </div>

      <div class="promotion-item">
        <img src="./images/promo4.jpg" alt="" />
        <div class="promotion-content">
          <h3>LEATHER BELTS</h3>
          <a href="productos.php">COMPRAR AHORA</a>
        </div>
      </div>

      <div class="promotion-item">
        <img src="./images/promo5.jpg" alt="" />
        <div class="promotion-content">
          <h3>DESIGNER BAGS</h3>
          <a href="productos.php">COMPRAR AHORA</a>
        </div>
      </div>

      <div class="promotion-item">
        <img src="./images/promo6.jpg" alt="" />
        <div class="promotion-content">
          <h3>WATCHES</h3>
          <a href="productos.php">COMPRAR AHORA</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Products -->
  <section class="section products">
    <div class="title">
      <h2>Nuevos Productos</h2>
      <span>Select from the premium product brands and save plenty money</span>
    </div>

    <div class="product-layout">
      <div class="product">
        <div class="img-container">
          <img src="./images/img1.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
              <a href="productos.php"><b>Memoria SD CROM de 8 a 32G</b></a>
              <div class="price">
                <span>$18.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img5.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
         <div class="bottom">
              <a href="productos.php"><b>Cargador Belkin V8</b></a>
              <div class="price">
                <span>$25.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img14.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
              <a href="productos.php"><b>Cable USB DAICO tipo c y V8</b></a>
              <div class="price">
                <span>$15.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img18.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
          <div class="bottom">
              <a href="productos.php"><b>Auriculares SAMSUNG AKG</b></a>
              <div class="price">
                <span>$25.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img22.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
         <div class="bottom">
              <a href="productos.php"><b>Bateria recargable JELICO</b></a>
              <div class="price">
                <span>$45.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img24.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
              <a href=""><b>Cable VGA por metros</b></a>
              <div class="price">
                <span>$15.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img32.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
              <a href="productos.php"><b>Repetidor Wifi</b></a>
              <div class="price">
                <span>$70.000</span>
              </div>
            </div>
      </div>

      <div class="product">
        <div class="img-container">
          <img src="./images/img33.png" alt="" />
          <div class="addCart">
            <i class="fas fa-shopping-cart"></i>
          </div>

          <ul class="side-icons">
            <span><i class="fas fa-search"></i></span>
            <span><i class="far fa-heart"></i></span>
            <span><i class="fas fa-sliders-h"></i></span>
          </ul>
        </div>
        <div class="bottom">
              <a href="productos.php"><b>Mini Consola GAME BOY</b></a>
              <div class="price">
                <span>$55.000</span>
              </div>
            </div>
      </div>
    </div>
  </section>

  <!-- ADVERT -->
  <section class="section advert">
    <div class="advert-layout container">
      <div class="item ">
        <img src="./images/promo7.jpg" alt="">
        <div class="content left">
          <span>Ventas Exclusivas</span>
          <h3>Tecnologia para tu<br> hogar</h3>
          <a href="">Ver colecciónn</a>
        </div>
      </div>
      <div class="item">
        <img src="./images/promo8.jpg" alt="">
        <div class="content  right">
          <span>Nueva tendencia</span>
          <h3>Technologia para tu<br>empresa</h3>
          <a href="">Compra ahora</a>
        </div>
      </div>
    </div>
  </section>

 <!-- BRANDS -->
 <section class="section brands">
    <div class="title">
      <h2>Nuestras Marcas</h2>
      <span>Sus marcas favoritas a su alcance</span>
    </div>
    <div class="brand-layout container">
      <div class="glide" id="glide1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <img src="./images/brand8.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand9.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand10.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand11.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand12.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand13.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand14.png" alt="">
            </li>
            <li class="glide__slide">
              <img src="./images/brand15.png" alt="">
            </li>
            
          </ul>
        </div>
      </div>

    </div>
  </section>
<?php include 'cabeceras/footer.php'; ?>