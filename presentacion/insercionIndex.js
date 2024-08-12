const url='api_merca.json';
const urlAMZ='api_merca.json';
const targetasAmz=document.querySelector('.containerCardAmz');
const carrusel=document.querySelector('#carrusel-gral');
document.addEventListener('DOMContentLoaded',pedirDataMl,pedirDataAmz);
document.addEventListener('scroll',swiper);
let swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
        loop:true,
        autoplay:{delay:6666,
            disableOnInteraction:false,},
      },
    });
function pedirDataMl(){
fetch(url).then(response=>
	response.json()).then(data=>{
			/*console.log(data);*/
			pintarCarrusel(data);
		}).catch(error=>console.log(error));
}
function pedirDataAmz(){
fetch(urlAMZ).then(response=>
	response.json()).then(data=>{
			/*console.log(data);*/
			pintarCards(data);
		}).catch(error=>console.log(error));
}
const pintarCards=data=>{
	let plantilla1='';
	data.forEach(item=>{
	plantilla1+=`<div class="contCardAmz">
	<div class="coverLaCard">
		<img src="${item.imBase}"/>
	</div>
	<div class="detailsLaCard">
	<div>
		<img src="${item.imProd}"/>
		<h2>${item.title}
			</h2>
		<a target="_blank" href="${item.url_ml}">Seguir Viendo en Amazon
			</a>
	</div>
	</div>
	</div>`;
	})
	targetasAmz.innerHTML=plantilla1;
}
const pintarCarrusel=data=>{
	let plantilla2='';
	data.forEach(item=>{
	if(item.depto!="amazon"){
	plantilla2+=`<div class="prod_car" id="template-carr">
	<picture>
		<img src="${item.im1}" alt="loading..."/>
	</picture>
	<div class="details_car">
		<p>
			<b>${item.title}</b>
		</p>
	</div>
	<div class="button_car_c">
		<a target="_blank" href="${item.url_ml}"><button class="btn_car">En Mercado Libre</button></a>
	</div>
    </div>`;
	}
	})
	carrusel.innerHTML=plantilla2;
}