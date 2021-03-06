<!DOCTYPE html> 
<html>
<head>
	<meta charset="ISO-8859-1">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="Proyecto de desarrollo de un producto wizard online que tenga un quiz y con una unica solucion que es SAP Business One">
    <meta name="keywords"               content="SAP,producto wizard">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="January 25, 2018"/>
    <meta name="language"               content="fi">
    <meta name="theme-color"            content="#000000">
	<title>SAP Business One</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/logo_favicon.png">
	<link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/css/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>animate.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.css?v=<?php echo time();?>">
  	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117633230-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
		gtag('config', 'UA-117633230-1');
	</script>
</head>
<body>
	<section id="principal">
	    <div class="section">
    		<div id="home" class="window-center">
    			<div class="header-home">
					<img src="<?php echo RUTA_IMG?>logo/logo_home.png">
		    	</div>
    			<div class="mdl-container mdl-all-window">
	    			<img class="logo-home" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	            	<h2 class="title-home">Erilaisia skenaarioita. Yksi ratkaisu</h2>
	    		</div>
	    		<div class="background-body">
					<div class="background-body3"></div>
					<div class="background-body2"></div>
					<div class="background-body1"></div>
	    		</div>
	    		<div class="button-next-prev">
	    			<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect button-arrow button-next" onclick="buttonNext()">
						<div class="arrow arrow-right"></div>
					</button>
	    		</div>
	    		<div class="fondo-bottom">
	    			<img src="<?php echo RUTA_IMG?>fondo/fondo.png">
	    		</div>
    		</div>
			<div class="mdl-container-question">
				<div class="header">
	    			<div class="header-left">
	    				<img class="logo-header" src="<?php echo RUTA_IMG?>logo/logo_header.png">
	    				<h2>Oletko valmiina SAP Business One'en ?</h2>
	    			</div>
	    			<div class="header-right none-idioma">
	    				<button class="mdl-button mdl-js-button mdl-button--icon button-home" onclick="returnHome()"><i class="mdi mdi-home"></i></button>
	    				<!-- <h2>Les entreprises leaders</h2> -->
						<div class="background1"></div>
						<div class="background2"></div>
						<div class="background3"></div>
	    			</div>
	    		</div>
	    		<div class="logo-bottom">
        			<img src="http://www.sap-latam.com/sap_business_one/public/img/logo/logo_home.png">
		    		<div class="bottom-right">
						<p>Du kan välja mer än ett alternativ</p>
		    		</div>
        		</div>
        		<div class="chat">
        			<a href="https://z1.liveper.sn/api/account/81933160/route/campaign/194741814/engagement/476282014" target="_blank"><img src="<?php echo RUTA_IMG?>chat.png"><label>Keskustele kanssamme</label></a>
        		</div>
				<div id="window1-page" class="window-center opacity-done">
					<div class="mdl-container text-center">
						<div class="question">
			        		<span class="number">01/05</span>
			        		<h2>Mik&auml; on toimialasi&#63;</h2>
			        	</div>
			        	<div class="mdl-card-question">
			        		<div class="flip-card">
			        			<div class="card-front card-front-none">
			        				<img src="<?php echo RUTA_IMG?>cards/card-profesional.png">
			        				<p>Asiantuntijapalvelut</p>
			        			</div>
			        		</div>
			        		<div class="content-card">
			        			<button id="buttonCard1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Asiantuntijapalvelut')">Valitse</button>
			        			<div class="contenido">
			        				<div class="contenido-left">
			        					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
			        				</div>
			        				<div class="contenido-right">
			    						<h2>Tiesitk&ouml; ett&auml;...</h2>
			    						<p>... menestyv&auml;t asiantuntijapalvelujen tarjoajat hy&ouml;dynt&auml;v&auml;t teknologiaa uudella tavalla liiketoiminnassaan, parantavat joustavuutta ja tarjoavat parempaa asiakaspalvelua.</p>
			    						<small>(IDC, syyskuu 2016)</small>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="mdl-card-question">
			        		<div class="flip-card">
			    				<div class="card-front card-front-none">
			        				<img src="<?php echo RUTA_IMG?>cards/card-retail.png">
			        				<p>V&auml;hitt&auml;ismyynti</p>
			        			</div>
			        		</div>
			        		<div class="content-card">
			        			<button id="buttonCard2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Vähittäismyynti')">Valitse</button>
			        			<div class="contenido">
			        				<div class="contenido-left">
			        					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
			        				</div>
			        				<div class="contenido-right">
			    						<h2>Tiesitk&ouml; ett&auml;...</h2>
			    						<p>...  jokainen joka l&auml;htee luomaan uutta markkinaa tai tuotetta kohtaa ainakin sata vastaavaa jotka eiv&auml;t ole menestyneet tai ovat ep&auml;onnistuneet.</p>
			    						<small>(IDC, syyskuu 2016)</small>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="mdl-card-question">
			        		<div class="flip-card">
			        			<div class="card-front card-front-none">
			        				<img src="<?php echo RUTA_IMG?>cards/card-distribucion.png">
			        				<p>Jakelu</p>
			        			</div>
			        		</div>
			        		<div class="content-card">
			        			<button id="buttonCard3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Jakelu')">Valitse</button>
			        			<div class="contenido">
			        				<div class="contenido-left">
			        					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
			        				</div>
			        				<div class="contenido-right">
			    						<h2>Tiesitk&ouml; ett&auml;...</h2>
			    						<p>... k&auml;ytt&auml;m&auml;ll&auml; monikanavaista ja nopeaa tilaustenk&auml;sittely&auml; voit parantaa asiakaskokemusta.</p>
			    						<small>(SAP Performance Benchmarking))</small>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="mdl-card-question">
			    			<div class="flip-card">
			    				<div class="card-front card-front-none">
			        				<img src="<?php echo RUTA_IMG?>cards/card-producto.png">
			        				<p>Kuluttajatuotteet</p>
			        			</div>
			    			</div>
			    			<div class="content-card">
			        			<button id="buttonCard4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Kuluttajatuotteet')">Valitse</button>
			        			<div class="contenido">
			        				<div class="contenido-left">
			        					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
			        				</div>
			        				<div class="contenido-right">
			    						<h2>Tiesitk&ouml; ett&auml;...</h2>
			    						<p>... menestyv&auml;t yritykset uudistavat toimintatapojaan hy&ouml;dynt&auml;m&auml;ll&auml; teknologiaa, parhaita k&auml;yt&auml;nt&ouml;j&auml;, parantamalla reagointikykyään ja tarjoamalla parempaa palvelua asiakkailleen ja jakelijoilleen.</p>
			    						<small>(IDC, syyskuu 2016)</small>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
			        	<div class="mdl-card-question">
			        		<div class="flip-card">
			        			<div class="card-front card-front-none">
			        				<img class="m-b-0"  src="<?php echo RUTA_IMG?>cards/card-proceso.png">
			        				<p>Prosessi/valmistava teollisuus</p>
			        			</div>
			        		</div>
			        		<div class="content-card">
			        			<button id="buttonCard5" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select select-one" onclick="guardarDatos(this.id,'Prosessi/valmistava teollisuus')">Valitse</button>
			        			<div class="contenido">
			        				<div class="contenido-left">
			        					<img src="<?php echo RUTA_IMG?>cards/card-contenido.png">
			        				</div>
			        				<div class="contenido-right">
			    						<h2>Tiesitk&ouml; ett&auml;...</h2>
			    						<p>... valmistuskuluja voidaan v&auml;hent&auml;&auml; 19 %.:a tosiaikaisella tuotantokustannusten ja muuttujien seurannalla. </p>
			    						<small>(IDC, syyskuu 2016)</small>
			        				</div>
			        			</div>
			        		</div>
			        	</div>
					</div>
				</div>
				<div id="window2-page" class="window-center opacity-done">
					<div class="mdl-container mdl-tablet text-center">
						<div class="question">
		            		<span class="number">02/05</span>
		            		<h2>Yrityksesi koko&#63;</h2>
		            	</div>
		            	<div class="mdl-flex">
	            			<div class="mdl-card-question">
		            			<div class="flip-card">
		            				<div class="card-front card-front-none">
			            				<img src="<?php echo RUTA_IMG?>cards/card-empleados.png">
			            				<p>Ty&ouml;ntekij&ouml;iden m&auml;&auml;r&auml;</p>
			            			</div>
		            			</div>
		            			<div class="content-card">
		            				<div class="select-empleados">
		            					<button id="buttonMenos" class="mdl-button mdl-js-button mdl-button--icon select-one" onclick="operar(this.id,1)"><i class="mdi mdi-remove"></i></button>
		            					<span id="textOperar">Valitse</span>
		            					<button id="buttonMas" class="mdl-button mdl-js-button mdl-button--icon select-one" onclick="operar(this.id,2)"><i class="mdi mdi-add"></i></button>
		            				</div>
			            			<div class="contenido">
			            				<div class="contenido-left">
			            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
			            				</div>
			            				<div class="contenido-right">
		            						<h2>Tiesitk&ouml; ett&auml;...</h2>
		            						<p>... vuorovaikutus asiakkaiden ja kuluttajien kanssa on l&auml;ht&ouml;kohta liikevaihdon kasvattamiselle kasvavissa ja keskisuurissa yrityksiss&auml;.</p>
		            						<small>(IDC, syyskuu 2016)</small>
			            				</div>
			            			</div>
			            		</div>
			            	</div>
			            	<div class="mdl-card-question visi-hidden">
			            		<div class="flip-card">
			            			<div class="card-front card-front-none">
			            				<img src="<?php echo RUTA_IMG?>cards/card-facturacion.png">
			            				<p>Vuosittainen laskutus</p>
			            			</div>
			            		</div>
			            		<div class="content-card">
			            			<div class="row">
			            				<div class="col-xs-12">
			            					<div class="mdl-select">
			            						<select class="selectpicker" id="facturacion" name="facturacion" title="Valitse" onchange="selectFacturacion(this.id)">
													<option value="< Miljoonaa euroa">< Miljoonaa euroa</option>
													<option value="1 - 3 Miljoonaa euroa">1 - 3 Miljoonaa euroa</option>
													<option value="3 -  5 Miljoonaa euroa">3 -  5 Miljoonaa euroa</option>
													<option value="5 - 10 Miljoonaa euroa">5 - 10 Miljoonaa euroa</option>
													<option value="10 - 20 Miljoonaa euroa">10 - 20 Miljoonaa euroa</option>
													<option value="20 - 40 Miljoonaa euroa">20 - 40 Miljoonaa euroa</option>
													<option value="Ei tiedossa">Ei tiedossa</option>
												</select>
			            					</div>
				            			</div>
			            			</div>
			            			<div class="contenido">
			            				<div class="contenido-left">
			            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
			            				</div>
			            				<div class="contenido-right">
		            						<h2>Tiesitk&ouml; ett&auml;...</h2>
		            						<p>... myynti s&auml;hk&ouml;postin v&auml;lityksell&auml; on t&auml;ll&auml; hetkell&auml; enemm&auml;n kuin 10 %:a kokonaismyynnist&auml;.</p>
		            						<small>(IDC, syyskuu 2016)</small>
			            				</div>
			            			</div>
			            		</div>
			            	</div>	
		            	</div>
					</div>
				</div>
				<div id="window3-page" class="window-center opacity-done">
					<div class="mdl-container text-center">
						<div class="question">
		            		<span class="number">03/05</span>
		            		<h2>Liiketoimintasi prioriteetit&#63;</h2>
		            	</div>
		            	<div class="mdl-card-question mdl-card-3">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img src="<?php echo RUTA_IMG?>cards/card-cloud.png">
		            				<p>Pilviratkaisut</p> 
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>K&auml;ytt&auml;m&auml;ll&auml; pilviratkaisuja voit keskitty&auml; liiketoimintasi kasvattamiseen sen sijaan ett&auml; investoit tietoj&auml;rjestelmiesi k&auml;ytt&ouml;&ouml;nottoon ja hallinnointiin.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card">
		            			<button id="buttonCloud" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Pilviratkaisut')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
		            				</div>
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>...  yli 90 %:a yrityksist&auml; k&auml;ytt&auml;&auml; jo nyt pilviteknologiaa joko julkisessa-, yksityisess&auml;- tai yhdistelm&auml;pilviymp&auml;rist&ouml;ss&auml;.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="mdl-card-question mdl-card-3">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img src="<?php echo RUTA_IMG?>cards/card-anywhere.png">
		            				<p>Mobiiliratkaisut</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Mahdollista ty&ouml;ntekij&ouml;ittesi p&auml;&auml;sy ratkaisuun mobiililaitteilta.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card">
		            			<button id="buttonAnywhere" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Mobiiliratkaisut')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
		            				</div>
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... voit hy&ouml;dynt&auml;&auml; tosiaikaista analytiikkaa p&auml;&auml;t&ouml;ksenteossasi.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="mdl-card-question mdl-card-3">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img class="m-b-0" src="<?php echo RUTA_IMG?>cards/card-sap.png">
		            				<p>SAP HANA tosiaikainen analytiikka</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Hy&ouml;dynt&auml;m&auml;ll&auml; SAP HANA:aa voit nopeuttaa analyysej&auml; 70 %:lla</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card">
		            			<button id="buttonSap" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'SAP HANA tosiaikainen analytiikka')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
		            				</div>
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... SAP Business One hy&ouml;dynt&auml;&auml; raportoinnissa ja analytiikassa muistinvaraista tietojenk&auml;sittelyteknologiaa.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="mdl-card-question mdl-card-3">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img class="m-b-0" src="<?php echo RUTA_IMG?>cards/card-analytics.png">
		            				<p>Ennustava analytiikka</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Hy&ouml;dynn&auml; ennustavan analytiikan tuloksia ohjaamalla liiketoimintaasi oikeaan suuntaan.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card">
		            			<button id="buttonAnalytics" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Ennustava analytiikka')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
		            				</div>
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... pystyt v&auml;litt&ouml;m&auml;sti tutkimaan ja analysoimaan kaikkia tietojasi.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="mdl-card-question mdl-card-3">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img src="<?php echo RUTA_IMG?>cards/card-starup.png">
		            				<p>Yritt&auml;j&auml;t</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Kohtaa digitaalisen liiketoiminnan haasteet, voita ne ja saavuta tavoitteesi.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card">
		            			<button id="buttonStarup" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Yrittäjät')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
		            				</div>
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... 35 % v&auml;hitt&auml;ismyyjist&auml; ovat investoineet liikevaihtoa kasvattavaan teknologiaan.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
		            	<div class="mdl-card-question mdl-card-3">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img src="<?php echo RUTA_IMG?>cards/card-subsidaries.png">
		            				<p>Toimipisteet ja tyt&auml;ryhti&ouml;t</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Luo nopeasti t&auml;sm&auml;llisi&auml; raportteja saapuvista ja l&auml;htevist&auml; toimituksista, varastotilanteista ja tuotteiden sijainneista.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card">
		            			<button id="buttonSubsidaries" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-prioridad" onclick="guardarDatos(this.id,'Toimipisteet ja tytäryhtiöt')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido3.png">
		            				</div>
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... joustava liiketoiminta-alusta auttaa sinua selvitt&auml;m&auml;&auml;n potentiaalin ekosysteemiss&auml;si.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            			</div>
		            		</div>
		            	</div>
					</div>
				</div>
				<div id="window4-page" class="window-center opacity-done">
					<div class="mdl-container text-center">
						<div class="question">
		            		<span class="number">04/05</span>
		            		<h2 class="unique">Millaista infrastuktuuria etsit&#63;</h2>
		            	</div>
		            	<div class="mdl-card-question">
		            		<div class="flip-card">
		            			<div class="card-front">
		            				<img src="<?php echo RUTA_IMG?>cards/card-local.png">
		            				<p>Paikallinen</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Ota ratkaisu käyttöön nykyisessä infratruktuurissasi tai valitse yksi sertifioiduista vaihtoehdoistamme.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card bottom">
		            			<button id="buttonLocal" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-one select-infraestructura" onclick="guardarDatos(this.id,'Paikallinen')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... sovellukset kuten s&auml;hk&ouml;inen kaupank&auml;ynti, kassap&auml;&auml;tteet, markkinapaikat, asiakkuudenhallinta tms. ovat helposti liitettävissä paikallisesti asennettuun SAP Business One -ratkaisuun.</p>
	            						<small>(IDC, syyskuu 2016)</small>
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
		            				<p>Pilviratkaisu</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>K&auml;yt&auml; liiketoimintasi tiedot sis&auml;lt&auml;v&auml;&auml; ratkaisua pilvest&auml;.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card bottom">
		            			<button id="buttonCloudI" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-one select-infraestructura" onclick="guardarDatos(this.id,'Pilviratkaisu')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... 21 % yrityksist&auml; on enemm&auml;n ja enemm&auml;n kiinnostuneita vaihtoehdoista paikallisesti asennetulle ratkaisulle.</p>
	            						<small>(IDC, syyskuu 2016)</small>
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
		            				<p>Yhdistelm&auml;</p>
									<i class="mdi mdi-add"></i>
		            			</div>
		            			<div class="card-back">
		            				<label>Yhdistä molemmat infrastuktuurivaihtoehdot jotta luottamuksellinen tieto pysyy oman IT:n hallinnassa.</label>
									<i class="mdi mdi-remove"></i>
		            			</div>
		            		</div>
		            		<div class="content-card bottom">
		            			<button id="buttonHibrida" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect select-one select-infraestructura" onclick="guardarDatos(this.id,'Yhdistelmä')">Valitse</button>
		            			<div class="contenido">
		            				<div class="contenido-right">
	            						<h2>Tiesitk&ouml; ett&auml;...</h2>
	            						<p>... l&auml;hitulevaisuudessa yleistyy malli jossa osaa ratkaisusta k&auml;ytet&auml;&auml;n yksityisess&auml; pilvess&auml; ja samalla osa toiminnallisuudesta hankitaan palveluna julkisesta pilvest&auml;.</p>
	            						<small>(IDC, syyskuu 2016)</small>
		            				</div>
		            				<div class="contenido-left">
		            					<img src="<?php echo RUTA_IMG?>cards/card-contenido4.png">
		            				</div>
		            			</div>
		            		</div>
		            	</div>
					</div>
				</div>
				<div id="window5-page" class="window-center opacity-done">
					<div class="mdl-container text-center">
						<div class="question">
		            		<span class="number">05/05</span>
		            		<div class="question-respuestas">
		            			<p><span>Perustuen vastauksiisi</span> meillä on tarjota sinulle sopiva ratkaisu.</p>
		            		</div>
		            	</div>
		            	<div class="mdl-solicitud">
			            	<div class="mdl-card-confirmacion">
		            			<div class="mdl-respuestas text-left">
		            				<h2 class="title-formulario m-b-10">Vastasit:</h2>
		            				<div class="contenedor-respuestas">
	            						<div class="col-xs-12 p-0">
			            					<div class="div-respuestas">
			            						<ul>
			            							<li id="industria">Retail</li>
			            						</ul>
			            						<button id="window1" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="EditQuestion(this.id, 1)">Muokkaa</button>
			            					</div>
			            				</div>
			            				<div class="col-xs-12 p-0">
			            					<div class="div-respuestas">
			            						<ul>
			            							<li id="tamanio">1 - 50</li>
			            						</ul>
			            						<button id="window2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="EditQuestion(this.id, 2)">Muokkaa</button>
			            					</div>
			            				</div>
			            				<div class="col-xs-12 p-0">
			            					<div class="div-respuestas">
			            						<ul>
			            							<li id="factura">1-3 Millones de D&oacute;lares</li>
			            						</ul>
			            						<button id="window2" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="EditQuestion(this.id, 2)">Muokkaa</button>
			            					</div>
			            				</div>
			            				<div class="col-xs-12 p-0">
			            					<div class="div-respuestas">
			            						<ul id="prioridad">
			            						</ul>
			            						<button id="window3" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="EditQuestion(this.id, 3)">Muokkaa</button>
			            					</div>
			            				</div>
			            				<div class="col-xs-12 p-0">
			            					<div class="div-respuestas">
			            						<ul>
			            							<li id="infraestructura">Local</li>
			            						</ul>
			            						<button id="window4" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="EditQuestion(this.id, 4)">Muokkaa</button>
			            					</div>
			            				</div>
		            				</div>
		            				<div class="col-xs-12 p-0 text-right m-t-10">
		            					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-confirmar" onclick="ConfirmarRespuestas()">Vahvista</button>
		            				</div>
			            		</div>
			            		<div class="mdl-back-respuestas">
		        					<div class="mdl-back-contenido">
		        						<span>10,511</span>
		        						<p>yrityst&auml; alueellamme k&auml;ytt&auml;&auml; SAP Business One'a.</p>
		        						<small>(Samuli Ajo, Global Customer Accounting)</small>
		        					</div>
		        					<div class="mdl-back-contenido second">
		        						<span>40 a 60%</span>
		        						<p>v&auml;hemm&auml;n liiketoimintasi hallintaan.</p>
		        					</div>
		        					<div class="mdl-back-contenido">
		        						<span>103</span>
		        						<p>Alueellamme on SAP Business One'en erikoistunutta kumppania.</p>
		        						<small>(Vinicius Ricarte, Channel Sales Development)</small>
		        					</div>
			            		</div>
		            		</div>
		            		<form class="mdl-formulario disabled text-left">
		            			<div class="content-datos">
		            				<div class="content-personal">
		            					<p><i class="mdi mdi-arrow_downward"></i>Anna yhteystietosi</p>
		            				</div>
		            				<div class="content-separacion">
		            					<p>tai</p>
		            				</div>
		            				<div class="content-linkedin">
		            					<a class="button-linkedin" href="<?php  echo "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$csrf_token}&scope={$scopes}"; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i>LinkedIn-yhteystietosi</a>
		            				</div>
		            			</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-input">
									    <input type="text" class="form-control" id="nombre_completo" maxlength="50" onkeypress="return soloLetras(event);" onchange="validarCampos()" placeholder="Koko nimi">
									</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-input">
								    	<input type="text" class="form-control NEGRO_FONDO" id="cargo" maxlength="50" onkeypress="return soloLetras(event);"  onchange="validarCampos()" placeholder="Ammattinimike">
								  	</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-input">
										<input type="text" class="form-control" id="empresa" maxlength="50" onkeypress="return soloLetras(event);" onchange="validarCampos()" placeholder="Yritys">
									</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-input">
										<input type="text" class="form-control" id="telefono" onchange="validarCampos()" placeholder="Puhelin">
									</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-input">
										<input type="email" class="form-control" id="email" maxlength="50" aria-describedby="emailHelp" placeholder="S&auml;hk&ouml;posti">
									</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-select mdl-standar">
										<select class="selectpicker" id="relacion" name="relacion" title="Suhteesi SAP:iin">
											<option value="Customer">Asiakas</option>
											<option value="Potential customer">Mahdollinen asiakas</option>
											<option value="Consultant">konsultti</option>
											<option value="SAP employee">SAPin ty&ouml;ntekij&auml;</option>
											<option value="Student">Opiskelija</option>
											<option value="Partner">kumppan</option>
											<option value="Potential Partner">Mahdollinen kumppani</option>
											<option value="Press/Analyst">Lehdist&ouml;n edustaja/Analyytikko</option>
										</select>
									</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<div class="mdl-input">
										<input type="text" class="form-control" id="pais" maxlength="100" onkeypress="return soloLetras(event);"  onchange="validarCampos()" placeholder="Maa">
									</div>
		        				</div>
		        				<div class="col-sm-6">
		        					<p class="text-contacto">Haluan yhteydenottoa</p>
		        					<div class="mdl-input-label">
		        						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="c-email">
											<input type="radio" id="c-email" class="mdl-radio__button" name="options" value="1">
											<span class="mdl-radio__label">S&auml;hk&ouml;postitse</span>
										</label>
		        					</div>
		        					<div class="mdl-input-label">
		        						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="c-telefono">
											<input type="radio" id="c-telefono" class="mdl-radio__button" name="options" value="2">
											<span class="mdl-radio__label">Puhelimitse</span>
										</label>
		        					</div>
		        					<div class="mdl-input-label">
		        						<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="c-ambos">
											<input type="radio" id="c-ambos" class="mdl-radio__button" name="options" value="3">
											<span class="mdl-radio__label">Molemmilla tavoilla</span>
										</label>
		        					</div>
		        				</div>
		        				<div class="col-xs-12 mdl-label m-t-10">
		    						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="checkbox-1">
										<input type="checkbox" id="checkbox-1" class="mdl-checkbox__input">
										<span class="mdl-checkbox__label f-s-14" style="">Olen lukenut ja hyv&auml;ksyn <a class="FONDO_TERMINOS" href="http://www.sap-latam.com/sap_business_one/public/pdf/SAP_Marketing_Configurator_Portals_Privacy_Policy.pdf" target="_blank">SAPin ehdot ja s&auml;&auml;nn&ouml;t</a></span>
									</label>
		        				</div>
		        				<div class="col-xs-12 text-right m-t-25">
									<button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button-confirmar" onclick="solicitarEstimacion();">L&auml;het&auml; tiedot</button>
		        				</div>
		            		</form>
	            		</div>
	            	</div>
            		<div class="mdl-agradecimiento">
            			<h2>Haluan yhteydenottoa</h2>
            			<p>SAPin edustaja ottaa sinuun yhteyttä sopiaksemme jatkosta.</p>
            		</div>
				</div>
				<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect button-arrow button-prev" onclick="buttonQuestion(1)">
					<div class="arrow arrow-left"></div>
				</button>
    			<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect button-arrow button-next" onclick="buttonQuestion(2)">
					<div class="arrow arrow-right"></div>
				</button>
			</div>
	    </div>
	</section>
	
	<!--MODAL-->
	<div class="modal fade" id="ModalQuestion" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-sm text-center">
            <div class="modal-content">
                <div class="mdl-card" >
                    <div class="mdl-card__title p-0">
						<img alt="" src="">
					</div>
				    <div class="mdl-card__supporting-text">
                        <h2>Tiesitk&ouml; ett&auml;...</h2>
                        <p></p>
                        <small></small>
					</div> 
    				<div class="mdl-card__menu">        				    
                        <button class="mdl-button mdl-js-button mdl-button--icon" onclick="closeModal()"><i class="mdi mdi-close"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalPoliticas" tabindex="-1" role="dialog" aria-labelledby="simpleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="mdl-card" >
                    <div class="mdl-card__title">
						<h2>SAP Marketing Consent Statement</h2>
					</div>
				    <div class="mdl-card__supporting-text p-t-0">
                    	<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect js-label" for="checkbox-3">
							<input type="checkbox" id="checkbox-3" class="mdl-checkbox__input">
							<span class="mdl-checkbox__label f-s-14">Would you like to receive additional information on SAP products and services along with information related to this inquiry? By checking this box, you agree that your contact details will be used by SAP Marketing in accordance with the <a href="https://www.sap.com/dam/site/corporate/legal/consent-resource-center.pdf" target="_blank">SAP Marketing Consent Statement</a>.</span>
						</label>
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect js-label" for="checkbox-2">
							<input type="checkbox" id="checkbox-2" class="mdl-checkbox__input">
							<span class="mdl-checkbox__label f-s-14">I agree that <span>SAP may share the information</span> I have provided hereunder with the <span>SAP group</span> in order that that they also may send additional marketing-related communications to me.</span>
						</label>
					</div>
					<div class="mdl-card__actions">
						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="acceptPoliticas()">Aceptar</button>
						<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect" onclick="closePoliticas()">Cerrar</button>
					</div>
                </div>
            </div>
        </div>
    </div>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jquery-ui.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>jquery-migrate-1.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/js/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>index_fi.js?v=<?php echo time();?>"></script>
    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }
        $(window).load(function() {
        	  if(<?php echo $pantalla1 ?> == 5) {
				m = 5; 
				if(<?php echo $confirmar ?> == 1) {
					$('.button-arrow.button-prev').css("display","none");
					$('.mdl-card-confirmacion').addClass('confirmar');
					$('.mdl-formulario').removeClass('disabled');
					confirmar = 1;
				}
	        	var fifthWindow   = $('#window5-page');
	        	var homePage      = $('#home');
			    $('.opacity-done').removeClass('animated fadeInRight fadeOutLeft fadeInLeft fadeOutRight');
			    homePage.css("display","none");
				fifthWindow.addClass('animated fadeInLeft');
				if(<?php echo $confirmar ?> == 0) {
					$('.button-arrow.button-prev').css("display","block");
				}
				$('.header').addClass('opacity');
				$('.logo-bottom').addClass('opacity');
				$('#telefono').css('border-color','red');
				$('#nombre_completo').val("<?php echo $nombre_comple ?>");
				$('#email').val("<?php echo $email_link ?>");
				$('#pais').val("<?php echo $pais_link ?>");
				if("<?php echo $tit ?>" == '') {
					$('#cargo').css('border-color','red');
				}
				if("<?php echo $comp ?>" == '') {
					$('#empresa').css('border-color','red');
				}
				$('#cargo').val("<?php echo $tit ?>");
				$('#empresa').val("<?php echo $comp ?>");
				$('#industria').text("<?php echo $industria ?>");
				$('#tamanio').text("<?php echo $Tamanio ?>");//falta agregar empleados
				$('#factura').text("<?php echo $Factura_anual ?>");
				$('#prioridad').append("<?php echo $priori ?>");
				$('#infraestructura').text("<?php echo $Infraestructura ?>");
			}
		});
    </script>
</body>
</html>