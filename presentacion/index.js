/*const ML_URL = 'https://api.mercadolibre.com/sites/$SITE_ID/search?category=$CATEGORY_ID';

fetch(ML_URL)
.then(response.json())
.then(data =>{
	console.log(data);
})
.catch(erro=>console.log(erro))
*/

//const ML_URL = 'https://api.mercadolibre.com/sites/$SITE_ID/search?category=$CATEGORY_ID';
//const ML_URL = 'https://api.mercadolibre.com/sites/MLA/search?category=MLA1055';
const ML_URL = 'https://api.mercadolibre.com/sites/MLA/categories';
const xml_request = new XMLHttpRequest();

function manejaRequest(){
	if((this.status == 200)&&(this.readyState == 4))
	{
	//0 seria set, no se llamo metodo open 
	//1 es opened objeto xml_request
	//2 headrs received, se llama a metodo send()
	//3 loading se recive respuesta
	//4 es done
	console.log(this.response);
	//const data = JSON.parse(this.response);
	//console.log(data);
	//const HTMLResponse = document.querySelector('#api');
	//const template =  data.map(seller =>v '<li>${seller.name}</li>');
	//HTMLResponse.innerHTML = '<ul>${template}</ul>';
	}
xml_request.addEventListener("load",manejaRequest);
xml_request.open('GET', '${ML_URL}/campo');
xml_request.send();
}
