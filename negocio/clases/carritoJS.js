const templateCardBd = document.getElementById('template-card-bd').content;
const fragmentBd = document.createDocumentFragment();
const cardsFromBd = document.getElementById('cardsFromBd');
const materiasPrimas = document.getElementById('matPrima');
const cards = document.getElementById('cardsFromBd');
const items = document.getElementById('items');
const footer = document.getElementById('footer');
const templateFooter = document.getElementById('template-footer').content;
const templateCarrito = document.getElementById('template-carrito').content;
const fragment = document.createDocumentFragment();
const fragmentRow = document.createDocumentFragment();
let listaProductos = {};
let carrito = {};
document.addEventListener('DOMContentLoaded', e =>{
    fetchDataFromBD();
    if(localStorage.getItem('carrito')){carrito = JSON.parse(localStorage.getItem('carrito'));pintarCarrito();}
});
cards.addEventListener('click',e=>{ addCarrito(e) });
items.addEventListener('click',e=>{ btnAumentarDisminuir(e); console.log('Hubo clic sobre un Item'); });

function fetchDataFromBD(){
    const consultaJson = 'https://tochamateriasprimas.com/productos.php';
    const configuracionPeticion = {
        method: 'POST',
        headers: { 'Content-Type':'application/json; charset=utf-8' },
    };
    fetch(consultaJson,configuracionPeticion).
    then( respuesta=> respuesta.json() ).
        then( data=>  pintarCardsFromBd(data) ).
            then( inventario=> listaProductos = JSON.stringify(inventario) ).
    catch(error=> console.log('Error al obtener el JSON ', error) );
}
/*const fetchDataFromBD = async () => {
    try {
        const consultaJson = 'negocio/clases/consulta.php';
        const req = await fetch(consultaJson, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' }
        });
        if (!req.ok) {
            throw new Error(`HTTP error! Status: ${req.status}`);
        }
        const productosJSON = await req.json();
        pintarCardsFromBd(productosJSON);
    } catch (error) {console.log('Error al obtener el JSON ', error);}
};*/
const pintarCardsFromBd = productos =>{
    templateCardBd.innerHTML = '';
    productos.forEach(producto=>{
        templateCardBd.querySelector('h5').innerHTML = `<h5 id="${producto.idProducto}">${producto.nombre}</h5>`;
        templateCardBd.querySelector('span').textContent = producto.precio;
        templateCardBd.querySelector('p').textContet = producto.descripcion;
        templateCardBd.querySelector('section').innerHTML = `<img id="${producto.nombre}" src="imagenes/productos/${producto.idProducto}/principal.jpg" alt="cargando imagen de ${producto.nombre}..."/>`;
        templateCardBd.querySelector('button').dataset.id = producto.idProducto;
        const cloneBd = templateCardBd.cloneNode(true);
        fragmentBd.appendChild(cloneBd);
    });
    cardsFromBd.appendChild(fragmentBd);
};
const addCarrito= e =>{
    if(e.target.classList.contains('btnCard')){//btn-dark => card button for buying
        setCarrito(e.target.parentElement);//Datos conteniddos en la Card HTML
    }
    e.stopPropagation();
};

const descargarArchivoJSON = (contenido,nombreArchivo) =>{
    const blob = new Blob([contenido],{type:'application-json'});
    const url = URL.createObjectURL(blob);
    const elemento = document.createElement('a');
    elemento.href = url;
    elemento.download = nombreArchivo;
    document.body.appendChild(elemento);
    elemento.click();
    document.body.removeChild(elemento);
    URL.revokeObjectURL(url);
};

const setCarrito = item =>{
    const producto = {
        idProducto : item.querySelector('.btnCard').dataset.id,
        title : item.querySelector('h5').textContent,
        precio : item.querySelector('span').textContent,
        cantidad:1
    };
    if(carrito.hasOwnProperty(producto.idProducto)){
        producto.cantidad = carrito[producto.idProducto].cantidad+1;
    }
    carrito[producto.idProducto] = {...producto};
    pintarCarrito();
};

const pintarCarrito = () =>{
    items.innerHTML = '';
    Object.values(carrito).forEach(producto=>{
        templateCarrito.querySelector('th').textContent = producto.idProducto
        templateCarrito.querySelectorAll('td')[0].textContent = producto.title
        templateCarrito.querySelectorAll('td')[1].textContent = producto.cantidad
        templateCarrito.querySelector('span').textContent = producto.precio*producto.cantidad
        templateCarrito.querySelector('.btn-warning').dataset.idProducto = producto.idProducto
        templateCarrito.querySelector('.btn-info').dataset.idProducto = producto.idProducto
        const clone=templateCarrito.cloneNode(true)
        fragment.appendChild(clone)
    });
    items.appendChild(fragment);
    pintarFooter();
    localStorage.setItem('carrito',JSON.stringify(carrito));
};

const pintarFooter=()=>{//Buy Process; Global Buy Button
    footer.innerHTML = '';
    if(Object.keys(carrito).length===0){
        footer.innerHTML = `<th scope="row" colspan="5">Carrito Vacío</th>`;
        return
	}
    const nCantidad=Object.values(carrito).reduce((acc,{cantidad})=>acc+cantidad,0);
    const nPrecio=Object.values(carrito).reduce((acc,{cantidad,precio})=>acc+cantidad*precio,0);
    templateFooter.querySelectorAll('td')[0].textContent = nCantidad
    templateFooter.querySelector('span').textContent = nPrecio
    const clone = templateFooter.cloneNode(true)
    fragment.appendChild(clone);
    footer.appendChild(fragment);
};//End of Buy Process; Buy Button

const btnAumentarDisminuir = e =>{
    console.log(e.target.classList.contains('btn-info'))
    if(e.target.classList.contains('btn-warning')){
        const producto = carrito[e.target.dataset.idProducto];
        producto.cantidad++;
		carrito[e.target.dataset.idProducto] = {...producto};
        pintarCarrito();
    }
    if(e.target.classList.contains('btn-info')){
        const producto = carrito[e.target.dataset.idProducto];
        producto.cantidad--;
        if(producto.cantidad===0){
            delete carrito[e.target.dataset.idProducto];
        }else{carrito[e.target.dataset.idProducto] = {...producto}}
        pintarCarrito();
    }
    e.stopPropagation();
};
/*const btnAumentarDisminuir = e =>{
    console.log(e);
    if(e.target.classList.contains('btn-warning')){
        const producto = carrito[e.target.dataset.id];
        producto.cantidad++;
        pintarCarrito();
    }
    if(e.target.classList.contains('btn-info')){
        const producto = carrito[e.target.dataset.id];
        producto.cantidad--;
        if(producto.cantidad === 0){
            delete carrito[e.target.dataset.id];
        }
        pintarCarrito();
    }
    e.stopPropagation();
};*/
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
        window.location.href = 'ventas.php';
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