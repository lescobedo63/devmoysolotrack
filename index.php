<?php
session_start();
?>
<html>
<head>
  
  <link href='http://inversionesmoy.com.pe/gtcmoy/imagenes/moy.ico' rel='shortcut icon' >

  <script src="librerias/jquery1.10/jquery-1.10.2.min.js"></script>

  
  <script src="librerias/jquery1.10/jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="librerias/timepicker/jquery-ui-timepicker-addon.min.js"></script>

  <link rel="stylesheet" href="librerias/jquery1.10/jquery-ui-1.10.3.custom/css/redmond/jquery-ui-1.10.3.custom.min.css">

  <!-  Esta parte es para el jqgrid  ->
  <script src="librerias/jqGrid-master/js/i18n/grid.locale-es.js" type="text/javascript"></script>
  <script src="librerias/jqGrid-master/js/jquery.jqgrid.min.js" type="text/javascript"></script>
  <!-  Fin de esta parte es para el jqgrid  ->
  
  <!-  Esta parte es para el tooltip      ->

  <link rel="stylesheet" href="librerias/cluetip/jquery.cluetip.css" type="text/css" />  
  <link rel="stylesheet" href="demo.css" type="text/css" />
  <script src="librerias/cluetip/jquery.cluetip.min.js" type="text/javascript"></script>
  <script src="demo.js" type="text/javascript"></script>
  <!-  Fin de esta parte es para el tooltip   ->
  <script language="JavaScript" type="text/javascript" src="librerias/varios.js"></script>

   <!- Sweetalert 2 ->
  <script src="librerias/sweetalert2v7_1_2/sweetalert2.all.js"></script>
 

  <link rel =stylesheet href="librerias/estilos.css" type ="text/css">

  <style type="text/css">

  </style>
  
  <script type="text/javascript">
    $(document).ready(    
    );

</script>

</head>
</html>

<?php 
ini_set("default_charset", "");

if (isset($_SESSION["usuario"])) {
$usuario = $_SESSION["usuario"];
if ($usuario <> ""){
   //  echo "Negocio : ".$negocio;
//Primero algunas variables de configuracion
  require_once './librerias/conectar.php';
  //La carpeta donde buscaremos los controladores
  $carpetaControladores = "controladores/";

  //Si no se indica un controlador, este es el controlador que se usará
  $controladorPredefinido = "aplicacion";

  //Si no se indica una accion, esta accion es la que se usará
  $accionPredefinida = "verificar";

  if(! empty($_GET['controlador']))
      $controlador = $_GET['controlador'];
  else
      $controlador = $controladorPredefinido;

  if(! empty($_GET['accion']))
      $accion = $_GET['accion'];
  else
      $accion = $accionPredefinida;
  //Ya tenemos el controlador y la accion
  //Formamos el nombre del fichero que contiene nuestro controlador
  $controlador = $carpetaControladores . $controlador . 'Controlador.php';
  //Incluimos el controlador o detenemos todo si no existe
  if(is_file($controlador)){
    require_once $controlador;
    
 } else {
     header('Location: moy.htm');
     //die('El controlador no existe - 404 not found');
 } 
  //Llamamos la accion o detenemos todo si no existe

  if(is_callable($accion))
      $accion();
  else {
    header('Location: moy.htm');
    //die('La accion no existe - 404 not found');
  } 
}
} else {
  header('Location: moy.htm');
}
?>
