const urlAMZ = 'negocio/amz.json';
const targetasAmz = document.querySelector('.containerCardAmz');
const carrusel = document.querySelector('#carrusel-gral');
/*function pedirDataCarr(){
	fetch(urlAMZ).
		then(response=>
			response.json()).
			then(data=>{
				//console.log(data);
				pintarCarrusel(data);
		}).catch(error=>console.log(error));
}
function pedirDataAmz(){
	fetch(urlAMZ).
		then(response=>
			response.json()).
			then(data=>{
				//console.log(data);
				pintarCards(data);
		}).catch(error=>console.log(error));
}*/
const consultamosAmz = async() =>{
	const req = await fetch(urlAMZ);
	const data = await req.json();
	pintarCards(data);
	pintarCarrusel(data);
};
const pintarCards = data =>{
	let plantilla1 = '';
	data.forEach(item=>{
		if( (item.plataforma==='amazon') && (item.clase==='matprimas') ){   
			plantilla1 += `<div class="contCardAmz">
								<div class="coverLaCard">
									<img src="${item.imBase}" />
								</div>
								<div class="detailsLaCard">
									<img src="${item.imProd}" alt="cargando ${item.title}"/>
									<h2>${item.title}
										</h2>
									<a target="_blank" href="${item.url}">Ver en Amazon
										</a>
								</div>
							</div>`;
		}
	});
	targetasAmz.innerHTML = plantilla1;
}
const pintarCarrusel = data =>{
	let plantilla2 = '';
	data.forEach(item=>{
	if( (item.clase=='matprimas') || (item.plataforma=='ml') ){
	plantilla2 += `<div class="prod_car">
				<picture>
					<div class="imgBx">
					<img src="${item.imProd}" alt="loading..." />
					</div>
				</picture>
				<div class="details_car">
					<h2>${item.title}</h2>
					<a target="_blank" href="${item.url}">Ver en Amazon</a>
				</div>
			</div>`;
	}
	});
	carrusel.innerHTML = plantilla2;
}
document.addEventListener('DOMContentLoaded',consultamosAmz);