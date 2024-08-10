const addProduct = (idProducto,token_tmp)=>{
    let formData = new FormData();
	formData.append('idProducto',idProducto);
	formData.append('token_tmp',token_tmp);
	let validacion = 'negocio/clases/carrito.php';
	const opcionesPeticion = { method:'POST', body:formData, mode:'cors', credentials:"same-origin" };
	fetch(validacion,opcionesPeticion)
	.then(response=>response.json())
	.then(data=>{ let elemento = document.querySelector("#num_cart");
		if(data.ok)	elemento.innerHTML = data.numero;
		//}else{console.log('id->',idProducto,'token->',token_tmp)}
	})
	.catch(console.error);
};
