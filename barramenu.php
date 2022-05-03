<!doctype html>
<?php

  $opciones = "";
  $primer = "Si";

  if ($_SESSION['admMovil'] == 'No'){
    if($primer == 'Si'){
          $primer = 'No';
          $opciones .= ", disabled: [2 ";
    } else
          $opciones .= ",2 ";
  }

  if ($_SESSION['planilla'] == 'No' && $_SESSION['admPlanilla'] == 'No'){
    if($primer == 'Si'){
      $primer = 'No';
      $opciones .= ", disabled: [3 ";
    } else
      $opciones .= ",3 ";
  }

  if ($_SESSION['plame'] == 'No'){
    if($primer == 'Si'){
      $primer = 'No';
      $opciones .= ", disabled: [4 ";
    } else
      $opciones .= ",4 ";
  }

  if ($_SESSION['admUnif'] == 'No'){
    if($primer == 'Si'){
      $primer = 'No';
      $opciones .= ", disabled: [5 ";
    } else
      $opciones .= ",5 ";
  }

  if ($_SESSION['admin'] == 'No'){
    if($primer == 'Si'){
      $primer = 'No';
      $opciones .= ", disabled: [6 ";
    } else
      $opciones .= ",6 ";
  }


  if ($_SESSION['seguridad'] == 'No'){
    if($primer == 'Si'){
      $primer = 'No';
      $opciones .= ", disabled: [11 ";
    } else
      $opciones .= ",11 ";
  }

  if ($opciones != "") $opciones .= "]" ;

   ?>

<html lang="en">
<head>

	<title>Inversiones Moy</title>
	<link rel="stylesheet" href="librerias/jquery1.10/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.min.css">
  <script>
    function barrEnviar(url){
      document.frmMenu.action= url;
      document.frmMenu.method= 'POST';
      document.frmMenu.submit();
    }

    $(document).ready(function(){
      $('.manejoPlanilla' ).hide(); //Me aseguro que iniciamente está oculta
      $(".calendario").datepicker({
        showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        maxDate: "0M +0D",
        dateFormat:"yy-mm-dd"
      });

      $("#txtFchMesFactBarr").datepicker({
        beforeShowDay: function (date) {
          var nroDia = date.getDate();
          return [nroDia == 1, ""];
        },
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        maxDate: "0M +0D",
        dateFormat:"yy-mm-dd",
        //minDate: "2015-07-01"
      });

      $("#txtFchMesProvBarr").datepicker({
        beforeShowDay: function (date) {
          var nroDia = date.getDate();
          return [nroDia == 1, ""];
        },
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        maxDate: "0M +0D",
        dateFormat:"yy-mm-dd",
        //minDate: "2015-07-01"
      });

      $('#txtPlacaComb').autocomplete({
        minLength: 2,
        source : 'placasAjax.php'
      });    

      $("#btnAzCli").hide();
      $("#btnAzTer").hide();
      $("#btnAzTer2").hide();
      $("#btnAzDespCli").hide();
      $("#btnAzQuincenas").hide();
      $("#btnAzMesContab" ).hide();
      <?php if ((isset($_SESSION['Anhio']) && $_SESSION['Anhio'] == '') || !isset($_SESSION['Anhio']) ){ ?>
      	$('.manejoPlanilla' ).hide();
      	$(".manejoPlanillaOcultar").show();
      <?php  } else { ?>
        $('.manejoPlanilla' ).show();
        $(".manejoPlanillaOcultar").hide();
        
      <?php  } ?>     

      $( "#tabs" ).tabs({
        collapsible: true,
        active:false, //carga los tabs colapsados
        fxFade: true, fxSpeed: 5000
        <?php echo $opciones;  ?>
      });

      $( "#btnAzDetTrab" ).bind("click", function() {
      	document.frmMenu.action= "index.php?controlador=trabajadores&accion=listardetalletrabajotrabajador";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });

      $( "#btnAzTrabHistD" ).bind("click", function() {
      	document.frmMenu.action= "index.php?controlador=trabajadores&accion=repoHistoricodescuentosvarios";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });


      $( "#btnAzTrabHistO" ).bind("click", function() {
      	document.frmMenu.action= "index.php?controlador=trabajadores&accion=repoHistoricoocurrencias";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });

      $( "#btnAzTrabHistT" ).bind("click", function() {
      	document.frmMenu.action= "index.php?controlador=trabajadores&accion=historicoTrabajador";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });

      $( "#btnAzTrabPrenda" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=trabajadores&accion=historicoTrabajPrendas";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });

      $( "#btnAzDiasTrab" ).bind("click", function() {
      	document.frmMenu.action= "index.php?controlador=despachos&accion=repoDiasTrabajados";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });    

      $( "#btnAzCmbAcei" ).bind("click", function() {
      	document.frmMenu.action= "index.php?controlador=vehiculos&accion=verrepoaceite";
        document.frmMenu.method= "POST";
        document.frmMenu.submit(); 
      });    

      $( "#btnAzMntForma1" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=vehiculos&accion=repoMantenimientoForma1";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });

      $( "#btnAzMntForma2" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=vehiculos&accion=repoMantenimientoForma2";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });    

      $( "#btnAzHistMant" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=vehiculos&accion=repoHistoricoalertas";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });

      $( "#btnAzAbasCmb" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=vehiculos&accion=listarAbastecimiento";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });

      $( "#btnAzDetCmb" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=vehiculos&accion=repocombustibledetalles";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });

      $( "#btnAzGenPlame" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=plame&accion=generarPlame";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });

      $( "#btnAzRecor" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=vehiculos&accion=repoRecorrido";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });

      $( "#btnAzGto" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=cc&accion=repoGtoxUnidad";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      });  

      $('.trabajadoresAjax').autocomplete({
        minLength: 2,
        source : 'trabajadoresAjax.php'
        //source : ['Maria','Jose','Rocio']  
      });

      $('#txtCliCobBarr').autocomplete({
        minLength: 2,
        source : 'clientesAjax.php'
        //source : ['Maria','Jose','Rocio']  
      });

      $('#txtLiquidBarr').autocomplete({
        minLength: 2,
        source : 'ajaxAutoLiquid.php'
        //source : ['Maria','Jose','Rocio']  
      });

      $('#cmbPlaca').autocomplete({
        minLength: 2,
        source : 'placasAjax.php'
      });

      $("#btnVdCli" ).bind("click", function() {
      	$("#cmbCliente").find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        $.post("ajaxCargaClientes.php", {}, function(data){
  		    $("#cmbCliente").html(data);
  		  });        

  		  $("#btnVdCli" ).hide();

  		  $("#btnAzCli" ).show();   	
      });


      $("#btnVdDespCli" ).bind("click", function() {
        $("#cmbDespCli").find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        $.post("ajaxCargaClientes.php", {}, function(data){
          $("#cmbDespCli").html(data);
        });        
        $("#btnVdDespCli" ).hide();
        $("#btnAzDespCli" ).show();     
      });

      $("#btnVdQuincenas" ).bind("click", function() {
        $("#cmbQuincenas").find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        $.post("ajaxCargaVarios.php?opc=quin", {}, function(data){
          $("#cmbQuincenas").html(data);
        });        
        $("#btnVdQuincenas" ).hide();
        $("#btnAzQuincenas" ).show();     
      });
       
      $( "#btnAzCli" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=clientes&accion=cobrar";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();       	
      });
  
      $( "#btnVdTer" ).bind("click", function() {
      	$("#cmbTerceros").find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        $.post("ajaxCargaTerceros.php", {}, function(data){
  		  $("#cmbTerceros").html(data);
  		});
  		$("#btnVdTer" ).hide();
  		$("#btnAzTer" ).show();    	
      });

      $( "#btnVdTer2" ).bind("click", function() {
        $("#cmbTerceros2").find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        $.post("vistas/ajaxVarios_v2.php?opc=tercerosOrdenP", {}, function(data){
          $("#cmbTerceros2").html(data);
        });
        $("#btnVdTer2" ).hide();
        $("#btnAzTer2" ).show();        
      });
       
       $( "#btnAzTer" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=clientes&accion=verpagotercero";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();       	
       });

       $( "#btnAzTer2" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=clientes&accion=verpagotercero2";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();        
       });

      $( "#btnAzDesQuin" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=aplicacion&accion=reportepormes";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();    
      })
  
      $( "#btnAzTrabPlanPas" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=trabajadores&accion=consultasplanilla";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();    
      })

      $( "#btnAzResQuin01" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=trabajadores&accion=verresumenquincena";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();    
      })

      $( "#btnAzTrabAdmPl" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=trabajadores&accion=verificarplanilla";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      })

      $( "#btnAzLiquid" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=cc&accion=grafRendicionCuentas";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      })

      $( "#btnAzCliCob" ).bind("click", function() {
        document.frmMenu.action= "index.php?controlador=clientes&accion=listarDetallesPorCobrar";
        document.frmMenu.method= "POST";
        document.frmMenu.submit();
      })


      $("#btnVdMesContab" ).bind("click", function() {
        $("#cmbMesContab").find('option').remove().end().append('<option value="">Cargando...</option>').val('');
        $.post("ajaxCargaVarios.php?opc=mes", {}, function(data){
          $("#cmbMesContab").html(data);
        });        
        $("#btnVdMesContab" ).hide();
        $("#btnAzMesContab" ).show();
      });



    });

  </script>

</head>

<body>
  <form name = 'frmMenu'>
  <table class = 'fullRD' >
  <tr>
  	<td>
  		<div id="resultado"></div>
  	</td>
  </tr>
  <tr>
    <th align = 'left'>
	<div id="tabs">
	<ul>
	  <li><a href="#tabTablas">Tablas</a></li>
	  <li><a href="#tabDespachos">Despachos</a></li>
    <li><a href="#tabMovil">Móvil</a></li>
	  <li><a href="#tabPlanilla">Planilla</a></li>
    <li><a href="#tabPlame">Plame</a></li>
    <li><a href="#tabUniformes">Uniformes</a></li>
    <li><a href="#tabCajasCcostos">Cajas y CC</a></li>
	  <li><a href="#tabHerram">Herramientas</a></li>
	  <li><a href="#tabReportes">Reportes</a></li>
    <li><a href="#tabReportes2">Reportes2</a></li>
	  <li><a href="#tabGraficas">Gráficas</a></li>
	  <li><a href="#tabSegur">Seguridad</a></li>
    <li><a href="#tabMantenimiento">Mantenimiento</a></li>
    <li><a href="#tabLimpieza">Limpieza</a></li>
    <li><a href="#tabMesaAyuda">Mesa de Ayuda</a></li>
    <li><a href="#tabCotizacion">Cotización</a></li>
	</ul>

	  <div id="tabTablas" style="background-color:#2E6E9E">
      <?php  if ($_SESSION["ingreso"] == 'Si'){ ?>
    		<div class = 'menuCol'>
      		<table width = '250' border = '0'>
      		 	<!--tr>
      		 	  <td><a href="index.php?controlador=vehiculos&accion=listar">Vehículos</a></td>
  	    	 	</tr -->
    	  		<tr>
  		 	      <td><a href="index.php?controlador=vehiculos&accion=nuevolistarVehiculos">Vehiculos</a></td>
  		 	    </tr>
      		 	<tr>
      		 	  <td><a href="index.php?controlador=trabajadores&accion=listar">Trabajadores</a></td>
  	    	 	</tr>
  		     	<tr>
      		 	  <td><a href="index.php?controlador=clientes&accion=listar">Clientes</a></td>
      		 	</tr>
            <tr>
              <td><a href="index.php?controlador=clientes&accion=listarCondPago">Condiciones de Pago</a></td>
            </tr>
  	    	 	<tr>
  		     	  <td>
                <?php if ($_SESSION['admArt'] == 'Si'){  ?>
                <a href="index.php?controlador=articulos&accion=listar">Artículos</a>
                <?php } ?>
              </td>
  		 	    </tr>
            <tr>
      		 	  <td><a href="index.php?controlador=grifos&accion=listarGrifos">Grifos</a></td>
      		 	</tr>
            <tr>
              <td><a href="index.php?controlador=infracciones&accion=listarInfracciones">Infracciones</a></td>
            </tr>
  	    	</table>
  		  </div>
    		<div class = 'menuCol'>
    		  <table width = '250' border = '0'>
      		 	<tr>
      		 	  <td><a href="index.php?controlador=aplicacion&accion=mantenimiento">Auxiliares</a></td>
  	    	 	</tr>
  		     	<tr>
              <td>
                <a href="index.php?controlador=terceros&accion=listarTipoOcurrenciaTercero">Tipo Ocurrencia Tercero
                </a>
              </td>
            </tr>
      		 	<tr>
  	    	 	  <td>
                <a href="index.php?controlador=vehiculos&accion=verCargaMasivaAbastecimiento">Carga Abastecimiento de Combustible</a>
              </td>
      		 	</tr>
      		 	<tr>
  	    	 	  <td><a href="index.php?controlador=peajes&accion=listarPeajes">Peajes</a></td>
  		     	</tr>
      		</table>		
      	</div>
      <?php  } ?>
	  </div>

	<div id="tabDespachos" style="background-color:#2E6E9E">
	  <div class = 'menuCol'>
		 <table  width = '430' border = '0'>
      <?php if ($_SESSION['ingreso'] == 'Si'){  ?>
      <tr>
        <td  width = '150'><a href="index.php?controlador=program&accion=listarTelefonos">Listar Teléfonos Disponibles</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=proveevehiculo&accion=listar">Listar Proveedores de Vehículos</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=program&accion=programDespachos">Programación Previa</a></td>
      </tr>
		 	<tr>
		 	  <td  width = '150'><a href="index.php?controlador=despachos&accion=listar">Misceláneos</a></td>
		 	</tr>
      <tr>
        <td  width = '150'>
          <?php
            $acceso = array("lescobedo", "kvelasquez", "mvelasquez", "ncarrasco", "rrhh_zoila", "smith", "jpardave", "jarias", "ljulca", "zmiranda", "ohorna", "cvera", "asalazar", "mrabines", "jgamarra", "kayala", "cramirez", "mpalomino", "mgabriela", "adelmatto", "amedina", "usuario01", "jquevedo");
            if(in_array($_SESSION['usuario'], $acceso)){
          ?>
          <a href="index.php?controlador=despachos&accion=listar2">Despachos2</a>
          <?php } ?>
        </td>
      </tr>
		 	<tr>
		 	  <td><a href="index.php?controlador=terceros&accion=listar">Listar Misceláneos para Pago a Terceros-Liquidación</a></td>
		 	</tr>
      <?php } ?>

		 	<tr>
        <td>Descarga Formato Despacho
          <select size="1" name="cmbDespCli" id="cmbDespCli" style="position: relative; width:200; height:22" ></select>
          <img src="imagenes/btnVerde.png" width="10" name = "btnVdDespCli" id = "btnVdDespCli"  />
          <img src="imagenes/btnAzul.png" width="10" name = "btnAzDespCli" id = "btnAzDespCli"
            onclick = "barrEnviar('vistas/formatoCrearInicioDespachos.php')" />
        </td>
      </tr>
      <?php if ($_SESSION['cargaDespachos'] == 'Subir' || $_SESSION['cargaDespachos'] == 'Adm'){ ?>
      <tr>
        <td>
          <a href="index.php?controlador=despachos&accion=verCargaMasivaDespachos">Carga Masiva Despachos</a></td>
      </tr>
      <?php 
      }
      if ($_SESSION['cargaDespachos'] == 'Adm'){ ?>
      <tr>
        <td>
          <a href="index.php?controlador=despachos&accion=administrarCargaMasivaDespachos">Administrar Carga Despachos</a>
        </td>
      </tr>
      <?php } ?>
		 </table>
		</div>

    <?php if ($_SESSION['ingreso'] == 'Si'){  ?>
		<div class = 'menuCol'>
		 <table  width = '430' border = '0'>
		 	<tr>
		 	  <td  width = '140'>Pago Terceros-Liquidación</td>
		 	  <td>
		 	  	<select size="1" name="cmbTerceros" id="cmbTerceros" style="position: relative; width:255; height:22" ></select>
		 	  	<img src="imagenes/btnVerde.png" width="10" name = "btnVdTer" id = "btnVdTer"  />
		 	  	<img src="imagenes/btnAzul.png" width="10" name = "btnAzTer" id = "btnAzTer"  />
		 	  </td>
		 	</tr>

      <?php //if ($_SESSION['usuario'] == 'lescobedo' ||  $_SESSION['usuario'] == 'kvelasquez' ) {  ?>
      <tr>
        <td  width = '140'>Pago Terceros-Liquidación2</td>
        <td>
          <select size="1" name="cmbTerceros2" id="cmbTerceros2" style="position: relative; width:255; height:22" ></select>
          <img src="imagenes/btnVerde.png" width="10" name = "btnVdTer2" id = "btnVdTer2"  />
          <img src="imagenes/btnAzul.png" width="10" name = "btnAzTer2" id = "btnAzTer2"  />
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=clientes&accion=listarOrdenesCompraTerceros">Revisar Ordenes de Compra</a>
          </td>
        <td></td>
      </tr>

      <?php //} ?>


		 	<tr>
		 	  <td>Cobranza a Clientes</td>
		 	  <td>
		 	  	<select size="1" name="cmbCliente" id="cmbCliente" style="position: relative; width:255; height:22" ></select>
		 	  	<img src="imagenes/btnVerde.png" width="10" name = "btnVdCli" id = "btnVdCli"  />
		 	  	<img src="imagenes/btnAzul.png" width="10" name = "btnAzCli" id = "btnAzCli"  />
        </td>
		 	</tr>

		 	<tr>
        <td colspan = '2'>
          <a href="index.php?controlador=clientes&accion=listarDetallesCobrar">Consulta Detalles por Cobrar</a>  
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=aplicacion&accion=reportepormes">Despachos por Quincena</a>  
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=clientes&accion=ingresosbanco">Ingresos Banco</a>  
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=clientes&accion=movimientoFacturas">Movimiento de Facturas</a>  
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=clientes&accion=actualizarEstadoFacturas">Actualizar Estado de Facturas</a>  
        </td>
      </tr>
		 </table>
		</div>
    <?php } ?>

    <div class = 'menuCol'>
     <table  width = '430' border = '0'>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=terceros&accion=listarOrdenCompra">Órdenes de Compra</a>  
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=terceros&accion=cargaVerifPreliqTercero">Verificar Preliquidación Tercero</a>  
        </td>
      </tr>

      <?php  //if ($_SESSION['usuario'] == 'lescobedo' ||  $_SESSION['usuario'] == 'kvelasquez' ) {  ?>

        <tr> 
          <td>Detalles cobranza</td>
          <td>
            <input type="text" name="txtCliCobBarr" id="txtCliCobBarr"  class = 'trabajadoresAjax' size = '36'  value= ''>
            <img src="imagenes/btnAzul.png"  width="10" name = "btnAzCliCob" id = "btnAzCliCob" />
          </td>
        </tr>
      <?php //} ?>


     </table>
    </div>


	</div>


    <div id="tabMovil" style="background-color:#2E6E9E">
    <div class = 'menuCol'>
     <table  width = '430' border = '0'>
      <?php if ($_SESSION['admMovil'] == 'Si'){  ?>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarDespachosTripulacion">Despachos / Tripulación</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarPuntos">Puntos Despachados</a></td>
      </tr>

      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarMercaderia">Listado de Mercadería Dañada</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarChoque">Listado de Choques</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarTelefonoR">Listado de Teléfonos Robados</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarTelefonoS">Listado de Sustento de Teléfonos</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarPapeleta">Listado de Papeletas</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarAbastecimiento">Listado de Abastecimientos</a></td>
      </tr>
      <tr>
        <td width='150'><a href="index.php?controlador=movil&accion=listarPeaje">Listado de Peajes</a></td>
      </tr>
      <tr>
        <td  width = '150'><a href="index.php?controlador=movil&accion=listarDataCapacitacion">Capacitacion</a></td>
      </tr>


      <?php } ?>
      <tr>
     </table>
    </div>
  </div>

	<div id="tabPlanilla"  style="background-color:#2E6E9E">
    <?php if($_SESSION['planilla'] == 'Si' || $_SESSION['admPlanilla'] == 'Si'){  ?>	
	  <div class = 'menuCol'>
		  <table width = '430' border = '0'>
  		 	<tr><td align = 'center'>Admin Planilla</td></tr>
  		 	<tr>
  		 	  <td>
  		 	  	<table>
  		 	  	  <tr>
  		 	  	  	<td width='150'>Datos para la planilla</td>
  		 	  	  	<td>
	  	 	  	  	  <input type="text" name="cmbTrabajAdmPlan" id="cmbTrabajAdmPlan" class = 'trabajadoresAjax'  size = '40' >
	  	 	  	  	  <img src="imagenes/btnAzul.png" width="10" name = "btnAzTrabAdmPl" id = "btnAzTrabAdmPl" class = 'manejoPlanilla' />
  		 	  	  	</td>
  		 	  	  </tr>
  		 	  	</table>
  		 	  </td>
  		 	</tr>
      <?php if($_SESSION['admPlanilla'] == 'Si'){  ?> 
        <tr>
          <td colspan = '2'><a href="index.php?controlador=planillas&accion=consolidacionFormatosPlanilla"  class = 'manejoPlanilla'>Consolidar Formatos Planilla</a></td>
        </tr>
        <tr>
          <td colspan = '2'><a href="index.php?controlador=planillas&accion=listarPendientesTrabajador" >Cuentas Pendientes</a></td>
        </tr>
        <tr>
          <td colspan = '2'><a href="index.php?controlador=planillas&accion=cargaPlanillasCronograma" >Carga de cronograma de pagos</a></td>
        </tr>
        <tr>
          <td colspan = '2'><a href="index.php?controlador=planillas&accion=listarPlanillasCronograma" >Cronograma de pagos</a></td>
        </tr>
        <tr>
          <td colspan = '2'><a href="index.php?controlador=polizas&accion=listar">Pólizas de Seguro Vida Ley</a></td>
        </tr>
      <?php } ?>
  		</table>  
	  </div>
    <?php
      }
       if ($_SESSION['planilla'] == 'Si' || $_SESSION['admPlanilla'] == 'Si'  ){
     ?>
		<div class = 'menuCol'>
		  <table width = '430' border = '0'>
		 	<tr>
		 	  <td colspan = '2'><a href="index.php?controlador=trabajadores&accion=verhrasextra" >Listar Horas Extra</a></td>
		 	</tr>
		 	<tr>
		 	  <td  width = '160'>
		 	    <a href="index.php?controlador=aplicacion&accion=reportepormes">Despachos por Quincena</a>	
		 	  </td>
		 	  <td>
		 	    <input type="text" name="txtFchBarr" id="txtFchBarr" class = 'calendario' size="10">
		 	    <img src="imagenes/btnAzul.png"  width="10" name = "btnAzDesQuin" id = "btnAzDesQuin" />
		 	  </td>
		 	</tr>
		 	<tr>
		 	  <td>Detalle Trabajos x Trabajad</td>
		 	  <td>
		 	    <input type="text" name="txtFchIniBarr" id="txtFchIniBarr" class = 'calendario'  size="10">
		 	    <input type="text" name="txtFchFinBarr" id="txtFchFinBarr" class = 'calendario'  size="10">
		 	    <img src="imagenes/btnAzul.png"  width="10" name = "btnAzDetTrab" id = "btnAzDetTrab" />
		 	  </td>
		 	</tr>
		 	<tr> 
		 	  <td>Verificar Planillas Pasadas</td>
		 	  <td>
		 	  	<input type="text" name="cmbTrabajadorConsultaBarr" id="cmbTrabajadorConsultaBarr"  class = 'trabajadoresAjax' size = '39'  value= ''>
		 	  	<img src="imagenes/btnAzul.png"  width="10" name = "btnAzTrabPlanPas" id = "btnAzTrabPlanPas" />
		 	  </td>
		 	</tr> 
		 	<tr>
		 	  <td>Resum Quincena 2011, 2012</td>
		 	  <td>
		 	  	<input type="text" name="txtAnhioBarr" id= "txtAnhioBarr" value= '<?php // echo $anhio; ?>' size="8">  
    			<select size="1" name="cmbMesResumen">
    			  <?php // echo "<option selected value= '$mes-$quin' >$mes-$quin</option>"; ?>

    			  <option>-</option>
  	    		  <option>01-1</option>  <option>01-2</option> <option>02-1</option> <option>02-2</option>
  	    		  <option>03-1</option>  <option>03-2</option> <option>04-1</option> <option>04-2</option>
  	  	    	  <option>05-1</option>  <option>05-2</option> <option>06-1</option> <option>06-2</option>
  	  	    	  <option>07-1</option>  <option>07-2</option> <option>08-1</option> <option>08-2</option>
  	  	    	  <option>09-1</option>  <option>09-2</option> <option>10-1</option> <option>10-2</option>
  	  	    	  <option>11-1</option>
  	  	    	  <option>11-2</option>
  	  	    	  <option>12-1</option>
  	  	    	  <option>12-2</option>
  	  	    	</select>

  	  	    	<img src="imagenes/btnAzul.png"  width="10" name = "btnAzResQuin01" id = "btnAzResQuin01" />

		 	  </td>
		 	</tr>    
		 </table>		
		</div>
    <?php  }  ?>

    <div class = 'menuCol'>
      <table width = '430' border = '0'>
      <tr>
        <td>Contab. Mes Completo 2017-04, + </td>
        <td>
          <select size="1" name="cmbMesContab" id="cmbMesContab" style="position: relative; width:120; height:22" ></select>
          <img src="imagenes/btnVerde.png" width="10" name = "btnVdMesContab" id = "btnVdMesContab"  />
          <img src="imagenes/btnAzul.png" width="10" name = "btnAzMesContab" id = "btnAzMesContab"
            onclick = "barrEnviar('index.php?controlador=planillas&accion=resumenPlanillasMesCompleto')" />
        </td>
      </tr>
      <tr>
        <td>Verificar marcas por quincena</td>
        <td>
          <input type="text" name="txtAnhioMarca" id= "txtAnhioMarca" value= '<?php // echo $anhio; ?>' size="8">  
          <select size="1" name="cmbMesResumenMarca">
            <?php // echo "<option selected value= '$mes-$quin' >$mes-$quin</option>"; ?>
            <option>-</option>
              <option>01-1</option>  <option>01-2</option> <option>02-1</option> <option>02-2</option>
              <option>03-1</option>  <option>03-2</option> <option>04-1</option> <option>04-2</option>
              <option>05-1</option>  <option>05-2</option> <option>06-1</option> <option>06-2</option>
              <option>07-1</option>  <option>07-2</option> <option>08-1</option> <option>08-2</option>
              <option>09-1</option>  <option>09-2</option> <option>10-1</option> <option>10-2</option>
              <option>11-1</option>
              <option>11-2</option>
              <option>12-1</option>
              <option>12-2</option>
            </select>
            <img src="imagenes/btnAzul.png"  width="10" name = "btnAzQuinVerMarca" id = "btnAzQuinVerMarca" />

        </td>
      </tr>
      <tr>
        <td>Confirmados por quincena por cuenta</td>
        <td>
          <input type="text" name="txtAnhioMarcaPorCuenta" id= "txtAnhioMarcaPorCuenta" value= '<?php // echo $anhio; ?>' size="8">  
          <select size="1" name="cmbMesResumenMarcaCuenta">
            <?php // echo "<option selected value= '$mes-$quin' >$mes-$quin</option>"; ?>
            <option>-</option>
              <option>01-1</option>  <option>01-2</option> <option>02-1</option> <option>02-2</option>
              <option>03-1</option>  <option>03-2</option> <option>04-1</option> <option>04-2</option>
              <option>05-1</option>  <option>05-2</option> <option>06-1</option> <option>06-2</option>
              <option>07-1</option>  <option>07-2</option> <option>08-1</option> <option>08-2</option>
              <option>09-1</option>  <option>09-2</option> <option>10-1</option> <option>10-2</option>
              <option>11-1</option>
              <option>11-2</option>
              <option>12-1</option>
              <option>12-2</option>
            </select>
            <img src="imagenes/btnAzul.png"  width="10" name = "btnAzQuinVerMarcaCta" id = "btnAzQuinVerMarcaCta" />

        </td>
      </tr>

      <tr> 
        <td></td>
        <td></td>
      </tr> 
      <tr>
        <td></td>
        <td></td>
      </tr> 
      <tr>
        <td></td>
        <td></td>
      </tr> 
     </table>   
    </div>
	</div>

    <div id="tabPlame"  style="background-color:#2E6E9E">

    <div class = 'menuCol'>
      <?php if ($_SESSION['plame'] == 'Si'){  ?>
      <table width = '350' border = '0'>
      <tr>
        <td colspan = '2' ><a href="index.php?controlador=plame&accion=listarFeriados">Administrar Feriados</a></td>
      </tr>
      <tr>
        <td>Facturas Concar</td>
        <td>
          <input type="text" name="txtFchMesFactBarr" id="txtFchMesFactBarr"  size="10">
          <img src="imagenes/btnAzul.png" width="10" name = "btnAzFactConcar" id = "btnAzFactConcar"
            onclick = "barrEnviar('index.php?controlador=concar&accion=facturasConcar')" />
        </td>
      </tr>
      <tr>
        <td>Prov. Concar</td>
        <td>
          <input type="text" name="txtFchMesProvBarr" id="txtFchMesProvBarr"  size="10">
          <img src="imagenes/btnAzul.png" width="10" name = "btnAzProvConcar" id = "btnAzProvConcar"
            onclick = "barrEnviar('index.php?controlador=concar&accion=provConcar')" />
        </td>
      </tr>
      <tr>
        <td colspan="2"><a href="vistas/formatoCodigosPlanilla.php">Descargar Modelo Carga Masiva Códigos Planilla</a></td>
      </tr>
      <tr>
        <td colspan = '2' ><a href="index.php?controlador=planillas&accion=verCargaMasivaCodPlanilla">Carga Masiva Códigos Planilla</a></td>
      </tr>

      <tr>
        <td colspan = '2' ><a href="index.php?controlador=planillas&accion=listarQuinOtrosConceptos">Administrar Quincena Otros Conceptos</a></td>
      </tr>

     </table>
     <?php  }  ?>
     <table width = '240' border = '0'>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td></td>
      </tr>   
     </table>
    </div>  
    <div class = 'menuCol'>
    <table width = '300' border = '0'>
      <tr>
        <td colspan = '2' align = 'center'>
          Rendición de Cuentas Pago Quincena
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
          <a href="index.php?controlador=plame&accion=listadoQuincena">Listado de Quincenas</a> 
        </td>
      </tr>
      <tr>
        <td colspan = '2'>
        </td>
      </tr>  
    </table>   
    </div>
  </div>

  <div id="tabUniformes"  style="background-color:#2E6E9E">
    <?php if ($_SESSION['admUnif'] == 'Si'){  ?>

    <div class = 'menuCol'>

     <table width = '240' border = '0'>
      <tr>
        <td>
          <a href="index.php?controlador=prendas&accion=listarColores">Colores</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="index.php?controlador=prendas&accion=listarTallas">Tallas</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="index.php?controlador=prendas&accion=listarTiposPrenda">Tipos Prenda</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="index.php?controlador=articulos&accion=listar&txtSubGrupo=UNIFORMES">Listado Prendas</a>
        </td>
      </tr>
      <tr>
        <td>
          <a href="index.php?controlador=prendas&accion=admEntregaPrendas">Administra Entrega de Prendas</a>
        </td>
      </tr>
      <tr>
        <td></td>
      </tr>   
     </table>
    </div>  

    <div class = 'menuCol'>
    <table width = '300' border = '0'>
      <tr>
        <td colspan = '2' align = 'center'>
          
        </td>
      </tr>
      <tr>
        <td colspan = '2'> 
        </td>
      </tr>
      <tr>
        <td colspan = '2'>       
        </td>
      </tr>      
    </table>   
    </div>
     <?php  }  ?>

  </div>

  <div id="tabCajasCcostos"  style="background-color:#2E6E9E">
    <?php if ($_SESSION['admin'] == 'Si'){  ?>
    <div class = 'menuCol'>
      <?php if ($_SESSION['admCostos'] == 'Si'){  ?>
      <table width = '300' border = '0'>
      <tr>
        <td>Costos Admin</td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=liquidarcostos&cmbRespons=">Liquidar Costos</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=asignaCajaResponsable&cmbCajaRespons=">Asignar Caja</a></td>
      </tr>
      <tr>
        <td>
          <a href="vistas/descargarDescuentosTotal.php">Descargar Todos los descuentos (No usar por ahora)</a>
        </td>
      </tr>
     </table>

     <?php  }  ?>

     <table width = '300' border = '0'>
      <tr>
        <td>Rendición de Cuentas Opciones</td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=costosPrincipal">Costos Principal</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=listar">Rendición de Cuentas</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=cargaMasivaRendicion">Carga Rendición de Cuentas</a></td>
      </tr>        
     </table>

    </div>  

    <div class = 'menuCol'>

    <table width = '300' border = '0'>
      <tr>
        <td><a href="vistas/formatoRendicionCuentas.php">Descargar Modelo Rendición de Cuentas</a></td>
      </tr>
      <tr>
        <td>Centro de Costos</td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=listarGrupoItem">Grupo de Item CC</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=listarTipoArticulo">Listado Tipos de Items</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=articulos&accion=listar">Listado de Artículos</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=cargarCc">Cargar a Centro de Costos</a></td>
      </tr>

     </table>

    </div>

    <div class = 'menuCol'>

    <table width = '350' border = '0'>
      <tr>
        <td colspan = '2'><a href="index.php?controlador=concar&accion=descargarParaConcar">Descargar Para Concar</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=listarTipoArticulo">Listado Tipos de Items</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=articulos&accion=listar">Listado de Artículos</a></td>
      </tr>
      <tr>
        <td><a href="index.php?controlador=cc&accion=cargarCc">Cargar a Centro de Costos</a></td>
      </tr>
     </table>
    </div>

     <?php  }  ?>

  </div>


	<div id="tabHerram"  style="background-color:#2E6E9E">
    <?php  if ($_SESSION["ingreso"] == 'Si'){ ?>

		<div class = 'menuCol'>
		  <table width = '430' border = '0'>

		 	<tr>

		 	  <td><a href="index.php?controlador=zonas&accion=listarUbicaciones">Zona - Ubicaciones</a></td>

		 	</tr>

		 	<tr>

		 	  <td><a href="index.php?controlador=zonas&accion=listarSedes">Zona - Sedes</a></td>

		 	</tr>

		 	<tr>

		 	  <td><a href="index.php?controlador=despachos&accion=cargamasivarosen">Carga Masiva Rosen</a></td>

		 	</tr>

		 	<tr>
		 	  <td><a href="index.php?controlador=trabajadores&accion=procesosLoteTrabajador">Procesos por Lote</a></td>
		 	</tr>

      <tr>
        <td colspan = '2'><a href="index.php?controlador=contratos&accion=listarVacaciones" >Vacaciones</a></td>
      </tr>

		  <tr>
        <td colspan = '2'><a href="index.php?controlador=planillas&accion=listarLiquidacionesTrabajador" >Liquidaciones Trabajador</a></td>
      </tr>

		 	<tr>
        <td colspan = '2'><a href="index.php?controlador=vehiculos&accion=listarEficEsperadaSolesKm" >Eficiencias Esperadas</a></td>
      </tr>

		 	<tr>

		 	  <td>&nbsp;</td>

		 	</tr>
      <tr>
        <td>
        <table>
          <tr>
            <td width='135'>LT (no usar) </td>
            <td>
              <input type="text" name="txtLiquidTrabaj" id="txtLiquidTrabaj" class = 'trabajadoresAjax'  size = '40' >
              <img src="imagenes/btnAzul.png" width="10" name = "btnAzLiqTrab" id = "btnAzLiqTrab"
            onclick = "barrEnviar('index.php?controlador=trabajadores&accion=liquidarTrabajador')" />
            </td>
          </tr>
        </table>
        </td>
      </tr>		 

		 </table>

			

		</div>



		<div class = 'menuCol'>  

			

		</div>

     <?php } ?>

	</div>

	<div id="tabReportes"  style="background-color:#2E6E9E">

    <?php  if ($_SESSION["ingreso"] == 'Si'){ ?>

	  <div class = 'menuCol'>

		 <table  width = '430' border = '0'>

		 	<tr>

		 	  <td width = '135'>Histórico Descuentos</td>

		 	  <td>

		 	  	<input type="text" name="cmbTrabajadorHistBarr" id="cmbTrabajadorHistBarr" class = 'trabajadoresAjax' size = '40' >

		 	  	<img src="imagenes/btnAzul.png"  width="10" name = "btnAzTrabHistD" id = "btnAzTrabHistD" />

		 	  </td>

		 	</tr>

		 	<tr>

		 	  <td>Histórico Ocurrencias</td>

		 	  <td>

		 	  	<input type="text" name="cmbTrabajador2" id="cmbTrabajador2" class = 'trabajadoresAjax'  size = '40' >

		 	  	<img src="imagenes/btnAzul.png"  width="10" name = "btnAzTrabHistO" id = "btnAzTrabHistO" />
              </td>

		 	</tr>

		 	<tr>

		 	  <td>Histórico Trabajador</td>

		 	  <td>

		 	  	<input type="text" name="cmbTrabajador3ConsultaBarr" id="cmbTrabajador3ConsultaBarr" class = 'trabajadoresAjax'  size = '40' >

		 	  	<img src="imagenes/btnAzul.png"  width="10" name = "btnAzTrabHistT" id = "btnAzTrabHistT" />
        </td>

		 	</tr>
      <tr>
        <td>Prendas Entregad Trab.</td>
        <td>
          <input type="text" name="cmbTrabajPrendaBarr" id="cmbTrabajPrendaBarr"  class = 'trabajadoresAjax' size = '40' >
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzTrabPrenda" id = "btnAzTrabPrenda" />
        </td>
      </tr>
		 	<tr>
		 	  <td>Días Trabajados</td>
		 	  <td>
		 	  	 Fechas Ini 
                 <input id="txtFchIniDiasBarr" type="text" size="9" name="txtFchIniDiasBarr" class = 'calendario'>
                   Fin 
                 <input id="txtFchFinDiasBarr" type="text" size="9" name="txtFchFinDiasBarr" class = 'calendario'>
                 <img src="imagenes/btnAzul.png"  width="10" name = "btnAzDiasTrab" id = "btnAzDiasTrab" />
              </td>
		 	</tr>
      <tr>
        <td colspan = '2'><a href="index.php?controlador=despachos&accion=diasTrabPorQuincena">Días Trabajados por Quincena</a></td>
      </tr>

		 	<tr>
		 	  <td colspan = '2'><a href="index.php?controlador=trabajadores&accion=listarDescuentosPendientes">Descuentos Pendientes</a></td>
		 	</tr>
		 </table>
		</div>

		<div class = 'menuCol'>
		 <table  width = '430' border = '0'>
		   <tr>
		 	  <td width = '120'>Cambios de Aceite</td>
		 	  <td>
		 	  	Ini <input type="text" name="txtAceiteFchIniBarr" id="txtAceiteFchIniBarr" class = 'calendario' size="9">
		 	  	Fin <input type="text" name="txtAceiteFchFinBarr" id="txtAceiteFchFinBarr" class = 'calendario' size="9">
		 	  	<img src="imagenes/btnAzul.png"  width="10" name = "btnAzCmbAcei" id = "btnAzCmbAcei" />
		 	  </td>
		 	</tr>

      <tr>
        <td>Abastec. Combustible</td>
        <td>
          Ini <input type="text" name="txtFchAbIni" id="txtFchAbIni" class = 'calendario' size="9">
          Fin <input type="text" name="txtFchAbFin" id="txtFchAbFin" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzAbasCmb" id = "btnAzAbasCmb" />
        </td>
      </tr>
      <tr>
        <td>Detalle Combustible</td>
        <td>
          Ini<input type="text" name="txtFchIniComb" id="txtFchIniComb" class = 'calendario'  size="8">
          Fin<input type="text" name="txtFchFinComb" id="txtFchFinComb" class = 'calendario'  size="8">Placa<input type="text" name="txtPlacaComb" id="txtPlacaComb" size="7">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzDetCmb" id = "btnAzDetCmb" />
        </td>
      </tr>

		 	<tr>
		 	  <td>Mantenim. Formato1</td>
		 	  <td>
          Ini <input type="text" name="txtFchIniM1" id="txtFchIniM1" class = 'calendario' size="9">
          Fin <input type="text" name="txtFchFinM1" id="txtFchFinM1" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzMntForma1" id = "btnAzMntForma1" />
		 	  </td>
		 	</tr>
		 	<tr>
		 	  <td>Mantenim. Formato2</td>
		 	  <td>
          Ini <input type="text" name="txtFchIniM2Barr" id="txtFchIniM2Barr"  class = 'calendario' size="9">
          Fin <input type="text" name="txtFchFinM2Barr" id="txtFchFinM2Barr"  class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzMntForma2" id = "btnAzMntForma2" />
        </td>
		 	</tr>
		 	<tr>
		 	  <td>Hist. Alert. Mantenim.</td>
		 	  <td>
          Placa <input type="text" name="cmbPlaca" id="cmbPlaca" size="10">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzHistMant" id = "btnAzHistMant" />
        </td>
		 	</tr>
		 	<tr>
		 	  <td>Efic. por Despacho</td>
		 	  <td>
          Ini <input type="text" name="txtFchIniEfDes" id="txtFchIniEfDes" class = 'calendario' size="9">
          Fin <input type="text" name="txtFchFinEfDes" id="txtFchFinEfDes" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzCobranza" id = "btnAzEfDes" onclick = "barrEnviar('index.php?controlador=gerencial&accion=repoEficDespacho')" />
        </td>
		 	</tr>
		 </table>
		</div>

    <div class = 'menuCol'>
     <table  width = '430' border = '0'>
       <tr>
        <td width = '145'>Recorridos por Despacho</td>
        <td>
          Inicio <input type="text" name="txtRecorFchIniBarr" id="txtRecorFchIniBarr" class = 'calendario'  size="9">
          Fin <input type="text" name="txtRecorFchFinBarr" id="txtRecorFchFinBarr" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzRecor" id = "btnAzRecor" />
        </td>
      </tr>
      <tr>
        <td>Gastos por Unidad</td>
        <td>
          Inicio <input type="text" name="txtGtoFchIniBarr" id="txtGtoFchIniBarr" class = 'calendario' size="9">
          Fin <input type="text" name="txtGtoFchFinBarr" id="txtGtoFchFinBarr" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzGto" id = "btnAzGto" />
        </td>
      </tr>
      <tr>
        <td>Listado Gastos por Unidad</td>
        <td>
          Inicio <input type="text" name="txtDetGtoFchIniBarr" id="txtDetGtoFchIniBarr" class = 'calendario' size="9">
          Fin <input type="text" name="txtDetGtoFchFinBarr" id="txtDetGtoFchFinBarr" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzDetGto" id = "btnAzDetGto" 
          onclick = "barrEnviar('index.php?controlador=cc&accion=repoDetGtoxUnidad')" />
        </td>
      </tr>
      <tr>
        <td>Listado de Gastos</td>
        <td>
          Inicio <input type="text" name="txtDetGto2FchIniBarr" id="txtDetGto2FchIniBarr" class = 'calendario' size="9">
          Fin <input type="text" name="txtDetGto2FchFinBarr" id="txtDetGto2FchFinBarr" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzDetGto2" id = "btnAzDetGto2" onclick = "barrEnviar('index.php?controlador=cc&accion=repoDetGto')" />
        </td>
      </tr>
      <tr>
        <td colspan = '2'><a href="/gtcmoy/vistas/enviarReposGerencial.php?tipo=indPersonal&fchQuincena=0000-00-00&aux=data">Indicadores Personales</a></td>
      </tr>
      <tr>
        <td>Evolución de Cobranza</td>
        <td>
          Inicio <input type="text" name="txtCobranzaFchIniBarr" id="txtCobranzaFchIniBarr" class = 'calendario' size="9">
          Fin <input type="text" name="txtCobranzaFchFinBarr" id="txtCobranzaFchFinBarr" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzCobranza" id = "btnAzCobranza" onclick = "barrEnviar('index.php?controlador=gerencial&accion=repoEvolCobranza')" />
        </td>
      </tr>
      <tr>
      <td colspan = '2'><a href="index.php?controlador=gerencial&accion=repoAtrasosCobranza">Atrasos en Cobranza</a></td>
      </tr>
      <tr>
        <td>Efic. por Vehículo</td>
        <td>
          Tope <input type="text" name="txtFchTopeVeh" id="txtFchTopeVeh" class = 'calendario' size="9">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzCobranza" id = "btnAzEfDes" onclick = "barrEnviar('index.php?controlador=gerencial&accion=repoEficVehiculo')" />
        </td>
      </tr>
     </table>
    </div>
     <?php } ?>

	</div>


    <div id="tabReportes2"  style="background-color:#2E6E9E">
    <div class = 'menuCol'>
     <table  width = '430' border = '0'>
      <tr>
        <td colspan = '2'><a href="index.php?controlador=gerencial&accion=repoRentabilidadPorDespacho">Rentabilidad por Despacho</a></td>
      </tr>
      <tr>
        <td colspan = '2'><a href="index.php?controlador=trabajadores&accion=repoDeudasPendientes">Deudas pendientes del trabajador</a></td>
      </tr>
      <tr>
        <td colspan = '2'><a href="index.php?controlador=gerencial&accion=repoEficienciaVehiculo">Reporte de Eficiencia por vehiculo</a></td>
      </tr>
      <tr>
        <td colspan = '2'><a href="index.php?controlador=gerencial&accion=repoEficienciaVehiculo2">Reporte de Eficiencia Soles/Km por vehiculo</a></td>
      </tr>

     </table>
    </div>

    <div class = 'menuCol'>
    </div>     
  </div>

	<div id="tabGraficas"  style="background-color:#2E6E9E">
    <?php if ($_SESSION['ingreso'] == 'Si'){  ?>
	  <div class = 'menuCol'>
		 <table  width = '430' border = '0'>
		 	<tr>
		 	  <td><a href="grafRendimiento.php">Rendimiento Por Abastecimiento</a></td>
		 	</tr>
		 	<tr>
		 	  <td><a href="grafRendimientoPromedio.php">Rendimiento Promedio Mensual</a></td>
		 	</tr>
		 	<tr>
		 	  <td><a href="grafRendimientoPromedioTodos.php">Barras Rendimiento Promedio Mensual</a></td>
		 	</tr>
      <tr>
        <td><a href="index.php?controlador=vehiculos&accion=graficaPorGrupo">Gráfica Rendimiento 12 Meses</a></td>
      </tr>
		 </table>
		</div>

		<div class = 'menuCol'>
		 <table  width = '430' border = '0'>
      <td colspan="2">
          <a href="index.php?controlador=gerencial&accion=graficaEficienciaSolesKm">Gráfica Eficiencia Soles/Km</a>
        </td>
		 	<tr>
		 	  <td width = '126'>Rendición de Cuentas</td>
        <td>
          Liquidac.
          <input type="text" name="txtLiquidBarr" id="txtLiquidBarr" size="35">
          <img src="imagenes/btnAzul.png"  width="10" name = "btnAzLiquid" id = "btnAzLiquid" />
        </td>
        
		 	</tr>
		 	<tr>
		 	  <td></td>
		 	</tr>	
		 </table>
		</div>
    <?php } ?>
	</div>

	<div id="tabSegur"  style="background-color:#2E6E9E">
	  <div class = 'menuCol'>
    <?php if ($_SESSION['seguridad'] == 'Si'){  ?>
		  <table width = '430' border = '0'>
  		 	<tr>
  		 	  <td><a href="index.php?controlador=aplicacion&accion=listarusuario">Usuarios</a></td>
  		 	</tr>
        <tr>
          <td><a href="index.php?controlador=aplicacion&accion=listarusuarioOcurrencia">Usuarios Ocurrencias</a></td>
        </tr>
		   	<tr>
		   	  <td><a href="index.php?controlador=aplicacion&accion=configurarvariables">Configurar Variables</a></td>
		 	  </tr>
  		 	<tr>
  		 	  <td><a href="index.php?controlador=aplicacion&accion=listaralertasusuarios">Usuarios que reciben alertas</a></td>
  		 	</tr>
        <tr> 
          <td><a href="index.php?controlador=aplicacion&accion=listaralertasgerencialusuarios">Usuarios que reciben alertas gerenciales</a></td>
        </tr>
        <tr>
          <td><a href="index.php?controlador=aplicacion&accion=listarlog">Log de Acciones</a></td>
        </tr>   
		 </table>
   <?php } ?>
	  </div>
  </div>

  <div id="tabMantenimiento"  style="background-color:#2E6E9E">
    <div class = 'menuCol'>
      <table width = '430' border = '0' >
        <tr>
          <td style="padding: 2px;"><a href="index.php?controlador=mantenimiento&accion=listarServicios">Listado de Servicios</a></td>
        </tr>
        <tr>
          <td style="padding: 2px;"><a href="index.php?controlador=mantenimiento&accion=listarTalleres">Listado de Talleres</a></td>
        </tr>
        <tr>
          <td style="padding: 2px;"><a href="index.php?controlador=mantenimiento&accion=historialMantenimeinto">Historial de Mantenimiento</a></td>
        </tr>
        <tr>
          <td style="padding: 5px;"><a href="index.php?controlador=mantenimiento&accion=listarPlacasCheckList">Listado de Check List</a></td>
        </tr>
        <tr>
          <td style="padding: 3px;"><a href="index.php?controlador=mantenimiento&accion=listarRespuestasCheckList">Listado de Check List Respuestas</a></td>
        </tr>
     </table>
    </div>
  </div>

  <div id="tabLimpieza"  style="background-color:#2E6E9E">
    <div class = 'menuCol'>
      <table width = '430' border = '0' >
        <tr>
          <td style="padding: 3px;"><a href="index.php?controlador=limpieza&accion=listarCheckList">Listado de Check List Limpieza</a></td>
        </tr>
      </table>
    </div>
  </div>

  <div id="tabMesaAyuda"  style="background-color:#2E6E9E">
    <div class = 'menuCol'>
      <table width = '430' border = '0' >
        <tr>
          <td style="padding: 3px;"><a href="index.php?controlador=helpDesk&accion=listarHelpDesk">Help Desk</a></td>
        </tr>
      </table>
    </div>
  </div>

  <div id="tabCotizacion"  style="background-color:#2E6E9E">
    <div class = 'menuCol'>
      <table width = '430' border = '0' >
        <tr>
          <td style="padding: 3px;">
            <a href="index.php?controlador=cotizacion&accion=listarCotizaciones">Mostrar listado de cotizaciones</a>
          </td>
        </tr>
      </table>
    </div>
  </div>

  </th>
</tr>
</table>
</form>
</body>
</html>