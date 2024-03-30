const addProduct = (idProducto,token_tmp)=>{
    let formData=new FormData()
	formData.append('idProducto',idProducto)
	formData.append('token_tmp',token_tmp)
	let validacion='negocio/clases/carrito.php';
	const opcionesPeticion = {
	    method:'POST',
		body:formData,
		mode:'cors',
		credentials:"same-origin"
	};
	fetch(validacion,opcionesPeticion)
	.then((response)=>response.json())
	.then((data)=>{
	    console.log('Data:::>',data);//,'id->',idProducto,'token->',token_tmp)
	    let elemento = document.querySelector("#num_cart");
		if(data.ok){
			elemento.innerHTML = data.numero;
		}//else{console.log('id->',idProducto,'token->',token_tmp)}
	})
	.catch(console.error);
}	

/*  $productos = isset($_SESSION['carrito']['producto']) ? $_SESSION['carrito']['producto'] : null;
const addProduct = (idProducto,token_tmp)=>{
	let validacion='negocio/clases/carrito.php';
	const opcionesPeticion = {
	    method:'POST',
		body:JSON.stringify({
		    'idProducto':idProducto,
            'token_tmp':token_tmp
	    }),
		headers:{
	      "Content-type":"application/json; charset=UTF-8"  
	    },
		mode:'cors',
		credentials:"same-origin"
	};
	fetch(validacion,opcionesPeticion)
	.then((response)=>
	response.json()
	    //response.arrayBuffer()
	    //response.blob()
	    //response.text()
	    //response.formData()
	)
	.then((data)=>{
	    console.log('Data:::>',data,'id->',idProducto,'token->',token_tmp)
	    let elemento = document.querySelector("#num_cart");
		//if(data.ok){
			elemento.innerHTML = data.numero;
		//}else{console.log('id->',idProducto,'token->',token_tmp)}
	})
	.catch(console.error);
}

*/