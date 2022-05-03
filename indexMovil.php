<?php

//if (isset($_SESSION["usuario"])) {
//$usuario = $_SESSION["usuario"];
//if ($usuario <> ""){
//Primero algunas variables de configuracion
  require_once './librerias/conectar.php';
  //La carpeta donde buscaremos los controladores
  $carpetaControladores = "controladores/";

  //Si no se indica un controlador, este es el controlador que se usar�
  $controladorPredefinido = "items";

  //Si no se indica una accion, esta accion es la que se usar�
  $accionPredefinida = "listar";

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
    
//}
//} else {

//  header('Location: moy.htm');
//}
?>
