paypal.Buttons({
  createOrder: function(data, actions) {
      
    return actions.order.create({// orden de PayPal con los detalles del carrito
      purchase_units: [{
        amount: { value: '100.01' }
      }]
    });
  },
  
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {// Aquí se ejecuta después de que el usuario aprueba el pago
        
      alert('Pago realizado con éxito');// confirmación del pago
      
      carrito = {};// impiar el carrito y redirigir a una página de confirmación
      pintarCarrito();
      window.location.href = 'ventas.php';
    });
  },
  onCancel:(data)=>{
        alert("Pago Cancelado");
        //console.log(data);
    }
}).render('#paypal-button-container');

const mp=new MercadoPago('TEST-1d3e68a5-0bc9-49e7-8a07-207b3c098846',{
    locale:'es-MX'
});//Public key
mp.checkout({
    preference:{
        id:'<?php echo $preference->id;?>'
    },
    render:{
        container:'.checkout-btn',
        label:'Pagar con MercadoPago'
    }
});