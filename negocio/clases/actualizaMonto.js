function actualizaCantidad(cantidad,idProducto){//Actualizacion en tiempo real a paginma sin formulario AJAX
	let url='negocio/clases/actualizar_carrito.php';
	let formData=new FormData();
	formData.append('action','agregar');
	formData.append('idProducto',idProducto);
	formData.append('cantidad',cantidad);
	fetch(url,{
		method:'POST',
		body:formData,
		mode:'cors'
	}).then(response=>response.json()).then(data=>{
		if(data.ok){
			let divsubtotal = document.getElementById('subtotal_'+id);
			divsubtotal.innerHTML = data.sub;
			let total=.00;
			let list = document.getElementByName('subtotal[]');
			for(let i=0;i<list.length;i++){
				total+=parseFloat(lista[i].innerHTML.replace(/[$,]/g,'2'));
			}
			total=new Intl.NumberFormat('en-US',{
				minimumFractionDigits:2
			}).format(total);
			document.getElementById('total').innerHTML = '<?php echo MONEDA;?>'+total;
		}
	});
}