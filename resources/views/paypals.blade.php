<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Pago con Paypal</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        @if(session()->has('msj'))
          <div class="alert alert-success" role="alert">{{session('msj')}}</div>
        @endif
        @if(session()->has('msj2'))
          <div class="alert alert-danger" role="alert">{{session('msj2')}}</div>
        @endif
      </div>
    <form class="w3-container w3-display-middle w3-card-4 w3-padding-16" method="post" id="payment-form" action="{!! URL::to('paypal') !!}">
      <div class="w3-container w3-teal w3-padding-16">Pago con Paypal</div>
      {{csrf_field()}}
      <h2 class="w3-text-blue">Formulario de pago</h2>
      <p>Formulario de Pago con Paypal Panaderia Lila</p>
      <label class="w3-text-blue"><b>Está a punto de cancelar el monto de: $ {{$cantidadTotal}} USD, al presionar el botón de pagar, serás redireccionado al sitio web de PayPal donde serás informado de los detalles de la compra a realizar.</b></label>
    </br>
    </br>
    </br>
      <button class="w3-btn w3-blue">Pagar</button>
    </form>
  </body>
</html>
