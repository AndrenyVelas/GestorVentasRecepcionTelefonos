 /********************************************************************
 		REPORTE PRODUCTO ENTRADAS Y SALIDAD
 ********************************************************************/
 var tbl_reporte_producto_es;
 function Listar_Reporte_Producto_EnSal(){//enviarlo al scrip en MANTENIMIENTO ROL
	tbl_reporte_producto_es = $("#tabla_reporte_producto_ensal").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 25,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Bfl',
		"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel',
			   "excelStyles": {                
				//template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
				//template:"green_medium" 
				
				"template": [
					"blue_medium",
					"header_green",
					"title_medium"
				] 
				
			},
		    },
			{
				"extend":    'pdfHtml5',
				"text":      '<i class="fas fa-file-pdf"></i> ',
				"titleAttr": 'Exportar a Pdf',
				"download":  'open'
			}
			
		],
		"rowCallback": function( row, data ) {
		    if ( data.stock_actual < 3 ) {
		      
		     $('td', row).css({
                           'background-color':'#ff5252',
                           'color':'white',
                          
                           
                       });
		    }
		  },
		/*  "drawCallback":function(){
			//alert("La tabla se está recargando"); 
			var api = this.api();
			$(api.column(3).footer()).html(
				'Total: '+api.column(3, {page:'current'}).data().sum()
			)
		  },*/
		
						   
		  
		"ajax" : {
			"url": "../controller/reporteproducto/controlador_reporteproducto_en_sal.php",
			type: 'POST'
		},		
		"columns":[
		//todos los datos del procedimiento almacenado
		{"data": "codigo"},
		{"data": "nombre"},
		{"data": "precio"},
		{"data": "ingresos"},
		{"data": "salidas"},
		{"data": "stock_actual"},
		],
		"language":idioma_espanol,
		select:true
	});
 }	






 /********************************************************************
 					KARDEX DE PRODUCTOS
 ********************************************************************/
var tbl_kardex;
 function Listar_kardex(){//enviarlo al scrip en MANTENIMIENTO ROL
 	var pro = document.getElementById('select_producto').value;
 	//var ffin = document.getElementById('text_ffin').value;
	tbl_kardex = $("#tabla_reporte_kardex").DataTable({		
		"responsive" :true,
		"ordering" :false,
		"bLengthChange" : true,
		"searching" : {"regex" : false},
		"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
		"pageLength" : 10,
		"destroy" :true,
		"async" : false,
		"bprocessing": true,
		"dom": 'Blt',
		/*"buttons":[
			{
		       "extend":    'excelHtml5',
		       "text":      '<i class="fa fa-file-excel"></i>',
		       "titleAttr": 'Exportar a Excel',
			   
			  
			  
		
		    },
				
	

			{
				"extend":    'pdfHtml5',
				"text":      '<i class="fas fa-file-pdf"></i> ',
				"titleAttr": 'Exportar a Pdf',
				"download": 'open',

			}
			
		],*/

		"buttons": [
            {
                extend: 'excel',                    // Extend the excel button   
                excelStyles: [
                    {                      // Add an excelStyles definition
                        //template: 'blue_gray_medium',  // Apply the 'blue_gray_medium' template
                    },
                    {
                        cells: ['D2:F2','G2:I2','J2:L2'],  // Format the two cells ranges that are merged
                        style: {
                            font: {
                                b: true,
                            },
                            alignment: {
                                vertical: "center",
                                horizontal: "center",
                            },
                            border: {
                                top: 'thick',
                                bottom: 'thick',
                                left: 'thick',
                                right: 'thick',
                            }
                        }
                    }
                ],
                insertCells: [
                    {
                        cells:  ['s0'],
                        content: '',    // Content inserted as an array
                        pushRow: true,                                       // Push the columns over
                    },
                    
                   /* {
                        cells: ['s15','s17'],
                        content: '',
                        pushRow: true
                    },*/
                   /* {
                        cells: ['A17'],               // Using the mergeCells option in pageStyle below
                        content: 'Row Span Example',
                    },*/
                    {
                        cells: ['D2'],               // Using the mergeCells option in pageStyle below
                        content: 'INGRESOS',
						//pushCol: true,
                    },
					{
                        cells: ['G2'],               // Using the mergeCells option in pageStyle below
                        content: 'SALIDAS',
                    },
					{
                        cells: ['J2:L2'],               // Using the mergeCells option in pageStyle below
                        content: 'EXISTSTENCIAS',
                    },
                    
                ],
                pageStyle: {
                    sheetPr: {
                        pageSetUpPr: {
                            fitToPage: 1            // Fit the printing to the page
                        } 
                    },
                    printOptions: {
                        horizontalCentered: true,
                        verticalCentered: true,
                    },
                   pageSetup: {
                        orientation: "landscape",   // Orientation
                        paperSize: "9",             // Paper size (9 = A4)
                        fitToWidth: "1",            // Fit to page width
                        fitToHeight: "0",           // Fit to page height
                    },
                   pageMargins: {
                        left: "0.2",
                        right: "0.2",
                        top: "0.4",
                        bottom: "0.4",
                        header: "0",
                        footer: "0",
                    },
                    mergeCells: {                   // Merge Cells
                        mergeCell: [
                            'D2:F2',
							'G2:I2',
							'J2:L2',
                         
                        ]
                    },
                   // repeatHeading: true,
                    //repeatRow: 'D2:F2',
					
                }
            },
        ],


		"ajax" : {
			"url": "../controller/reporteproducto/controlador_reporte_kardex.php",
			type: 'POST',
			data:{
				pro:pro
			}
		},
		"columns":[
		//todos los datos del procedimiento almacenad
		{"data": "producto"},
		{"data": "fecha"},
		{"data": "tipo"},

		{"data": "ingreso"},		
		{"data": "precio_ingreso"},		
		{"data": "total_ingreso"},	

		{"data": "salida"},		
		{"data": "precio_salida"},		
		{"data": "total_salida"},	

		{"data": "total_actual"},		
		{"data": "precio_total"},		
		{"data": "total_total"},		

		],
		"language":idioma_espanol,
		select:true
	});
 }




 /********************************************************************
 		  CARGAR PRODUCTOS EN COMBO
 ********************************************************************/ 
  function cargar_Select_Productos(){//enviamos al scrpit mantenimiento examen
 	$.ajax({
 		url:'../controller/reporteproducto/controlador_cargar_select_productos.php',
 		type: 'POST'
 	}).done(function(resp){
 		let data = JSON.parse(resp);//POSICION DE LA FILA Y COLUMNA
 		let llenardata = "<option value=''>Seleccione</option>";
 		if (data.length>0) {
 			for (let i = 0; i < data.length; i++) {
 				llenardata+="<option value='"+data[i][0]+"'>"+data[i][1]+"</option>";
 			}
 			document.getElementById('select_producto').innerHTML = llenardata;
 		}else{
 			llenardata+="<option value=''>No se encontraron datos</option>";
 			document.getElementById('select_producto').innerHTML = llenardata;

 		}
 	})
 }




  /********************************************************************
 		REPORTE PRODUCTO ENTRADAS Y SALIDAD
 ********************************************************************/
		 var tbl_reporte_utili;
		 function Listar_Reporte_Utilidad(){//enviarlo al scrip en MANTENIMIENTO ROL
			tbl_reporte_utili = $("#tabla_reporte_utilidad").DataTable({		
				"responsive" :true,
				"ordering" :false,
				"bLengthChange" : true,
				"searching" : {"regex" : false},
				"lengthMenu" : [[10, 25, 50, 100, -1],[10, 25, 50, 100, "All"]],
				"pageLength" : 25,
				"destroy" :true,
				"async" : false,
				"bprocessing": true,
				"dom": 'Bfl',
				"buttons":[
					{
					   "extend":    'excelHtml5',
					   "text":      '<i class="fa fa-file-excel"></i>',
					   "titleAttr": 'Exportar a Excel',
					   "excelStyles": {                
						//template: "header_blue",  // Apply the 'header_blue' template part (white font on a blue background in the header/footer)
						//template:"green_medium" 
						
						"template": [
							"blue_medium",
							"header_green",
							"title_medium"
						] 
						
					},
					},
					{
						"extend":    'pdfHtml5',
						"text":      '<i class="fas fa-file-pdf"></i> ',
						"titleAttr": 'Exportar a Pdf',
						"download":  'open'
					}
					
				],
				
				  "drawCallback":function(){
					//alert("La tabla se está recargando"); 
					var api = this.api();
					$(api.column(5).footer()).html(
						'Total: '+api.column(5, {page:'current'}).data().sum()
					)
				  },
				
								   
				  
				"ajax" : {
					"url": "../controller/reporteproducto/controlador_reporteproducto_utilidad.php",
					type: 'POST'
				},		
				"columns":[
				//todos los datos del procedimiento almacenado
				{"data": "producto"},
				{"data": "cantida_vendidos"},
				{"data": "precio_venta"},
				{"data": "producto_pcompra"},
				{"data": "utilidad"},
				{"data": "suma_total"},
				],
				"language":idioma_espanol,
				select:true
			});
		 }