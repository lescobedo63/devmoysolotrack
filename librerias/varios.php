<?php


function codificarPass($usuario,$pass)	//nombre de la base de datos que se pasa como parámetro
{
   //Aqui debe ir el codigo de codificacion
   return $pass;
}

function ObtenerOpciones($tabla,$campo){
  //$qry = "SHOW COLUMNS FROM ".$Tabla." LIKE '".$Campo."'";
  $qry = "SHOW COLUMNS FROM $tabla LIKE '$campo'";
  $query = mysql_query($qry);
  // Creamos un Array con el resultado de la consulta
  $result = mysql_fetch_array($query);
  $result = explode("','",preg_replace("/(enum|set)\('(.+?)'\)/","\\2",$result[1]));
	//echo $result;
  return $result;
}


function difDias($date1,$date2){
  if (empty($date1) or ($date1 == '0000-00-00')) {$date1 = Date("Y-m-d");}
  if (empty($date2) or ($date2 == '0000-00-00')) {$date2 = Date("Y-m-d");}
  $segs = strtotime($date1)-strtotime($date2);
  $dDias = intval($segs/86400);
  return $dDias;
}

function nroDias($mesFch,$anhioFch){
  switch ($mesFch) {
    case "01":case "03":case "05":case "07": case "08":case "10":case "12":
      $nroDias = 31;
    break;
    case "04":case "06":case "09": case "11":
      $nroDias = 30;
    break;
    case "02": if ($anhioFch % 4 == 0)
                 $nroDias = 29;
               else
                 $nroDias = 28;   
    break;  
  }
  return $nroDias;
}

function restaDias($nroDias){
  return date('Y-m-d',time()-($nroDias*24*60*60));
}  


 
/*
function restahhmmss($inicio, $fin){
  if (strtotime($fin) > strtotime($inicio))  
    $dif=date("H:i:s", strtotime("00:00:00") + strtotime($fin) - strtotime($inicio) );
  else
    $dif = "00:00:00";  
  return $dif;
}*/

function restahhmmss($inicio, $fin){
  if (strtotime($fin) > strtotime($inicio)){
    $dif=strtotime($fin) - strtotime($inicio) ;
    $hra = floor($dif/3600);
    $min = floor(($dif % 3600 )/60 );
    $hra = substr("00".$hra,-2);
    $min = substr("00".$min,-2);
    $dif = $hra.":".$min.":00";
  }
  else
    $dif = "00:00:00";  
  return $dif;
}

function horasEnDecimal($hora) {
  $desglose=explode(":", $hora);
  $dec=$desglose[0]+$desglose[1]/60;
  return $dec;
}

function decimalAHoras($dec){
  $enSegundos = $dec*3600;
  $horas = intval ($enSegundos /3600);
  $residuo = $enSegundos %3600;
  $minutos = intval ($residuo /60);
  $segundos = $enSegundos %60;
  if ($segundos > 0.1) $minutos++;
  return $horas.' hras, '.$minutos.' mins';
}

function difEnHorasDecim($hra1,$hra2){
  if ($hra2 > $hra1){ 
    $aux1 = explode(":",$hra1);
    $aux2 = explode(":",$hra2);
    $segundos1 = 3600*$aux1[0] + 60*$aux1[1] + $aux1[2];
    $segundos2 = 3600*$aux2[0] + 60*$aux2[1] + $aux2[2];
    $dif = ($segundos2 - $segundos1)/3600;
  } else
    $dif = 0;
  return $dif; 
}


function correDias($fecha,$nroDias){
  //En positivo avanza días, en negativo retrocede días.
  return date('Y-m-d',strtotime($fecha)+($nroDias*24*60*60));
}



function calcular_tiempo_trasnc($hora1,$hora2){
  $separar[1]=explode(':',$hora1);
  $separar[2]=explode(':',$hora2);
  $total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1];
  $total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1];
  $total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2];
  if ($total_minutos_trasncurridos<=0) return 0 ;
  if($total_minutos_trasncurridos<=59) return( "00:".$total_minutos_trasncurridos);
  else if($total_minutos_trasncurridos>59){
    $HORA_TRANSCURRIDA = floor($total_minutos_trasncurridos/60);
    if($HORA_TRANSCURRIDA<=9) $HORA_TRANSCURRIDA='0'.$HORA_TRANSCURRIDA;
    $MINUITOS_TRANSCURRIDOS = $total_minutos_trasncurridos%60;
    if($MINUITOS_TRANSCURRIDOS<=9) $MINUITOS_TRANSCURRIDOS='0'.$MINUITOS_TRANSCURRIDOS;
    return ($HORA_TRANSCURRIDA.':'.$MINUITOS_TRANSCURRIDOS);
  } 
}

function nroLetras($nro){
  $letras = "";
  
  $dmil = (int)($nro/10000);
  $mil  = (int)($nro%10000/1000);
  $cen  = (int)($nro%1000/100);
  $dec  = (int)($nro%100/10);
  $uni  = $nro%10;
  $aux = (string) $nro;
  $decimal = strpos( $aux, "." )>0?substr(substr( $aux, strpos( $aux, "." )+1,2)."0",0,2):"00";
  //echo "decimal $decimal";
  if($dmil <> 0){
    switch($dmil){
      case 1: 
        switch($mil){
          case 0: $letras .= "diez";
          break;
          case 1: $letras .= "once";
          break;
          case 2: $letras .= "doce";
          break;
          case 3: $letras .= "trece";
          break;
          case 4: $letras .= "catorce";
          break;
          case 5: $letras .= "quince";
          break;
          case 6:case 7:case 8:case 9: $letras .= "dieci";
          break;
        }
      break;
      case 2: if ($mil == 0 )  $letras .= "veinte";
              else  $letras .= "veinti";
      break;
      case 3: $letras .= "treinta";
      break;
      case 4: $letras .= "cuarenta";
      break;
      case 5: $letras .= "cincuenta";
      break;
      case 6: $letras .= "sesenta";
      break;
      case 7: $letras .= "setenta";
      break;
      case 8: $letras .= "ochenta";
      break;
      case 9: $letras .= "noventa";
      break;   
    }
    //if ($mil == 0) $letras .= " mil "; //if ($mil == 0 OR $dmil == 1 ) $letras .= " mil "; 
    if ($mil >= 0 && $mil <= 5) $letras .= " mil ";
    else if ($dmil > 2) $letras .= " y ";  
  
  }
  
  
  if($mil <>0){
    switch($mil){
      case 1: if($dmil <> 1) $letras .= "un mil";
      break;
      case 2: if($dmil <> 1) $letras .= "dos mil";
      break;
      case 3: if($dmil <> 1) $letras .= "tres mil";
      break;
      case 4: if($dmil <> 1) $letras .= "cuatro mil";
      break;
      case 5: if($dmil <> 1) $letras .= "cinco mil";
      break;
      case 6: $letras .= "seis mil";
      break;
      case 7: $letras .= "siete mil";
      break;
      case 8: $letras .= "ocho mil";
      break;
      case 9: $letras .= "nueve mil";
      break;
    }
    if($cen <>0 or  $dec <> 0 or $uni <> 0) $letras .= " ";  
  }
  
  if ($cen <> 0){
    switch($cen){
      case 1: if ($dec == 0 AND $uni == 0 )$letras .= "cien";
              else $letras .= "ciento";
      break;
      case 2: $letras .= "doscientos";
      break;
      case 3: $letras .= "trescientos";
      break;
      case 4: $letras .= "cuatrocientos";
      break;
      case 5: $letras .= "quinientos";
      break;
      case 6: $letras .= "seiscientos";
      break;
      case 7: $letras .= "setecientos";
      break;
      case 8: $letras .= "ochocientos";
      break;
      case 9: $letras .= "novecientos";
      break;
    }
    if($dec <> 0 or $uni <> 0) $letras .= " "; 
  }
  
  if ($dec <> 0){
    switch($dec){
      case 1: 
        switch($uni){
          case 0: $letras .= "diez";
          break;
          case 1: $letras .= "once";
          break;
          case 2: $letras .= "doce";
          break;
          case 3: $letras .= "trece";
          break;
          case 4: $letras .= "catorce";
          break;
          case 5: $letras .= "quince";
          break;
          case 6:case 7:case 8:case 9: $letras .= "dieci";
          break;
        }
      break;
      case 2: if ($uni == 0 )  $letras .= "veinte";
              else  $letras .= "veinti";
      break;
      case 3: $letras .= "treinta";
      break;
      case 4: $letras .= "cuarenta";
      break;
      case 5: $letras .= "cincuenta";
      break;
      case 6: $letras .= "sesenta";
      break;
      case 7: $letras .= "setenta";
      break;
      case 8: $letras .= "ochenta";
      break;
      case 9: $letras .= "noventa";
      break;   
    }
    if ($uni <> 0 AND $dec > 2 ) $letras .= " y ";  
   } 
  switch($uni){
    case 1: if ($dec <> 1) $letras .= "uno";
    break;
    case 2: if ($dec <> 1) $letras .= "dos";
    break;
    case 3: if ($dec <> 1) $letras .= "tres";
    break;
    case 4: if ($dec <> 1) $letras .= "cuatro";
    break;
    case 5: if ($dec <> 1) $letras .= "cinco";
    break;
    case 6: $letras .= "seis";
    break;
    case 7: $letras .= "siete";
    break;
    case 8: $letras .= "ocho";
    break;
    case 9: $letras .= "nueve";
    break;  
  }
  $letras .= " y $decimal/100 Nuevos Soles";
  return $letras;

}

  function columna($col){
    $pos1 = floor($col/26)-1;
    $pos2 = $col % 26;
    return (chr(65+$pos1)== "@"?"":chr(65+$pos1)).chr(65+$pos2);
  }

  function ultimoDiaMes($fecha){
    $anhio = substr($fecha, 0, 4);
    $mes = substr($fecha , 5, 2);
    return $anhio."-".$mes."-".date("d",(mktime(0,0,0,$mes+1,1,$anhio)-1));
  }

?>
