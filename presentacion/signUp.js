const signinBtn=document.querySelector('.signinBtn');
	const signupBtn=document.querySelector('.signupBtn');
	const formBx=document.querySelector('.formBx');
	const cuerpo=document.querySelector('.cuerpo');
	signupBtn.onclick=function(){formBx.classList.add('active');cuerpo.classList.add('active');}
	signinBtn.onclick=function(){formBx.classList.remove('active');cuerpo.classList.remove('active');}