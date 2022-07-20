
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
            wptechnology@outlook.es
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
  function addProducto(id, token){
    let url = 'clases/carrito.php'
    let formData = new FormData()
    formData.append('id', id)
    formData.append('token', token)

    fetch(url, {
        method: 'POST',
        body: formData,
        mode: 'cors'
    }).then(response => response.json())
        .then(data=> {
            if(data.ok){
                let elemento = document.getElementById("num_cart")
                elemento.innerHTML = data.numero
            }
        })
    }
  </script>

  <!-- Glidejs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-3.0.0.min.js"></script>
  <!-- Custom Scripts -->
  <script src="./js/index.js"></script>
  <script src="./js/arriba.js"></script>
  <script src="./js/products.js"></script>
  <script src="./js/slider.js"></script>
  
  
</body>

</html>




