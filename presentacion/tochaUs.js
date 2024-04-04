function cola(){
var coll=document.querySelectorAll('.collapsible');for(var i=0;i<coll.length;i++){coll[i].addEventListener('click',function(){this.classList.toggle('active');var content=this.nextElementSibling;if(content.style.maxHeight){content.style.maxHeight=null;}else{content.style.maxHeight=content.scrollHeight+"px";}});}
}
const buttonUs=document.querySelectorAll('#buttonUs');
buttonUs.forEach(boton=>{
	boton.onclick=()=>{document.getElementById('nosotros').style.display='block';cola();document.getElementsByTagName('body')[0].style.overflow='hidden';}});
const us=document.querySelectorAll('#closeMP');
us.onclick=()=>{document.getElementById('nosotros').style.display='none';document.getElementsByTagName('body')[0].style.overflow='visible';}
