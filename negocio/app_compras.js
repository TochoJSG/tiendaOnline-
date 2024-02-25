/*
	insrcion articulos JSON
*/
const url='api.json';
const materiasPrimas=document.getElementById('matPrima')
const materiasPrimas=document.getElementById('containerCardAmz')
const cards=document.getElementById('cards')
const containerCardAmz=document.getElementById('containerCardAmz')
const cardDrop=document.getElementById('cardDrop')
const templateCard=document.getElementById('template-card').content
const templateCards=document.getElementById('template-card-2').content
const templateDrop=document.getElementById('template-drop').content
const fragment=document.createDocumentFragment()
const fragment2=document.createDocumentFragment()
const fragmentDrop=document.createDocumentFragment()
document.addEventListener('DOMContentLoaded',e=>{fetchData()});
const fetchData=async()=>{//Main Function, fetching Data
    const res=await fetch(url);
    const data=await res.json();
    // console.log(data);
        pintarCards(data);
}
const pintarCards=data=>{//Begining of Function that insert Data into HTML code
	templateCard.innerHTML='';
	templateCards.innerHTML='';
	templateDrop.innerHTML='';
    data.forEach(item=>{
        if(item.depto=='materiaPrima'){
        templateCard.querySelector('h5').innerHTML=`<h5 id="${item.title}">${item.title}</h5>`;
        templateCard.querySelector('span').textContent=item.precio;
        templateCard.querySelector('p').textContent=item.descripcion;
        templateCard.querySelector('section').innerHTML=`
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:0; height:auto;">
			<div class="carousel-inner" style="height:auto;">
			    <div class="item active">
			    	<img id="myImg" src="${item.im1}" alt="First slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			    <div class="item">
			    	<img id="myImg" src="${item.im2}" alt="Second slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			    <div class="item active">
			    	<img id="myImg" src="${item.im3}" alt="Third slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			</div>
		</div>`;
        templateCard.querySelector('a').innerHTML=`<a href="${item.url_ml}"><button class="personalizado">Mercado libre</button></a>`;
        templateCard.querySelector('button').dataset.id=item.id;
		templateDrop.querySelector('li').innerHTML=`<a href="#${item.title}">${item.title}</a>`;
        }else if(item.depto=='mueYele'){
        templateCards.querySelector('h5').innerHTML=`<h5 id="${item.title}">${item.title}</h5>`
        templateCards.querySelector('span').textContent=item.precio
        templateCards.querySelector('p').textContent=item.descripcion
        templateCards.querySelector('section').innerHTML=`
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:0; height:auto;">
			<div class="carousel-inner" style="height:auto;">
			    <div class="item active" style="height:auto;">
			    	<img id="myImg" src="${item.im1}" alt="First slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			    <div class="item" style="height:auto;">
			    	<img id="myImg" src="${item.im2}" alt="Second slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			    <div class="item active" style="height:auto;">
			    	<img id="myImg" src="${item.im3}" alt="Third slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			</div>
		</div>`
        templateCards.querySelector('a').innerHTML=`<a href="${item.url_ml}"><button class="personalizado">Mercado libre</button></a>`
        templateCards.querySelector('button').dataset.id=item.id
		}
		const cloneDrop=templateDrop.cloneNode(true);
        fragmentDrop.appendChild(cloneDrop);
        const clone=templateCard.cloneNode(true);
        const clone2=templateCards.cloneNode(true);
		
        fragment.appendChild(clone);
        fragment2.appendChild(clone2);
    })
    cards.appendChild(fragment);
    containerCardAmz.appendChild(fragment2);
	cardDrop.appendChild(fragmentDrop);
}//End Functionn that inserts Data into HTML






