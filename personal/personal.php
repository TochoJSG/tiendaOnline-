<!doctype html>
<html>
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Personal</title>
    <style>
	@import url('https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap');
	*{box-sizing:border-box;margin:0;padding:0;font-family:'Poppins',sans-serif;scroll-behavior:smooth;}
    body{display:flex;justify-content:center;align-items:center;min-height:100vh;background:#040105;width:100%;overflow:hidden;}
	ul{position:relative;display:flex;flex-direction:column;}
	ul li{list-style:none;width:666px;}
	ul li:before{content:attr(data-text);position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);color:#fff;font-size:16em;font-weight:700;pointer-events:none;opacity:0;letter-spacing:17px;transition:0.666s;white-space:nowrap;}
	ul li:hover:before{opacity:0.0666;letter-spacing:0px;}
	ul li a{position:relative;display:inline-block;padding:6px 15px;text-decoration:none;background:#2196f3;color:#fff;text-transform:uppercase;letter-spacing:3px;overflow:hidden;transition:0.666s;z-index:1;}
	ul:hover li a{opacity:0;}
	ul li a:hover{transform:scale(1.1);z-index:1000;background:#daf;opacity:1;}
	.btnAnimaLuz{display:flex;position:relative;justify-content:center;align-items:center;flex-wrap:wrap;margin:17px 0;}
    .btnAnimaLuz a{position:relative;width:100%;height:50px;margin:16px;line-height:48px;background:#000;text-transform:uppercase;font-size:1.3em;letter-spacing:5px;text-decoration:none;			
			-webkit-box-reflect:below 1px linear-gradient(transparent,#0004);}
    .btnAnimaLuz a span{position:absolute;display:block;top:1px;left:1px;right:1px;bottom:1px;text-align:center;background:#0c0c0c;color:rgba(255,255,255,0.2);transition:0.6s;z-index:1;}
	.btnAnimaLuz a::after{content:'';position:absolute;top:0;left:0;width:100%;height:100%;background:linear-gradient(45deg,#fb0094,#00f,#0f0,#ff0,#f00,#fb0094,#00f,#0f0,#ff0,#f00);background-size:400%;opacity:0;filter:blur(20px);transition:0.6s;animation:animate 20s linear infinite;}
		.btnAnimaLuz a::before{
			content:'';
			position:absolute;
			top:0;
			left:0;
			width:100%;
			height:100%;
			background:linear-gradient(45deg,#fb0094,#00f,#0f0,#ff0,#f00,#fb0094,#00f,#0f0,#ff0,#f00);
			background-size:400%;
			opacity:0;/**/
			transition:0.6s;
			animation:animate 20s linear infinite;
		}
		.btnAnimaLuz a:hover span{
			color:rgba(255,255,255,1);
		}
		.btnAnimaLuz a:hover::before,a:hover::after{
			opacity:1;
		}
		.btnAnimaLuz a span::before{
			content:'';
			position:absolute;
			top:0;
			left:0;
			width:100%;
			height:50%;
			background:rgba(255,255,255,0.1);
		}
		@keyframes animate{
			0%{
				background-position:0 0;
			}
			50%{
				background-position:300% 0;
			}
			100%{
				background-position:0 0;
			}
		}
	</style>
</head>
<body>
<ul>
	<li data-text="Inventario" class="btnAnimaLuz">
		<a target="_self" href="personal/procesos/GestionInventario.php"><span>Gestionar Inventario</span></a>
		</li>
	<li data-text="Personal" class="btnAnimaLuz">
		<a target="_self" href="personal/procesos/GestionPersonal.php"><span>Gestionar Empleados</span></a>
		</li>
	<li data-text="Finanzas" class="btnAnimaLuz">
		<a target="_self" href="personal/procesos/GestionFinanzas.php"><span>Gestionar Finanzas</span></a>
		</li>
</ul>
<script>
	const menuToggle=document.querySelector('.menuToggle');
	const navigation=document.querySelector('.navigation');
	menuToggle.onclick=function(){
		menuToggle.classList.toggle('active');
		navigation.classList.toggle('active');
	}
	window.addEventListener('scroll',function(){
		const header=document.querySelector('header');
		header.classList.toggle('sticky',window.scrollY>0);
	});
	function toggleMenu(){
		menuToggle.classList.remove('active');
		navigation.classList.remove('active');
	}
</script>
</body>
</html>
