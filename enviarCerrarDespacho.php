<?php   


  $cadjson3 = array(

    "idProgramacion"=>"54837",

    "fechaFinCliente"=>"2022-04-12",

    "fechaFin"=>"2022-04-12",

    "fechaDespacho" => "2022-04-12",

    "horaInicio"=>"05:00:00",

    "horaInicioCliente"=>"05:10:00",

    "horaFinCliente"=>"17:00:00", 

    "horaFin"=>"17:20:00",

    "kmInicio"=>"646630",

    "kmInicioCliente"=>"646640",

    "kmFinCliente"=>"646730",

    "kmFin"=>"646740",

    "lugarFinCliente"=>"UltCliente",

    "puntoOrigen"=>"0004|0049",

    "usuario"=>"lescobedo",

    "guiasMoy"=>"123-456 , 987-456",

    "observacion"=>"Esto es una observación"

  );  





  echo "<pre>";

	print_r($cadjson3);

  echo "</pre>";



  $cadjson4 = json_encode($cadjson3, JSON_PRETTY_PRINT);



  print_r($cadjson4);

?>



<!DOCTYPE html>

<html>

<head>

  <script type="text/javascript">



  </script>



	<title></title>

</head>

<body>



  <form name = "frm" id = "frm" method = 'POST'  action = 'indexMovil.php?controlador=movil&accion=cerrarDespacho' >

	  <input type="text" name="txtValor01" size="11">

	  <input type='hidden' name= 'cadjson2' value = '<?php echo $cadjson4 ?>'>

	  <input type="submit" value="Enviar" name="btnEnviar"  >

  </form>



</body>

</html>

