const url='negocio/api_merca.json';
const urlAMZ='negocio/amz.json';
let plantilla2='';
const targetasAmz=document.querySelector('.containerCardAmz');
const carrusel=document.querySelector('#carrusel-gral');
document.addEventListener('DOMContentLoaded',pedirDataAmz);
document.addEventListener('scroll',pedirDataMl);
//document.addEventListener('DOMContentLoaded',pedirDataMl,pedirDataAmz);
function pedirDataMl(){
fetch(urlAMZ).then(response=>
	response.json()).then(data=>{
			//console.log(data);
			pintarCarrusel(data);
		}).catch(error=>console.log(error));
}
function pedirDataAmz(){
fetch(urlAMZ).then(response=>
	response.json()).then(data=>{
			//console.log(data);
			pintarCards(data);
		}).catch(error=>console.log(error));
}
const pintarCards=data=>{
	let plantilla1='';
	data.forEach(item=>{
	if(item.plataforma=="amazon"){//&&((item.clase=='bio')||(item.clase=='mascota')||(item.clase=='matprimas'))){
	plantilla1+=`<div class="contCardAmz">
	<div class="coverLaCard">
		<img src="${item.imBase}"/>
	</div>
	<div class="detailsLaCard">
	<div>
		<img src="${item.imProd}"/>
		<h2>${item.title}
			</h2>
		<h2>$ ${item.precio}
			</h2>
		<a target="_blank" href="${item.url}">Ver en Amazon
			</a>
	</div>
	</div>
	</div>`;
	}
	if(item.plataforma=="ml"){
	plantilla1+=`<div class="contCardAmz">
	<div class="coverLaCard">
		<img src="${item.imBase}"/>
	</div>
	<div class="detailsLaCard">
	<div>
		<img src="${item.imProd}"/>
		<h2>${item.title}
			</h2>
		<a target="_blank" href="${item.url}">MercadoLibre
			</a>
	</div>
	</div>
	</div>`;
	}
	})
	targetasAmz.innerHTML=plantilla1;
}
const pintarCarrusel=data=>{
	let plantilla2='';
	data.forEach(item=>{
	if((item.clase=='mascota')||(item.clase=='matprimas')){
		plantilla2+=`
		<div class="prod_car" id="template-carr">
	<picture>
		<img src="${item.imProd}" alt="loading..."/>
	</picture>
	<div class="details_car">
		<p>
			<b>${item.title}</b>
			<b>$ ${item.precio}</b>
		</p>
	</div>
	<div class="button_car_c">
		<a target="_blank" href="${item.url}"><button class="btn_car">En Amazon</button></a>
	</div>
    </div>`;
    }
    if(item.plataforma=='ml'){
		plantilla2+=`
		<div class="prod_car" id="template-carr">
	<picture>
		<img src="${item.imProd}" alt="loading..."/>
	</picture>
	<div class="details_car">
		<p>
			<b>${item.title}</b>
		</p>
	</div>
	<div class="button_car_c">
		<a target="_blank" href="${item.url}"><button class="btn_car">En Mercado Libre</button></a>
	</div>
    </div>`;
	}
	})
	carrusel.innerHTML=plantilla2;
}