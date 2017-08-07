var cadenaPrivilegio="";
$(document).on("ready", inicio);
//var usuario=$("#id").val();
//var idRol=$("#idRol").val();
function inicio(){

    var parts = window.location.search.substr(1).split("&");
    var $_GET = {};
    for (var i = 0; i < parts.length; i++) {
        var temp = parts[i].split("=");
        $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
    }
    var id=$_GET['id'];
    document.getElementById("idFichaCamp").value=id;
    //console.log($_GET['id']);

	//$('#clickUsuario').on('click', ingresoUsuario);

    var parametros = {
        "id" : id
        //"idRol" : $("#idRol").val(),
        //"valorCaja2" : valorCaja2
    };

    $.ajax({
        data:  parametros,
        url:   'datos_partido.php',
        //type:  'post',
        dataType: 'jsonp',
        beforeSend: function () {
            //console.log("Procesando, espere por favor...");
        },
            success:  function (response) {
               // console.log(response[0]['Roles']);
                var equipo_a=response[0]['equipo_a'];
                var equipo_b=response[0]['equipo_b'];
                var id_a=response[0]['id_a'];
                var id_b=response[0]['id_b'];

                //var numero1 = [5.0, 4.2, 3.1];
                var numero1 = response[0]['lista1'];
                var numero2 = response[0]['lista2'];

                var numeroPorc1 = response[0]['porcentaje1'];
                var numeroPorc2 = response[0]['porcentaje2'];

                cargarDatosVs(equipo_a, equipo_b, numero1, numero2);
                //cargarDatosGanador(equipo_a, equipo_b, numeroPorc1, numeroPorc2);
                datos("../frmCampeonatoCargar", "datosA", "id="+id_a);
                datos("../frmCampeonatoCargar", "datosB", "id="+id_b);
                document.getElementById("equipo_a").value=equipo_a;
                document.getElementById("equipo_b").value=equipo_b;
                document.getElementById("datosCambiarA").value="0,0,0";
                document.getElementById("datosCambiarB").value="0,0,0"

                document.getElementById("equipoA").value=id_a;
                document.getElementById("equipoB").value=id_b;
            }
    });
}

function mensajeError(mensaje){
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Error',
        // (string | mandatory) the text inside the notification
        text: mensaje,
        class_name: 'gritter-error'
    });
    return false;
}

function mensajeCorrecto(mensaje){
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Correcto',
        // (string | mandatory) the text inside the notification
        text: mensaje,
        class_name: 'gritter-successss'
    });
    return false;
}

function enviarFormGuardar(form, valores){

    var json = JSON.parse(valores);
    //console.log(json);

    $.ajax({
        data:  json,
        url:   form+'.php',
        //type:  'post',
        dataType: 'jsonp',
        beforeSend: function () {
            //console.log("Procesando, espere por favor...");
        },
            success:  function (response) {
                //console.log(response);
                var res = response[0]['res'];
                var msg = response[0]['msg'];
                var select = response[0]['select'];
                var from = response[0]['from'];
                var where = response[0]['where'];
                var onclick = response[0]['onclick'];
                var head = response[0]['head'];
                var tamanio = response[0]['tamanio'];

               if(res==true){
                    mensajeCorrecto(msg);
                    datos(select, head, tamanio, from, where, onclick);
               }
               if(res==false){
                    mensajeError(msg);
               }

            }
    });
}

function getCombo(select, from, where, div){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //console.log(xmlhttp.responseText);
            //var id=xmlhttp.responseText;
            document.getElementById(div).innerHTML=xmlhttp.responseText;
            //return xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","../WEB/combo.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
    xmlhttp.send("select="+encodeURIComponent(select)
        +"&from="+encodeURIComponent(from)
        +"&where="+encodeURIComponent(where));
}

function datos(form, div, send){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            //var id=xmlhttp.responseText;
            document.getElementById(div).innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","WEB/"+form+".php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
    /*xmlhttp.send("select="+encodeURIComponent(select)
        +"&from="+encodeURIComponent(from)
        +"&where="+encodeURIComponent(where)
        +"&onclick="+encodeURIComponent(onclick));*/
    xmlhttp.send(send);
}

function cargarDatosVs(equipo_a, equipo_b, getDatosEquipoA, getDatosEquipoB){
        Highcharts.chart('container', {
            chart: {
                type: 'line'
            },
            title: {
                text: equipo_a+' Vs '+equipo_b
            },
            subtitle: {
                text: 'Campeonato Uniandes'
            },
            xAxis: {
                categories: ['Partido1', 'Partido2', 'Partido3', 'Partido4', 'Partido5', 'Partido6']
            },
            yAxis: {
                title: {
                    text: 'Nivel /100'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: equipo_a,
                data: getDatosEquipoA
            }, {
                name: equipo_b,
                data: getDatosEquipoB
            }]
        });
}

function cargarDatosGanador(equipo_a, equipo_b, getDatosEquipoA, getDatosEquipoB){
    //console.log(equipo_a);console.log(equipo_b);console.log(getDatosEquipoA);console.log(getDatosEquipoB);

Highcharts.chart('prediccion', {
    chart: {
        type: 'bar'
    },
    title: {
        text: equipo_a+' Vs '+equipo_b
    },
    subtitle: {
        text: 'Posible Resultado'
    },
    xAxis: {
        categories: ['0-0', '1-0', '1-1', '2-1', '2-2', '3-1'],
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Poecentaje %',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' %'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: equipo_a,
        data: getDatosEquipoA
    },{
        name: equipo_b,
        data: getDatosEquipoB
    }]
});
}

function gol(id){
    if(id==document.getElementById("equipoA").value){
        var gol=document.getElementById("resultadoGolA").value;
        document.getElementById("resultadoGolA").value=(parseInt(gol)+1);
    }

    if(id==document.getElementById("equipoB").value){
        var gol=document.getElementById("resultadoGolB").value;
        document.getElementById("resultadoGolB").value=(parseInt(gol)+1);
    }    
}

function noGol(id){
    if(id==document.getElementById("equipoA").value){
        var gol=document.getElementById("resultadoGolA").value;
        document.getElementById("resultadoGolA").value=(parseInt(gol)-1);
    }

    if(id==document.getElementById("equipoB").value){
        var gol=document.getElementById("resultadoGolB").value;
        document.getElementById("resultadoGolB").value=(parseInt(gol)-1);
    }  
}

function sumarGol(id_alumno){
    var gol=document.getElementById("resulSpan"+id_alumno+"").innerHTML;
    document.getElementById("resulSpan"+id_alumno+"").innerHTML=(parseInt(gol)+1); 
}

function restarGol(id_alumno){
    var gol=document.getElementById("resulSpan"+id_alumno+"").innerHTML;
    document.getElementById("resulSpan"+id_alumno+"").innerHTML=(parseInt(gol)-1); 
}

function mensaje(getmensaje){
    console.log("E_WARNIN");
    //UIkit.notification("<span uk-icon='icon: warning'></span> El campo Contraseña esta vacia.",{status:'warning'});
}

function dat(id){
        
var ataque=0;
var defensa=0;
var atajada=0;

if(id==document.getElementById("equipoA").value){
    var datosA = document.getElementById("datosCambiarA").value="0,0,0";
          var cont = 0;
            $("input[name=capitan"+id+"]").each(function (index) {
               if($(this).is(':checked')){
                  cont++;
                  if(cont>5){
                    $(this).prop('checked', false);
                    mensajeError("Solo puede elejir un Maximo de 5");
                  }
                  else{
                    var getVal = ($(this).val()).split(",");
                    ataque = parseInt(getVal[0])+ataque;
                    defensa = parseInt(getVal[1])+defensa;
                    atajada = parseInt(getVal[2])+atajada;
                  }
               }
            });    

          var ea = document.getElementById("equipo_a").value;
          var eb = document.getElementById("equipo_b").value;

          /*var da = document.getElementById("datosCambiarA").value;
          var db = document.getElementById("datosCambiarB").value;*/

          var datosA = document.getElementById("datosCambiarA").value;
          var datosB = document.getElementById("datosCambiarB").value;

          var resA = datosA.split(",");
          var resB = datosB.split(",");
          resA[0] = parseInt(resA[0])+ataque;
          resA[1] = parseInt(resA[1])+defensa;
          resA[2] = parseInt(resA[2])+atajada;

          /*console.log(ea);
          console.log(eb);
          console.log(resA);
          console.log(resB);*/

          for(var i=0; i<resA.length;i++){
            resA[i] = parseInt((resA[i]), 10);
            resB[i] = parseInt((resB[i]), 10);
          }

          cargarDatosGanador(ea, eb, resA, resB);
          document.getElementById("datosCambiarA").value=resA;
    }

    if(id==document.getElementById("equipoB").value){
        var datosB = document.getElementById("datosCambiarB").value="0,0,0";
          var cont = 0;
            $("input[name=capitan"+id+"]").each(function (index) {
               if($(this).is(':checked')){
                  cont++;
                  if(cont>5){
                    $(this).prop('checked', false);
                    mensajeError("Solo puede elejir un Maximo de 5");
                  }
                  else{
                    var getVal = ($(this).val()).split(",");
                    ataque = parseInt(getVal[0])+ataque;
                    defensa = parseInt(getVal[1])+defensa;
                    atajada = parseInt(getVal[2])+atajada;
                  }
               }
            });    

          var ea = document.getElementById("equipo_a").value;
          var eb = document.getElementById("equipo_b").value;

          /*var da = document.getElementById("datosCambiarA").value;
          var db = document.getElementById("datosCambiarB").value;*/

          var datosA = document.getElementById("datosCambiarA").value;
          var datosB = document.getElementById("datosCambiarB").value;

          var resA = datosA.split(",");
          var resB = datosB.split(",");
          resB[0] = parseInt(resB[0])+ataque;
          resB[1] = parseInt(resB[1])+defensa;
          resB[2] = parseInt(resB[2])+atajada;

          /*console.log(ea);
          console.log(eb);
          console.log(resA);
          console.log(resB);*/

          for(var i=0; i<resA.length;i++){
            resA[i] = parseInt((resA[i]), 10);
            resB[i] = parseInt((resB[i]), 10);
          }

          cargarDatosGanador(ea, eb, resA, resB);
          document.getElementById("datosCambiarB").value=resB;
    } 

  

  //console.log(document.getElementById("datosB").value);
}

function admFichaGuardar(){
    console.log($("#idFichaCamp").val());
    console.log($("#resultadoGolA").val());
    console.log($("#resultadoGolB").val());
    console.log(document.getElementById("checkB").checked);
    console.log(document.getElementById("checkA").checked);

    enviarFormGuardar('frmFichaGuardar','{"id": "'+$("#idFichaCamp").val()+'", "golesA" : "'+$("#resultadoGolA").val()+'", "golesB": "'+$("#resultadoGolB").val()+'", '+
    ' "checkA" : "'+document.getElementById("checkA").checked+'", "checkB" : "'+document.getElementById("checkB").checked+'" }');

}

function amarilla(id_alumno){
    var gol=document.getElementById("amarillaSpan"+id_alumno+"").innerHTML;
    document.getElementById("amarillaSpan"+id_alumno+"").innerHTML=(parseInt(gol)+1); 
    if(gol==1){
        document.getElementById("roja2"+id_alumno+"").innerHTML="<td colspan='4'><button class='btn btn-danger btn-block'>EXPULSADO</button></td>";
    } 
    enviarFormGuardar('frmTarjetaGuardar','{"id": "'+$("#idFichaCamp").val()+'", "id_alumno" : "'+id_alumno+'", "tipo": "amarilla"}');
}

function roja(id_alumno){
    document.getElementById("roja2"+id_alumno+"").innerHTML="<td colspan='4'><button class='btn btn-danger btn-block'>EXPULSADO</button></td>"; 
    enviarFormGuardar('frmTarjetaGuardar','{"id": "'+$("#idFichaCamp").val()+'", "id_alumno" : "'+id_alumno+'", "tipo": "roja" }');
}

function pagar(id_alumno,id_tarjeta){
    document.getElementById("roja2"+id_alumno+"").innerHTML="<td colspan='4'><p uk-margin>"+
                    "<button class='btn btn-sm btn-primary' onclick=mensaje(); >Tiro Puerta</button>"+
                    "<button class='btn btn-sm btn-primary' onclick=mensaje(); >Despeje</button>"+
                    "<button class='btn btn-sm btn-primary' onclick=mensaje()>Asitencia</button>"+                    
                    "<a href='#' class='btn btn-app btn-warning btn-xs no-radius' onclick='amarilla("+id_alumno+")';>"+
                        "Amarilla"+
                        "<span class='label label-inverse arrowed-in' id='amarillaSpan"+id_alumno+"'>0</span>"+
                    "</a>"+
                    "<button class='btn btn-sm btn-danger' onclick=roja("+id_alumno+")>Roja</button>"+
                "</p></td>";
    enviarFormGuardar('frmTarjetaGuardar','{"id": "'+id_tarjeta+'", "id_alumno" : "'+id_alumno+'", "tipo": "pagar"}');
}