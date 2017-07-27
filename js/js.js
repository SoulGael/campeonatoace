var cadenaPrivilegio="";
$(document).on("ready", inicio);
//var usuario=$("#id").val();
//var idRol=$("#idRol").val();
function inicio(){
	$('#clickIngreso').on('click', ingresoSistema);

    //Control de Usuarios
    var parametros = {
        "idRol" : $("#idRol").val()
        //"idRol" : $("#idRol").val(),
        //"valorCaja2" : valorCaja2
    };

    $.ajax({
        data:  parametros,
        url:   'privilegios.php',
        //type:  'post',
        dataType: 'jsonp',
        beforeSend: function () {
            //console.log("Procesando, espere por favor...");
        },
            success:  function (response) {
               // console.log(response[0]['Roles']);
                cadenaPrivilegio=response[0]['Roles'];
                cadenaPrivilegio=cadenaPrivilegio.substring(0, cadenaPrivilegio.length-1);
                inicioPrivilegio();
            }
    });
}

function menus(completa, buscar){
    var estado=false;
    var palabras = completa.split(',');

    for (var i = 0; i <= palabras.length; i++ ) {
        if (palabras[i]==buscar) {
            estado=true;
            break;
        }
    }

    return estado;
}

function inicioPrivilegio(){
    var html="";

		if(menus(cadenaPrivilegio, 'admUsuario')||menus(cadenaPrivilegio, 'admRoles')||menus(cadenaPrivilegio, 'admEstudiantes')){
			html += '<li class="">'+
					   '<a href="#" class="dropdown-toggle">'+
						  '<i class="menu-icon fa fa-user"></i>'+
						  '<span class="menu-text">ADMINISTRADOR</span>'+
						  '<b class="arrow fa fa-angle-down"></b>'+
						'</a>'+
						'<b class="arrow"></b><ul class="submenu">';
					if(menus(cadenaPrivilegio, 'admRoles')){
						html +=		'<li>'+
										'<a onclick="admRoles()"><i class="menu-icon fa fa-caret-right"></i>Roles</a>'+
										'<b class="arrow"></b>'+
									'</li>';
					}
					if(menus(cadenaPrivilegio, 'admUsuario')){
						html +=	'<li>'+
											'<a onclick="admUsuario()"><i class="menu-icon fa fa-caret-right"></i>Usuarios</a>'+
											'<b class="arrow"></b>'+
										'</li>';
					}
					if(menus(cadenaPrivilegio, 'admEstudiantes')){
						html +=		'<li>'+
												'<a onclick="admEstudiantes()"><i class="menu-icon fa fa-caret-right"></i>Administración de Estudiantes</a>'+
												'<b class="arrow"></b>'+
											'</li>';
					}
			html += '</ul></li>';
    }

    if(menus(cadenaPrivilegio, 'admDiciplinas')||menus(cadenaPrivilegio, 'admCampeonato')||menus(cadenaPrivilegio, 'admFaseGrupos')||menus(cadenaPrivilegio,
        'admCalendario')||menus(cadenaPrivilegio, 'admFichaControl')){

					html += '<li class="">'+
										'<a href="#" class="dropdown-toggle">'+
											'<i class="menu-icon fa fa-bookmark"></i>'+
											'<span class="menu-text">CAMPEONATO</span>'+
											'<b class="arrow fa fa-angle-down"></b>'+
										'</a>'+
										'<b class="arrow"></b><ul class="submenu">';

                 if(menus(cadenaPrivilegio, 'admDiciplinas')){
									 html +=		'<li>'+
			 													'<a onclick="admDiciplina()"><i class="menu-icon fa fa-caret-right"></i>Diciplinas</a>'+
			 													'<b class="arrow"></b>'+
			 												'</li>';
                 }
                 if(menus(cadenaPrivilegio, 'admCampeonato')){
									 html +=		'<li>'+
			 													'<a onclick="admCampeonato()"><i class="menu-icon fa fa-caret-right"></i>Campeonato</a>'+
			 													'<b class="arrow"></b>'+
			 												'</li>';
                 }
                 if(menus(cadenaPrivilegio, 'admFaseGrupos')){
									 html +=		'<li>'+
			 													'<a onclick="admFaseGrupos()"><i class="menu-icon fa fa-caret-right"></i>Crear Fase de Grupos</a>'+
			 													'<b class="arrow"></b>'+
			 												'</li>';
                 }
                 if(menus(cadenaPrivilegio, 'admCalendario')){
									 html +=		'<li>'+
			 													'<a onclick="admCalendario()"><i class="menu-icon fa fa-caret-right"></i>Administración de Calendario</a>'+
			 													'<b class="arrow"></b>'+
			 												'</li>';
                 }
                 if(menus(cadenaPrivilegio, 'admFichaControl')){
									 html +=		'<li>'+
			 													'<a onclick="admFichaControl()"><i class="menu-icon fa fa-caret-right"></i>Administración de Fichas de Control</a>'+
			 													'<b class="arrow"></b>'+
			 												'</li>';
                 }
        html += '</ul></li>';
    }

    if (menus(cadenaPrivilegio, 'admEquipos')) {
			html += '<li class="">'+
								'<a href="#" class="dropdown-toggle">'+
									'<i class="menu-icon fa fa-futbol-o"></i>'+
									'<span class="menu-text">EQUIPOS</span>'+
									'<b class="arrow fa fa-angle-down"></b>'+
								'</a>'+
								'<b class="arrow"></b><ul class="submenu">';
            if(menus(cadenaPrivilegio, 'admEquipos')){
							html +=		'<li>'+
													 '<a onclick="admEquipos()"><i class="menu-icon fa fa-caret-right"></i>Administración de Equipos</a>'+
													 '<b class="arrow"></b>'+
												 '</li>';
                 }
        html+='</ul></li>';
    }

		html+='<li class="">'+
						'<a href="../index.php">'+
							'<i class="menu-icon fa fa-power-off red"></i>'+
							'<span class="menu-text red"> CERRAR SESION </span>'+
						'</a>'+
						'<b class="arrow"></b>'+
					'</li>';

    document.getElementById("divOpciones").innerHTML=html;
}

function cambiarClassMenu(idNueva, idVieja){
	var elemento = document.querySelector('#'+idNueva+'');
	elemento.setAttribute("class","active");

	var elemento = document.querySelector('#'+idVieja+'');
	elemento.removeAttribute("class");
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

function datos(select, from, where, onclick){
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
            document.getElementById("div1").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","WEB/busqueda.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
    xmlhttp.send("select="+encodeURIComponent(select)
        +"&from="+encodeURIComponent(from)
        +"&where="+encodeURIComponent(where)
        +"&onclick="+encodeURIComponent(onclick));
}

function encerar(){
    document.getElementById("div1").innerHTML="";
    document.getElementById("div2").innerHTML="";
    //document.getElementById("divInfo").innerHTML="";
}

function uploadAjax(){
    var inputFileImage = document.getElementById("archivo");
    var file = inputFileImage.files[0];
    var data = new FormData();

    data.append('archivo',file);

    var url = "usuarios/cargarCsv.php";

    $.ajax({
        url:url,
        type:'POST',
        contentType:false,
        data:data,
        processData:false,
        cache:false,
        success: function(data){
            alert(data);
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
    xmlhttp.open("POST","WEB/combo.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded;");
    xmlhttp.send("select="+encodeURIComponent(select)
        +"&from="+encodeURIComponent(from)
        +"&where="+encodeURIComponent(where));
}

function ingresoSistema(){
	var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            var id=xmlhttp.responseText;
            if(document.getElementById("usuario").value==""){
                document.getElementById("usuariolabel").className += ' has-error ';
                document.getElementById("usuarioicon").className += ' red ';
                mensajeError("El campo usuario esta vacio");
            }
            if(document.getElementById("pass").value==""){
                document.getElementById("passlabel").className += ' has-error ';
                document.getElementById("passicon").className += ' red ';
                mensajeError("El campo de Contraseña esta vacia");
            }
            else{
                if(id=='0'){
                    window.open('pags/index.php', '_parent');
                }
                else{
                    mensajeError(id);
                }
            }

            //document.getElementById("datos").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","pags/usuarios/ingresoUsuario.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("usuario="+document.getElementById("usuario").value
        +"&pass="+document.getElementById("pass").value);
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

               if(res==true){
                    UIkit.notification("<span uk-icon='icon: check'></span>"+msg+"",{status:'success'});
                    datos(select, from, where, onclick);
               }
               if(res==false){
                    UIkit.notification("<span uk-icon='icon: check'></span>"+msg+"",{status:'danger'});
               }

            }
    });
}

function enviarForm(form,send){
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("div2").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST",form+".php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send(send);
}

function getids(tab){
    var lista = '';
    $("input[name="+tab+"]").each(function (index) {
       if($(this).is(':checked')){
          lista += $(this).val()+',';
       }
    });
    lista = lista.substring(0, lista.length-1);
    return lista;
}

function getidsText(tab){
    var lista = '';
    $("input[name="+tab+"]").each(function (index) {
        if($(this).val()!=('')){
          lista += $(this).val()+',';
       }
    });
    lista = lista.substring(0, lista.length-1);
    return lista;
}

//ROLES
function admRoles(){
    encerar();
    var html="";
    var html2="";

    html += '<div class="input-group col-xs-4">'+
                '<input type="text" class="form-control"  id="buscar_rol" name="buscar_rol" onKeypress="if(event.keyCode == 13) {busquedaRol();}" placeholder="Buscar.." />'+
                '<span class="input-group-btn">'+
                    '<button onclick=busquedaRol(); type="button" class="btn btn-primary btn-sm">'+
                        '<span class="ace-icon fa fa-search icon-on-right"></span>Buscar'+
                    '</button>'+
                '</span>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="btn btn-success" onclick=admRolForm(-1);>Nuevo</button>';
    document.getElementById("divMenu2").innerHTML=html2;
    //document.getElementById("divInfo").innerHTML="ROLES";
    busquedaRol();
    admRolForm(-1);
}

function busquedaRol(){
    var where = "";
    if ($("#buscar_rol").val()!="") {
        where = " where lower(rol) like lower('%"+$("#buscar_rol").val()+"%') ";
    }
    where += " order by rol";
    datos("id_rol,rol", "tbl_rol", where,"UIkit.tab('#js-control').show(1);admRolForm");
}

function admRolForm(id){
    enviarForm('usuarios/frmRol','id='+id+'&idRol='+$("#idRol").val());
}

function admRolGuardar(){
    enviarFormGuardar('usuarios/frmRolGuardar','{"id": "'+$("#id_rol").val()+'", "nuevo_rol" : "'+$("#nuevo_rol").val()+'"}');
}

function admPromoverGuardar(){
    var ids = getids("promoverTab");
    //console.log(ids);
    enviarFormGuardar('usuarios/frmPrivilegioGuardar','{"id": "'+$("#id_rol").val()+'", "ids_pagina" : "'+ids+'", "tipo" : "p"}');
}

function admRevocarGuardar(){
    var ids = getids("revocarTab");
    //console.log(ids);
    enviarFormGuardar('usuarios/frmPrivilegioGuardar','{"id": "'+$("#id_rol").val()+'", "ids_pagina" : "'+ids+'", "tipo" : "r"}');
}

//DICIPLINAS
function admDiciplina(){
    encerar();
    var html="";
    var html2="";

    html += '<div class="uk-margin uk-padding uk-padding-remove-left">'+
                '<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_diciplina" name="buscar_diciplina" onKeypress="if(event.keyCode == 13) busquedaDiciplina()"/>'+
                '</div>'+
                '<button class="uk-button uk-button-default" onclick=UIkit.tab("#js-control").show(0);busquedaDiciplina();>Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary " onclick=UIkit.tab("#js-control").show(1);admDiciplinaForm(-1);>Nuevo</button>';
    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="DICIPLINAS";
    busquedaDiciplina();
    admDiciplinaForm(-1);
}

function busquedaDiciplina(){
    var where = "";
    if ($("#buscar_diciplina").val()!="") {
        where = " where lower(diciplina) like lower('%"+$("#buscar_diciplina").val()+"%') ";
    }
    where += " order by diciplina";
    datos("id_diciplina,diciplina, txt_estado", "vta_diciplina", where,"UIkit.tab('#js-control').show(1);admDiciplinaForm");
}

function admDiciplinaForm(id){
    enviarForm('usuarios/frmDiciplina','id='+id+'&idRol='+$("#idRol").val());
}

function admDiciplinaGuardar(){
    var estado=$('input:radio[name=estado]:checked').val();
    enviarFormGuardar('usuarios/frmDiciplinaGuardar','{"id": "'+$("#id_diciplina").val()+'", "estado" : "'+estado+'", "hora" : "'+$("#id_hora").val()+'", '+
        ' "minuto" : "'+$("#id_minuto").val()+'", "diciplina" : "'+$("#nuevo_diciplina").val()+'"}');
}
//USUARIOS
function admUsuario(){
    encerar();
    var html="";
    var html2="";

    html += '<div class="uk-margin uk-padding uk-padding-remove-left">'+
                '<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_usuario" name="buscar_usuario" onKeypress="if(event.keyCode == 13) busquedaUsuario()"/>'+
                '</div>'+
                '<button class="uk-button uk-button-default" onclick=UIkit.tab("#js-control").show(0);busquedaUsuario();>Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admUsuarioForm(-1);>Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="USUARIOS";
    busquedaUsuario();
    admUsuarioForm(-1);
}

function busquedaUsuario(){

    var where = "";
    if ($("#buscar_usuario").val()!="") {
        where = " where lower(alias) like lower('%"+$("#buscar_usuario").val()+"%') ";
    }
    where += " order by alias";
    datos("alias,alias", "tbl_usuario", where,"UIkit.tab('#js-control').show(1);admUsuarioForm");
}

function admUsuarioForm(id){
    enviarForm('usuarios/frmUsuario','id='+id);
}

function admUsuarioGuardar(){
    //console.log($("#id_pass").val());
    var estado=$('input:radio[name=estado]:checked').val();
    enviarFormGuardar('usuarios/frmUsuarioGuardar','{"id": "'+$("#id_usuario").val()+'", "nuevo_usuario" : "'+$("#nuevo_usuario").val()+'", '+
        ' "nuevo_clave" : "'+$("#nuevo_clave").val()+'", "idRol" : "'+$("#cmbRol").val()+'", "estado" : "'+estado+'"}');
}

//CAMPEONATO
function admCampeonato(){
    encerar();
    var html="";
    var html2="";

    html += '<div class="uk-margin uk-padding uk-padding-remove-left">'+
                '<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_campeonato" name="buscar_campeonato" onKeypress="if(event.keyCode == 13) busquedaCampeonato()"/>'+
                '</div>'+
                '<button class="uk-button uk-button-default" onclick=UIkit.tab("#js-control").show(0);busquedaCampeonato(); >Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admCampeonatoForm(-1);>Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="CAMPEONATO";
    busquedaCampeonato();
    admCampeonatoForm(-1);
}

function busquedaCampeonato(){

    var where = "";
    if ($("#buscar_campeonato").val()!="") {
        where += " where lower(campeonato) like lower('%"+$("#buscar_campeonato").val()+"%') ";
    }
    where += " order by id_campeonato";
    datos("id_campeonato,campeonato", "tbl_campeonato", where,"UIkit.tab('#js-control').show(1);admCampeonatoForm");
}

function admCampeonatoForm(id){
    $.ajax({
       beforeSend: function(){
         // Handle the beforeSend event
         enviarForm('usuarios/frmCampeonato','id='+id);
       },
       complete: function(){
         // Handle the complete event
         $( "#f_inicio" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
         $( "#f_inscripcion" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
         $( "#f_inauguracion" ).datepicker({ dateFormat: 'dd-mm-yy' }).val();
       }
       // ......
     });
}

function admCampeonatoGuardar(){

    /*console.log($("#arbitraje").val());
    console.log(document.getElementById("ch").checked);
    console.log(document.getElementById("cm").checked);
    console.log($("#c_equipos").val());
    console.log($("#contacto").val());
    console.log($("#d_habilitantes").val());
    console.log($("#diciplina").val());
    console.log($("#f_inauguracion").val());
    console.log($("#f_inicio").val());
    console.log($("#f_inscripcion").val());
    console.log($("#id_campeonato").val());
    console.log(document.getElementById("id_balo").checked);
    console.log(document.getElementById("id_ecua").checked);
    console.log(document.getElementById("id_indor").checked);
    console.log($("#m_control").val());
    console.log($("#nombre_campeonato").val());
    console.log($("#p_equipos").val());
    console.log($("#v_garantia").val());
    console.log($("#v_inscripcion").val());*/

    idsDiciplina = getids("diciplinaTab");
    enviarFormGuardar('usuarios/frmCampeonatoGuardar','{"id": "'+$("#id_campeonato").val()+'", "nombre_campeonato" : "'+$("#nombre_campeonato").val()+'", '+
        ' "f_inicio" : "'+$("#f_inicio").val()+'", "f_inscripcion" : "'+$("#f_inscripcion").val()+'", "diciplina" : "'+idsDiciplina+'", '+
        ' "ch" : "'+document.getElementById("ch").checked+'", "cm" : "'+document.getElementById("cm").checked+'", '+
        ' "c_equipos" : "'+($("#c_equipos").val()).replace(new RegExp("\n","g"),"<br>")+'", "v_inscripcion" : "'+$("#v_inscripcion").val()+'", '+
        ' "v_garantia" : "'+$("#v_garantia").val()+'", "d_habilitantes" : "'+($("#d_habilitantes").val()).replace(new RegExp("\n","g"),"<br>")+'", '+
        ' "f_inauguracion" : "'+$("#f_inauguracion").val()+'", "p_equipos" : "'+($("#p_equipos").val()).replace(new RegExp("\n","g"),"<br>")+'", '+
        ' "m_control" : "'+($("#m_control").val()).replace(new RegExp("\n","g"),"<br>")+'", "arbitraje" : "'+($("#arbitraje").val()).replace(new RegExp("\n","g"),"<br>")+'", '+
        ' "coorDiciplina" : "'+($("#coorDiciplina").val()).replace(new RegExp("\n","g"),"<br>")+'", "contacto" : "'+($("#contacto").val()).replace(new RegExp("\n","g"),"<br>")+'"}');
}

//EQUIPOS
function admEquipos(){
    encerar();
    var html="";
    var html2="";

    html += '<div class="uk-margin uk-padding uk-padding-remove-left">'+
                '<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_equipos" name="buscar_equipos" onKeypress="if(event.keyCode == 13) busquedaEquipo()"/>'+
                '</div>'+
                '<button class="uk-button uk-button-default" onclick=UIkit.tab("#js-control").show(0);busquedaEquipo();>Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admEquipoForm(-1);>Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="EQUIPOS";
    busquedaEquipo();
    admEquipoForm(-1);
}

function busquedaEquipo(){

    var where = " ";
    if ($("#buscar_equipos").val()!="") {
        where += " where lower(equipo) like lower('%"+$("#buscar_equipos").val()+"%') ";
    }
    where += " order by diciplina, genero";
    datos("id_equipo,equipo, diciplina, txt_genero ", " vta_equipo_solo ", where,"UIkit.tab('#js-control').show(1);admEquipoForm");
}

function admEquipoForm(id){
    enviarForm('usuarios/frmEquipo','id='+id);
}

function cargarCarrera(){
    var sexo=$('input:radio[name=sexo]:checked').val();
    var modalidad=$('input:radio[name=modalidad]:checked').val();
    var xmlhttp;
    if (window.XMLHttpRequest){
        xmlhttp=new XMLHttpRequest();
    }
    else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function(){
        if (xmlhttp.readyState==4 && xmlhttp.status==200){
            document.getElementById("divEquipos").innerHTML=xmlhttp.responseText;
        }
    }
    xmlhttp.open("POST","usuarios/frmEquipoCargarCarrera.php",true);
    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("carrera="+$("#cmbCarrea").val()+"&diciplina="+$("#cmbDiciplina").val()+"&campeonato="+$("#cmbCampeonato").val()+"&genero="+sexo+"&modalidad="+modalidad+"");
    //console.log($("#cmbRol").val());
}

function cargarDiciplinaEquipo(){
    var id = $("#cmbCampeonato").val();
    cmbFaseCampeonato=getCombo("id_diciplina, diciplina", "vta_diciplina_campeonato"," where id_campeonato="+id+" ","cmbDiciplina");
}

function cargarCarreraEquipo(){
    console.log("as");
    var modalidad=$('input:radio[name=modalidad]:checked').val();
    cmbFaseCampeonato=getCombo("distinct(carrera),carrera", "vta_alumno_carrera"," where modalidad='"+modalidad+"' ","cmbCarrea");
}

function admFutbolGuardar(){
    var ids = getids("alumnosTab");
    var idsNum = getidsText("alumnoNumTab");
    var sexo=$('input:radio[name=sexo]:checked').val();
    var modalidad=$('input:radio[name=modalidad]:checked').val();

    /*console.log($("#nuevo_equipo").val());
    console.log($("#cmbCampeonato").val());
    console.log($("#cmbCarrea").val());
    console.log($("#cmbDiciplina").val());*/
    //console.log(ids);
    //console.log(idsa);

    enviarFormGuardar('usuarios/frmEquipoGuardar','{"id": "'+$("#id_futbol").val()+'", "nuevo_equipo" : "'+$("#nuevo_equipo").val()+'", '+
        ' "cmbCampeonato" : "'+$("#cmbCampeonato").val()+'", "cmbCarrea" : "'+$("#cmbCarrea").val()+'", "cmbDiciplina" : "'+$("#cmbDiciplina").val()+'", "ids" : "'+ids+'", '+
        ' "idsNum" : "'+idsNum+'", "genero" : "'+sexo+'", "modalidad" : "'+modalidad+'" }');
}

function admJugadorQuitar(id, id_alumno, id_campeonato, tipo){
    /*console.log(id);
    console.log(id_alumno);
    console.log(id_campeonato);
    console.log(tipo);
    console.log($("#camiseta_"+id_alumno).val());*/
    var numero = $("#camiseta_"+id_alumno).val();

    enviarFormGuardar('usuarios/frmEquipoQuitarAlumno','{"id": "'+id+'", "id_alumno" : "'+id_alumno+'", "id_campeonato" : "'+id_campeonato+'", "tipo" : "'+tipo+'", "numero" : "'+numero+'"}');
}

//Estudiantes
function admEstudiantes(){
    encerar();
    var html="";
    var html2="";

    html += '<div class="uk-margin uk-padding uk-padding-remove-left">'+
                '<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_estudiantes" name="buscar_estudiantes" onKeypress="if(event.keyCode == 13) busquedaEstudiantes()"/>'+
                '</div>'+
                '<button class="uk-button uk-button-default" onclick=UIkit.tab("#js-control").show(0);busquedaEstudiantes();>Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admEstudianteForm(-1);>Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="ESTUDIANTES";
    busquedaEstudiantes();
    admEstudianteForm(-1);
}

function busquedaEstudiantes(){

    var where = "";
    if ($("#buscar_estudiantes").val()!="") {
        where += " where lower(razon_social) like lower('%"+$("#buscar_estudiantes").val()+"%') ";
    }
    where += " limit 10";
    datos("id_alumno,razon_social,carrera,nivel", "vta_alumno_carrera", where,"UIkit.tab('#js-control').show(1);admEstudianteForm");
}

function admEstudianteForm(id){
    enviarForm('usuarios/frmEstudiante','id='+id);
}

function admEstudianteGuardar(){
    /*console.log($("#cedula_estudiante").val());
    console.log($("#nombre_estudiante").val());
    console.log($("#apellido_estudiante").val());
    console.log($("#cmbCarrera").val());*/
    var sexo=$('input:radio[name=sexo]:checked').val();
    var modalidad=$('input:radio[name=modalidad]:checked').val();
    //console.log(sexo);

    enviarFormGuardar('usuarios/frmEstudianteGuardar','{"id": "'+$("#id_estudiante").val()+'", "nombre_estudiante" : "'+$("#nombre_estudiante").val()+'",'+
     '"apellido_estudiante" : "'+$("#apellido_estudiante").val()+'", "cmbCarrera" : "'+$("#cmbCarrera").val()+'", "sexo" : "'+sexo+'", '+
     '"cedula" : "'+$("#cedula_estudiante").val()+'", "modalidad" : "'+modalidad+'", "paralelo" : "'+$("#id_paralelo").val()+'"}');

}



//FASE DE GRUPOS
function admFaseGrupos(){
    encerar();
    var html="";
    var html2="";

    var cmbFaseCampeonato="";

    cmbFaseCampeonato=getCombo("id_campeonato, campeonato", "tbl_campeonato","","cmbCampeonato");
    //$html .= $comboCampeonato.

    html += '<div class="uk-margin uk-padding uk-padding-remove-left uk-width-1-2@s">'+
                '<select class="uk-select" name="cmbCampeonato" id="cmbCampeonato">'+cmbFaseCampeonato+
                '</select><button class="uk-button uk-button-primary uk-button-small" onclick=UIkit.tab("#js-control").show(0);busquedaFaseGrupo();>Buscar</button>'+
                /*'<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_equipos" name="buscar_equipos" onKeypress="if(event.keyCode == 13) busquedaBasquet()"/>'+
                '</div>'+*/
                //'<button class="uk-button uk-button-default" onclick=busquedaBasquet() >Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admFaseGrupo(-1);>Generar Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="FASE DE GRUPOS";
    busquedaFaseGrupo();
}

function busquedaFaseGrupo(){

    var where = "";
    /*if ($("#buscar_estudiantes").val()!="") {
        where += " where lower(razon_social) like lower('%"+$("#buscar_estudiantes").val()+"%') ";
    }*/
    if ($("#cmbCampeonato").val()!="") {
        where += " where id_campeonato="+$("#cmbCampeonato").val()+" ";
    }
    where += " order by diciplina";
    //datos("id_equipo,equipo,diciplina, grupo_futbol, txt_genero", "vta_grupo_futbol", where,"admFaseGrupoForm");
    datos("id_diciplina,diciplina", "vta_diciplina_campeonato", where,"UIkit.tab('#js-control').show(1);admFaseGrupoForm");
}

function admFaseGrupo(id){
//console.log($("#cmbCampeonato").val());
  enviarForm('usuarios/frmFaseGrupo','id='+$("#cmbCampeonato").val());
}

function admFaseGrupoGuardar(){
    //console.log($("#cmbCampeonato").val());
    enviarFormGuardar('usuarios/frmFaseGrupoGuardar','{"id": "'+$("#cmbCampeonato").val()+'" }');

}

function admFaseGrupoForm(id){
    enviarForm('usuarios/frmFaseGrupoDiciplina','idCampeonato='+$("#cmbCampeonato").val()+"&id="+id);
}

//CALENDARIOS
function admCalendario(){
    encerar();
    var html="";
    var html2="";

    var cmbFaseCampeonato="";

    cmbFaseCampeonato=getCombo("id_campeonato, campeonato", "tbl_campeonato","","cmbCampeonato");
    //$html .= $comboCampeonato.

    html += '<div class="uk-margin uk-padding uk-padding-remove-left uk-width-1-2@s">'+
                '<select class="uk-select" name="cmbCampeonato" id="cmbCampeonato">'+cmbFaseCampeonato+'</select>'+
                /*'<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_equipos" name="buscar_equipos" onKeypress="if(event.keyCode == 13) busquedaBasquet()"/>'+
                '</div>'+*/
                //'<button class="uk-button uk-button-default" onclick=busquedaBasquet() >Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;
    document.getElementById("divInfo").innerHTML="CALENDARIOS";

    $.ajax({
       beforeSend: function(){
         // Handle the beforeSend event
         html2 += 'Fecha de Inicio: <input type="text" id="f_inicio" name="f_inicio" placeholder="dd/mm/YYYY..." class="uk-input uk-form-width-medium uk-form-small">';
       },
       complete: function(){
         // Handle the complete event
         $( "#f_inicio" ).datepicker({ dateFormat: 'dd-mm-yy', minDate: -0 }).val();
       }
       // ......
     });

    html2 += ' Hora Inicio: <input id="id_horai" name="id_horai" class="uk-input uk-form-width-xsmall" type="text" placeholder="hh">';
    html2 += ':<input id="id_minutoi" name="id_minutoi" class="uk-input uk-form-width-xsmall" type="text" placeholder="mm">';
    html2 += ' Hora Final: <input id="id_horaf" name="id_horaf" class="uk-input uk-form-width-xsmall" type="text" placeholder="hh">';
    html2 += ':<input id="id_minutof" name="id_minutof" class="uk-input uk-form-width-xsmall" type="text" placeholder="mm">';
    html2 += '<br><button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admCalendarios(-1);>Generar Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    busquedaCalendario();
}

function admCalendarioGuardar(){
    /*console.log($("#cmbCampeonato").val());
    console.log($("#f_inicio").val());
    console.log($("#id_horai").val());
    console.log($("#id_minutoi").val());
    console.log($("#id_horaf").val());
    console.log($("#id_minutof").val());*/
    enviarFormGuardar('usuarios/frmCalendarioGuardar','{"id": "'+$("#cmbCampeonato").val()+'", "fecha" : "'+$("#f_inicio").val()+'", "hi": "'+$("#id_horai").val()+'", '+
    ' "mi" : "'+$("#id_minutoi").val()+'", "hf" : "'+$("#id_horaf").val()+'", "mf" : "'+$("#id_minutof").val()+'" }');

}

function admCalendarios(id){
//console.log($("#cmbCampeonato").val());
  enviarForm('usuarios/frmCalendario','id='+$("#cmbCampeonato").val()+'&fecha='+$("#f_inicio").val()+
    '&hi='+$("#id_horai").val()+'&mi='+$("#id_minutoi").val()+'&hf='+$("#id_horaf").val()+'&mf='+$("#id_minutof").val());
}

function busquedaCalendario(){
    var where = "";
    if ($("#cmbCampeonato").val()!=null) {
        where += " where id_campeonato="+$("#cmbCampeonato").val()+" ";
    }
    where += " order by diciplina";
    //datos("id_equipo,equipo,diciplina, grupo_futbol, txt_genero", "vta_grupo_futbol", where,"admFaseGrupoForm");
    datos("id_diciplina,diciplina", "vta_diciplina_campeonato", where,"UIkit.tab('#js-control').show(1);admCalendarioForm");
}

function admCalendarioForm(id){
    enviarForm('usuarios/frmCalendarioGrupo','idCampeonato='+$("#cmbCampeonato").val()+"&id="+id);
}

function admFichaControl(){
    /*console.log(equipoa);
    console.log(equipob);
    window.open('partido/index.php?varA='+equipoa+'&varB='+equipob,'_blank');
    enviarForm('partido/index','idEquipoA='+equipoa+'&idEquipoB='+equipob);*/
    encerar();
    var html="";
    var html2="";

    html += '<div class="uk-margin uk-padding uk-padding-remove-left">'+
                '<div class="uk-inline">'+
                    '<a class="uk-form-icon" uk-icon="icon: search"></a>'+
                    '<input class="uk-input" placeholder="Buscar..." type="text" id="buscar_ficha" name="buscar_ficha" onKeypress="if(event.keyCode == 13) busquedaFicha()"/>'+
                '</div>'+
                '<button class="uk-button uk-button-default" onclick=UIkit.tab("#js-control").show(0);busquedaFicha();>Buscar</button>'+
            '</div>';

    document.getElementById("divMenu1").innerHTML=html;

    html2 += '<button class="uk-button uk-button-primary" onclick=UIkit.tab("#js-control").show(1);admFichaForm(-1);>Nuevo</button>';

    document.getElementById("divMenu2").innerHTML=html2;
    document.getElementById("divInfo").innerHTML="FICHA DE CONTROL";
    busquedaFicha();
    admEstudianteForm(-1);
}

function busquedaFicha(){

    var where = "";
    if ($("#buscar_ficha").val()!="") {
        where += " where lower(razon_social) like lower('%"+$("#buscar_ficha").val()+"%') ";
    }
    where += " order by estado desc, fecha, hora limit 10";
    datos("id_ficha_control,equipo_a,equipo_b,diciplina, fecha, hora, txt_estado", "vta_ficha_control", where,"UIkit.tab('#js-control').show(1);admFichaForm");
}

function admFichaForm(id){
 //   enviarForm('usuarios/frmCalendarioGrupo','idCampeonato='+$("#cmbCampeonato").val()+"&id="+id);
 window.open('partido/index.php?id='+id,'_blank');
}
