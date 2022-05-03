<?php



    $cadjson3 = array(

      "54837" => array(

        "ruta1" => array(

          "idPunto" => "19482",

          "nombreComprador" => "Nombre del punto",

          "provincia" => "Lima",

          "distrito" => "distrito1",

          "direccion" => "Direccion del punto",

          "nroGuiaPorte" => "",

          "estado" => "Entregado",

          "subestado" => "Entrega Satisfactoria",

          "tipo" => "Carga",

          "guiaCliente" => "",

          "horaLlegada" => "05:10",

          "horaSalida" => "05:20",

          "observacion" => "Punto de carga1",

          "ordenPunto" => "1",

          "photo" => "",

          "longitud" => "33.36854",

          "latitud" => "16.00"

        ),

        "accion" => 'editar')

    );




    $cadjson3 = array(

      "54837" => array(

        "ruta1" => array(

          "idPunto" => "19483",

          "nombreComprador" => "Nombre del Cliente",

          "provincia" => "Lima",

          "distrito" => "Comas",

          "direccion" => "Lima",

          "nroGuiaPorte" => "",

          "estado" => "Entregado",

          "subestado" => "Entrega Satisfactoria",

          "tipo" => "Descarga",

          "guiaCliente" => "1021662",

          "horaLlegada" => "05:50",

          "horaSalida" => "06:00",

          "observacion" => "Observacion",

          "ordenPunto" => "2",

          "photo" => "",

          "longitud" => "-15.3",

          "latitud" => "2.38"

        ),

        "accion" => 'editar')

    );


/*

    $cadjson3 = array(

      "54829" => array(

        "ruta1" => array(

          "idPunto" => "19466",

          "nombreComprador" => "MÓNICA GISELA TIRADO",

          "provincia" => "Lima",

          "distrito" => "Santiago de Sur",

          "direccion" => "LOMA REDONDA 193 DPTO 301",

          "nroGuiaPorte" => "",

          "estado" => "Entregado",

          "subestado" => "Entrega Satisfactoria",

          "tipo" => "Descarga",

          "guiaCliente" => "4069480",

          "horaLlegada" => "05:00",

          "horaSalida" => "05:30",

          "observacion" => "Otra Observación",

          "ordenPunto" => "3",

          "photo" => "",

          "longitud" => "12.6987452",

          "latitud" => "-5.698745"

        ),

        "accion" => 'editar')

    );


*/
    

/*

    $cadjson3 = array(

      "29592" => array(

        "ruta1" => array(

          "idPunto" => "98",

          "nombreComprador" => "GIOVANNA COCHACHI",

          "provincia" => "Lima",

          "distrito" => "Santiago de Sur",

          "direccion" => "CALLE EL VIÑEDO 186 Y EL MOSTO 186 DEPTO403",

          "nroGuiaPorte" => "",

          "estado" => "Entregado",

          "subestado" => "Entrega Satisfactoria",

          "tipo" => "Descarga",

          "guiaCliente" => "4069480",

          "horaLlegada" => "07:40",

          "horaSalida" => "08:00",

          "observacion" => "Otra Observación",

          "ordenPunto" => "4",

          "photo" => "",

          "longitud" => "25.385",

          "latitud" => "-70.00"

        ),

        "accion" => 'editar')

    );

    

    $cadjson3 = array(

      "29592" => array(

        "ruta1" => array(

          "idPunto" => "99",

          "nombreComprador" => "Juana Pérez",

          "provincia" => "Lima",

          "distrito" => "Lima Cercado",

          "direccion" => "Av. Arequipa 1234",

          "nroGuiaPorte" => "",

          "estado" => "Entregado",

          "subestado" => "Entrega Satisfactoria",

          "tipo" => "Descarga",

          "guiaCliente" => "234567",

          "horaLlegada" => "08:30",

          "horaSalida" => "08:50",

          "observacion" => "Otra Observación",

          "ordenPunto" => "5",

          "photo" => "",

          "longitud" => "",

          "latitud" => ""

        ),

        "accion" => 'editar')

    );



    $cadjson3 = array(

      "29592" => array(

        "ruta1" => array(

          "idPunto" => "100",

          "nombreComprador" => "Carlos Ramirez",

          "provincia" => "Lima",

          "distrito" => "Lima Cercado",

          "direccion" => "Jr. Washington 321",

          "nroGuiaPorte" => "",

          "estado" => "Entregado",

          "subestado" => "Entrega Satisfactoria",

          "tipo" => "Descarga",

          "guiaCliente" => "234567",

          "horaLlegada" => "09:30",

          "horaSalida" => "09:50",

          "observacion" => "Otra Observación",

          "ordenPunto" => "6",

          "photo" => "",

          "longitud" => "",

          "latitud" => ""

        ),

        "accion" => 'editar')

    );

    */

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



  <form name = "frm" id = "frm" method = 'POST'  action = 'indexMovil.php?controlador=movil&accion=guardarPuntoEntrega' >

	  <input type="text" name="txtEncab" size="11">

	  <input type='hidden' name= 'cadjson2' value = '<?php echo $cadjson4  ?>'>

	  <input type="submit" value="Enviar" name="btnEnviar"  >

</form>



</body>

</html>

