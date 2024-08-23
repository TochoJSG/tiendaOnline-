const urlCardsBio = 'negocio/amz.json';
const contenidoBioEco = document.querySelector('.containerEco');
let productosBio = '';
const consultaBio = async() =>{
	const res = await fetch(urlCardsBio);
	const data = await res.json();
};
const insertaBio = productos =>{
	productos.forEach( producto=>{
		if(producto.clase === 'bio'){
		productosBio = `<div class="boxEco">
							<span></span>
							<div class='contentEco'>
								<img src="${producto.imProd}" alt="cargando imagen de ${producto.title}">
								<h2>${producto.title}</h2>
								<p>${producto.description}
									</p>
								<a target='_blank' href='${producto.url}'>Compra en Amazon</a>
							</div>
						</div>`;
		}
		
	});
	contenidoBioEco.innerHTML = productosBio;
};
