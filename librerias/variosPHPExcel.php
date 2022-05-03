<?php
  function formatoDDMMAAAA($fch){
    return substr($fch,-2)."/".substr($fch,5,2)."/".substr($fch,0,4);
  }


  $anchoDefault = 20;
  

  /** Error reporting */
  error_reporting(E_ALL);
  ini_set('display_errors', TRUE);
  ini_set('display_startup_errors', TRUE);
  date_default_timezone_set('Europe/London');

  define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

  date_default_timezone_set('Europe/London');

  /** Include PHPExcel */
  require_once dirname(__FILE__) . '/../librerias/classesPHPExcel/PHPExcel.php';
  //..\librerias\classesPHPExcel

   function cellColor($cells,$color){
     global $objPHPExcel;
     $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()
     ->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,
     'startcolor' => array('rgb' => $color)
     ));
  }

  $estiloEncabezadPrincipal = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '16',
        'color' => array('rgb' => 'FFFFFF'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => '032064',
        ),
      ),
      'borders' => array(
             'outline' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => 'FFFFFF'),
        ),
      ), 
    );


  $estiloEncabezados = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '10',
        'color' => array('rgb' => 'FFFFFF'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => '032064',
        ),
      ),
      'borders' => array(
        'inside'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
            'rgb' => 'FFFFFF'
          )
        ),
        'outline'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
             'rgb' => 'FFFFFF'
          )
        )
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
    );

    $estiloEncabMediano = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '9',
        'color' => array('rgb' => 'FFFFFF'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => '032064',
        ),
      ),
      'borders' => array(
        'inside'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
            'rgb' => 'FFFFFF'
          )
        ),
        'outline'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
             'rgb' => 'FFFFFF'
          )
        )
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
    );



  $estiloEncabPeque = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '8',
        'color' => array('rgb' => 'FFFFFF'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => '032064',
        ),
      ),
      'borders' => array(
        'inside'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
            'rgb' => 'FFFFFF'
          )
        ),
        'outline'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
             'rgb' => 'FFFFFF'
          )
        )
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
      )
    );

  $estiloTit = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '10',
        'color' => array('rgb' => '000000'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => '447BC4',
        ),
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
    );

    $estiloTitDet = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '10',
        'color' => array('rgb' => '000000'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'E3EDFA',
        ),
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
      )
    );

    $estiloEncabezadosRojos = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '10',
        'color' => array('rgb' => 'FFFFFF'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'FF0000',
        ),
      ),
    );

    $estiloTotalesSombra = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '12',
        'color' => array('rgb' => '000000'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'A4A4A4',
        ),
      ),
    );

    $estiloTotales = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '10',
        'color' => array('rgb' => '000000'),
        'bold'  => true
      ),
    );

    $estiloNormal = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '09',
        'color' => array('rgb' => '000000'),
        'bold'  => false
      ),
    );

    $estiloAmarillo = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '09',
        'color' => array('rgb' => '000000'),
        'bold'  => false
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'FFFFC8',
        ),
      ),
    );

    $estiloRojo = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '09',
        'color' => array('rgb' => '000000'),
        'bold'  => false
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'FF4444',
        ),
      ),
    );

    $estiloSubtotales = array(
      'font' => array(
        'name' => 'Arial',
        'size' => '09',
        'color' => array('rgb' => '000000'),
        'bold'  => TRUE
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'DDDDDD',
        ),
      ),
    );

    $estiloTodosLosBordes = array(
      'borders' => array(
             'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('rgb' => '000000'),
        ),
      ), 
    );


    $estiloKardex = array(
      'font' => array(
        'name' => 'Calibri',
        'size' => '10',
        'color' => array('rgb' => 'FFFFFF'),
        'bold'  => true
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => '032064',
        ),
      ),
      'borders' => array(
        'inside'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
            'rgb' => 'FFFFFF'
          )
        ),
        'outline'     => array(
          'style' => PHPExcel_Style_Border::BORDER_THIN,
          'color' => array(
             'rgb' => 'FFFFFF'
          )
        )
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
      )
    );

    $estiloSubTotalConLineas = array(
      'borders' => array(
        'top' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => array('rgb' => '000000'),
        ),
        'bottom' => array(
            'style' => PHPExcel_Style_Border::BORDER_DOUBLE,
            'color' => array('rgb' => '000000'),
        ),

      ), 
    );

    $estiloDetraccion = array(
      'font' => array(
        'color' => array('rgb' => 'CF2D06'),
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'FFC7CE',
        ),
      ),
    );

    $estiloTotalxPlaca = array(
      'font' => array(
        'color' => array('rgb' => '000000'),
      ),
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
          'rgb' => 'F1FE20',
        ),
      ),
    );




?>