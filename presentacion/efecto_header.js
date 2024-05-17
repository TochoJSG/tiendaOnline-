const Skewed=document.querySelector('.cover');
window.addEventListener('scroll',function(){const value1=1-(window.scrollY/666);Skewed.style.opacity=value1;});