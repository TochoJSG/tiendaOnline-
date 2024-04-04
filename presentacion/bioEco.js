let text=document.getElementById('textEco');let bird1=document.getElementById('bird1');let bird2=document.getElementById('bird2');let btn=document.getElementById('btnEco');let rocks=document.getElementById('rocks');let forest=document.getElementById('forest');let water=document.getElementById('water');let header=document.getElementById('headerEco');
window.addEventListener('scroll',()=>{
	let value=window.scrollY;text.style.top=50+value*-0.5+'%';bird1.style.top=value*-1.5+'px';bird1.style.left=value*2+'px';bird2.style.top=value*-1.5+'px';bird2.style.top=value*-5+'px';btn.style.top=value*1.5+'px';rocks.style.top=value*-0.12+'px';forest.style.top=value*0.25+'px';header.style.top=value*0.5+'px';
});
const url='negocio/amz.json';
const targetasAmz=document.querySelector('.contBio');
document.addEventListener('DOMContentLoaded',pedirDataAmz);

function pedirDataAmz(){
fetch(url).then(response=>
	response.json()).then(data=>{
			//console.log(data);
			pintarCards(data);
		}).catch(error=>console.log(error));
}
const pintarCards=data=>{
	let plantilla1='';
	data.forEach(item=>{
	if(item.clase==="bio"){   
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
}