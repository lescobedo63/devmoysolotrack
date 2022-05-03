<?php
//include_once("pruebasphp.php");
include_once("pruebasphpPDO.php");
//echo json_encode(buscar($_GET['term']));
echo json_encode(buscarCliente($db,$_GET['term']));
?>
