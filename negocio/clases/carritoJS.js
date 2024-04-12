const materiasPrimas = document.getElementById('matPrima');
const cards = document.getElementById('cardsBd');
const items = document.getElementById('items');
const footer = document.getElementById('footer');
const templateFooter = document.getElementById('template-footer').content;
const templateCarrito = document.getElementById('template-carrito').content;
const fragment = document.createDocumentFragment();
let carrito = {};
document.addEventListener('DOMContentLoaded',e=>{
    if(localStorage.getItem('carrito')){carrito=JSON.parse(localStorage.getItem('carrito'));pintarCarrito();}
});

cards.addEventListener('click',e=>{ addCarrito(e) });
items.addEventListener('click',e=>{ btnAumentarDisminuir(e)});

const addCarrito= e =>{
    if(e.target.classList.contains('buyBtn')){//btn-dark => card button for buying
        setCarrito(e.target.parentElement);
    }
    e.stopPropagation();
};

const setCarrito=item=>{//Function that handles Card Data
    const producto={
        id : item.querySelector('.buyBtn').dataset.id,
        title : item.querySelector('h5').textContent,
        precio : item.querySelector('h3').textContent,
        cantidad:1
    };//Data from JSON to Card
    console.log("producto->",producto);
    if(carrito.hasOwnProperty(producto.id)){
        producto.cantidad = carrito[producto.id].cantidad+1;
    }
    carrito[producto.id]={...producto};
    pintarCarrito();
    console.log("carrito",carrito);
};//End of Function that handles Card Data

const pintarCarrito=()=>{ /*    AGREGAR CONDICIONAL 'SI VACIO' CONTRARIO 'AÑADIR'  */
    items.innerHTML = '';
    templateCarrito.innerHTML = '';
    Object.values(carrito).forEach(producto=>{
        templateCarrito.querySelector('th').textContent = producto.id
        templateCarrito.querySelectorAll('td')[0].textContent = producto.title
        templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad
        templateCarrito.querySelector('span').textContent = parseFloat(producto.precio) * parseFloat(producto.cantidad)
        templateCarrito.querySelector('.btn-info').dataset.id = producto.id
        templateCarrito.querySelector('.btn-danger').dataset.id = producto.id
        const clone = templateCarrito.cloneNode(true);
        fragment.appendChild(clone);
    });
    items.appendChild(fragment);
    pintarFooter();
    localStorage.setItem('carrito',JSON.stringify(carrito));
};

const pintarFooter=()=>{//Buy Process; Global Buy Button
    footer.innerHTML = '';
    templateFooter.innerHTML = '';
    if(Object.keys(carrito).length===0){
        footer.innerHTML = `<th scope="row" colspan="5"> Carrito Vacío </th>`;
        return
	}
    const nCantidad = Object.values(carrito).reduce( (acc,{ cantidad })=> acc+cantidad,0);
    const nPrecio = Object.values(carrito).reduce( (acc,{ cantidad,precio })=> acc + parseFloat(cantidad*precio),0);//añadi parentesis parseFloat
    // console.log(nPrecio)
    templateFooter.querySelectorAll('td')[0].textContent = nCantidad;
    templateFooter.querySelector('span').textContent = nPrecio;
    const clone=templateFooter.cloneNode(true);
    fragment.appendChild(clone);
    footer.appendChild(fragment);

    /*const botonComprar = document.querySelector('#buttonForm');//Agregue boton Comprar
    botonComprar.addEventListener('click',()=>{
        carrito={};//Posible solucion, sacar carrito={} & pintarCarrito(); de este bloque, activacion con otro evento
        pintarCarrito();
    	alert('funciono el boton compra');
    	//document.getElementById('formaMP').style.display='block';document.getElementsByTagName('body')[0].style.overflow='hidden';
        //formMP.getElementById('form-checkout__amountTocha').dataset.amount=nPrecio;
    });*/

};//End of Buy Process; Buy Button

const botonCompraMP = document.querySelector('.checkout-btn');//Deprecated    Agregue boton Comprar
botonCompraMP.addEventListener('click',()=>{//    Aqui podemos hacer conexion a la BD al click, para pedir la data de la transaccion
    console.log("carrito ",carrito);
    carrito={};//Posible solucion, sacar carrito={} & pintarCarrito(); de este bloque, activacion con otro evento
    pintarCarrito();
    alert('funciono el boton compra');
});

const btnAumentarDisminuir=e=>{
    // console.log(e.target.classList.contains('btn-info'))
    if(e.target.classList.contains('increBtn')){
        const producto = carrito[e.target.dataset.id];
        producto.cantidad++;
		carrito[e.target.dataset.id] = {...producto};
        pintarCarrito();
    }
    if(e.target.classList.contains('decreBtn')){
        const producto=carrito[e.target.dataset.id];
        producto.cantidad--;
        if(producto.cantidad===0){
            delete carrito[e.target.dataset.id];
        }else{carrito[e.target.dataset.id]={...producto}}
        pintarCarrito();
    }
    e.stopPropagation();
};

/*const carritoParaPaypal = {
  purchase_units: []
};
Object.values(carrito).forEach(producto => {
  const productoParaPaypal = {
    name: producto.title,
    unit_amount: {
      currency_code: 'MXN',
      value: parseFloat(producto.precio)
    },
    quantity: producto.cantidad
  };
  carritoParaPaypal.purchase_units.push(productoParaPaypal);
});
const carritoJSONParaPaypal = JSON.stringify(carritoParaPaypal);*/

/*const botonComprarPaypal = document.getElementById('paypalButton');
botonComprarPaypal.addEventListener('click',()=>{
    const productosPaypal = Object.values(carrito).map(producto => ({
        name: producto.title,
        unit_amount: {
            currency_code: 'MXN',
            value: parseFloat(producto.precio)
        },
        quantity: producto.cantidad
    }));
    const totalPaypal = {
        currency_code: 'MXN',
        value: Object.values(carrito).reduce((total, producto) => total + (parseFloat(producto.precio) * producto.cantidad), 0)
    };
    
    const orderData = {
        intent: 'CAPTURE',
        purchase_units: [{
            description: 'Compra en mi tienda',
            amount: totalPaypal,
            items: productosPaypal
        }]
    };
    alert('Se ha enviado la orden a PayPal');// Mostrar un mensaje de éxito o redireccionar a una página de confirmación
    carrito = {};// Limpiar el carrito después de enviar la orden a PayPal
    pintarCarrito();
});*/

paypal.Buttons({
    
  createOrder: function(data, actions){
    console.log("LaData",data,"  actions",actions);
    
    const productosPaypal = Object.values(carrito).forEach(producto => ({
        name: producto.title,
        unit_amount: {
            currency_code: 'MXN',
            value: parseFloat(producto.precio)
        },
        quantity: producto.cantidad
    }));
    const totalPaypal = {
        currency_code: 'MXN',
        value: Object.values(carrito).reduce((total, producto) => total + (parseFloat(producto.precio) * producto.cantidad), 0)
    };
    const orderData = {
        intent: 'CAPTURE',
        purchase_units: [{
            description: 'Compra en mi tienda',
            amount: totalPaypal,
            items: productosPaypal
        }]
    };
    console.log("CarritoCompraPaypal->",orderData.purchase_units);
    return actions.order.create({
      purchase_units: orderData.purchase_units
    });
  },
  
  onApprove: function(data, actions){
    return actions.order.capture().then(function(details) {// Aquí se ejecuta después de que el usuario aprueba el pago
      console.log("data",data,"  actions",actions);
      alert('Pago realizado con éxito');// Confirmación del pago
      carrito = {};// Limpiar el carrito y redirigir a una página de confirmación
      pintarCarrito();
      window.location.href = 'ventas.php';
    });
  },
  
  onCancel: function(data){
        console.log("LaData ",data);
        alert("Pago Cancelado");
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