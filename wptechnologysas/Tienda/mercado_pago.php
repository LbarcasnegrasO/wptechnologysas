<?php

require './vendor/autoload.php';

MercadoPago\SDK::setAccessToken('TEST-1740555477622903-122119-4ca623ecd45333b50935bad28f2c227b-256812641');

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item();
$item->id = '0001';
$item->title = 'Producto CDP';
$item->quantity = 1;
$item->unit_price = 15000.00;
$item->currency_id = "COP";

$preference->items = array($item);

$preference->back_urls = array(
    "success" => "http://localhost/wptechnologysas/Tienda/captura.php",
    "failure" => "http://localhost/wptechnologysas/Tienda/fallo.php"
);

$preference->auto_return = "approved";
$preference->binary_mode = true;
$preference->save();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script src="https://sdk.mercadopago.com/js/v2"></script>
    
<!--<script src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"></script>-->

</head>

<body>

    <h3>Mercado Pago</h3>

    <div class="checkout-btn"></div>

    <script>
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
    
<!--<script src="https://www.mercadopago.com.co/integrations/v1/web-payment-checkout.js"
  data-preference-id="">
</script>-->


</body>
</html>