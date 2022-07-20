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
  <?php 
  $preference->items = $productos_mp;
  $preference->back_urls = array(
    "success" => "http://localhost/wptechnologysas/Tienda/captura.php",
    "failure" => "http://localhost/wptechnologysas/Tienda/fallo.php"
  );
  $preference->auto_return = "approved";
  $preference->binary_mode = true;
  $preference->save();
  ?>
  
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
    <!-- Custom Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
    <script src="./js/slider.js"></script>
    <script src="./js/arriba.js"></script>
	
	<script>
		paypal.Buttons({
			style:{
				color: 'blue',
				shape: 'pill',
				label: 'pay'
			},
			createOrder: function(data, actions){
				return actions.order.create({
					purchase_units: [{
						amount: {
							value: <?php echo round($total_paypal); ?>
						}
					}]
				});
			},
			onApprove: function(data, actions){
				let URL = 'clases/captura.php'
				actions.order.capture().then(function (detalles){
					//window.location.href="products.html";
					console.log(detalles)
          let url = 'clases/captura.php'
					return fetch(url,{
						method: 'post',
						headers: {
							'content-type': 'application/json'
						},
						body: JSON.stringify({
							detalles: detalles
						})
					}).then(function(response){
            window.location.href = "completado.php?key=" + detalles['id']; // $datos['detalles']['id'];
          })
				});
			},
			onCancel: function(data){
				alert("Pago cancelado")
				console.log(data);
			}
		}).render('#paypal-button-container');

    const mp = new MercadoPago('TEST-bafe1df5-6dce-4fc3-b6fe-7ec7f6ba6163', {
            locale: 'es-CO'
        });
        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn',
                label: 'Pagar con Mercado Pago'
            }
        })
	</script>
  </body>
</html>

