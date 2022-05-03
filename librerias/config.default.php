<?php
//La primera linea no se debe modificar
$rucEmpresa = '20297421035';
$empresa = 'INVERSIONES MOY S.A.C.';
$advertencias = 10;  //dias antes del vencimiento
$porcIgv = 0.18;
$porcEsSalud = 0.09; //actualmente es el 9%
$sueldoMinimo = 850;
$toleranciaRojo = 0.9;
$toleranciaAmarillo = 0.95;
$esSalud = 5;
$solesBonoDiario = 5;

$kmCombustibleAdvertencia1 = 300;//
$kmCombustibleAdvertencia2 = 500;
//$kmCombustibleAlerta1 = 700;  //No se puede sobrepasar este monto
$kmCombustibleAlertaEficNormal = 650;  //No se puede sobrepasar este monto
$kmCombustibleAlertaEficAlta = 950;  //No se puede sobrepasar este monto
$difFchsAbastAdvertencia1 = 5; //Advertencia si la diferen. de dí­as de abastecimiento sobrepasa este tope

/*$limFchAbast
El valor que se coloque es la cantidad de días de retraso con que se puede registrar un abastecimiento.
El valor predefinido es $limFchAbast = 4; 
*/
$limFchAbast = 4;
$difKmMaxEntreAbastecimientos = 1000; //Diferencia máxima entre abastecimientos
$bloquearVehiculos = 'Si';
$topeDescuento = 50;
$recFactorAmarillo = 1;
$recFactorRojo = 1.2 ;
/*$verificaLicencia
'Si', indica que se verifica la fecha de vencimiento del dni y las licencias de conducir. Si alguna está vencida no se puede programar al trabajador en un despacho
'No', indica que no hay restricción en cuanto a las fechas de vencimiento del dni ni de las licencias de conducir
*/
$verificaLicencia = 'Si';

$topeInferiorMantenimientoAceite = 1000;
$topeSuperiorMantenimientoAceite = 14000;
$topeDiasRetrasoFechaMantenAceite = 20;
$topeDiasRetrasoFechaExtintor = 10;

$cambioAceite = 5000;
$porcAceiteVerde = 0.1;
$porcAceiteAmarillo = 0.2;

$tolerDiasDespacho = 4;
$nroCuotasFondo = '0,1,2,4,6';
$nroCuotasPrenda = '1,2,4,8';

$usuariosSuperAdmin = "mvelasquez,lescobedo,kvelasquez,smith,ncarrasco";
$usuariosQueBloqueanCambiosDespacho = 'lescobedo';

$alertaVenceContrato = 30;
$alertaVenceVacaciones = 60;
$alertaAmarilloParaPreliq = 25;
$alertaRojoParaPreliq = 30;
$alertaAmarilloParaEmitir = 2;
$alertaRojoParaEmitir = 10;
$alertaAmarilloParaPresentar = 1;
$alertaRojoParaPresentar = 3;
$alertaAmarilloParaCancelacion = 15;
$alertaRojoParaCancelacion = 30;

$dataItemsTrabajador = "'Prestamo','Reembolso','Bono','Movilidad','Adelanto','BonoDiario','EsSalud','PnsNacONP','PnsPriComis','PnsPriPrima','PnsPriAport','DevolGarantia','DomFeriado','HraExtra','Vacaciones','AsigFam','ServAdicional','DescMedico', 'LicGoce','Inasistencia','MovilAsig'";

$valorMovDiaAux = 20;  //Valor movilidad
$valorMovDiaCon = 30; //incluye coordinador

$alertasOdometros = array(
	"0" => array(
		'nombreCompleto' => "Luis Escobedo",
		'email' => "lescobedo63@yahoo.com"
		),
	"1" => array(
		'nombreCompleto'  => "Juan Carlos Eyzaguirre",
		'email' => "juancarlos@inversionesmoy.com.pe"
		)
	);

$alertasPlacasSinUso = array(
	"0" => array(
		'nombreCompleto' => "Luis Escobedo",
		'email' => "lescobedo63@yahoo.com"
		),
	"1" => array(
		'nombreCompleto'  => "Juan Carlos Eyzaguirre",
		'email' => "juancarlos@inversionesmoy.com.pe"
		)
	);

$alertasVacaciones = array(
	"0" => array(
		'nombreCompleto' => "Luis Escobedo",
		'email' => "lescobedo63@yahoo.com"
  ),
	"1" => array(
		'nombreCompleto'  => "Pilar Miranda",
		'email' => "recursoshumanos@inversionesmoy.com.pe"
  ),
	"2" => array(
		'nombreCompleto'  => "Contabilidad",
		'email' => "contabilidad@inversionesmoy.com.pe"
  ),
	"3" => array(
		'nombreCompleto'  => "Administración",
		'email' => "administracion@inversionesmoy.com.pe"
  )
);

$alertasEvolucionCobranzas = array(
	"0" => array(
		'nombreCompleto' => "Luis Escobedo",
		'email' => "lescobedo63@yahoo.com"
  ),
	"1" => array(
		'nombreCompleto'  => "Kengy Velásquez",
		'email' => "asistente@inversionesmoy.com.pe"
  ),
	"2" => array(
		'nombreCompleto'  => "Administración",
		'email' => "administracion@inversionesmoy.com.pe"
  )
);

$alertasAtrasosCobranza = array(
	"0" => array(
		'nombreCompleto' => "Luis Escobedo",
		'email' => "lescobedo63@yahoo.com"
  ),
	"1" => array(
		'nombreCompleto'  => "Kengy Velásquez",
		'email' => "asistente@inversionesmoy.com.pe"
  ),
	"2" => array(
		'nombreCompleto'  => "Administración",
		'email' => "administracion@inversionesmoy.com.pe"
  ),
  "3" => array(
		'nombreCompleto'  => "Moisés Velásquez",
		'email' => "mvelasquez@inversionesmoy.com.pe"
  )
);

$retrasoPlacaUso =2; //Cuantos días puede estar sin regidtrar despachos antes que vaya en el reporte. Maximo puede valer 29

$enTerceroConductorMoy = 70; //Siempre y cuando se decida cobrar
$enTerceroAuxiliarMoy  = 55; //Siempre y cuando se decida cobrar

$bancosDisponibles = "BCP,BBVA";

$mntFondoConductor = 300;
$mntFondoAuxiliar = 200;
$topeMovilSuped = 100; //Tope movilidad supeditada por quincena

$adminAlertasProgram = array(
	"lescobedo" => array(
		'nombreCompleto' => "Luis Escobedo",
		'email' => "lescobedo63@yahoo.com"
  ),
	"kvelasquez" => array(
		'nombreCompleto'  => "Kengy Velásquez",
		'email' => "asistente@inversionesmoy.com.pe"
  ),
    "mvelasquez" => array(
		'nombreCompleto'  => "Moisés Velásquez",
		'email' => "mvelasquez@inversionesmoy.com.pe"
  )
);

$operadoresTelf = "ENTEL,MOVISTAR";

$adminAlertasLimiteEstados = array(
  "lescobedo" => array(
    'nombreCompleto' => "Luis Escobedo",
    'email' => "lescobedo63@yahoo.com"
  ),
  "kvelasquez" => array(
    'nombreCompleto' => "Kengy Velasquez",
    'email' => "kvelasquez@inversionesmoy.com.pe"
  ),
  "asalazar" => array(
    'nombreCompleto' => "Andre Salazar",
    'email' => "a.salazar@inversionesmoy.com.pe"
  ),
  "rrhh_zoila" => array(
    'nombreCompleto' => "Pilar Miranda",
    'email' => "pmiranda@inversionesmoy.com.pe"
  ),
  "cvera" => array(
    'nombreCompleto' => "Cristian Vera",
    'email' => "cvera@inversionesmoy.com.pe"
  ),
  "ncarrasco" => array(
    'nombreCompleto' => "Nelson Carrasco",
    'email' => "operaciones@inversionesmoy.com.pe"
  ),
);

$alertasLimiteEstados = array(
	"Programado" => 1,
	"EnRuta" => 1,
	"Terminado" => 3
);

$usuariosHelpDesk = "lescobedo,smith";


//La última linea no se debe modificar
?>