const urlJSON = 'negocio/amz.json';
const cardsJSON = document.getElementById('cardsJson');
const containerCardAmz = document.querySelector('.containerCardAmz');
const containerEco = document.getElementById('containerEco');
const templateCard = document.getElementById('template-card').content
const templateCards = document.querySelector('.contCardAmz').content
const templateCardsBio = document.getElementById('cardsBioJson').content
//const templateDrop = document.getElementById('template-drop').content
const fragmentJSON = document.createDocumentFragment();
const fragment2 = document.createDocumentFragment();
const fragmentBio = document.createDocumentFragment();
document.addEventListener('DOMContentLoaded',e=>{fetchData()});
const fetchData = async() =>{//Main Function, fetching Data
    const res = await fetch(urlJSON);
    const data = await res.json();
    pintarCards(data);
};
const pintarCards=data=>{//Begining of Function that insert Data into HTML code
	templateCard.innerHTML = '';
	templateCards.innerHTML = '';
	templateCardsBio.innerHTML = '';
    data.forEach(item=>{
        if(item.plataforma=='materiaPrima'){
        templateCard.querySelector('h5').innerHTML = `<h5 id="${item.title}">${item.title}</h5>`;
        templateCard.querySelector('span').textContent = item.precio;
        templateCard.querySelector('p').textContent = item.description;
        templateCard.querySelector('section').innerHTML = `
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-bottom:0; height:auto;">
			<div class="carousel-inner" style="height:auto;">
			    <div class="item active">
			    	<img id="myImg" src="${item.imProd}" alt="First slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			    <div class="item">
			    	<img id="myImg" src="${item.imBase}" alt="Second slide"/>
			    	<div class="header-text ">
			    	<ul class="action__">
        			<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Carrito</span></li>
        			<li><i class="fa fa-eye" aria-hidden="true"></i><span>Ver detalles</span></li>
        	        </ul>
        	        </div>
			    </div>
			</div>
		</div>`;
        templateCard.querySelector('a').innerHTML = `<a href="${item.url}"><button class="personalizado">Mercado libre</button></a>`;
        }else if(item.plataforma === 'amazon'){
            templateCards.querySelector('img').innerHTML = `<img src="${item.im1}">`;
            templateCards.querySelector('#amzGral').innerHTML = `<img src="${item.im1}">`;
            templateCards.querySelector('h3').innerHTML =`<h5 id="${item.title}">${item.title}</h5>`;
            templateCards.querySelector('p').textContent = item.description;
            templateCards.querySelector('a').innerHTML = `<a target="_blank" href="${item.url}">Amazon</a>`;
            //templateCards.querySelector('button').dataset.id=item.id
		    }else if(item.clase === 'bio' || item.clase === 'mascota'){
		        templateCardsBio.querySelector('h2').innerHTML = `<h2 id="${item.title}">${item.title}</h2>`;
		        templateCardsBio.querySelector('p').innerHTML = `<p>${item.description}</p>`;
		        templateCardsBio.querySelector('a').innerHTML = `<a href="${item.url}">Ver en Amazon</a>`;
		    }
        const  clone = templateCard.cloneNode(true);
        const clone2 = templateCards.cloneNode(true);
        const clone3 = templateCardsBio.cloneNode(true);
        fragmentJSON.appendChild(clone);
        fragment2.appendChild(clone2);
        fragmentBio.appendChild(clone3);
    });
    cardsJSON.appendChild(fragmentJSON);
    containerCardAmz.appendChild(fragment2);
    containerEco.appendChild(fragmentBio);
}//End Functionn that inserts Data into HTML






