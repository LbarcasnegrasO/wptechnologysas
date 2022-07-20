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


  <!-- PRODUCTS -->

  <section class="section products">
    <div class="products-layout container">
      <div class="col-1-of-4">
        <div>
          <div class="block-title">
            <h3>Categorias</h3>
          </div>

          <ul class="block-content">
            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Computadores</span>
                <small>(10)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Celulares</span>
                <small>(7)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span> Telecomunicaciones</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Otros</span>
                <small>(3)</small>
              </label>
            </li>
          </ul>
        </div>

        <div>
          <div class="block-title">
            <h3>Marcas</h3>
          </div>

          <ul class="block-content">
            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>SAMSUNG</span>
                <small>(10)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>FLY</span>
                <small>(7)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>MOTOROLA</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>SPARTAN</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>WEIBO</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>CORN</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>BELKIN</span>
                <small>(3)</small>
              </label>
            </li>
             <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>HUAWEI</span>
                <small>(3)</small>
              </label>
            </li>

            <li>
              <input type="checkbox" name="" id="">
              <label for="">
                <span>Otras Marcas</span>
                <small>(3)</small>
              </label>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-3-of-4">
        
        <div class="product-layout">
           <?php foreach ($resultado as $row){ ?>
          <div class="product" id="CORN">
            
            <div class="img-container">
              <?php

              $id = $row['id'];
              $imagen = "images/productos/" . $id . "/img.png";

              if (!file_exists($imagen)){
                  $imagen = "images/no-photo.png";
              }
              ?>
              <img src="<?php echo $imagen; ?>">
              <div class="addCart">
              <i class="fas fa-shopping-cart" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'],KEY_TOKEN) ?>')"></i>
              </div>

              <ul class="side-icons">
                <span><i class="fas fa-search"></i></span>
                <span><i class="far fa-heart"></i></span>
                <span><i class="fas fa-sliders-h"></i></span>
              </ul>
            </div>
            <div class="bottom">
              <a href="productDetails.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'],KEY_TOKEN); ?>"><b><?php echo $row['nombre'];?></b></a>
              <div class="price">
                <span>$<?php echo number_format($row['precio'], 2, '.', ',');?></span>
              </div>
            </div>
            
          </div>
        
          <?php } ?>
        </div>

        <!-- PAGINATION -->
        <ul class="pagination">
          <span class="active">1</span>
          <span>2</span>
          <span class="icon">››</span>
          <span class="last">Last »</span>
        </ul>
      </div>
    </div>
  </section>
<?php include 'cabeceras/footer.php'; ?>