const forma=document.querySelector('.contactoGMAIL');
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
forma.addEventListener('submit',sendMsg);


/*
const form = document.querySelector('.contactoGMAIL');

async function sendMsg(e) {
	e.preventDefault();

	const formData = new FormData(form);

	try {
		const response = await fetch('./enviar_mail.php', {
			method: 'POST',
			body: formData
		});

		const result = await response.json();

		if (response.ok) {
			alert(result.message || 'Mensaje enviado con éxito.');
			//alert('Mensaje enviado con éxito.');
			form.reset();
		} else {
			alert(result.error || 'Hubo un error al enviar el mensaje.');
			//alert('Hubo un error al enviar el mensaje.');
		}
	} catch (error) {
		alert('Error en la conexión al servidor.');
	}
}

form.addEventListener('submit', sendMsg);*/