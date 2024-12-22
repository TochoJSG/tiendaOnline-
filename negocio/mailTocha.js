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

// Seleccionar el formulario por su clase
const form = document.querySelector('.contactoGMAIL');

// Función asíncrona para manejar el envío del formulario
async function sendMsg(e) {
    e.preventDefault(); // Evita el envío predeterminado del formulario

    // Crear un objeto FormData con los datos del formulario
    const formData = new FormData(form);

    try {
        // Realizar la solicitud fetch al archivo PHP
        const response = await fetch('./enviar_mail.php', {
            method: 'POST',
            body: formData
        });

        // Verificar si la respuesta es exitosa
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        // Intentar procesar la respuesta como JSON
        const result = await response.json();

        // Manejar la respuesta según el contenido recibido
        if (result.success) {
            alert(result.message || 'Mensaje enviado con éxito.');
            form.reset(); // Limpiar el formulario
        } else {
            alert(result.error || 'Hubo un error al enviar el mensaje.');
        }
    } catch (error) {
        // Manejar cualquier error en la solicitud o procesamiento
        console.error('Error:', error);
        alert('Error en la conexión al servidor o en el procesamiento de datos.');
    }
}

// Agregar el evento 'submit' al formulario para que use la función asíncrona
form.addEventListener('submit', sendMsg);
