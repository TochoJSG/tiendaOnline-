const buttonForm=document.querySelectorAll('#buttonForm');
buttonForm.forEach(boton=>{
	boton.onclick=()=>{document.getElementById('formaMP').style.display='block';document.getElementsByTagName('body')[0].style.overflow='hidden';}});
const us=document.querySelector('#closeMP');
us.onclick=function(){document.getElementById('formaMP').style.display='none';document.getElementsByTagName('body')[0].style.overflow = 'visible';}
