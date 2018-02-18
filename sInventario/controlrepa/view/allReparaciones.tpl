{$NAV_MENU}
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<input type="hidden" name="id_tienda" id="id_tienda" value="{$ID_TIENDA}">
						<h2>Control de Reparaciones</h2>
					<!-- <input type="text" class="pull-right" id="tienda" style="background-color: AliceBlue;" name="tienda"   value="{$NOMBRE_TIENDA}">   -->	
						
					</div>
					<div class="box-content">
			<!-- 		
						<table class="form-horizontal">
						<tbody>
						<td>
						<button type="button" class="btn btn-small btn-success" id="addReparacion" onclick="goPage(1,0)" style="margin-bottom:12px;"><i class="icon-plus icon-white"></i> Agregar</button>
						</td>
	
						<td style="width:500px;">
						<div class="control-group" id="boxFiltroRep">
								<label class="control-label" for="selectFiltroRep">Desplegar solo</label>
								<div class="controls">
									<select id="selectFiltroRep" name ="selectFiltroRep" style="width: 175px;">
                            			<option value="A" selected>Activas</option>
                            			<option value="F">Historicas</option>
                        			</select>
                        		</div>
                    		</div>
                    		</td>
                    		<td>
                    		<div class="control-group" id="boxSelTiendas">
                    		<select  id="selectStore" name="selectStore" >                         		
                            	{section name=lP loop=$LISTA_TIENDAS}                            		
                                	<option value="{$LISTA_TIENDAS[lP].codTienda}" {if $LISTA_TIENDAS[lP].codTienda eq $ID_TIENDA} selected{/if}>{$LISTA_TIENDAS[lP].nombreTienda}</option>                                	
                                {/section}
                        </select>
                        </div>
                    		</td>
               
                    		</tbody>						
						</table>
				     -->
						<table class="table table-striped table-bordered bootstrap-datatable" id="tblDataE">
						  <thead>
							  <tr>
							      <th>Tienda</th>
								  <th>Fecha Recibida</th>
								  <th>Id</th>
								  <th>Cliente</th>
								  <th>Equipo</th>
								  <th>Daño/Problema</th>
								  <th>Antigüedad</th>
								  <th>Días</th>
								  <th>Estado</th>
								  <th>Acción</th>
							  </tr>
						  </thead>
						  <tbody id="info-repa" >
							{section name=lP loop=$LISTA_REPARACIONES} 								
								<tr style="padding:0px;" id="tr{$LISTA_REPARACIONES[lP].idReparacion}">
								     <td style="width:50px;">{$LISTA_REPARACIONES[lP].nombreTienda}</td>
									 <td style="width:10px;">{$LISTA_REPARACIONES[lP].FechaRecibido}</td>
							     	 <td style="width:10px;">{$LISTA_REPARACIONES[lP].idReparacion}</td>
							     	 <td style="width:370px;">{$LISTA_REPARACIONES[lP].nombre}</td>
							         <td style="width:300px;" align="left">{$LISTA_REPARACIONES[lP].Equipo}</td>
							         <td style="width:400px;" align="left">{$LISTA_REPARACIONES[lP].Problema}</td>
							         <td style="width:25px;" align="left">{$LISTA_REPARACIONES[lP].NDiasAnti}</td>
							         <td style="width:25px;" align="left">{$LISTA_REPARACIONES[lP].NDias}</td>
							         <td style="width:25px;" align="left">{$LISTA_REPARACIONES[lP].Estado}</td>
									 <td style="width:300px" "center">
									    <a href="#" id="{$LISTA_REPARACIONES[lP].idReparacion}" Title="Ver Reparacion" {if $LISTA_REPARACIONES[lP].Estado eq "Activa"} hidden="true"{/if} onclick="goPage(4, this.id)"><i class="icon icon-color icon-search"></i></a>
										<a href="#" id="{$LISTA_REPARACIONES[lP].idReparacion}" {if $LISTA_REPARACIONES[lP].Estado eq "Cerrada"} hidden="true"{/if} onclick="goPage(2, this.id)"><i class="icon icon-color icon-edit"></i></a>
								<!-- 	<a href="#" id="{$LISTA_REPARACIONES[lP].idReparacion}" {if $LISTA_REPARACIONES[lP].Estado eq "Cerrada"} hidden="true"{/if} onclick="goPage(3, this.id)"><i class="icon icon-color icon-remove"></i></a>   -->	
							            <a href="eventRegister.php?id={$LISTA_REPARACIONES[lP].idReparacion}" title="Registrar Eventos" data-rel="tooltip"><i class="icon icon-blue icon-calendar"></i></a>										
										<a id="{$LISTA_REPARACIONES[lP].idReparacion}" Title="Imprimir Boleta"                                                                       onclick="goPage(7, this.id)"><i class="icon icon-color icon-document"></i></a>
								<!--  	<a id="{$LISTA_REPARACIONES[lP].idReparacion}" Title="Facturar Adelanto"   {if $LISTA_REPARACIONES[lP].SiAdelanto eq "N"} hidden="true"{/if} onclick="goPage(8, this.id)"><i class="icon icon-color icon-archive"></i></a>  -->				
								<!-- 	<a id="{$LISTA_REPARACIONES[lP].idReparacion}" Title="Facturar Reparación" {if $LISTA_REPARACIONES[lP].SiFacturar eq "N"} hidden="true"{/if} onclick="goPage(6, this.id)"><i class="icon icon-color icon-print"></i></a>  -->	
									 </td>
								</tr> 
							{/section}						  						
						  </tbody>
					  </table>  
					            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

<script type="text/javascript">
$(document).ready(function(){    

	$('#tblDataE').dataTable({                        
		"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
		"sPaginationType": "bootstrap",
	                'iDisplayLength': 16,
	                "aLengthMenu": [[16, 24, 32, -1], [8, 16, 24, 32, "Todos"]],
	                "aaSorting": [[ 2, "desc" ]],
	         //       "bDestroy": true,
	                "bRetrieve": true,
		"oLanguage": {
	                "sProcessing":     "Procesando...",
	                "sLengthMenu":     "Mostrar _MENU_ registros",
	                "sZeroRecords":    "No se encontraron resultados",
	                "sEmptyTable":     "Ningún dato disponible en esta tabla",
	                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	                "sInfoPostFix":    "",
	                "sSearch":         "Buscar:",
	                "sUrl":            "",
	                "sInfoThousands":  ",",
	                "sLoadingRecords": "Cargando..."
		}
	}); 
	
	
});

	// Octubre 15, 2014 William Jimenez
	// Function goPage
	// Descripcion: permite enviar al usuario a la pantalla para agregar o modificar registro
	// Parametros:
	//			action: 1> Insertar, 2>Modificar, 3>Borrar, 6>Imprimir
	//			id: El id del registro que se desea modificar o borrar, en el caso de insertar este parametro no se utiliza.
	function goPage(action,id){			
		if(action == 7){
			window.open('prnListData.php?action='+action+"&id="+id,'_blank');
		}else{
			if (action == 6 || action == 8){ // facturar la boleta ya sea el adelanto o la reparacion
			
				var properties = {
            			url  : "prnFactuRepa.php",
                		async: false,
                		cache: false,
                		datatype:"text",
                		data : "action="+action+"&id="+id+"&idTienda="+$('#id_tienda').val(),	
                		type : "GET",
                		success: function(data){
                			if (data.trim()!='OK') {
                				alert(data);
                			}else{
                				
                				//todo OK se manda a imprimir la factura de la reparacion.
                				// version anterior para imprimr factura, esta opcion abre una pantalla con los datos de la factura
                				//window.open('imprimir.php?factura='+$('#idFactura').val(),'_blank');
                				// nueva version de imprimir esta no abre pantalla alguna, imprime la factura
                				// directamente en la impresora default.
                			//	window.location.href ='ImpreFacRepa.php?idDoc='+id+'&action='+action; // factura
                				window.location.href = 'index.php';                				
                				//$dummy="";
                				//window.location.href ='index.php';        
                			}
                		}, // success,
      					error: function(jqXHR,textStatus,errorThrown){
      						 	var err = eval("(" + jqXHR.responseText + ")");
      						  	alert('Error al Imprimir Factura Reparacion'+err.Message);
          						//alert('Error al imprimir '+errorThrown);
      							}
            		}; // var properties            
      				$.ajax(properties);                
								
			//	window.open('prnFactuRepa.php?action='+action+"&id="+id);				
			}else{
				window.location.href ='Reparaciones.php?action='+action+"&id="+id;
			}
		}	
		
	};
	
	$("#selectFiltroRep").on("change", function(e){
	    e.preventDefault();
	    var table = document.getElementById("info-repa");
        while(table.rows.length > 1) {
        	  table.deleteRow(1);
        	}	  
	    criterio    = $("#selectFiltroRep").val(); // posibles valores A: activas, C: cerradas	  	
	    idTienda    = $("#selectStore").val(); 
	    $("#info-repa").load("buscaReparaciones.php", { criterio : criterio, idTienda : idTienda }, function(response,status,xhr){
	    }); 
	});
	
	
	function findRepa(){
		 
	    criterio    = $("#selectFiltroRep").val(); // posibles valores A: activas, H: historicas
	    idTienda    = $("#selectStore").val(); 
	    
	    $("#info-repa").load("buscaReparaciones.php", { criterio : criterio , idTienda : idTienda }, function(response,status,xhr){

	    });    
	    
	    
	}
	
	$("#selectStore").on("change", function(e){
	    e.preventDefault();
	  
	    criterio    = $("#selectFiltroRep").val(); // posibles valores A: activas, C: cerradas	  	
	    idTienda    = $("#selectStore").val(); 
	    $("#info-repa").load("buscaReparaciones.php", { criterio : criterio, idTienda : idTienda }, function(response,status,xhr){
	    }); 
	});
	
</script>