const urlAMZ='amz.json';
//const targetasAmz=document.querySelector('.containerCardAmz');
const carrusel=document.querySelector('.seccion');
//document.addEventListener('DOMContentLoaded',pedirDataAmz);
document.addEventListener('scroll',pedirDataCarr);
function pedirDataCarr(){
fetch(urlAMZ).then(response=>
	response.json()).then(data=>{
			console.log(data);
			pintarCarrusel(data);
		}).catch(error=>console.log(error));
}
/*function pedirDataAmz(){
fetch(urlAMZ).then(response=>
	response.json()).then(data=>{
			console.log(data);
			pintarCards(data);
		}).catch(error=>console.log(error));
}*/
/*const pintarCards=data=>{
	let plantilla1='';
	data.forEach(item=>{
	if(item.clase==="mascota"){   
	plantilla1+=`<div class="contCardAmz">
	<div class="coverLaCard">
		<img src="${item.imBase}"/>
	</div>
	<div class="detailsLaCard">
	<div>
		<img src="${item.imProd}"/>
		<h2>${item.title}
			</h2>
		<a target="_blank" href="${item.url_ml}">Ver en Amazon
			</a>
	</div>
	</div>
	</div>`;
	}
	});
	targetasAmz.innerHTML=plantilla1;
}*/
const pintarCarrusel=data=>{
	let plantilla2='';
	data.forEach(item=>{
	if(item.clase=="matprimas"||item.plataforma=="ml"){
	plantilla2+=`<div class="prod_car">
				<picture>
					<div class="imgBx">
					<img src="${item.imProd}" alt="loading..."/>
					</div>
				</picture>
				<div class="details_car">
					<h2>${item.title}</h2>
					<a target="_blank" href="${item.url}">Ver en Amazon
						</a>
				</div>
			</div>`;
	}
	});
	carrusel.innerHTML=plantilla2;
}
