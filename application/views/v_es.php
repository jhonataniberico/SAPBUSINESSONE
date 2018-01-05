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
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>header/logo-smiledu.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>fullPage/dist/jquery.fullpage.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index2.css?v=<?php echo time();?>">
</head>
<body>
	<section id="principal">
	    <div class="section">
	        <div class="slide">
	        	<div class="header-home">
					<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
		    	</div>
        		<div class="container">
        			<img src="<?php echo RUTA_IMG?>logo/logo_header.png">
	            	<h2>Diferentes escenarios. Una soluci&oacute;n</h2>
        		</div>
        		<div class="fondo-bottom">
        			<img src="<?php echo RUTA_IMG?>fondo/fondo.png">
        		</div>
	        </div>
	        <div class="slide">
		    	<div class="header">
	    			<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	    			<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
	    		</div>
	            <div class="container text-center">
	            	<h2 class="question"><span class="number">01/05</span>¿En qu&eacute; industria se desempe&ntilde;a&#63;</h2>
	            	<div class="mdl-card-question flip-card">
            			<div class="card-front">
            				<img src="<?php echo RUTA_IMG?>cards/card-profesional.png">
            				<p>Servicios Profesionales</p>
							<i class="mdi mdi-add"></i>
            			</div>
            			<div class="card-back">
            				<small>Satisfacer las diferentes seg&uacute;n el segmento de servicios. Mejorar el flujo de efectivo e impulsar 
            				el crecimiento de ingresos, reducci&oacute;n de costos y optimizaci&oacute;n de tiempos. Operar en una infraestructura
            				de tecnolog&iacute;a moderna, flexible y potente.</small>
            				<p>Servicios Profesionales</p>
							<i class="mdi mdi-remove"></i>
            			</div>
	            	</div>
	            	<div class="mdl-card-question flip-card">
	            		<div class="card-front">
            				<img src="<?php echo RUTA_IMG?>cards/card-retail.png">
            				<p>Retail</p>
							<i class="mdi mdi-add"></i>
            			</div>
            			<div class="card-back">
            				<small>Ofrezca a sus consumidores productos, informaci&oacute;n y las experiencias de compra que desean desde cualquier canal. Saque partido de la informaci&oacute;n en tiempo real sobre sus clientes y pedidos, interact&uacute;e con sus compradores y optimice todo el proceso, desde la comercializaci&oacute;n hasta la cadena de suministro.</small>
            				<p>Retail</p>
							<i class="mdi mdi-remove"></i>
            			</div>
	            	</div>
	            	<div class="mdl-card-question flip-card">
	            		<div class="card-front">
            				<img src="<?php echo RUTA_IMG?>cards/card-distribucion.png">
            				<p>Distribuci&oacute;n</p>
							<i class="mdi mdi-add"></i>
            			</div>
            			<div class="card-back">
            				<small>Abarca desde fabricantes hasta los minoristas y desde otros clientes hasta los consumidores finales. Mejore todo el proceso,
            				 desde la planificaci&oacute;n de la demanda hasta la gesti&oacute;n del inventario y la cadena de suministro, y ejecute procesos flexibles y altamente integrados
            				 para lograr la excelencia operativa.</small>
            				<p>Distribuci&oacute;n</p>
							<i class="mdi mdi-remove"></i>
            			</div>
	            	</div>
	            	<div class="mdl-card-question flip-card">
	            		<div class="card-front">
            				<img src="<?php echo RUTA_IMG?>cards/card-producto.png">
            				<p>Productos de consumo</p>
							<i class="mdi mdi-add"></i>
            			</div>
            			<div class="card-back">
            				<small>Adapte todos los detalles de sus operaciones a las necesidades del consumidor moderno. Anticipe, planifique y gestione la demanda, al tiempo que ofrece
            				 los productos y bienes de consumo que desean los compradores.</small>
            				<p>Productos de consumo</p>
							<i class="mdi mdi-remove"></i>
            			</div>
	            	</div>
	            	<div class="mdl-card-question flip-card">
	            		<div class="card-front">
            				<img src="<?php echo RUTA_IMG?>cards/card-proceso.png">
            				<p>Procesos/Manufactura</p>
							<i class="mdi mdi-add"></i>
            			</div>
            			<div class="card-back">
            				<small>Satisfaga la demanda de sus clientes y desarrolle nuevas fuentes de ingresos, reduzca los costos de la cadena de suministro, acelere la duraci&oacute;n de
            				 los ciclos, minimice los rechazos y las modificaciones y, por &uacute;ltimo, agilice la obtenci&oacute;n de beneficios.</small>
            				<p>Procesos/Manufactura</p>
							<i class="mdi mdi-remove"></i>
            			</div>
	            	</div>
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide">
	        	<div class="header">
	    			<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	    			<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
	    		</div>
	            <div class="container text-center">
	            	<h2 class="question"><span class="number">02/05</span>¿De qu&eacute; tama&ntilde;o es su empresa&#63;</h2>
	            	<div class="mdl-card">
            			
	            	</div>
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide">
	        	<div class="header">
	    			<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	    			<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
	    		</div>
	            <div class="container text-center">
	            	<h2 class="question"><span class="number">03/05</span>¿Cu&aacute;l es la prioridad de su negocio&#63;</h2>
	            	<div class="mdl-card">
            			
	            	</div>
	        	</div>
	        	<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide">
	        	<div class="header">
	    			<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	    			<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
	    		</div>
	            <div class="container text-center">
	            	<h2 class="question"><span class="number">04/05</span>¿Que tipo de infraestructura utiliza&#63;</h2>
	            	<div class="mdl-card">
            			
	            	</div>
	        	</div>
				<div class="logo-bottom">
        			<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
        		</div>
	        </div>
	        <div class="slide">
	        	<div class="header">
	    			<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	    			<h2>¿Est&aacute; listo para SAP Business One&#63;</h2>
	    		</div>
	            <div class="container">
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
	            					<span class="font-16">Productos de consumo</span>
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
										    <input type="text" class="form-control NEGRO_FONDO" id="nombre_completo" maxlength="50" onkeypress="return soloLetras(event);" placeholder="Nombre Completo">
										</div>
										<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="empresa" maxlength="100" onkeypress="return soloLetras(event);" placeholder="Empresa">
										</div>
										<div class="form-group">
											<input type="email" class="form-control NEGRO_FONDO" id="email" maxlength="100" aria-describedby="emailHelp" placeholder="Email">
										</div>
										<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="pais" maxlength="100" onkeypress="return soloLetras(event);" placeholder="País">
										</div>
			            		  	</div>
			            		  	<div class="col-xs-6 m-t-50">
			            		  		<div class="form-group">
									    	<input type="text" class="form-control NEGRO_FONDO" id="cargo" maxlength="100" onkeypress="return soloLetras(event);" placeholder="Cargo">
									  	</div>
									  	<div class="form-group">
											<input type="text" class="form-control NEGRO_FONDO" id="telefono" maxlength="7" onkeypress="return valida(event);" placeholder="Teléfono">
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
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>fullPage/vendors/jquery.easings.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>fullPage/vendors/scrolloverflow.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>fullPage/dist/jquery.fullpage.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index.js?v=<?php echo time();?>"></script>
</body>
</html>