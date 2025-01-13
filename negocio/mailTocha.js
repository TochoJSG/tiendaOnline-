/*const forma=document.querySelector('.contactoGMAIL');
function sendMsg(e){
	e.preventDefault();
	const nombre=document.querySelector('.lname'),
	correo=document.querySelector('.mail'),
	telefono=document.querySelector('.tel'),
	msj=document.querySelector('.msg');		
	Email.send({
		SecureToken:"c40454ce-123a-49b8-93e9-ed83ec251b1f",
		To:'matprimas.tocha.loc33@gmail.com',
		From:correo.value,
		Subject:"Contacto G-Tocha Tocha",
		Body:msj.value
	}).then(
		message=>alert(message)
	);
}
forma.addEventListener('submit',sendMsg);*/

const form = document.querySelector('.contactoGMAIL');

async function sendMsg(e) {
    e.preventDefault(); // Evita el envío predeterminado del formulario

    const formData = new FormData(form); // objeto FormData con los datos del formulario

	const opciones = {
		method: 'POST',
		headers: {
			'Content-Type':'application/json'
		},
        body: formData
	};

	fetch('./enviar_mail.php', opciones)
	.then(res=>{
		res.json();
		//console.log('JSON exitoso');//Exitoso hasta aqui
	})
	.then(data=>{
		alert('Mensaje enviado correctamente. Nos pondremos en contacto contigo si es necesario.');
        //console.log('Data->',data);//hasta aqui fue un exito
		form.reset(); // Limpiar el formulario
		window.location.href = 'https://tochamateriasprimas.com/';
	})
	.catch (error=> {
        console.error('Error:', error);
        alert('Error en la conexión al servidor o en el procesamiento de datos.');
    });
}

form.addEventListener('submit', sendMsg);
