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
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index2.css?v=<?php echo time();?>">
</head>
<body>
	<section id="principal">
	    <div class="section">
    		<div class="header">
    			<div class="header-left">
    				<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
    				<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
    			</div>
    			<div class="header-right">
					<select class="selectpicker">
						<option>Espa&ntilde;ol</option>
						<option>Ingl&eacute;s</option>
						<option>Portug&eacute;s</option>
					</select>
					<div class="background3"></div>
					<div class="background2"></div>
					<div class="background1"></div>
    			</div>
    		</div>
	        <div class="slide">
	        	<!-- <div class="header-home">
					<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
		    	</div> -->
        		<div class="container">
        			<img src="<?php echo RUTA_IMG?>logo/logo_header.png">
	            	<h2>Diferentes escenarios. Una soluci&oacute;n</h2>
        		</div>
        		<div class="fondo-bottom">
        			<img src="<?php echo RUTA_IMG?>fondo/fondo.png">
        		</div>
	        </div>
	        <div class="slide">
	            <div class="mdl-container text-center">
	            	<h2 class="question"><span class="number">01/05</span>¿En qu&eacute; industria se desempe&ntilde;a&#63;</h2>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-profesional.png">
	            				<p>Servicios Profesionales</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Satisfacer las diferentes seg&uacute;n el segmento de servicios. Mejorar el flujo de efectivo e impulsar 
	            				el crecimiento de ingresos, reducci&oacute;n de costos y optimizaci&oacute;n de tiempos. Operar en una infraestructura
	            				de tecnolog&iacute;a moderna, flexible y potente.</label>
	            				<p>Servicios Profesionales</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select" onclick="guardarDatos(this.id,'Servicios Profesionales')">Seleccione</button>
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
            				<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-retail.png">
	            				<p>Retail</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Ofrezca a sus consumidores productos, informaci&oacute;n y las experiencias de compra que desean desde cualquier canal. Saque partido de la informaci&oacute;n en tiempo real sobre sus clientes y pedidos, interact&uacute;e con sus compradores y optimice todo el proceso, desde la comercializaci&oacute;n hasta la cadena de suministro.</label>
	            				<p>Retail</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select" onclick="guardarDatos(this.id,'Retail')">Seleccione</button>
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
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-distribucion.png">
	            				<p>Distribuci&oacute;n</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Abarca desde fabricantes hasta los minoristas y desde otros clientes hasta los consumidores finales. Mejore todo el proceso,
	            				 desde la planificaci&oacute;n de la demanda hasta la gesti&oacute;n del inventario y la cadena de suministro, y ejecute procesos flexibles y altamente integrados
	            				 para lograr la excelencia operativa.</label>
	            				<p>Distribuci&oacute;n</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select" onclick="guardarDatos(this.id,'Distribución')">Seleccione</button>
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
            				<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-producto.png">
	            				<p>Productos de consumo</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Adapte todos los detalles de sus operaciones a las necesidades del consumidor moderno. Anticipe, planifique y gestione la demanda, al tiempo que ofrece
	            				 los productos y bienes de consumo que desean los compradores.</label>
	            				<p>Productos de consumo</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
            			</div>
            			<div class="content-card">
	            			<button id="buttonCard4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select" onclick="guardarDatos(this.id,'Productos de consumo')">Seleccione</button>
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
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-proceso.png">
	            				<p>Procesos/Manufactura</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Satisfaga la demanda de sus clientes y desarrolle nuevas fuentes de ingresos, reduzca los costos de la cadena de suministro, acelere la duraci&oacute;n de
	            				 los ciclos, minimice los rechazos y las modificaciones y, por &uacute;ltimo, agilice la obtenci&oacute;n de beneficios.</label>
	            				<p>Procesos/Manufactura</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCard5" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select" onclick="guardarDatos(this.id,'Procesos/Manufactura')">Seleccione</button>
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
	        <div class="slide">
	            <div class="mdl-container text-center">
	            	<h2 class="question"><span class="number">02/05</span>¿De qu&eacute; tama&ntilde;o es su empresa&#63;</h2>
	            	<div class="mdl-card-question">
            			<div class="flip-card">
            				<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-producto.png">
	            				<p>Número de empleados</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Adapte todos los detalles de sus operaciones a las necesidades del consumidor moderno. Anticipe, planifique y gestione la demanda, al tiempo que ofrece
	            				 los productos y bienes de consumo que desean los compradores.</label>
	            				<p>Productos de consumo</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
            			</div>
            			<div class="content-card">
	            			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select" onclick="guardarDatos('Retail')"><i class="mdi mdi-remove"></i> Seleccione <i class="mdi mdi-add"></i></button>
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
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide">
	            <div class="mdl-container text-center">
	            	<h2 class="question"><span class="number">03/05</span>¿Cu&aacute;l es la prioridad de su negocio&#63;</h2>
	            	<div class="mdl-card-question mdl-card-3">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-cloud.png">
	            				<p>Cloud</p> 
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Cloud hace que sea posible para los usuarios acceder a datos, aplicaciones y servicios en internet. La nube elimina la necesidad de hardware
	            				 costoso como discos duros y servidores y les permite a los usuarios trabajar desde cualquier lugar.</label>
	            				<p>Cloud</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCloud" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-prioridad" onclick="guardarDatos(this.id,'Cloud')">Seleccione</button>
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
	            				<p>Anywhere</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Gestione su empresa donde est&eacute; y aporte movilidad a su equipo de ventas, gracias a las aplicaciones m&oacute;viles de SAP Business One 
	            				 estar&aacute; disponible desde cualquier lugar y dispositivo m&oacute;vil.</label>
	            				<p>Anywhere</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonAnywhere" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-prioridad" onclick="guardarDatos(this.id,'Anywhere')">Seleccione</button>
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
	            				<img src="<?php echo RUTA_IMG?>cards/card-sap.png">
	            				<p>with SAP HANA</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Obtendr&aacute; acceso en tiempo real a informes y cuadros de mando predefinidos, as&iacute; como a herramientas de productividad para dar
	            				 soporte a la toma de decisiones.</label>
	            				<p>with SAP HANA</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonSap" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-prioridad" onclick="guardarDatos(this.id,'with SAP HANA')">Seleccione</button>
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
	            				<img src="<?php echo RUTA_IMG?>cards/card-analytics.png">
	            				<p>with Analytics</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Permitir&aacute; poder tomar mejores decisiones de una forma r&aacute;pida accediendo inmediatamente a informaci&oacute;n relevante a trav&eacute;s
	            				 de los modelos de an&aacute;lisis que dise&ntilde;an y poseen, eliminando as&iacute; la necesidad de depender de su equipo de TI permiti&eacute;ndole
	            				 utilizar la TI en iniciativas que a&ntilde;adan valor a su empresa.</label>
	            				<p>with Analytics</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonAnalytics" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-prioridad" onclick="guardarDatos(this.id,'with Analytics')">Seleccione</button>
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
	            				<p>Star-up</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Lo ayudar&aacute;n a gestionar cada aspecto de su empresa desde las finanzas y CRM hasta la cadena de suministro y compras. Automatice los
	            				 procesos clave y libere m&aacute;s tiempo para centrarse en el crecimiento.</label>
	            				<p>Star-up</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonStarup" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-prioridad" onclick="guardarDatos(this.id,'Star-up')">Seleccione</button>
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
	            				<p>Subsidaries</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Dise&ntilde;ada espec&iacute;ficamente para las subsidiarias, permiti&eacute;ndole gestionar de forma unificada todas las &aacute;reas de su empresa
	            				 para obtener una visi&oacute;n global de la misma.</label>
	            				<p>Subsidaries</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonSubsidaries" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-prioridad" onclick="guardarDatos(this.id,'Subsidaries')">Seleccione</button>
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
	        <div class="slide">
	            <div class="mdl-container text-center">
	            	<h2 class="question"><span class="number">04/05</span>¿Que tipo de infraestructura utiliza&#63;</h2>
	            	<div class="mdl-card-question">
	            		<div class="flip-card">
	            			<div class="card-front">
	            				<img src="<?php echo RUTA_IMG?>cards/card-local.png">
	            				<p>Local</p>
								<i class="mdi mdi-add"></i>
	            			</div>
	            			<div class="card-back">
	            				<label>Ideal para las compa&tilde;&iacute;as que necesitan alta protecc&oacute;n de datos y ediciones a nivel de servicio. Son propietarios
	            				 del servidor, red, disco y pueden decidir qu&eacute; usuarios est&aacute;n autorizados a utilizar la infraestructura.</label>
	            				<p>Local</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonLocal" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-infraestructura" onclick="guardarDatos(this.id,'Servicios Profesionales')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... se puede hacer la conexi&oacute;n de estas aplicaciones (comercio electr&oacute;nico, punto de venta, Marketplace, CRM, etc.) con
            						 SAP Business One f&aacute;cilmente cuando es empleas On-Premise.</p>
            						<small>(IDC, septiembre 2016)</small>
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
	            				<label>Los servicios que ofrecen se encuentran en servidores externos al usuario, teniendo la capacidad de procesamiento y almacenamiento
	            				 sin instalar m&aacute;quinas localmente, por lo que no tiene una inversi&oacute;n inicial o gasto de mantenimiento en este sentido, si
	            				 no que se paga por el uso.</label>
	            				<p>Cloud</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonCloudI" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-infraestructura" onclick="guardarDatos(this.id,'Servicios Profesionales')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... el 21% est&aacute; cada vez m&aacute;s interesado en alternativas o alojadas a lo que ahora ejecutan On-Premise.</p>
            						<small>(IDC, septiembre 2016)</small>
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
	            				<label>Incluye soluciones tanto en la nube como On-Premise. Las nubes h&iacute;bridas ofrecen variedad, por lo que puede tomar y elegir qu&eacute;
	            				 aspectos de su negocio est&aacute;n mejor en una nube p&uacute;blica o privada versus On-Premise.</label>
	            				<p>H&iacute;brida</p>
								<i class="mdi mdi-remove"></i>
	            			</div>
	            		</div>
	            		<div class="content-card">
	            			<button id="buttonHibrida" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-infraestructura" onclick="guardarDatos(this.id,'Servicios Profesionales')">Seleccione</button>
	            			<div class="contenido">
	            				<div class="contenido-left">
	            					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
	            				</div>
	            				<div class="contenido-right">
            						<h2>Sab&iacute;a que...</h2>
            						<p>... tienen una buena aceptaci&oacute;n en las empresas de cara a un futuro pr&oacute;ximo, ya que se est&aacute;n desarrollando software de
            						 gesti&oacute;n de nubes para poder gestionar la nube privada y a su vez adquirir recursos en los grandes proveedores p&uacute;blicos.</p>
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
	        <div class="slide">
	            <div class="mdl-container text-center">
	            	<div class="col-xs-12">
	            		<div class="col-xs-3 ALIGN_RIGHT m-t-65">
	            			<span class="PAGE">05/05</span>
	            		</div>
	            		<div class="col-xs-9">
	            			<h2 class="LETRA_39"><span class="ORANGE_COLOR">Gracias por sus respuestas.</span> Estamos seguros
								que SAP Business One es lo que necesita.</h2>
	            		</div>
	            	</div>
	            	<div class="col-xs-12">
	            		<div class="col-xs-4 CONT_FORM">
	            			<h5>SUS PERFILES:</h5>
	            			<div class="col-xs-12 BLANCO_FONDO m-t-15">
	            				<div class="col-xs-8 NEGRO_COLOR m-t-15">
	            					<span class="font-16"><?php echo $industria ?></span>
	            				</div>
	            				<div class="col-xs-3">
	            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored BOTON_EDITAR">
									  Editar
									</button>
	            				</div>
	            			</div>

	            			<div class="col-xs-12 BLANCO_FONDO m-t-15">
	            				<div class="col-xs-8 NEGRO_COLOR m-t-15">
	            					<span class="font-16">50 - 100 empleados</span>
	            				</div>
	            				<div class="col-xs-4">
	            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored BOTON_EDITAR">
									  Editar
									</button>
	            				</div>
	            			</div>

	            			<div class="col-xs-12 BLANCO_FONDO m-t-15">
	            				<div class="col-xs-8 NEGRO_COLOR m-t-15">
	            					<span class="font-16">$1M - $2M</span>
	            				</div>
	            				<div class="col-xs-4">
	            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored BOTON_EDITAR">
									  Editar
									</button>
	            				</div>
	            			</div>

	            			<div class="col-xs-12 BLANCO_FONDO m-t-15">
	            				<div class="col-xs-8 NEGRO_COLOR m-t-15">
	            					<span class="font-16">With SAP HANA</span>
	            				</div>
	            				<div class="col-xs-4">
	            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored BOTON_EDITAR">
									  Editar
									</button>
	            				</div>
	            			</div>

	            			<div class="col-xs-12 BLANCO_FONDO m-t-15">
	            				<div class="col-xs-8 NEGRO_COLOR m-t-15">
	            					<span class="font-16">Cloud</span>
	            				</div>
	            				<div class="col-xs-4">
	            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored BOTON_EDITAR">
									  Editar
									</button>
	            				</div>
	            			</div>
			            </div>
			            <div class="col-xs-8 CONT_FORM">
			            	<div class="col-xs-12">
			            		<h5>PERMITA QUE NUESTROS EXPERTOS LO CONTACTEN</h5>
			            		<div class="col-xs-12">
			            			<div class="col-xs-8">
			            				<h5>Introduzca aquí sus datos o conéctate vía</h5>
			            			</div>
			            			<div class="col-xs-4 FONDO_CONTACTESE">
			            				<div class="col-xs-2"><i class="fa fa-linkedin fa-lg FONDO_CONTACTESE" aria-hidden="true"></i></div>
			            				<div class="col-xs-10">
			            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored BOTON_CONECTESE">
												  Conéctese ahora
											</button>
			            				</div>
			            			</div>
			            		</div>
			            		<form>
			            		  <div class="col-xs-12">
			            		  	<div class="col-xs-6">
			            		  		<div class="form-group">
										    <input type="text" class="form-control NEGRO_FONDO" id="nombre_completo" maxlength="50" onkeypress="return soloLetras(event);" onchange="borrarFocus(1)" placeholder="Nombre Completo">
										</div>
										<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="empresa" maxlength="100" onkeypress="return soloLetras(event);" onchange="borrarFocus(2)" placeholder="Empresa">
										</div>
										<div class="form-group">
											<input type="email" class="form-control NEGRO_FONDO" id="email" maxlength="100" aria-describedby="emailHelp"  onchange="borrarFocus(3)" placeholder="Email">
										</div>
										<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="pais" maxlength="100" onkeypress="return soloLetras(event);"  onchange="borrarFocus(4)" placeholder="País">
										</div>
			            		  	</div>
			            		  	<div class="col-xs-6 m-t-50">
			            		  		<div class="form-group">
									    	<input type="text" class="form-control NEGRO_FONDO" id="cargo" maxlength="100" onkeypress="return soloLetras(event);"  onchange="borrarFocus(5)" placeholder="Cargo">
									  	</div>
									  	<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="telefono" maxlength="7" onkeypress="return valida(event);"  onchange="borrarFocus(6)" placeholder="Teléfono">
										</div>
										<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="notas" maxlength="500" placeholder="Notes">
										</div>
			            		  	</div>
			            		  	<div class="col-xs-12">
			            		  		<div class="col-xs-8">
			            		  			<div class="form-check">
			            		  				<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
												  <input type="checkbox" id="checkbox-1" class="mdl-checkbox__input" checked>
												  <span class="mdl-checkbox__label f-s-14" style="">He leido y acepto los <a class="FONDO_TERMINOS" href="https://www.sap.com/corporate/en/legal/terms-of-use.html" target="_blank" style="">Términos y condiciones de SAP</a></span>
												</label>
											</div>
			            		  		</div>
			            		  		<div class="col-xs-4">
			            		  			<button type="button" class="btn btn-primary BOTON_ESTIMACION" onclick="solicitarEstimacion()">Solicitar estimación</button>
			            		  		</div>
			            		  	</div>
			            		  </div>
								</form>
			            	</div>
			            </div>
	            	</div>
	        	</div>
	        </div>
	    </div>
	</section>
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
    </script>
</body>
</html>