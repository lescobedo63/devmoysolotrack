<?php
require_once './librerias/conectar.php';

$db = new PDO('mysql:host=' . $servidor . ';dbname=' . $bd, $usuario, $contrasenia,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

/*function buscar($db,$dato){

	$consulta = $db->prepare("SELECT `rznSocial` FROM `cliente` WHERE `rznSocial` like '%$dato%'");
	//$consulta->bindParam(':dato',$dato);
	$consulta->execute();
	return $consulta->fetchAll();
	
}*/
function buscarTipoItem($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT DISTINCT `tipoitem` FROM `prestamodetalle` WHERE `tipoitem` LIKE '%$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['tipoitem']);		
	}
	return $datos;
}

function buscarTipoOcurrencia($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT DISTINCT `tipoOcurrencia` FROM `ocurrenciaconsulta` WHERE `tipoOcurrencia` LIKE '%$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['tipoOcurrencia']);		
	}
	return $datos;
}

function buscar($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT `rznSocial` FROM `cliente` WHERE `rznSocial` LIKE '%$dato%' "); 
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['rznSocial']);		
	}
	return $datos;
}


function buscarTrabajador($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT concat(`idTrabajador`,'-',`apPaterno`,' ',`apMaterno`,', ',`nombres`) as dato FROM `trabajador` as dato WHERE  `apPaterno` LIKE '$dato%' OR `idTrabajador` LIKE '$dato%' OR `nombres` LIKE '$dato%'");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}

function buscarTrabajParaAuxiliar($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT concat(`idTrabajador`,'-',`apPaterno`,' ',`apMaterno`,', ',`nombres`, ' ', estadoTrabajador, ' ', tipoTrabajador) as dato FROM `trabajador` as dato WHERE ( `apPaterno` LIKE '$dato%' OR `idTrabajador` LIKE '$dato%' OR `nombres` LIKE '$dato%' OR `tipoTrabajador` LIKE '$dato%' ) AND estadoTrabajador = 'Activo' ORDER BY estadoTrabajador ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}

function buscarCategTrabajador($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT concat(`idTrabajador`,'-',if(`categTrabajador` = '4ta','*-' ,'' ),`apPaterno`,' ',`apMaterno`,', ',`nombres`) as dato FROM `trabajador` as dato WHERE  `apPaterno` LIKE '$dato%' OR `idTrabajador` LIKE '$dato%' OR `nombres` LIKE '$dato%'");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}


function buscarConductor($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT concat(`idTrabajador`,'-',`apPaterno`,' ',`apMaterno`,', ',`nombres`) as dato FROM `trabajador` as dato WHERE `tipoTrabajador` = 'conductor'  AND `apPaterno` LIKE '$dato%' OR `idTrabajador` LIKE '$dato%' OR `nombres` LIKE '$dato%'");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}


function buscarTodo($db){
	$consulta = $db->prepare("SELECT `rznSocial` FROM `cliente`");
	//$consulta->bindParam(':dato',$dato);
	$consulta->execute();
	return $consulta->fetchAll();
	
}

function buscarCliente($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT concat(`idRuc`,'-',`nombre`) as dato FROM `cliente` WHERE `idRuc` like '$dato%' OR `nombre` like '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}


function buscarCuenta($db,$dato){
  $datos = array();  
	//$consulta = $db->prepare("SELECT `tipoServicio` as dato FROM `clientecuenta` WHERE `tipoServicio` like '$dato%' GROUP BY `tipoServicio`");

	$consulta = $db->prepare("SELECT `tipoServicio` as dato FROM `clientecuenta` WHERE `tipoServicio` like '$dato%' GROUP BY `tipoServicio` UNION SELECT `nombreCuenta` as dato FROM `clientecuentanew` WHERE `nombreCuenta` like '$dato%' GROUP BY `nombreCuenta` ");



	
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarPlaca($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT `idPlaca` AS dato FROM `vehiculo` WHERE `idPlaca`  like '$dato%' ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarResponsable($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT concat(`idTrabajador`,'-',`apPaterno`,' ',`apMaterno`,', ',`nombres`) as dato FROM `trabajador` as dato WHERE ( `apPaterno` LIKE '$dato%' OR `idTrabajador` LIKE '$dato%' OR `nombres` LIKE '$dato%') AND `manejaLiquidacion` = 'Si' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarPropietario($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT DISTINCT `propietario` AS dato FROM `vehiculo` WHERE `propietario`  like '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarCcProveedor($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT concat(`idProveedor`,'-',`nombProveedor`) as dato FROM `ccproveedor` WHERE `idProveedor` like '$dato%' OR `nombProveedor` like '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}


function buscarMovDescrip($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT `descripcion` AS dato FROM `ccmovdescripinteligente` WHERE `descripcion`  like '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;

}

function buscarNroDocLiq($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT `nroDocLiq` AS dato FROM `docpagotercero` WHERE `nroDocLiq`  like '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}


function buscarDocPagoTercero($db,$dato){
  $datos = array();  
	$consulta = $db->prepare("SELECT `docPagoTercero` AS dato FROM `docpagotercero` WHERE `docPagoTercero`  like '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarArticuloDescrip($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT `descripcion` AS dato FROM `articulo` WHERE `descripcion`  like '%$dato%' ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
  foreach($todo as $item){
    $datos[] = array("value" => $item['dato']);
  }
  return $datos;
}

function buscarArticuloIdDescripUnif($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT concat(`idArt`,'-', `descripcion`) AS dato FROM `articulo` WHERE `descripcion`  like '%$dato%' AND auxSubgrupo = 'UNIFORMES' ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
  foreach($todo as $item){
    $datos[] = array("value" => $item['dato']);
  }
  return $datos;
}

function buscarUbicacion($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT concat(`idUbicacion`,'-', `descripcion`) as dato FROM `ubicacion` WHERE `idUbicacion` like '$dato%' OR `descripcion` like '$dato%' ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
  foreach($todo as $item){
    $datos[] = array("value" => $item['dato']);
  }
  return $datos;
}

function buscarZona($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT concat(`idZona`,'-', `descripcion`) as dato FROM `ubizona` WHERE `idZona` like '$dato%' OR `descripcion` like '$dato%' ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
  foreach($todo as $item){
    $datos[] = array("value" => $item['dato']);
  }
  return $datos;
}



function buscarCcProveedorJe($db){ 
  $datos = array();  
  $consulta = $db->prepare("SELECT `idProveedor`, `nombProveedor` FROM `ccproveedor` ");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  foreach($todo as $item){
  	$idProveedor = $item['idProveedor'];
  	$nombProveedor = $item['nombProveedor'];
  	$id = "$idProveedor|$nombProveedor";
    $datos[$id] = $nombProveedor;
  }
  return $datos;
}

function buscarZonaJe($db){
 $datos = array();  
  $consulta = $db->prepare("SELECT `idZona`, `descripcion` FROM `ubizona`");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  foreach($todo as $item){
  	$idZona = $item['idZona'];
  	$descrip = $item['descripcion'];
  	$id = "$idZona|$descrip";
    $datos[$id] = $descrip;
  }
  return $datos;
}

function buscarTipoCompJe($db){
  $datos = array();  
  $consulta = $db->prepare("SELECT `idTipoComp`, `descripcion` FROM `ccmovimtipocomprob`");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  foreach($todo as $item){
  	$tipoComp = $item['idTipoComp'];
  	$descrip = $item['descripcion'];
  	$descCorto = substr($item['descripcion'],0,15);
  	$id = "$tipoComp|$descCorto";
    $datos[$id] = $descrip;
  }
  return $datos;
}

function buscarItemKardex($db,$dato){
  $datos = array();
  $consulta = $db->prepare("SELECT concat(`idArt`,'-',`descripcion`) as dato FROM `articulo` as dato WHERE auxSubGrupo != 'UNIFORMES' AND ( `idArt` LIKE '$dato%' OR `descripcion` LIKE '$dato%') ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
  foreach($todo as $item){
    $datos[] = array("value" => $item['dato']);
  }	
  return $datos;
}


function buscarLiquidacion($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT  liquidacion.`idTrabajador`, concat(`nroLiquidacion`,'-(Pers:', `nroLiquidPersonal`,')-', nombres,' ', apPaterno,' ', apMaterno, '-', fchLiquidacion,'-',estadoLiquid) AS dato FROM `liquidacion`, trabajador WHERE `liquidacion`.idTrabajador = `trabajador`.idTrabajador  AND (`nroLiquidacion` LIKE '$dato%' OR liquidacion.idTrabajador LIKE '$dato%' OR apPaterno LIKE '$dato%' OR nombres LIKE '$dato%'  ) ORDER BY `nroLiquidacion` DESC");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarPrenda($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT identificador AS dato FROM `auxiliar`  WHERE `auxiliar`.tipo = 'UNF' AND `identificador` LIKE '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}


function buscarFeriado($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT  `descripcion` AS dato FROM `feriados` WHERE descripcion LIKE '%$dato%'");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}

function buscarSubGrupoArt($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT DISTINCT `auxSubgrupo` AS dato  FROM `articulo` WHERE auxSubgrupo LIKE '%$dato%'");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}

function buscarPlacaJe($db){
  $datos = array();  
  $consulta = $db->prepare("SELECT `idPlaca` FROM `vehiculo` WHERE estado = 'activo' ");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  foreach($todo as $item){
  	$id = $item['idPlaca'];
    $datos[$id] = $id;
  }
  return $datos;
}

function buscarConductorJe($db){
  $datos = array();  
  $consulta = $db->prepare("SELECT `idTrabajador`, concat(apPaterno,' ',apMaterno,', ',nombres) AS nombCompleto FROM `trabajador` WHERE  (tipoTrabajador = 'Conductor' OR tipoTrabajador = 'Coordinador') AND  estadoTrabajador = 'activo' ORDER BY apPaterno, apMaterno, nombres ");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  $datos['-'] = '-';
  foreach($todo as $item){
    $idTrab = $item['idTrabajador'];
  	$descrip = $item['nombCompleto'];
  	//$descCorto = substr($item['nombCompleto'],0,25);
  	$id = substr("$idTrab-$descrip",0,30);
    
    $datos[$id] = $id;
  }
  return $datos;
}

function buscarAuxiliarJe($db){
  $datos = array();  
  $consulta = $db->prepare("SELECT `idTrabajador`, concat(apPaterno,' ',apMaterno,', ',nombres) AS nombCompleto FROM `trabajador` WHERE estadoTrabajador = 'activo' ORDER BY apPaterno, apMaterno, nombres ");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  $datos[''] = '';
  foreach($todo as $item){
    $idTrab = $item['idTrabajador'];
  	$descrip = $item['nombCompleto'];
  	//$descCorto = substr($item['nombCompleto'],0,25);
  	$id = substr("$idTrab-$descrip",0,30);
    
    $datos[$id] = $id;
  }
  return $datos;
}

function buscarCuentaJe($db){
  $datos = array();  
  $consulta = $db->prepare("SELECT concat(idCliente,'|',`tipoServicio`) AS tipoServicio FROM `clientecuenta` WHERE estadoCuenta = 'activo'");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  $datos[''] = '';
  foreach($todo as $item){
  	$id = $item['tipoServicio'];
    $datos[$id] = $id;
  }
  return $datos;
}

function buscarProvVehiJe($db){
  $datos = array();  
  $consulta = $db->prepare("SELECT concat(documento,'-',nombreCompleto) AS provVehi FROM `vehiculodueno` ORDER BY nombreCompleto ");
  $consulta->execute();
  $todo = $consulta->fetchAll();
  $datos[''] = '';
  foreach($todo as $item){
  	$id = $item['provVehi'];
    $datos[$id] = $id;
  }
  return $datos;
}


function buscarClienteCuenta($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT concat(cliente.nombre,'|',clientecuenta.tipoServicio,'|',cliente.idRuc) AS dato FROM `cliente`, clientecuenta WHERE cliente.idRuc = clientecuenta.idCliente AND (cliente.idRuc LIKE '$dato%' OR clientecuenta.tipoServicio LIKE '%$dato%' OR cliente.nombre LIKE '$dato%' ) ");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

function buscarIdCargadoCc($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT concat(`idTrabajador`,'|',`apPaterno`,' ',`apMaterno`,', ',`nombres`) as dato FROM `trabajador` as dato WHERE  `apPaterno` LIKE '$dato%' OR `idTrabajador` LIKE '$dato%' OR `nombres` LIKE '$dato%'
		UNION
		SELECT concat(`idPlaca`,'|',`estado`,' ',`rznSocial`) as dato FROM `vehiculo` WHERE idPlaca LIKE '$dato%'  OR `rznSocial` LIKE '$dato%'  OR `estado` LIKE '$dato%'
		");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}

function buscarProveedTercero($db,$dato){
	$datos = array();
	$consulta = $db->prepare("SELECT concat(`documento`,'-', `tipoDocumento`,'-', `nombreCompleto`) AS dato  FROM `vehiculodueno` WHERE  `documento` LIKE '$dato%' OR `nombreCompleto` LIKE '$dato%' ");
	$consulta->execute();
	$todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}	
	return $datos;
}

function buscarTipoCuenta($db,$dato){
  $datos = array();  
  $consulta = $db->prepare("SELECT tipoCuenta As dato FROM `clientecuentanew` WHERE tipoCuenta  LIKE '%$dato%' GROUP BY tipoCuenta");
  $consulta->execute();
  $todo = $consulta->fetchAll(PDO::FETCH_ASSOC);
	foreach($todo as $item){
	  $datos[] = array("value" => $item['dato']);
	}
	return $datos;
}

?>
