<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Session;
use Illuminate\Support\Facades\Input;
use Redirect;
use URL;
use App\Carrito;
use App\Producto;

class PaymentController extends Controller
{   private $_api_context;
  public function __construct(){
    $paypal_conf=\Config::get('paypal');
    $this->_api_context= new ApiContext(new OAuthTokenCredential(
      $paypal_conf['client_id'],
      $paypal_conf['secret']
    ));
    $this->_api_context->setConfig($paypal_conf['settings']);
  }

  public function payWithPaypal(Request $request){
    $payer = new Payer();
    $payer->setPaymentMethod("paypal");
    $Allitems=[]; //arreglo que se pasará a paypal

    //se llama al carrito
    $carritoAnt=Session::has('carrito') ? Session::get('carrito') : null;
    $carrito=new Carrito($carritoAnt);

    //no se guardan cambios de productos ni se crea la orden hasta que paypal responda con un pago completado
    //solo se cargan los elementos del carrito a un array de productos que se envia a paypal
    if($carrito->elementos!=null){
    }else{
      return back()->with('msj','El carrito está vacío por favor antes de registrar un pago, llenalo de productos');
    }

    foreach($carrito->elementos as $producto){
      $prodx=Producto::findOrFail($producto['elemento']->id);

      if($producto['cantidad']>$prodx->stock){
        $carrito->eliminar($producto['elemento']->id);
        $request->session()->put('carrito',$carrito);
        return redirect()->action('ProductoController@verCarrito')->with('msj','Error, se ha agregado más de un producto al carrito de lo que hay en la tienda, producto retirado');
      }else{
        $item=new Item();
        $item->setName($prodx->nombre_producto)
        ->setCurrency('USD')
        ->setQuantity($producto['cantidad'])
        ->setPrice($producto['precio']);
        $Allitems[]=$item;
      }
    }
    //se agregan todos los productos a la lista de paypal
    $itemList= new ItemList();
    $itemList->setItems($Allitems);

    //se prepara el pago
    $amount = new Amount();
    $amount->setCurrency("USD")
    ->setTotal($carrito->precioTotal);
    //se prepara la transacción con paypal
    $transaction = new Transaction();
    $transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Pago de la compra hecha en linea a la tienda Panadería Lila");

    //las url a las que debe regresar después de pagar o cancelar el pago

    $redirectUrls = new RedirectUrls();
    $redirectUrls->setReturnUrl(URL::to('status'))
    ->setCancelUrl(URL::to('status'));

    $payment = new Payment();
    $payment->setIntent('Sale')
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));



    try {
      $payment->create($this->_api_context);

    }catch (\PayPal\Exception\PPConectionException $ex) {
      if(\Config::get('app.debug')){
        \Session::put('error','Connection Timeout');
        return Redirect::to('tienda');
      }else{
        \Session::put('error','Algo salió mal');
        return Redirect::to('tienda');
      }
    }


  foreach ($payment->getLinks() as $link) {
    if ($link->getRel() == 'approval_url') {
      $redirect_url = $link->getHref();
      break;
    }
  }
  /** add payment ID to session **/
  Session::put('paypal_payment_id', $payment->getId());
  if (isset($redirect_url)) {
    /** redirect to paypal **/
    return Redirect::away($redirect_url);
  }
  \Session::put('msj2', 'Unknown error occurred');
  return redirect()->back();
}






public function getStatus(){
  $payment_id=Session::get('paypal_payment_id');
  Session::forget('paypal_payment_id');

  if(empty(Input::get('PayerID')) || empty(Input::get('token')) ){
    \Session::put('msj', 'El pago Falló');
    return Redirect::to('tienda');

  }

  $payment=Payment::get($payment_id,$this->_api_context);
  $execution= new PaymentExecution();
  $execution->setPayerId(Input::get('PayerID'));

  //ejecutando el pago
  $result=$payment->execute($execution,$this->_api_context);

  if($result->getState()=='approved'){
    \Session::put('msj', 'El pago fue realizado');
    return Redirect::to('pagoConfirmado');
  }

  \Session::put('msj', 'El pago Falló');
  return Redirect::to('pagoCancelado');
}
}
