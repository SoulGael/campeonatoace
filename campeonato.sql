--campeonato
--Rol
CREATE TABLE tbl_rol
(
  id_rol serial NOT NULL,
  rol character varying(30) NOT NULL,
  eliminado boolean NOT NULL DEFAULT false,
  CONSTRAINT pk_id_rol PRIMARY KEY (id_rol)
);

CREATE TABLE tbl_usuario
(
  alias character varying(15) NOT NULL,
  clave character varying(100) NOT NULL,
  id_rol integer NOT NULL,
  estado boolean NOT NULL DEFAULT true,
  sesion character varying(100)
);

create or replace view vta_usuario as
select u.*, r.rol,
case u.estado
 when true then 'ACTIVO'
 else 'INACTIVO'
end as txt_estado
from tbl_usuario u
join tbl_rol r on u.id_rol=r.id_rol 

insert into tbl_rol (rol) values ('Administrador');
insert into tbl_rol (rol) values ('Estudiante');

insert into tbl_usuario values ('gromero',md5('gromero'),1,true);
insert into tbl_usuario values ('mtais',md5('mtais'),2,true);

----Administacion de usuarios y Control de privilegios
CREATE TABLE tbl_pagina
(
  id_pagina serial,
  modulo integer,
  pagina character varying(30) NOT NULL,
  descripcion character varying(80) NOT NULL,
  CONSTRAINT pk_id_pagina PRIMARY KEY (id_pagina)
);

CREATE TABLE tbl_privilegio
(
  id_rol integer NOT NULL,
  id_pagina integer NOT NULL
);

insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admUsuario','Acceso para Administrar Usuarios');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admPrivilegios','Acceso para Administrar Privilegios');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admRoles','Acceso para Administrar Roles');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admCampeonato','Acceso para Administrar el Campeonato');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admEquipos','Acceso para Ingresar Nuevos Equipos');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admFaseGrupos','Acceso para Realizar la Fase de Grupos');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admEstudiantes','Acceso para Administrar la Nomina de Estudiantes');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admDiciplinas','Acceso para Administrar las Diciplinas');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admCalendario','Acceso para Administrar los Calendarios');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admFichaControl','Acceso para Administrar las Fichas de Control');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admGarantia','Acceso para Administrar las Garantias');
insert into tbl_pagina (modulo,pagina,descripcion) values ('1','admTarjetas','Acceso para Administrar las Multas de Tarjetas');

create or replace view vta_privilegio as
select r.*, pa.* 
from tbl_rol r
join tbl_privilegio p on r.id_rol=p.id_rol
join tbl_pagina pa on p.id_pagina=pa.id_pagina;

--select * from vta_privilegio
--select * from vta_privilegio where id_pagina not in (SELECT id_pagina FROM vta_privilegio where id_rol=2)
--select * from tbl_pagina where id_pagina not in (SELECT id_pagina FROM vta_privilegio where id_rol=1)
--usuarios

--select * from tbl_pagina;
--select * from tbl_privilegio;
insert into tbl_privilegio values(1,2);insert into tbl_privilegio values(1,3);
insert into tbl_privilegio values(1,5);insert into tbl_privilegio values(1,4);
insert into tbl_privilegio values(1,1);insert into tbl_privilegio values(1,6);
insert into tbl_privilegio values(1,7);insert into tbl_privilegio values(1,8);
insert into tbl_privilegio values(1,9);

--delete from tbl_privilegio where id_pagina=2

----------CAMPEONATO
CREATE TABLE tbl_campeonato
(
  id_campeonato serial,
  campeonato character varying(80) NOT NULL,
  fecha date,
  fecha_inicio date,
  fecha_max_inscripcion date,
  varones boolean,
  damas boolean,
  conformacion_equipos text,
  valor_ins numeric(13,2),
  valor_gar numeric(13,2),
  doc_habilitantes text,
  fecha_inauguracion date,
  presentacion_equipos text,
  mesa_control text,
  arbitraje text,
  coor_diciplina text,
  contacto_sugerencia text,
  estado boolean default true,
  CONSTRAINT pk_id_campeonato PRIMARY KEY (id_campeonato)
);

--drop table tbl_campeonato
--drop table tbl_equipo
  --drop table tbl_partido
  --drop table tbl_grupo_futbol
  --drop view vta_equipo

create table tbl_diciplina(
id_diciplina serial,
diciplina character varying (100),
hora time without time zone,
estado boolean default true,
CONSTRAINT pk_id_diciplina PRIMARY KEY (id_diciplina)
);

--drop table tbl_diciplina cascade
--alter table tbl_diciplina add column hora integer;
--alter table tbl_diciplina add column minuto integer;

create or replace view vta_diciplina as
select d.*, 
case d.estado
  when true then 'Activo'
  when false then 'Inactivo'
end as txt_estado
from tbl_diciplina d;

-- drop view vta_diciplina

create table tbl_diciplina_campeonato(
id_diciplina integer,
id_campeonato integer
);

--delete from tbl_diciplina_campeonato
--select * from vta_diciplina order by diciplina;
--select * from tbl_diciplina_campeonato
-- insert into tbl_diciplina (diciplina) values (UPPER('CASACARAS'))
-- select * from tbl_diciplina
-- insert into tbl_diciplina_campeonato values(4,4)
-- delete from tbl_diciplina_campeonato where id_diciplina=4 and id_campeonato=4
--SELECT * FROM tbl_campeonato where id_campeonato=1 and estado=false


/*insert into tbl_campeonato (campeonato, fecha, fecha_inicio, fecha_max_inscripcion, futbol, voley, basket, varones, damas, conformacion_equipos, 
valor_ins, valor_gar, doc_habilitantes, fecha_inauguracion,presentacion_equipos,mesa_control, arbitraje, coor_diciplina, contacto_sugerencia,estado) 
values ('uniandes 2017', date 'now()', '12-07-2017', '10-07-2017', true, true, false, true, true, 
'El equipo puede estar conformado por estu','20.00', '21.06', '1.- Ficha de Inscipcion', '17-07-2017', 'los equipos deberan presentarse',
'se designara de forma rotativa a cada equipo','el valor de 19 sera cubierto por los equipos', 'lcdo luis castro','kalingmaifua@yahoo.es',true)*/

----------EQUIPO
CREATE TABLE tbl_equipo
(
  id_equipo serial,
  equipo character varying(80) NOT NULL,
  fecha date,
  genero boolean,
  modalidad character varying(2),
  id_campeonato_actual integer,
  id_diciplina integer,
  CONSTRAINT pk_id_equipo PRIMARY KEY (id_equipo),
  constraint fk_id_equipo_id_campeonato foreign key (id_campeonato_actual) references tbl_campeonato(id_campeonato),
  constraint fk_id_equipo_id_diciplina foreign key (id_diciplina) references tbl_diciplina(id_diciplina)
);

--select * from vta_alumno_carrera
--insert into tbl_equipo (equipo, fecha, id_campeonato_actual) values ('varones', date 'now()', 1) ;
--insert into tbl_equipo (equipo, fecha, id_campeonato_actual) values ('varones', date 'now()', 1) returning id_equipo;
-- update tbl_equipo set equipo='VIPS', id_campeonato_actual=4, id_diciplina=4 where id_equipo=2
--select id_equipo,equipo,fecha from tbl_equipo where lower(equipo) like lower('%va%')  order by id_campeonato_actual
--drop table tbl_equipo
--drop table tbl_grupo_futbol 
--drop table tbl_partido
--drop view vta_grupo_futbol 
-- drop view vta_equipo
--select d.*, c.id_campeonato from tbl_diciplina d join tbl_diciplina_campeonato c on c.id_diciplina=d.id_diciplina
--select * from tbl_equipo e join tbl_diciplina d on e.id_diciplina=d.id_diciplina

create view vta_diciplina_campeonato as 
select d.*, c.id_campeonato 
from tbl_diciplina d 
join tbl_diciplina_campeonato c on c.id_diciplina=d.id_diciplina;

-- select * from vta_diciplina_campeonato where id_campeonato=4
-- select * from vta_equipo_solo
-- select * from vta_grupo_futbol

----CARRERA

CREATE TABLE tbl_carrera(
  id_carrera serial,
  carrera character varying(80) NOT NULL,
  nivel character varying(80) NOT NULL,
  id_nivel integer,
  CONSTRAINT pk_id_carrera PRIMARY KEY (id_carrera)
);
-----alter table tbl_carrera add column id_nivel integer

/*CREATE TABLE tbl_equipo_carrera(
  id_equipo integer,
  id_carrera integer
)*/

-- delete from tbl_carrera

insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','PRIMER',1);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','SEGUNDO',2);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','TERCERO',3);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','CUARTO',4);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','QUINTO',5);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','SEXTO',6);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','SEPTIMO',7);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','OCTAVO',8);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','NOVENO',9);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('SISTEMAS','DECIMO',10);

insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','PRIMER',1);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','SEGUNDO',2);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','TERCERO',3);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','CUARTO',4);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','QUINTO',5);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','SEXTO',6);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','SEPTIMO',7);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','OCTAVO',8);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','NOVENO',9);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('CONTABILIDAD SUPERIOR  Y AUDITORIA C.P.A','DECIMO',10);

insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','PRIMER',1);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','SEGUNDO',2);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','TERCERO',3);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','CUARTO',4);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','QUINTO',5);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','SEXTO',6);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','SEPTIMO',7);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','OCTAVO',8);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','NOVENO',9);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('DERECHO','DECIMO',10);

insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','PRIMER',1);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','SEGUNDO',2);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','TERCERO',3);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','CUARTO',4);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','QUINTO',5);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','SEXTO',6);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','SEPTIMO',7);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','OCTAVO',8);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','NOVENO',9);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('EMPRESAS TURISTICAS Y HOTELERAS','DECIMO',10);

insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','PRIMER',1);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','SEGUNDO',2);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','TERCERO',3);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','CUARTO',4);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','QUINTO',5);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','SEXTO',6);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','SEPTIMO',7);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','OCTAVO',8);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','NOVENO',9);
insert into tbl_carrera (carrera, nivel,id_nivel) values ('ADMINISTRACION DE EMPRESAS Y NEGOCIOS','DECIMO',10);

--update tbl_carrera set nivel='PRIMER' where nivel='PRIMERO';
--select distinct(carrera) from tbl_carrera order by carrera
--select * from tbl_carrera where lower(carrera)=lower('SISTEMAS') and lower(nivel)=lower('PRIMERO')

--------ALUMNOS
create table tbl_alumno(
 id_alumno serial,
 nombres character varying(80), 
 apellidos character varying(80),
 cedula character varying(20), 
 sexo boolean,
 modalidad character varying(2),
 id_carrera_actual integer,
 paralelo character varying(2),
 CONSTRAINT pk_id_alumno PRIMARY KEY (id_alumno),
 constraint fk_id_alumno_id_carrera foreign key (id_carrera_actual) references tbl_carrera(id_carrera)
);

--delete from tbl_alumno
-- select * from tbl_alumno
--alter table tbl_alumno add column paralelo character varying(2)
--update tbl_alumno set paralelo='A';

--drop table tbl_alumno;
--drop view vta_equipo;
--drop view vta_alumno_carrera;

--drop table tbl_equipo_alumno;
--drop table tbl_carrera_alumno;

create table tbl_equipo_alumno(
id_equipo integer,
id_alumno integer,
id_carrera integer,
id_campeonato integer,
num_camiseta integer
);

--alter table tbl_equipo_alumno add column num_camiseta integer
--insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato) values (2,3,(select id_carrera_actual from tbl_alumno where id_alumno=2),1)
--drop table tbl_equipo_alumno
/*create table tbl_carrera_alumno(
id_carrera integer,
id_alumno integer
)*/
--select * from tbl_equipo
--select * from tbl_alumno
--delete from tbl_equipo_alumno
--select id_carrera_actual from tbl_alumno where id_alumno=2
--select * from vta_equipo where id_equipo=1 and id_alumno=10 and id_campeonato=4

create or replace view vta_equipo as
select a.*, e.id_equipo, e.equipo, e.id_campeonato_actual, e.id_diciplina, e.genero, c.*, ca.*, 
a.apellidos||' '||a.nombres as razon_social, d.diciplina, ea.num_camiseta, 
case e.genero
  when true then 'MASCULINO'
  else 'FEMENINO'
end as txt_genero
from tbl_equipo_alumno ea
join tbl_alumno a on ea.id_alumno=a.id_alumno
join tbl_equipo e on ea.id_equipo=e.id_equipo
join tbl_diciplina d on d.id_diciplina=e.id_diciplina
join tbl_carrera c on ea.id_carrera=c.id_carrera
join tbl_campeonato ca on ea.id_campeonato=ca.id_campeonato;

create or replace view vta_equipo_solo as
select e.*, case e.genero when true then 'MASCULINO' else 'FEMENINO' end as txt_genero, d.diciplina
from tbl_equipo e
join tbl_diciplina d on d.id_diciplina=e.id_diciplina;

-- select * from vta_equipo where id_equipo=8
-- drop view vta_equipo

/*insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('RAMIRO ALEXANDER', 'FIGUEROA ROMERO', '1726350612', true,1);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('ALEJANDRA ESTEFANIA', 'CARAPAS REVELO', '1004340558', false,1);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('KEVIN ANDRES', 'TORRES MORILLO', '0401703046', true,1);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('ESTALIN JAVIER', 'COLLAHUAZO LOPEZ', '1003185657', true,10);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('DANIEL ALEJANDRO', 'OLMEDO MASPUD', '1050401007', true,10);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('ANGELICA SOLEDAD', 'CASTILLO CABASCANGO', '1723873756', true,10);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('MARIO EDUARDO', 'ALARCON ANGULO', '1004027718', true,12);

insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('CARLOS JOSE', 'FUENTES MONTESDEOCA', '1003637400', true,4);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('HENRY LEONEL', 'NARVAEZ CANASCUAN', '401810080', true,4);

insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('CRISTIAN MARCELO', 'SANCHEZ CHAMORRO', '1003334180', true,6);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('BRYAN EDUARDO', 'ROSERO AVENDAÑO', '1004681084', true,6);
insert into tbl_alumno (nombres, apellidos, cedula, sexo, id_carrera_actual) values ('PAUL ALEXANDER', 'CIFUENTES BENALCAZAR', '1003554704', true,6);*/

--select * from tbl_alumno
--select * from tbl_carrera

/*insert into tbl_carrera_alumno values (20,1);
insert into tbl_carrera_alumno values (20,2);
insert into tbl_carrera_alumno values (20,3);
insert into tbl_carrera_alumno values (2,4);
insert into tbl_carrera_alumno values (2,5);
insert into tbl_carrera_alumno values (2,6);
insert into tbl_carrera_alumno values (3,7);*/

--drop table tbl_carrera_alumno
--delete from tbl_carrera_alumno;

create or replace view vta_alumno_carrera as 
select a.*, c.carrera, c.nivel, a.apellidos||' '||a.nombres as razon_social,
case a.sexo
 when true then 'M'
 else 'F'
end as genero from tbl_alumno a
join tbl_carrera c on c.id_carrera  = a.id_carrera_actual
order by c.carrera, c.id_nivel, genero, razon_social;

-- select * from tbl_carrera order by carrera, id_nivel;
-- select * from vta_alumno_carrera where carrera='SISTEMAS' and id_alumno not in (select id_alumno from vta_equipo where id_campeonato=4 and id_diciplina=2)  and nivel='".$nivel."';
-- select * from vta_equipo where id_equipo=1 and id_campeonato=4 and id_diciplina=2
-- select * from vta_alumno_carrera
-- drop view vta_alumno_carrera;

--Grupos
create table tbl_grupo_futbol(
id_grupo_futbol serial,
grupo_futbol character varying (5),
id_campeonato integer, 
id_equipo integer,
jugados integer default 0,
ganados integer default 0,
empatados integer default 0,
perdidos integer default 0,
gol_favor integer default 0,
gol_contra integer default 0,
gol_diferencia integer default 0,
puntos integer default 0,
 CONSTRAINT pk_id_grupo_futbol PRIMARY KEY (id_grupo_futbol),
 constraint fk_tbl_campeonato_id_campeonato foreign key (id_campeonato) references tbl_campeonato(id_campeonato),
 constraint fk_id_equipo_tbl_equipo foreign key (id_equipo) references tbl_equipo(id_equipo)
);

create or replace view vta_grupo_futbol as
select f.*, e.equipo, e.fecha, e.id_diciplina, e.genero, d.diciplina, e.txt_genero
from tbl_grupo_futbol f 
join vta_equipo_solo e on e.id_equipo=f.id_equipo
join tbl_diciplina d on d.id_diciplina=e.id_diciplina;

-- insert into tbl_grupo_futbol (grupo_futbol, id_campeonato, id_equipo) values ();
-- sELECT * FROM tbl_equipo
-- select * from vta_grupo_futbol
-- select * from vta_grupo_solo
-- drop view vta_grupo_solo

-- FICHA JUGADOR
create table tbl_ficha_control(
id_ficha_control serial,
id_grupo_futbol_a integer,
id_grupo_futbol_b integer,
fecha date,
hora time without time zone,
goles_a integer,
goles_b integer,
docente_coordinador_a text,
docente_coordinador_b text,
estado character varying(2),
observaciones text,
 CONSTRAINT pk_id_ficha_control PRIMARY KEY (id_ficha_control),
 constraint fk_id_grupo_futbol_a_tbl_grupo_futbol foreign key (id_grupo_futbol_a) references tbl_grupo_futbol(id_grupo_futbol),
 constraint fk_id_grupo_futbol_b_tbl_grupo_futbol foreign key (id_grupo_futbol_b) references tbl_grupo_futbol(id_grupo_futbol)
);

-- drop table tbl_ficha_control
-- select * from vta_grupo_futbol
-- delete from tbl_ficha_control
/*insert into tbl_ficha_control (id_grupo_futbol_a, id_grupo_futbol_b, fecha, hora, goles_a, goles_b) 
values (1,2,'12-07-2017','14:30',2,2) */

create or replace view vta_ficha_control as
select c.*, ga.equipo as equipo_a, gb.equipo as equipo_b,
case c.estado 
 when 'p' then 'PROXIMO'
 when 'f' then 'FINALIZADO'
end as txt_estado,
ga.diciplina
from tbl_ficha_control c
join vta_grupo_futbol ga on c.id_grupo_futbol_a=ga.id_grupo_futbol
join vta_grupo_futbol gb on c.id_grupo_futbol_b=gb.id_grupo_futbol;

-- select * from vta_ficha_control where (id_grupo_futbol_a = 4 or id_grupo_futbol_b = 4) and estado='f' order by fecha, hora limit 6
-- select * from vta_grupo_futbol where id_grupo_futbol=176 and genero=true
-- select * from vta_equipo where id_equipo=4
-- select * from vta_ficha_control where id_ficha_control=175 order by estado desc, fecha, hora

create or replace view vta_grupo_equipo as
select f.id_grupo_futbol, e.* from vta_grupo_futbol f
join vta_equipo e on f.id_equipo=e.id_equipo


-- where id_grupo_futbol=1

create table tbl_ficha_jugador(
id_ficha_jugador serial,
id_ficha_control integer,
id_grupo_futbol integer,
id_alumno integer, 
gol integer, 
tipo character varying(2),
tarjeta_roja integer,
tarjeta_amarilla integer,
capitan boolean default false,
CONSTRAINT pk_id_ficha_jugador PRIMARY KEY (id_ficha_jugador),
 constraint fk_id_ficha_jugador_tbl_ficha_control foreign key (id_ficha_control) references tbl_ficha_control(id_ficha_control)
);

--drop table tbl_ficha_jugador
--select * from vta_equipo where id_equipo in (1,2);
--delete from tbl_ficha_jugador
--select * from tbl_ficha_control
--select * from tbl_grupo_futbol
/* insert into tbl_ficha_jugador (id_ficha_control, id_grupo_futbol, id_alumno, gol, capitan) 
values (1, 1, 1682, 2, true);
 insert into tbl_ficha_jugador (id_ficha_control, id_grupo_futbol, id_alumno, gol, capitan) 
values (1, 1, 1691, 1, false);
insert into tbl_ficha_jugador (id_ficha_control, id_grupo_futbol, id_alumno, gol, capitan) 
values (1, 1, 1694, 2, false);

insert into tbl_ficha_jugador (id_ficha_control, id_grupo_futbol, id_alumno, gol, capitan) 
values (1, 2, 1684, 1, false);
insert into tbl_ficha_jugador (id_ficha_control, id_grupo_futbol, id_alumno, gol, capitan) 
values (1, 2, 1690, 1, false);
insert into tbl_ficha_jugador (id_ficha_control, id_grupo_futbol, id_alumno, gol, capitan) 
values (1, 2, 1685, 1, false);
*/

create view vta_ficha_jugador
select f.*, a.nombres||a.apellido, a.cedula from tbl_ficha_jugador f
join tbl_alumno a on f.id_alumno=a.id_alumno;

create table tbl_ficha_cambio(
id_ficha_cambio serial,
id_ficha_control integer,
id_alumno_entra integer,
id_alumno_sale integer
CONSTRAINT pk_id_ficha_cambio PRIMARY KEY (id_ficha_jugador),
constraint fk_id_ficha_contro_tbl_ficha_control foreign key (id_ficha_control) references tbl_ficha_control (id_ficha_cambio),
constraint fk_id_alumno_entra_tbl_alumno foreign key (id_alumno_entra) references tbl_alumno(id_alumno),
constraint fk_id_alumno_sale_tbl_alumno foreign key (id_alumno_sale) references tbl_alumno(id_alumno)
);

create table tbl_ficha_detalle(
id_ficha_detalle serial,
id_ficha_control integer,
accion character varying(2),
id_equipo integer,
id_alumno integer,
 CONSTRAINT pk_id_ficha_detalle PRIMARY KEY (id_ficha_detalle),
constraint fk_id_ficha_contro_tbl_ficha_control foreign key (id_ficha_control) references tbl_ficha_control (id_ficha_cambio),
constraint fk_id_equipo_tbl_equipo foreign key (id_equipo) references tbl_equipo(id_equipo),
constraint fk_id_alumno_tbl_alumno foreign key (id_alumno) references tbl_alumno(id_alumno)
);

create table perdida_garantia(
id_perdida_garantia serial,
id_campeonato integer,
id_equipo integer,
nombre_equipo text,
id_ficha_control integer,
fecha date,
CONSTRAINT pk_id_perdida_garantia PRIMARY KEY (id_perdida_garantia)
)

create table tbl_tarjeta(
id_tarjeta serial,
tarjeta character varying (10),
id_estudiante integer,
id_ficha_control integer,
fecha date,
estado boolean default false,
CONSTRAINT pk_id_tarjeta PRIMARY KEY (id_tarjeta)
)

create or replace view vta_tarjeta as
select * from tbl_tarjeta t
join vta_alumno_carrera c on t.id_estudiante=c.id_alumno

--drop table tbl_tarjeta 

create or replace view vta_perdida_garantia as
select g.*, e.equipo, e.id_campeonato_actual, e.txt_genero, e.diciplina from perdida_garantia g
join vta_equipo_solo e on g.id_equipo=e.id_equipo

select * from vta_perdida_garantia where lower(equipo) like (select lower(equipo) from tbl_equipo where id_equipo=31)

select * from vta_perdida_garantia where lower(equipo) like (select lower(equipo) from tbl_equipo where id_equipo=(select id_equipo from perdida_garantia where id_perdida_garantia=3))

select * from tbl_ficha_control
select * from tbl_equipo

select (select id_campeonato_actual,id_equipo from tbl_equipo where id_equipo=(select id_equipo from tbl_grupo_futbol where id_grupo_futbol=(select id_grupo_futbol_a from tbl_ficha_control where id_ficha_control=224) )), 
id_grupo_futbol_a, equipo from 
------CONSULTAS GENERALES

-- delete from tbl_equipo
-- delete from tbl_equipo_alumno
-- delete from tbl_ficha_control
select * from tbl_ficha_control f
join vta_equipo_solo e on f.id_grupo_futbol_a=e.id_equipo
where f.id_

select array_agg(id_grupo_futbol) from vta_grupo_futbol where id_campeonato=1 and grupo_futbol='3' and id_diciplina=1 and genero=true;

select * from tbl_grupo_futbol f
join vta_equipo_solo e on f.id_equipo=e.id_equipo
group by e.diciplina, f.grupo_futbol order by e.diciplina 

select * from vta_grupo_solo
select * from tbl_campeonato

