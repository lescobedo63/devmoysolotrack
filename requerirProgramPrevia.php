<?php



  $cadjson3 = array(

        "fchDespacho" =>"2022-04-10",

        "usuarioAsignado" => "lureta"

      );




  echo "<pre>";

	print_r($cadjson3);

  echo "</pre>";



  $cadjson4 = json_encode($cadjson3);



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



  <form name = "frm" id = "frm" method = 'POST'  action = 'indexMovil.php?controlador=movil&accion=solicitarProgramacion' >

  Programacion

	  <input type="text" name="txtValor01" size="11">

	  <input type='hidden' name= 'cadjson2' value = <?php echo $cadjson4  ?>>

	  <input type="submit" value="Enviar" name="btnEnviar"  >

</form>



</body>

</html>

