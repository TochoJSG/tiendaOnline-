const url='api_merca.json';
let modeloCarr='';
const tarjeta=document.querySelector('#temp');

document.addEventListener('DOMContentLoaded',e=>{fetchData()});
const fetchData=async()=>{
const res=await fetch(url);
const data=await res.json();
//console.log(data);
pintarFifi(data);
}
const pintarFifi=data=>{
    data.forEach(item=>{
		modeloCarr+=`<div class="swiper-slide">
			<div class="prodCarAmz">
			<picture>
				<img src="ama1.jpg" alt="loading..."/>
			</picture>
			<div class="detailsCarrAmz">
				<p>
					<b>Xiaomi Poco X3 Pro</b>
				</p>
			</div>
			<div class="buttonCarrAmz">
				<a class="btn_amz" target="_blank" href="https://www.amazon.com.mx/gp/product/B08YJFSHFM/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B08YJFSHFM&linkCode=as2&tag=carrusel23-20&linkId=3e8b2b1e856e23b6cadba4b90daf1701">Comprar en Amazon
					</a>
			</div>
			</div>
        </div>`;
    });
tarjeta.innerHTML=modelo;
carr.innerHTML=modeloCarr;
}