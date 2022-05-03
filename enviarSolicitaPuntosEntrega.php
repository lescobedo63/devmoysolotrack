<?php

  date_default_timezone_set('America/Lima');

    $cadjson3 = array(     

      "usuario"=> "lureta",

      "placa"=> "A2F-943",

      "cliente"=> "20337564373",

      "idProgramacion"=> "54829"

    );

  //echo Date("Y-m-d");



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

  <form name = "frm" id = "frm" method = 'POST'  action = 'indexMovil.php?controlador=movil&accion=enviarPuntosEntrega' >

	  <input type="text" name="txtValor01" size="11">

	  <input type='hidden' name= 'cadjson2' value = '<?php echo $cadjson4  ?>'>

	  <input type="submit" value="Enviar" name="btnEnviar"  >

</form>



</body>

</html>

