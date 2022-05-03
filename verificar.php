<?php
  session_start();

  require_once './librerias/conectar.php';
  require_once './modelos/aplicacionModelo.php';
  
  $db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia);
  //Busca si existe el usuario
  $fecha=Date("Y-m-d");
  $usuario = $_POST['idUser'];
  $pass = $_POST['pass'];

  $consulta = $db->prepare("SELECT * FROM usuario WHERE idUsuario LIKE :iduser AND (tipoUsuario IS NULL OR tipoUsuario != 'Movil') Limit 1 ");
  $consulta->bindParam(':iduser',$usuario);
  //$consulta->bindParam(':pass',$pass);
	$consulta->execute();
  $fila = $consulta->fetch();
  if (empty($fila['idUsuario']) || $fila['idUsuario'] != $usuario   ){
    echo "Lo lamento, hay un error en su usuario";
  } else {
    $dbHash = $fila['contrasenia'];
    //echo "FILA 1".$dbHash;
    if (crypt($pass, $dbHash) == $dbHash){
      $fchVenc = $fila['fchVencimiento'];
      //echo $fchVenc;
      if ($fchVenc >= Date("Y-m-d")){
        echo 'El usuario ha sido autenticado correctamente';

        if($fila['invitado'] == 'Si'){
          echo "<br>Usted solo puede ingresar a trackmoy. Corrija su direción URL.";

        } else {
        $_SESSION[$usuario."MoyPermisos"] = buscarUsuPermisos($db, $usuario);

        /*echo "<pre>";
        print_r($_SESSION);
        echo "</pre>";
        */

        marcarVehicMoy($db);    //esto es lo nuevo
        $_SESSION["usuario"] = $usuario;
        $_SESSION["admin"]   = isset($fila['admin'])?$fila['admin']:"No";
        $_SESSION["edicion"] = isset($fila['edicion'])?$fila['edicion']:"No";
        $_SESSION["ingreso"] = isset($fila['ingreso'])?$fila['ingreso']:"No";
        $_SESSION["planilla"]  = isset($fila['planilla'])?$fila['planilla']:"No";
        $_SESSION["plame"]  = isset($fila['plame'])?$fila['plame']:"No";
        $_SESSION["admCostos"] = isset($fila['admCostos'])?$fila['admCostos']:"No";
        $_SESSION["admArt"] = isset($fila['admArt'])?$fila['admArt']:"No";
        $_SESSION["admPlanilla"] = isset($fila['admPlanilla'])?$fila['admPlanilla']:"No";
        $_SESSION["admUnif"] = isset($fila['admUnif'])?$fila['admUnif']:"No";
        $_SESSION["admMovil"] = isset($fila['admMovil'])?$fila['admMovil']:"No";
        $_SESSION["cargaDespachos"] = isset($fila['cargaDespachos'])?$fila['cargaDespachos']:"No";
        $_SESSION["seguridad"] = isset($fila['seguridad'])?$fila['seguridad']:"No";
        $_SESSION["dni"] =  isset($fila['dni'])?$fila['dni']:"No";
        $_SESSION["email"] =  isset($fila['email'])?$fila['email']:"No";
        $auxiliares = array();
        $_SESSION["auxiliares"] = $auxiliares;
        $_SESSION["auxiliaresAdic"] = $auxiliares;
        $_SESSION['codigo'] = $_SESSION['fchFin'] = $_SESSION['placa'] =  $_SESSION['conductor'] = $_SESSION['guiaPorte'] = $_SESSION['ruc'] = $_SESSION['cuenta'] = $_SESSION['tipoCuenta'] = $_SESSION['liquid'] = $_SESSION['docLiq'] ='';
        $controlador = 'aplicacion';
        $accion = 'verprincipal';

        //Para manejo de Clientes CREO QUE ESTO NO SE VA A USAR
        $_SESSION['cliente'] = "";
        $_SESSION['msj'] = "";
        $_SESSION['colorMsj'] = 'verde';
        $consulta = $db->prepare('SELECT `usuclientecuenta`.idcliente, `usuclientecuenta`.tipoServicio FROM `usucliente` LEFT JOIN `usuclientecuenta` ON `usucliente`.usuario = `usuclientecuenta`.usuario AND `usucliente`.idcliente = `usuclientecuenta`.idcliente WHERE `usucliente`.usuario =  :iduser');
        $consulta->bindParam(':iduser',$usuario);
        $consulta->execute();
        $itemsCliente = $consulta->fetchAll();
        $nroItems = count($itemsCliente);
        if ($nroItems >0 ){
          $auxCuentasCli = array();   
          foreach ($itemsCliente as $item) {
            $auxCuentasCli[] = $item['tipoServicio'];
            $_SESSION['cliente'] = $item['idcliente'];
          }
          $_SESSION['cuentas'] = $auxCuentasCli;
        }

        ?>

    <html>
      <head>
        <link rel =stylesheet href="librerias/estilos.css" type ="text/css">
        <meta name="generator" content="PSPad editor, www.pspad.com">
        <meta HTTP-EQUIV="REFRESH" content="0; url=index.php?controlador=<?php echo $controlador;  ?>&accion=<?php echo $accion  ?>">
        <title>
        </title>
      </head>
      <body>
        <?php
        }

       ?>
<?php
      
    } else {
       echo "Su usuario ha caducado";
    }

   }  else
      die('Mal Password');
  }     
?>    
  </body>
</html>
