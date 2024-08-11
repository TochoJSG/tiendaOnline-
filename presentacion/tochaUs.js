<<<<<<< HEAD
/*<div id="nosotros" class="modal"><!--Nosotros-->
	<div class="headerForm">
		<span><img class="logo" src="imagenes/COORP (2).jpg"/></span>
		<h2>Acerca de Nosotros</h2>
		<span id="closeMP" class="close" title="Close Modal">&times;</span>
	</div>
		<p class="texto_nosotros">Tocha es una comerciliazadora miembro del Mercado Cananea A.C. siendo unos de los locales fundadores del marcado te ofrecemos 30 años de experiencia.
			</p>
	<button class="collapsible">Nosotros</button>
    <div class="content__">
		<p class="texto_nosotros">Somos un negocio con variedad en mercancias y ramas, ofreciendo asi un trato serio y formal, con presencia en plataformas de comercio, buscanos.
			</p>
		<p class="texto_nosotros">Le ofrecemos tratar con gente seria en un local bien establecido, estamos abiertos a negociar con usted acuerdos que nos beneficien a ambos, contactenos y conozcanos. Haga la Prueba.
			</p>
    </div>
    <button class="collapsible">Mision</button>
    <div class="content__">
      <p class="texto_nosotros">Ofrecer productos de materiales ecológicos de la mejor calidad para evitar el rápido desecho y contribuir así a minimizar el impacto ambiental.
		</p>
      <p class="texto_nosotros">Ofrecer productos de utilidad y calidad a precios accesibles para cualquier persona contribuyendo asi al ahorro.
		</p>
    </div>
    <button class="collapsible">Vision</button>
    <div class="content__">
      <p class="texto_nosotros">Consolidar la tienda en linea, a traves de las buenas practicas comerciales con productos de calidad y cuidando el precio.</p>
      <p class="texto_nosotros">Facilitar la compra online a las personas y tener alcance nacional con tiendas fisicas.</p>
      <p class="texto_nosotros">Contribuir al cuidado del ambiente con productos con materiales amigables y durareros.</p>
    </div>
	<a target="_self" href="ventas.php"><button class="botones">Observa nuestro Catalogo de Productos
		</button></a>		
	<a href="<?php echo $t_mercadoShops;?>"><button class="btnML btn-darkML">
		<div class="icono">
			<svg width="16" height="16" fill="currentcolor">
				<img src="imagenes/ml.png" width="25" height="25"/>
			</svg>
		</div>
		<span>Ve nuestra tienda en Mercado Libre</span></button></a>
	<img class="mamalon" src="imagenes/0.jpg"/>
</div>*/



=======
>>>>>>> 57f16565d94fc5722f6b7949232ee9399a0c284f
function cola(){
var coll=document.querySelectorAll('.collapsible');for(var i=0;i<coll.length;i++){coll[i].addEventListener('click',function(){this.classList.toggle('active');var content=this.nextElementSibling;if(content.style.maxHeight){content.style.maxHeight=null;}else{content.style.maxHeight=content.scrollHeight+"px";}});}
}
const buttonUs=document.querySelectorAll('#buttonUs');
buttonUs.forEach(boton=>{
	boton.onclick=()=>{document.getElementById('nosotros').style.display='block';cola();document.getElementsByTagName('body')[0].style.overflow='hidden';}});
const us=document.querySelectorAll('#closeMP');
us.onclick=()=>{document.getElementById('nosotros').style.display='none';document.getElementsByTagName('body')[0].style.overflow='visible';}
