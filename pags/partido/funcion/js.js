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
                cargarDatosGanador(equipo_a, equipo_b, numeroPorc1, numeroPorc2);
                datos("../frmCampeonatoCargar", "datosA", "id="+id_a);
                datos("../frmCampeonatoCargar", "datosB", "id="+id_b);
                document.getElementById("equipo_a").innerHTML=equipo_a;
                document.getElementById("equipo_b").innerHTML=equipo_b;
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
    console.log(equipo_a);console.log(equipo_b);console.log(getDatosEquipoA);console.log(getDatosEquipoB);

Highcharts.chart('prediccion', {
    chart: {
        type: 'bar'
    },
    title: {
        text: equipo_a+' Vs '+equipo_b
    },
    subtitle: {
        text: 'Source: <a href="https://en.wikipedia.org/wiki/World_population">Wikipedia.org</a>'
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
            text: 'Population (millions)',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' millions'
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

function gola(){
    var gol=0;
    document.getElementById("goles_a").innerHTML=(gol+1);
}
function golb(){
    
}

