var despliega=document.getElementById('desplegarMas');
document.addEventListener('click',desplegar);
function desplegar() {
  document.querySelector(".containerCardAmz").style.height = "auto";
  despliega.style.display = "none";
}