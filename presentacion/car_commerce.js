//const span=document.querySelectorAll('.car_mov');
<<<<<<< HEAD
let product = document.getElementsByClassName('prod_car');
let product_page = Math.ceil(product.length/3);
let l = 0;
let movePer = 25.34;
let maxMove = 203;
let mobile_view = window.matchMedia("(max-width:999px)");
if(mobile_view.matches){movePer = 50.36;maxMove = 504;}
let right_mover = () =>{
	l=l+movePer;
	if(product==1){l=0;}
	for(const i of product){
		if(l>maxMove){l = l-movePer;}
		i.style.left='-'+l+'%';
	}
};
let left_mover = () =>{
	l = l-movePer;
	if(product<=1){l = 0;}
	for(const i of product){
		if(product_page>1){i.style.left='-'+l+'%';}
	}
};
=======
let product=document.getElementsByClassName('prod_car');
let product_page=Math.ceil(product.length/4);
let l=0;
let movePer=25.34;
let maxMove=203;
let mobile_view=window.matchMedia("(max-width:768px)");
if(mobile_view.matches){
	movePer=50.36;maxMove=504;
	}
let right_mover=()=>{
	l=l+movePer;
	if(product==1){l=0;}
	for(const i of product){
		if(l>maxMove){l=l-movePer;}	
		i.style.left='-'+l+'%';
	}
}
let left_mover=()=>{
	l=l-movePer;
	if(product<=1){l=0;}
	for(const i of product){
		if(product_page>1){i.style.left='-'+l+'%';}
	}
}
>>>>>>> 57f16565d94fc5722f6b7949232ee9399a0c284f
/*span[0].onclick=()=>{console.log('left');left_mover();}
span[1].onclick=()=>{console.log('right');right_mover();}*/