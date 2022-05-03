<?php
include_once("pruebasphpPDO.php");

if ($_GET['opc'] == 'placa') echo json_encode(buscarPlaca($db,$_GET['term']));
else if ($_GET['opc'] == 'clienteCuenta') echo json_encode(buscarClienteCuenta($db,$_GET['term']));
else if ($_GET['opc'] == 'idCargadoCc') echo json_encode(buscarIdCargadoCc($db,$_GET['term']));
else if ($_GET['opc'] == 'tipoCuenta') echo json_encode(buscarTipoCuenta($db,$_GET['term']));
else if ($_GET['opc'] == 'trabajParaAuxiliar') echo json_encode(buscarTrabajParaAuxiliar($db,$_GET['term']));

?>
