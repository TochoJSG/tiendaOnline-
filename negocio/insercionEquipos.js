/*
<div id="productos">
    <div id="temp"></div>
</div>

<div id="${item.id}" class="swiper-slide cardBd">
    <div class="card-header">
		<img class="card-img-top" src="imagenes/productos/${item.id}/principal.jpg" alt="Error al cargar la imagen de ${item.title}" style="height:250px;" />
	</div>
	<div class="card-body col-6">
		<h5 class="card-title">${item.title}</h5>
		<h3 class="card-text">${item.precio}</h3>
		<a id="${item.id}" class="buyBtn btn btn-primary" type="button" href="ventas.php">Ver</a>			
	</div>
</div>

<div class="swiper mySwiper">
	<div id="cardsBd" class="swiper-wrapper">

	</div>
	<div class="swiper-pagination"></div>
</div>


 {
"plataforma":"amazon","clase":"audio","precio":"349.00",
"title":"Hora Bocina Bluetooth",
"description":"1 Hora Bocina Bluetooth, Barra de Sonido Bocinas para PC TV, RGB Altavoces Inalámbricos Bluetooth 5.1 con 2000mAh Batería Luces LED, Soporte 3.5 mm AUX/TF/USB/Bluetooth para Interior, Hogar y Fiesta",
"url":"https://amzn.to/3YyOn60",
"imBase":"imagenes/amz.png","imProd":"https://m.media-amazon.com/images/I/61r5iAxAbHL._AC_SX522_.jpg"
}
*/
const url = 'negocio/amz.json';
document.addEventListener('DOMContentLoaded',e=> fetchData() );
const cardSwiper = document.querySelector('.swiper-wrapper');
const templateSwiperEqs = document.querySelector('#temp-swiper').content;
const fragmento = document.createDocumentFragment();
const fetchData = async() =>{
    const res = await fetch(url);
    const data = await res.json();
    pintarEquipos(data);
};
const pintarEquipos = productos =>{
    productos.forEach( producto=>{
        if(producto.plataforma === 'amazon'){
        templateSwiperEqs.querySelector('.card-header').innerHTML = `<img class="card-img-top" src="${producto.imProd}" alt="Error al cargar la imagen de ${producto.title}"/>`;
        templateSwiperEqs.querySelector('h5').textContent = producto.title;
        templateSwiperEqs.querySelector('h3').textContent = producto.precio;
        templateSwiperEqs.querySelector('a').innerHTML = `<a id="${producto.title}" class="buyBtn btn btn-primary" type="button" href="${producto.url}">Ver</a>`;
        }
    let clone = templateSwiperEqs.cloneNode(true);
    fragmento.appendChild(clone);
    });
    cardSwiper.appendChild(fragmento);
};
