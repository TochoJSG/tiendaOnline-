paypal.Buttons({
    createOrder:(data,actions)=>{
        return actions.order.create({
            style:{
                shape:'pill',
                label:'pay'
            },
            purchase_units:[{
                amount:{
                    value:100
                }
            }]
        });
    },
    onApprove:(data,actions)=>{
        actions.order.capture().then((detalles)=>{
            //console.log(detalles);
            window.location.href="compraExitosa.html";
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