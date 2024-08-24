const url = 'negocio/amz.json';
document.addEventListener('DOMContentLoaded',e=> fetchData() );
const cardSwiper = document.querySelector('.swiper-wrapper');
const templateSwiperEqs = document.querySelector('#temp-swiper').content;
const fragmento = document.createDocumentFragment();
const fetchData = async() =>{
    const res = await fetch(url);
    const data = await res.json();
    pintarEquipos(data);
    insertCard(data);
};
const pintarEquipos = productos =>{
    productos.forEach( producto=>{
        if(producto.plataforma === 'amazon' && !(producto.clase === 'matprima') && !(producto.clase != 'bio') ){
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
const equipos = document.querySelector('.equipos');
const insertCard = productos =>{
    let cardProductos = '';
    productos.forEach(producto=>{
        if(producto.plataforma === 'amazon' && !(producto.clase === 'matprima') && !(producto.clase != 'bio') ){
            cardProductos += `<div class="box_fifi">
                                <div class="imgBxFifi">
                                    <img src="${producto.imProd}" alt="buscando imagen de ${producto.title}...">
                                </div>
                                <div class="content_fifi">
                                    <h2>${producto.title}</h2>
                                    <a target="_blank" href="${producto.url}">Comprar en Amazon</a>
                                </div>
                            </div>`;
        }
    });
    equipos.innerHTML = cardProductos;
};