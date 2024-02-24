document.addEventListener('DOMContentLoaded',function(){
		Push.create('Bienvenido',{
		body:'Hola, haz clic para ver el canal en YouTube',
		icon:'logo.jpg',
		timeout:6666,
		onClick:function(){
			window.location='https://materiasprimastocha.mercadoshops.com.mx/';
			this.close();
			}
		});
	});