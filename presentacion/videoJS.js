let video=document.querySelector('video');
window.addEventListener('scroll',function(){
	let val=1+window.scrollY/-600;
	video.style.opacity=val;
	});