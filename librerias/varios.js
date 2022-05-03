// JavaScript Document
function abrirventana(pag){
  window.location = pag
}

function abrirpestanha(pag){
  window.open(pag)
}

function abrirventanaflotante(pag){
open(pag,null,"height=300,width=400,status=yes,toolbar=no,menubar=no,location=no");
}

function abrirventanaflotanteresizable(pag){
open(pag,null,"height=300,width=400,status=yes,toolbar=no,menubar=no,location=no,resizable=yes");
}


function abrirventanaflotantemediana(pag){
open(pag,null,"height=450,width=500,status=yes,toolbar=no,menubar=no,location=no");
}

function abrirventanaflotantegrande(pag){
open(pag,null,"height=600,width=650,status=yes,toolbar=no,menubar=no,location=no");
}

function abrirventanaflotantesupergrande(pag){
open(pag,null,"height=700,width=850,status=yes,toolbar=no,menubar=no,location=no");
}

function abrirventanaflotantesupergrande2(pag){
  open(pag,null,"height=600,width=1200,status=yes,toolbar=no,menubar=no,location=no");
}

function abrirventanaflotantecompleta(pag){
//open(pag,null,"height=700,width=850,status=yes,toolbar=no,menubar=no,location=no");
window.open(pag, '', 'fullscreen=yes, scrollbars=auto');
}


function diferenciaFechas(fch1,fch2) {          
	//requiere la funcion fecha que esta debajo
    //Obtiene dia, mes y año  
    var fecha1 = new Fecha( fch1 )     
    var fecha2 = new Fecha( fch2 )  
      
    //Obtiene objetos Date  
    var miFecha1 = new Date( fecha1.anio, fecha1.mes, fecha1.dia )  
    var miFecha2 = new Date( fecha2.anio, fecha2.mes, fecha2.dia )  
   
    //Resta fechas y redondea  
    var diferencia = miFecha1.getTime() - miFecha2.getTime()  
    var difDias = Math.floor(diferencia / (1000 * 60 * 60 * 24))  
    //var segundos = Math.floor(diferencia / 1000)  
    //alert ('La diferencia es de ' + dias + ' dias,no ' + segundos + ' segundos.')  
    return difDias  
 }

var Fecha = function Fecha( cadena ) {  
    //Separador para la introduccion de las fechas  
    var separador = "-"   
    //Separa por dia, mes y año  
    if ( cadena.indexOf( separador ) != -1 ) {  
         var posi1 = 0  
         var posi2 = cadena.indexOf( separador, posi1 + 1 )  
         var posi3 = cadena.indexOf( separador, posi2 + 1 )  
         this.anio = cadena.substring( posi1, posi2 )  
         this.mes = cadena.substring( posi2 + 1, posi3 ) - 1 
         this.dia = cadena.substring( posi3 + 1, cadena.length )  
    } else {  
         this.dia = 0  
         this.mes = 0  
         this.anio = 0     
    }  
 }

 function fechaAAAAMMDD(fecha){
  dia = fecha.getDate()
  mes = fecha.getMonth()+1
  dia = dia.toString()
  mes = mes.toString()
  if (dia.length == 1) dia = "0"+dia
  if (mes.length == 1) mes = "0"+mes
  fechaForma = fecha.getFullYear()+"-"+mes+"-"+dia
  return fechaForma
}

function incrementarDias(fecha,dias){
  //Obtenemos los milisegundos desde media noche del 1/1/1970 
  tiempo=fecha.getTime(); 
  //Calculamos los milisegundos sobre la fecha que hay que sumar o restar... 
  milisegundos=parseInt(dias*24*60*60*1000);
  //Modificamos la fecha actual 
  fecha.setTime(tiempo+milisegundos);
  return fecha
}


function diasSinDomingos(fchIni, fchFin){
  diasTotales = diferenciaFechas(fchFin,fchIni)
  diasLab = 0
  var fecha1 = new Fecha( fchIni )
  var fecha2 = new Fecha( fchFin )
  //Obtiene objetos Date  
  var miFecha1 = new Date( fecha1.anio, fecha1.mes, fecha1.dia )  
  var miFecha2 = new Date( fecha2.anio, fecha2.mes, fecha2.dia )
  
  for(i = 1; i<= diasTotales; i++){
    fecha = incrementarDias(miFecha1,1)
    //alert(fecha.getDay())
    if (fecha.getDay() != 0 )
      diasLab++
  }
 return diasLab

}



function derecha(str, n){
  if (n <= 0)
    return "";
  else if (n > String(str).length)
    return str;
  else {
    var iLen = String(str).length;
    return String(str).substring(iLen, iLen - n);
  }
}

/* Da probemas con la tecla tab en Mozilla
function solonumeros(e){
 var key;
 if(window.event) // IE
 {
  key = e.keyCode;
 }
  else if(e.which) // Netscape/Firefox/Opera
 {
  key = e.which;
 }
 return ( (key >= 48 && key <= 57) || key == 8);
}*/

function solonumeros(e){
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8 || tecla == 0) return true;
    patron = /(^[0-9.]$)/;
    te = String.fromCharCode(tecla);
    return patron.test(te);
}

function contar(texto,letra) { 
  var texto1 = texto; 
  numCar = texto1.length; //longitud del texto
  veces = 0; //contar las veces que se repite
  posicion = texto1.indexOf(letra); //primera aparición de letra
  posfinal = texto1.lastIndexOf(letra);
  posfinal = numCar-posfinal;
  
  while (numCar>=posfinal) {
     posicion = texto1.indexOf(letra); //punto para modificar
     posicion++;
     texto1 = texto1.substring(posicion); //modificar texto
     numCar -= posicion; // nueva longitud del texto
     veces++; // contador de veces.
  }
  return veces
 }
 
 function verifica(cadena){
   cantArrobas = contar(cadena,"@")
   cantAsig  = contar(cadena,"=>")
   cantComas = contar(cadena,",")
   cantVerti = contar(cadena,"|")
   if ((cantAsig == cantArrobas + 1) && (cantComas % (cantArrobas + 1) == 0) && (cantVerti == 2*(cantComas + cantAsig)) )   return 1;
   else return 0; 
 }

