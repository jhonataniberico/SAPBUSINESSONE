<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Proyecto de desarrollo de un producto wizard online que tenga un quiz y con una unica solucion que es SAP Business One">
    <meta name="keywords"               content="SAP,producto wizard">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="January 25, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>SAP Business One</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>fullPage/dist/jquery.fullpage.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>bentonsans.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>animate.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
</head>
<body>
	<section id="principal">
	    <div class="section">
	    	<div class="header-home">
				<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
	    	</div>
    		<div class="header">
    			<div class="header-left">
    				<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
    				<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
    			</div>
    			<div class="header-right">
    				<div class="mdl-idioma">
						<select class="selectpicker" id="Idioma"  name="Idioma" onchange="cambiarIdioma()">
							<option value="Español">Espa&ntilde;ol</option>
							<option value="Inglés">Ingl&eacute;s</option>
							<option value="Portugués">Portug&eacute;s</option>
						</select>
    				</div>
					<div class="background3"></div>
					<div class="background2"></div>
					<div class="background1"></div>
    			</div>
    		</div>
    		<div class="background-body">
				<div class="background-body3"></div>
				<div class="background-body2"></div>
				<div class="background-body1"></div>
    		</div>
    		<div class="bottom-right">
				<p>Puede seleccionar m&aacute;s de una opci&oacute;n</p>
    		</div>
	        <div class="slide">
        		<div class="mdl-container">
        			<img class="logo-home" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	            	<h2 class="title-home">Diferentes escenarios. Una soluci&oacute;n</h2>
        		</div>
        		<div class="fondo-bottom">
        			<img src="<?php echo RUTA_IMG?>fondo/fondo.png">
        		</div>
	        </div>
	        <div class="slide text-center">
            	<div class="question">
            		<span class="number">01/05</span>
            		<h2>¿En qu&eacute; industria se desempe&ntilde;a&#63;</h2>
            	</div>
	            <div class="mdl-container mdl-ipad mdl-flex text-center">
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-profesional.png">
	            				<p>Servicios Profesionales</p>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Servicios Profesionales')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... los prestadores de servicios profesionales exitosos aprovechan la tecnolog&iacute;a en nuevas formas para perfeccionar las pr&aacute;cticas de negocio, 
            						mejorar la agilidad y atender mejor a los clientes.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
            				<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-retail.png">
	            				<p>Retail</p>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Retail')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... por cada innovador que sale a crear un nuevo mercado o tipo de producto, hay al menos un centenar de mercados
            						 que se paralizan o se reducen.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-distribucion.png">
	            				<p>Distribuci&oacute;n</p>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Distribución')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... puede mejorar la experiencia general del cliente con la realizaci&oacute;n de pedidos multicanal y su r&aacute;pido
            						 procesamiento.</p>
            						<small>(SAP Performance Benchmarking)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question">
            			<div class="flip-card">
            				<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-producto.png">
	            				<p>Productos de consumo</p>
	            			</div>
            			</div>
            			<div class="content-card">
	            			<button id="buttonCard4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Productos de consumo')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... las empresas exitosas del sector reinventan su forma de operar, aprovechando la tecnolog&iacute;a para perfeccionar las
            						pr&aacute;cticas de negocio, mejorar la agilidad y atender mejor a clientes y distribuidores.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-proceso.png">
	            				<p>Procesos/Manufactura</p>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard5" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Procesos/Manufactura')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... se reduce el 19% en el costo de fabricaci&oacute;n con un monitorio en tiempo real de costo de producci&oacute;n y variantes.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide text-center">
	        	<div class="question">
            		<span class="number">02/05</span>
            		<h2>¿De qu&eacute; tama&ntilde;o es su empresa&#63;</h2>
            	</div>
	            <div class="mdl-container mdl-tablet mdl-flex text-center">
	            	<div class="mdl-card-question">
            			<div class="flip-card">
            				<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-empleados.png">
	            				<p>Número de empleados</p>
	            			</div>
            			</div>
            			<div class="content-card">
            				<div class="select-empleados">
            					<button id="buttonMenos" class="mdl-button mdl-js-button mdl-button--icon select-one" onclick="operar(this.id,1)"><i class="mdi mdi-remove"></i></button>
            					<span id="textOperar">Seleccione</span>
            					<button id="buttonMas" class="mdl-button mdl-js-button mdl-button--icon select-one" onclick="operar(this.id,2)"><i class="mdi mdi-add"></i></button>
            				</div>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... las interacciones con los clientes y consumidores es el punto de partida para el crecimiento de los ingresos de las peque&ntilde;as y medianas
            						 empresas de productos de consumo.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question visi-hidden">
	            		<div class="flip-card">
	            			<div class="card-front card-front-none">
	            				<img src="<?php echo RUTA_IMG?>cards/card-facturacion.png">
	            				<p>Facturaci&oacute;n anual</p>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<div class="row">
	            				<div class="col-xs-12">
	            					<div class="mdl-select">
	            						<select class="selectpicker" id="facturacion" name="facturacion" title="Seleccione" onchange="selectFacturacion(this.id)">
											<option value="< 1 Millón de Dólares">< 1 Millón de Dólares</option>
											<option value="1-3 Millones de Dólares">1-3 Millones de Dólares</option>
											<option value="3-5 Millones de Dólares">3-5 Millones de Dólares</option>
											<option value="5-10 Millones de Dólares">5-10 Millones de Dólares</option>
											<option value="10-20 Millones de Dólares">10-20 Millones de Dólares</option>
											<option value="20-40 Millones de Dólares">20-40 Millones de Dólares</option>
											<option value="No poseo información">No poseo información</option>
										</select>
	            					</div>
		            			</div>
	            			</div>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... el aumento de las ventas por correo electr&oacute;nico, ahora es un poco m&aacute;s del 10% de las ventas totales.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide text-center">
	        	<div class="question">
            		<span class="number">03/05</span>
            		<h2>¿Cu&aacute;l es la prioridad de su negocio&#63;</h2>
            	</div>
	            <div class="mdl-container mdl-ipad mdl-flex text-center">
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-cloud.png">
	            				<p>Cloud</p> 
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Aproveche la nube para concentrarse en crecer, y no en implementar y gestionar su TI.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCloud" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Cloud')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... m&aacute;s del 90% de las empresas ya est&aacute;n utilizando tecnolog&iacute;a en la nube en un entorno p&uacute;blico, privado o h&iacute;brido.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-anywhere.png">
	            				<p>Movilidad</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Ofrezca a los empleados m&oacute;viles acceso al software a trav&eacute;s de una aplicaci&oacute;n m&oacute;vil intuitiva.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonAnywhere" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Movilidad')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... puedes acceder a an&aacute;lisis integrados para la toma de decisiones en tiempo real.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img class="m-b-0" src="<?php echo RUTA_IMG?>cards/card-sap.png">
	            				<p>An&aacute;lisis en tiempo real con SAP HANA</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Con el poder de SAP HANA disminuya en un 70% sus tiempos de an&aacute;lisis.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonSap" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Análisis en tiempo real con SAP HANA')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... Business One aprovecha una tecnolog&iacute;a In-Memory Computing para generar informes y an&aacute;lisis.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img class="m-b-0" src="<?php echo RUTA_IMG?>cards/card-analytics.png">
	            				<p>An&aacute;lisis predictivos con Analytics</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Anticipe resultados con anal&iacute;ticas predictivas y dele el rumbo indicado a su negocio.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonAnalytics" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Análisis predictivos con Analytics')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... obtendr&aacute; la capacidad de explorar, aumentar y analizar de forma instant&aacute;nea todos los datos pr&aacute;cticamente en tiempo real.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-starup.png">
	            				<p>Emprendedores</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Cuente con un aliado, para afrontar los desaf&iacute;os de la era digital hacia la conquista de sus metas.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonStarup" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Emprendedores')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... el 35% de los peque&ntilde;os y medianos minoristas han invertido en tecnolog&iacute;a para hacer crecer los ingresos.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-subsidaries.png">
	            				<p>Agencias o subsidiarias</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Cree informes r&aacute;pidos y precisos sobre env&iacute;os entrantes y salientes, inventario y ubicaciones de productos.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonSubsidaries" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Agencias o subsidiarias')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... tiene una plataforma empresarial flexible que le permitir&aacute; descubrir todo el potencial de su ecosistema.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide text-center">
	        	<div class="question">
            		<span class="number">04/05</span>
            		<h2>¿Que tipo de infraestructura utiliza&#63;</h2>
            	</div>
	            <div class="mdl-container mdl-flex text-center">
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-local.png">
	            				<p>Local</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Implementarlo sobre su actual infraestructura o adquirir una de las opciones de hardware certificada.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card bottom">
	            			<button id="buttonLocal" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-one select-infraestructura" onclick="guardarDatos(this.id,'Local')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... se puede hacer la conexi&oacute;n de estas aplicaciones (comercio electr&oacute;nico, punto de venta, Marketplace, CRM, etc.) con
            						 SAP Business One f&aacute;cilmente cuando es empleas On-Premise.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido4.png">
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-cloud.png">
	            				<p>Cloud</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Correr el software desde la nube junto con su informaci&oacute;n empresarial.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card bottom">
	            			<button id="buttonCloudI" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-one select-infraestructura" onclick="guardarDatos(this.id,'Cloud')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... el 21% est&aacute; cada vez m&aacute;s interesado en alternativas o alojadas a lo que ahora ejecutan On-Premise.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido4.png">
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-hibrida.png">
	            				<p>H&iacute;brida</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Una combinaci&oacute;n de ambas donde la informaci&oacute;n sensible puede permanecer en su IT local.</label>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card bottom">
	            			<button id="buttonHibrida" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-one select-infraestructura" onclick="guardarDatos(this.id,'Híbrida')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... tienen una buena aceptaci&oacute;n en las empresas de cara a un futuro pr&oacute;ximo, ya que se est&aacute;n desarrollando software de
            						 gesti&oacute;n de nubes para poder gestionar la nube privada y a su vez adquirir recursos en los grandes proveedores p&uacute;blicos.</p>
            						<small>(IDC, septiembre 2016)</small>
	            				</div>
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido4.png">
	            				</div>
	            			</div>
	            		</div>
	            	</div>
	        	</div>
				<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide text-center">
        		<div class="question">
            		<span class="number">05/05</span>
            		<div class="question-respuestas">
            			<p>Basados en sus respuestas,</p>
        				<h2>tenemos en mente una soluci&oacute;n ideal para su negocio.</h2>
            		</div>
            	</div>
	            <div class="mdl-container text-center">
	            	<div class="mdl-solicitud">
		            	<div class="mdl-card-confirmacion">
	            			<div class="mdl-respuestas text-left">
	            				<h2 class="title-formulario m-b-10">Sus respuestas fueron:</h2>
	            				<div class="col-xs-12 p-0">
	            					<div class="div-respuestas">
	            						<p id="industria">Productos de consumo</p>
	            						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Editar</button>
	            					</div>
	            				</div>
	            				<div class="col-xs-12 p-0">
	            					<div class="div-respuestas">
	            						<p id="tamanio">100 - 500 empleados</p>
	            						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Editar</button>
	            					</div>
	            				</div>
	            				<div class="col-xs-12 p-0">
	            					<div class="div-respuestas">
	            						<p id="factura">1-3 Millones de D&oacute;lares</p>
	            						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Editar</button>
	            					</div>
	            				</div>
	            				<div class="col-xs-12 p-0">
	            					<div class="div-respuestas">
	            						<p id="prioridad">An&aacute;lisis en tiempo real con SAP HANA</p>
	            						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Editar</button>
	            					</div>
	            				</div>
	            				<div class="col-xs-12 p-0">
	            					<div class="div-respuestas">
	            						<p id="infraestructura">Cloud</p>
	            						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Editar</button>
	            					</div>
	            				</div>
	            				<div class="col-xs-12 p-0 text-right m-t-10">
	            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-confirmar" onclick="ConfirmarRespuestas()">Confirmar respuestas</button>
	            				</div>
		            		</div>
		            		<div class="mdl-back-respuestas">
	        					<div class="mdl-back-contenido">
	        						<span>XX.000</span>
	        						<p>empresas en nuestra regi&oacute;n utilizan SAP Business One</p>
	        					</div>
	        					<div class="mdl-back-contenido second">
	        						<span>40 a 60%</span>
	        						<p>de reducci&oacute;n en las cargas administrativas de su negocio</p>
	        					</div>
	        					<div class="mdl-back-contenido">
	        						<span>X00+</span>
	        						<p>partners especializados en SAP Business One para nuestra regi&oacute;n</p>
	        					</div>
		            		</div>
	            		</div>
	            		<form class="mdl-formulario text-left">
	        				<h2 class="title-formulario m-b-10">Reg&iacute;strese para revisarlo juntos m&aacute;s en detalle:</h2>
	        				<div class="col-sm-6">
	        					<div class="mdl-input">
								    <input type="text" class="form-control" id="nombre_completo" maxlength="50" onkeypress="return soloLetras(event);" onchange="validarCampos()" placeholder="Nombre Completo">
								</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<div class="mdl-input">
							    	<input type="text" class="form-control NEGRO_FONDO" id="cargo" maxlength="50" onkeypress="return soloLetras(event);"  onchange="validarCampos()" placeholder="Cargo">
							  	</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<div class="mdl-input">
									<input type="text" class="form-control" id="empresa" maxlength="50" onkeypress="return soloLetras(event);" onchange="validarCampos()" placeholder="Empresa">
								</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<div class="mdl-input">
									<input type="text" class="form-control" id="telefono" maxlength="7" onkeypress="return valida(event);"  onchange="validarCampos()" placeholder="Teléfono">
								</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<div class="mdl-input">
									<input type="email" class="form-control" id="email" maxlength="50" aria-describedby="emailHelp" placeholder="Email">
								</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<div class="mdl-select mdl-standar">
									<select class="selectpicker" id="relacion" name="relacion" title="Relación con SAP">
										<option value="Cliente">Cliente</option>
										<option value="Cliente potencial">Cliente potencial</option>
										<option value="Consultor">Consultor</option>
										<option value="Empleado SAP">Empleado SAP</option>
										<option value="Estudiante">Estudiante</option>
										<option value="Partner">Partner</option>
										<option value="Partner potencial">Partner potencial</option>
										<option value="Prensa/Analista">Prensa/Analista</option>
									</select>
								</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<div class="mdl-input">
									<input type="text" class="form-control" id="pais" maxlength="100" onkeypress="return soloLetras(event);"  onchange="validarCampos()" placeholder="País">
								</div>
	        				</div>
	        				<div class="col-sm-6">
	        					<p class="text-contacto">Quiero ser contactado por representante de ventas:</p>
	        					<div class="col-xs-4">
	        						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="c-email">
										<input type="radio" id="c-email" class="mdl-radio__button" name="options" value="1">
										<span class="mdl-radio__label">Por Email</span>
									</label>
	        					</div>
	        					<div class="col-xs-4">
	        						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="c-telefono">
										<input type="radio" id="c-telefono" class="mdl-radio__button" name="options" value="2">
										<span class="mdl-radio__label">Por tel&eacute;fono</span>
									</label>
	        					</div>
	        					<div class="col-xs-4">
	        						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="c-ambos">
										<input type="radio" id="c-ambos" class="mdl-radio__button" name="options" value="3">
										<span class="mdl-radio__label">Ambos</span>
									</label>
	        					</div>
	        				</div>
	        				<div class="col-sm-6 mdl-label">
	    						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
									<input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
									<span class="mdl-checkbox__label f-s-14" style="">He leido y acepto los <a class="FONDO_TERMINOS" href="https://www.sap.com/corporate/en/legal/terms-of-use.html" target="_blank" style="">Términos y condiciones de SAP</a></span>
								</label>
	        				</div>
	        				<div class="col-xs-12 text-right m-t-25">
								<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-confirmar" onclick="solicitarEstimacion();">Solicitar estimaci&oacute;n</button>
	        				</div>
	            		</form>
            		</div>
            		<div class="mdl-agradecimiento">
            			<h2>Gracias por su inter&eacute;s</h2>
            			<p>Un representante de SAP se pondr&aacute; en contacto con Usted para ayudarlo a dar el primer paso.</p>
            		</div>
	        	</div>
	        </div>
	    </div>
	</section>
	<!--MODAL-->
	<div class="modal fade" id="ModalQuestion" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm text-center">
            <div class="modal-content">
                <div class="mdl-card" >
                    <div class="mdl-card__title p-0">
						<img alt="" src="">
					</div>
				    <div class="mdl-card__supporting-text">
                        <h2>Sabía que...</h2>
                        <p></p>
                        <small></small>
					</div> 
    				<div class="mdl-card__menu">        				    
                        <button class="mdl-button mdl-js-button mdl-button--icon" data-dismiss="modal"><i class="mdi mdi-close"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>fullPage/vendors/jquery.easings.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>fullPage/vendors/scrolloverflow.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>fullPage/dist/jquery.fullpage.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
    </script>
</body>
</html>