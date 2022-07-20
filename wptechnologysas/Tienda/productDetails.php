<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id= isset($_GET['id']) ? $_GET['id'] : '';
$token= isset($_GET['token']) ? $_GET['token'] : '';

if($id == '' || $token == ''){
  echo 'Error al procesar la peticion';
  exit;
}else{

  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

  if ($token == $token_tmp){
    
      $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
      $sql->execute([$id]);
      if($sql->fetchColumn() > 0){

        $sql = $con->prepare("SELECT nombre, descripcion, precio, descuento FROM productos WHERE id=? AND activo=1 LIMIT 1");
        $sql->execute([$id]);
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $precio = $row['precio'];
        $descuento = $row['descuento'];
        $precio_desc = $precio - (($precio * $descuento)/ 100);
        $dir_images = 'images/productos/' . $id . '/';

        $rutaImg = $dir_images . 'img.png';

        if(!file_exists($rutaImg)){
          $rutaImg = 'images/no-photo.jpg';
        }

        $imagenes = array();
        $dir = dir($dir_images);
        while(($archivo = $dir->read()) != false){
          if($archivo != 'img.png' && (strpos($archivo, 'png'))){
            $imagenes[] = $dir_images . $archivo;
          }
        }
        $dir->close();

      }

  } else{
    echo 'Error al procesar la peticion';
    exit;
  }

}

include 'cabeceras/header.php';
?>



  <!-- Product Details -->
  <section class="section product-detail">
    <div class="details container">
      <div class="left">
        <div class="main">
          <img src="<?php echo $rutaImg; ?>" alt="" />
        </div>
        <div class="thumbnails">
          <div class="thumbnail">
            <img src="./images/product2.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product3.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product4.jpg" alt="" />
          </div>
          <div class="thumbnail">
            <img src="./images/product5.jpg" alt="" />
          </div>
        </div>
      </div>
      <div class="right">
        <span>Home/T-shirt</span>
        <h1><?php echo $nombre; ?></h1>
        <div class="price"><?php echo MONEDA .  number_format($precio, 2, '.', ','); ?></div>
        <form>
          <div>
            <select>
              <option value="Select Size" selected disabled>
                Seleccione almacenamiento
              </option>
              <option value="4">4GB</option>
              <option value="8">8GB</option>
              <option value="16">16GB</option>
              <option value="32">32GB</option>
            </select>
            <span><i class="fas fa-chevron-down"></i></span>
          </div>
        </form>

        <form class="form">
          <td><input type="number" min="1" step="1" value="1" /></td>
          <button  class="addCart" type="button" onclick="addProducto(<?php echo $id; ?>, '<?php echo $token_tmp; ?>')">Añadir al carrito</button>
        </form>
        <h3> Detalles del Producto</h3>
        <p>
          <?php echo $descripcion; ?>
        </p>
      </div>
    </div>
  </section>

  <!-- Related Products 

  <section class="section related-products">
    <div class="title">
      <h2>Productos Relacionados</h2>
      <span>Seleccione entre las marcas de productos premium y ahorre mucho dinero</span>
    </div>
    <div class="product-layout container">
      <div class="product">
        <div class="img-container">
          <img src="./images/product1.jpg" alt="" />
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
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product2.jpg" alt="" />
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
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product3.jpg" alt="" />
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
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
      <div class="product">
        <div class="img-container">
          <img src="./images/product4.jpg" alt="" />
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
          <a href="">Bambi Print Mini Backpack</a>
          <div class="price">
            <span>$150</span>
          </div>
        </div>
      </div>
    </div>
  </section>-->

   <?php include 'cabeceras/footer.php'; ?>