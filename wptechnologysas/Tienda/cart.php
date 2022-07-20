<?php
require 'config/config.php';
require 'config/database.php';
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
}

//session_destroy();
include 'cabeceras/cabeceraPagos/header.php';
?>


    <!-- Cart Items -->
    <div class="container cart">
      <table>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
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
                
              ?>
            <tr>
              <td>
                <div class="cart-info">
                  <div>
                    <p><?php echo $nombre; ?></p>
                    <span>Precio: <?php echo MONEDA . number_format($precio_desc,2, '.', ','); ?></span>
                    <br />
                    <a id="eliminar" class="btn btn-warning btn-sm" data-bs-id="<?php echo $_id; ?>"
                    data-bs-toggle="modal" data-bs-target="#eliminarModal"><h4>Eliminar</h4></a>
                  </div>
                </div>
              </td>
              <td>
                <input type="number"  min="1" max="10" step="1" value="<?php echo $cantidad ?>"
                size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)" />
              </td>
              <td>
                <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"> <?php echo MONEDA . number_format($subtotal,2, '.', ','); ?></div>
              </td>
              <?php } ?>
            </tr>
            
          
          
      </table>

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
        <?php if($lista_carrito != null){ ?>
        <div class="row">
              <a href="pagos.php" class="btn btn-warning btn-sm"><h3>Realizar pago</h3></a>
        </div>
        <?php } ?>
      </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Alerta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el producto de la lista?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button id="btn-eliminar" type="button" class="btn btn-danger" onclick="eliminar()">Eliminar</button>
      </div>
    </div>
  </div>
</div>
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
      <p>Todods los derechos reservados &copy; <?=date('Y')?>  <a href="#">Market Solutions Oviedo</a></p>
   </div>
  </footer>
  <!-- End Footer -->
  <script>
    let eliminaModal = document.getElementById('eliminarModal')
    eliminaModal.addEventListener('show.bs.modal', function(event){
      let button = event.relatedTarget
      let id = button.getAttribute('data-bs-id')
      let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
      buttonElimina.value = id
    })

    function actualizaCantidad(cantidad, id){
          let url = 'clases/actualizar_carrito.php'
          let formData = new FormData()
          formData.append('action', 'agregar')
          formData.append('id', id)
          formData.append('cantidad', cantidad)

          fetch(url, {
              method: 'POST',
              body: formData,
              mode: 'cors'
          }).then(response => response.json())
              .then(data => {
                  if(data.ok){

                      let divsubtotal = document.getElementById('subtotal_' + id)
                      divsubtotal.innerHTML = data.sub
                      
                      let total = 0.00
                      let list = document.getElementsByName('subtotal[]')

                      for(let i = 0; i < list.length; i++){
                        total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                      }

                      total = new Intl.NumberFormat('en-US', {
                        minimumFractionDigits: 2
                      }).format(total)
                      document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
                  }
              })
    }

    function eliminar(){
          let botonElimina = document.getElementById('btn-eliminar')
          let id = botonElimina.value

          let url = 'clases/actualizar_carrito.php'
          let formData = new FormData()
          formData.append('action', 'eliminar')
          formData.append('id', id)

          fetch(url, {
              method: 'POST',
              body: formData,
              mode: 'cors'
          }).then(response => response.json())
              .then(data => {
                  if(data.ok){
                      location.reload()
                      
                  }
              })
    }
  </script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
    <!-- Custom Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/arriba.js"></script>
  </body>
</html>
