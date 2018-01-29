<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible"  content="IE=edge">
    <meta name="viewport"               content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="description"            content="HPE Latin America Hybrid IT Bootcamp - January 30th to February 1st, 2018">
    <meta name="keywords"               content="HPE Latin America Hybrid IT Bootcamp">
    <meta name="robots"                 content="Index,Follow">
    <meta name="date"                   content="January 25, 2018"/>
    <meta name="language"               content="es">
    <meta name="theme-color"            content="#000000">
	<title>HPE Latin America Hybrid IT Bootcamp</title>
    <link rel="shortcut icon" href="<?php echo RUTA_IMG?>logo/favicon.png">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>toaster/toastr.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap-select/css/bootstrap-select.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_PLUGINS?>mdl/material.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>font-awesome.min.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>material-icons.css?v=<?php echo time();?>">
    <link rel="stylesheet"    href="<?php echo RUTA_FONTS?>roboto.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>m-p.min.css?v=<?php echo time();?>">
	<link rel="stylesheet"    href="<?php echo RUTA_CSS?>index.min.css?v=<?php echo time();?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

</head>
<body>
    <section id="principal">
        <div class="col-xs-12 col-border-filtros-resultado-reporte">
            <div class="table-responsive">
                <table id="tabla-solicitudes" class="table table-bordered">
                  <thead>
                    <tr class="tr-header-reporte">
                      <th class="text-center">Nombres</th>
                      <th class="text-center">Empresa</th>
                      <th class="text-center">Correo electr&oacute;nico</th>
                      <th class="text-center">Tel&eacute;fono</th>
                      <th class="text-center">Industria</th>
                      <th class="text-center">Cantidad de empleados</th>
                      <th class="text-center">Facturaci&oacute;n</th>
                      <th class="text-center">Prioridad</th>
                      <th class="text-center">Infraestructura</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php echo $html ?>
                  </tbody>
                </table>
              </div>
            <div class="col-xs-12 buttons-export">
            </div>
        </div>
    </section>
	<script src="<?php echo RUTA_JS?>jquery-3.2.1.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_JS?>jquery-1.11.2.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap/bootstrap.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/bootstrap-select.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>bootstrap-select/js/i18n/defaults-es_ES.min.js?v=<?php echo time();?>"></script>
	<script src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_PLUGINS?>toaster/toastr.min.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>Utils.js?v=<?php echo time();?>"></script>
    <script src="<?php echo RUTA_JS?>admin.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wnumb/1.1.0/wNumb.min.js"></script>

    <script type="text/javascript" src="<?php echo RUTA_PLUGINS?>mdl/material.min.js?v=<?php echo time();?>"></script>
    <script type="text/javascript" src="https:cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.colVis.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript">
    	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
        	$('select').selectpicker('mobile');
        } else {
            $('select').selectpicker();
        }

        var table = $('#tabla-solicitudes').DataTable( {

    "order": [[ 0, 'asc' ]], //defecto ordenar por columna 0 (oculta) fecha asc

      columnDefs: [
         { targets: 1, orderData: 0},   //cuando ordena por la columna 1(fecha), ordenene con los datos de la columna 0(oculta) 
     ],

      lengthChange: false,
      buttons: [
        {
            extend:    'pdf', //pdfHtml5
            text:      '<i class="fa fa-print fa-3x"></i>',
            titleAttr: 'PDF',
            title: 'Reporte Historial Solicitud',
            orientation: 'landscape',
            pageSize: 'A4',
            filename: 'reporte',
            customize: function (doc) {

              /*doc.content[1].table.widths = 
                  Array(doc.content[1].table.body[0].length + 1).join('*').split('');*/
           
                  doc.content.forEach(function(item) {

                    item.alignment = 'center';
                    //doc.content[1].table.body[i][4].alignment = 'center';
                    })              
            },

            exportOptions: {
                 columns: [ 1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 20, 25, 27],
            }
        },
        {
            extend:    'excel',
            text:      '<i class="fa fa-file-excel-o fa-3x" style="color:green"></i>',
            messageTop: 'Reporte Historial Solicitud',
            titleAttr: 'Excel',
            title: '',
            filename: 'reporte',
            header: true,
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];

                var clRow = $('row', sheet);
                $('row c ', sheet).each(function () {
                    $(this).attr('s', '51');
                    //$(this).attr('s', '2');
                });

            },
            exportOptions: {
                columns: [ 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28]
            }
        },
      ],
      "language": {
        "search": "Buscar:",
        "emptyTable": "No hay registros disponibles",
        "paginate": {
            "first":        "Primero",
            "previous":     "Anterior",
            "next":         "Siguiente",
            "last":         "Ultimo"
        },
        "info":             "_START_ a _END_ de _TOTAL_ entradas",

        "infoEmpty":        "0 de 0 of 0 entradas",
        "infoFiltered":     "(filtrados de un total _MAX_ entradas)",
        "zeroRecords":      "No se encontraron registros",
      },
      "bInfo" : false,
      "pageLength": 10,
      lengthMenu: [
          [ 5, 15, 25, 50, -1 ],
          [ '5', '15', '25', '50', 'Total' ]
      ]
  } );

  table.buttons().container()
  .appendTo( '.buttons-export');
    </script>
</body>
</html>