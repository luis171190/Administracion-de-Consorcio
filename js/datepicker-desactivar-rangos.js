/* Inicialización en español para la extensión 'UI date picker' para jQuery. */
/* Traducido por Vester (xvester@gmail.com). */
( function( factory ) {
	if ( typeof define === "function" && define.amd ) {

		// AMD. Register as an anonymous module.
		define( [ "../widgets/datepicker" ], factory );
	} else {

		// Browser globals
		factory( jQuery.datepicker );
	}
}( function( datepicker ) {

datepicker.regional.es = {
	closeText: "Cerrar",
	prevText: "&#x3C;Ant",
	nextText: "Sig&#x3E;",
	currentText: "Hoy",
	monthNames: [ "enero","febrero","marzo","abril","mayo","junio",
	"julio","agosto","septiembre","octubre","noviembre","diciembre" ],
	monthNamesShort: [ "ene","feb","mar","abr","may","jun",
	"jul","ago","sep","oct","nov","dic" ],
	dayNames: [ "domingo","lunes","martes","miércoles","jueves","viernes","sábado" ],
	dayNamesShort: [ "dom","lun","mar","mié","jue","vie","sáb" ],
	dayNamesMin: [ "D","L","M","X","J","V","S" ],
	weekHeader: "Sm",
	dateFormat: "dd/mm/yy",
	firstDay: 1,
	isRTL: false,
	showMonthAfterYear: false,
	yearSuffix: "",
    showAnim: 'fadeIn',
    minDate: '0',
    beforeShowDay: checkAvailability
    
};
datepicker.setDefaults( datepicker.regional.es );
   

return datepicker.regional.es;

} ) );



function checkAvailability(mydate){
    
    var vacia = new Array();
    
var disabledDays = new Array();
//nota: ano es una variable dinámica que varía según el año en el que nos encontremos
var arrayFechas = new Array();    
var fechas = $('input[name="fechas"]').val();
var arrayFechas = fechas.split("*");
    
//var disabledDays = ["11-02-2017","12-02-2017","13-02-2017"];    
     //alert('disabledDays[0]');    
var $return=true;
var $returnclass ="";    //formato mes dia y año (se puede cambiar pero también en array
$checkdate = $.datepicker.formatDate('dd-mm-yy', mydate); //dateFormat: 'mm/mm/yy',

   
    
for(var i = 0; i <= arrayFechas .length; i++)
{ 
if(arrayFechas [i] == $checkdate)
{
$return = false;
$returnclass= "unavailable";
} 
    
}
return [$return,$returnclass]; 
}

/*
function desNoLabolarales(day){
    var day = day.getDay(); 
           if (day == 0 || day == 6) { 
             return [false, "somecssclass"] 
           } else { 
             return [true, "someothercssclass"] 
           } 
}

*/

