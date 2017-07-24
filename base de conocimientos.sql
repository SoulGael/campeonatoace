-- select * from tbl_diciplina

insert into tbl_campeonato (campeonato, fecha, fecha_inicio, fecha_max_inscripcion, varones, damas, conformacion_equipos, valor_ins, valor_gar,
doc_habilitantes, fecha_inauguracion, presentacion_equipos, mesa_control, arbitraje, coor_diciplina, contacto_sugerencia) values 
('UNIANDES 2016', now(), '25-11-2016', '18-11-2016', true, true, 'El equipo puede estar conformado por estudiantes de distintos niveles de la misma carrera, dependiendo de la cantidad de alumnos por curso. No se receptara la inscripcion de varios equipos de un mismo nivel.',
20.00, 50.00, '1. Ficha de Inscripcion llena en su totalidad 2. Copia legible de la cedula a color de cada deportista 3. Firma del Acta de Compromiso',
'25-11-2016', 'Los equipos deberan presentarse el dia de Inauguración: a) Correctamente Uniformados. b) Con el numero minimo de jugadores por diciplina y categoria c) Correctamente identificado por medio de una pancarta o letrero con el nombre del equipo y datos de presentacion. d) Con una Mascota por carrera. e) Con una Srta Madrina por equipo.',
'se designara de forma rotativa a cada equipo.', 'El valor de $10.00 sea cubierto por los equipos, que juegen el encuentro. (USD 5.00 c/equipo).',
'Lcdo. Luis Castro - Indor Ing. Juber Montesdeoca - Baloncesto, Dr. Ramiro Cevallos - Coordinador', 'kalin magu@yahoo.com 093374017');

-- select * from tbl_campeonato
-- select * from vta_equipo

-- FUTBOL MASCULINOS
-- LOS VIAJEROS, ANONYMOUS, LOS NIUPI, SPORTING CLUB, JACK DANIELS, SPORT SYSTEM, LOS DEL B, SEGUNDO DERECHO, FURER, MASTER LAW, PRIMERO C
-- select * from vta_equipo_solo where id_diciplina=1
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS VIAJEROS', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1003554704'),(select id_carrera_actual from tbl_alumno where cedula='1003554704'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1004681084'),(select id_carrera_actual from tbl_alumno where cedula='1004681084'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1003637400'),(select id_carrera_actual from tbl_alumno where cedula='1003637400'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1003856190'),(select id_carrera_actual from tbl_alumno where cedula='1003856190'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1004680920'),(select id_carrera_actual from tbl_alumno where cedula='1004680920'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1003753033'),(select id_carrera_actual from tbl_alumno where cedula='1003753033'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1004050256'),(select id_carrera_actual from tbl_alumno where cedula='1004050256'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (1, 
 (select id_alumno from tbl_alumno where cedula='1003334180'),(select id_carrera_actual from tbl_alumno where cedula='1003334180'), 1, 1);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('ANONYMOUS', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1004701734'),(select id_carrera_actual from tbl_alumno where cedula='1004701734'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1002742359'),(select id_carrera_actual from tbl_alumno where cedula='1002742359'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1003820188'),(select id_carrera_actual from tbl_alumno where cedula='1003820188'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1004596159'),(select id_carrera_actual from tbl_alumno where cedula='1004596159'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1004356406'),(select id_carrera_actual from tbl_alumno where cedula='1004356406'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1003855192'),(select id_carrera_actual from tbl_alumno where cedula='1003855192'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (2, 
 (select id_alumno from tbl_alumno where cedula='1003987300'),(select id_carrera_actual from tbl_alumno where cedula='1003987300'), 1, 1);
 
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS NIUPI', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='1724000698'),(select id_carrera_actual from tbl_alumno where cedula='1724000698'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='1004224901'),(select id_carrera_actual from tbl_alumno where cedula='1004224901'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='1727979013'),(select id_carrera_actual from tbl_alumno where cedula='1727979013'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='1004439152'),(select id_carrera_actual from tbl_alumno where cedula='1004439152'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='1004162960'),(select id_carrera_actual from tbl_alumno where cedula='1004162960'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='0803633965'),(select id_carrera_actual from tbl_alumno where cedula='0803633965'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (3, 
 (select id_alumno from tbl_alumno where cedula='1004499255'),(select id_carrera_actual from tbl_alumno where cedula='1004499255'), 1, 3);


insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SPORTING CLUB', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1002022265'),(select id_carrera_actual from tbl_alumno where cedula='1002022265'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1003723903'),(select id_carrera_actual from tbl_alumno where cedula='1003723903'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1002642658'),(select id_carrera_actual from tbl_alumno where cedula='1002642658'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='0401953104'),(select id_carrera_actual from tbl_alumno where cedula='0401953104'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='0803812783'),(select id_carrera_actual from tbl_alumno where cedula='0803812783'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1003930037'),(select id_carrera_actual from tbl_alumno where cedula='1003930037'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1004016190'),(select id_carrera_actual from tbl_alumno where cedula='1004016190'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1003507876'),(select id_carrera_actual from tbl_alumno where cedula='1003507876'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1004192207'),(select id_carrera_actual from tbl_alumno where cedula='1004192207'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1004437990'),(select id_carrera_actual from tbl_alumno where cedula='1004437990'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (4, 
 (select id_alumno from tbl_alumno where cedula='1003867064'),(select id_carrera_actual from tbl_alumno where cedula='1003867064'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('JACK DANIELS', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1003421466'),(select id_carrera_actual from tbl_alumno where cedula='1003421466'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='0401703046'),(select id_carrera_actual from tbl_alumno where cedula='0401703046'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1004976476'),(select id_carrera_actual from tbl_alumno where cedula='1004976476'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1004826663'),(select id_carrera_actual from tbl_alumno where cedula='1004826663'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='0804822443'),(select id_carrera_actual from tbl_alumno where cedula='0804822443'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1720995958'),(select id_carrera_actual from tbl_alumno where cedula='1720995958'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1003110101'),(select id_carrera_actual from tbl_alumno where cedula='1003110101'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1004284467'),(select id_carrera_actual from tbl_alumno where cedula='1004284467'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (5, 
 (select id_alumno from tbl_alumno where cedula='1003756119'),(select id_carrera_actual from tbl_alumno where cedula='1003756119'), 1, 3);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SPORT SYSTEM', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1004130454'),(select id_carrera_actual from tbl_alumno where cedula='1004130454'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1004177943'),(select id_carrera_actual from tbl_alumno where cedula='1004177943'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1724843469'),(select id_carrera_actual from tbl_alumno where cedula='1724843469'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1003409602'),(select id_carrera_actual from tbl_alumno where cedula='1003409602'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1003109343'),(select id_carrera_actual from tbl_alumno where cedula='1003109343'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1003684311'),(select id_carrera_actual from tbl_alumno where cedula='1003684311'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1050401007'),(select id_carrera_actual from tbl_alumno where cedula='1050401007'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1004186092'),(select id_carrera_actual from tbl_alumno where cedula='1004186092'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1003185657'),(select id_carrera_actual from tbl_alumno where cedula='1003185657'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='1003768700'),(select id_carrera_actual from tbl_alumno where cedula='1003768700'), 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (6, 
 (select id_alumno from tbl_alumno where cedula='0850239229'),(select id_carrera_actual from tbl_alumno where cedula='0850239229'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS DEL B', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (7, 
 (select id_alumno from tbl_alumno where cedula='0401831508'),(select id_carrera_actual from tbl_alumno where cedula='0401831508'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (7, 
 (select id_alumno from tbl_alumno where cedula='1003611512'),(select id_carrera_actual from tbl_alumno where cedula='1003611512'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (7, 
 (select id_alumno from tbl_alumno where cedula='1003329347'),(select id_carrera_actual from tbl_alumno where cedula='1003329347'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (7, 
 (select id_alumno from tbl_alumno where cedula='1003955430'),(select id_carrera_actual from tbl_alumno where cedula='1003955430'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (7, 
 (select id_alumno from tbl_alumno where cedula='1003309414'),(select id_carrera_actual from tbl_alumno where cedula='1003309414'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (7, 
 (select id_alumno from tbl_alumno where cedula='0803946615'),(select id_carrera_actual from tbl_alumno where cedula='0803946615'), 1, 3);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SEGUNDO DERECHO', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='1004201560'),(select id_carrera_actual from tbl_alumno where cedula='1004201560'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='1003848353'),(select id_carrera_actual from tbl_alumno where cedula='1003848353'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='0401739156'),(select id_carrera_actual from tbl_alumno where cedula='0401739156'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='0401974449'),(select id_carrera_actual from tbl_alumno where cedula='0401974449'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='1004027718'),(select id_carrera_actual from tbl_alumno where cedula='1004027718'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='1003185392'),(select id_carrera_actual from tbl_alumno where cedula='1003185392'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='0401761861'),(select id_carrera_actual from tbl_alumno where cedula='0401761861'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (8, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1003847116'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('FURER', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (9, 
 (select id_alumno from tbl_alumno where cedula='0401884044'),(select id_carrera_actual from tbl_alumno where cedula='0401884044'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (9, 
 (select id_alumno from tbl_alumno where cedula='1727283911'),(select id_carrera_actual from tbl_alumno where cedula='1727283911'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (9, 
 (select id_alumno from tbl_alumno where cedula='1723242598'),(select id_carrera_actual from tbl_alumno where cedula='1723242598'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (9, 
 (select id_alumno from tbl_alumno where cedula='1003751136'),(select id_carrera_actual from tbl_alumno where cedula='1003751136'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (9, 
 (select id_alumno from tbl_alumno where cedula='1727961458'),(select id_carrera_actual from tbl_alumno where cedula='1727961458'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (9, 
 (select id_alumno from tbl_alumno where cedula='0401898309'),(select id_carrera_actual from tbl_alumno where cedula='0401898309'), 1, 3);
 
/*insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('MASTER LAW', now(), true, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (10, 
 (select id_alumno from tbl_alumno where cedula='0401884044'),(select id_carrera_actual from tbl_alumno where cedula='0401884044'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (10, 
 (select id_alumno from tbl_alumno where cedula='1727283911'),(select id_carrera_actual from tbl_alumno where cedula='1727283911'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (10, 
 (select id_alumno from tbl_alumno where cedula='1723242598'),(select id_carrera_actual from tbl_alumno where cedula='1723242598'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (10, 
 (select id_alumno from tbl_alumno where cedula='1003751136'),(select id_carrera_actual from tbl_alumno where cedula='1003751136'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (10, 
 (select id_alumno from tbl_alumno where cedula='1727961458'),(select id_carrera_actual from tbl_alumno where cedula='1727961458'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (10, 
 (select id_alumno from tbl_alumno where cedula='0401898309'),(select id_carrera_actual from tbl_alumno where cedula='0401898309'), 1, 3);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('PRIMERO C', now(), true, 'p', 1, 1);*/

-- FUTBOL FEMENINO
-- LOS NIUPI, LOS VIAJEROS, CHICAS SIN LIMITE, LOS JURISTAS, BALANCE PERFECTO, SPORTING CLUB, LOS DEL B, SEGUNDO DERECHO
-- select * from vta_equipo_solo where id_diciplina=1 and genero=false
-- delete from 	tbl_equipo_alumno where id_equipo=23 and id_alumno=438
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS NIUPI', now(), false, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1716207376'),(select id_carrera_actual from tbl_alumno where cedula='1716207376'), 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1004208904'),(select id_carrera_actual from tbl_alumno where cedula='1004208904'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1004495063'),(select id_carrera_actual from tbl_alumno where cedula='1004495063'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1721253688'),(select id_carrera_actual from tbl_alumno where cedula='1721253688'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1004806301'),(select id_carrera_actual from tbl_alumno where cedula='1004806301'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1004546576'),(select id_carrera_actual from tbl_alumno where cedula='1004546576'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1004108922'),(select id_carrera_actual from tbl_alumno where cedula='1004108922'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='1003169073'),(select id_carrera_actual from tbl_alumno where cedula='1003169073'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (12, 
 (select id_alumno from tbl_alumno where cedula='0401963269'),(select id_carrera_actual from tbl_alumno where cedula='0401963269'), 1, 2);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS VIAJEROS', now(), false, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1004964795'),(select id_carrera_actual from tbl_alumno where cedula='1004964795'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1003490065'),(select id_carrera_actual from tbl_alumno where cedula='1003490065'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1004448484'),(select id_carrera_actual from tbl_alumno where cedula='1004448484'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1005130487'),(select id_carrera_actual from tbl_alumno where cedula='1005130487'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1004413587'),(select id_carrera_actual from tbl_alumno where cedula='1004413587'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1004146070'),(select id_carrera_actual from tbl_alumno where cedula='1004146070'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1004115877'),(select id_carrera_actual from tbl_alumno where cedula='1004115877'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='0401675541'),(select id_carrera_actual from tbl_alumno where cedula='0401675541'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (13, 
 (select id_alumno from tbl_alumno where cedula='1004240212'),(select id_carrera_actual from tbl_alumno where cedula='1004240212'), 1, 2);

 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('CHICAS SIN LIMITE', now(), false, 'p', 1, 1);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='0401888169'),(select id_carrera_actual from tbl_alumno where cedula='0401888169'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='0401969993'),(select id_carrera_actual from tbl_alumno where cedula='0401969993'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='1003322144'),(select id_carrera_actual from tbl_alumno where cedula='1003322144'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='1004342596'),(select id_carrera_actual from tbl_alumno where cedula='1004342596'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='1723530315'),(select id_carrera_actual from tbl_alumno where cedula='1723530315'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='2100560073'),(select id_carrera_actual from tbl_alumno where cedula='2100560073'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='1004586705'),(select id_carrera_actual from tbl_alumno where cedula='1004586705'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (14, 
 (select id_alumno from tbl_alumno where cedula='0803631464'),(select id_carrera_actual from tbl_alumno where cedula='0803631464'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS JURISTAS', now(), false, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (15, 
 (select id_alumno from tbl_alumno where cedula='1004080709'),(select id_carrera_actual from tbl_alumno where cedula='1004080709'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (15, 
 (select id_alumno from tbl_alumno where cedula='1003490784'),(select id_carrera_actual from tbl_alumno where cedula='1003490784'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (15, 
 (select id_alumno from tbl_alumno where cedula='0401960661'),(select id_carrera_actual from tbl_alumno where cedula='0401960661'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (15, 
 (select id_alumno from tbl_alumno where cedula='1003647631'),(select id_carrera_actual from tbl_alumno where cedula='1003647631'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (15, 
 (select id_alumno from tbl_alumno where cedula='1004797807'),(select id_carrera_actual from tbl_alumno where cedula='1004797807'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('BALANCE PERFECTO', now(), false, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='1050158540'),(select id_carrera_actual from tbl_alumno where cedula='1050158540'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='1004895320'),(select id_carrera_actual from tbl_alumno where cedula='1004895320'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='1004050223'),(select id_carrera_actual from tbl_alumno where cedula='1004050223'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='1003785613'),(select id_carrera_actual from tbl_alumno where cedula='1003785613'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='1003783865'),(select id_carrera_actual from tbl_alumno where cedula='1003783865'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='1727729368'),(select id_carrera_actual from tbl_alumno where cedula='1727729368'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (16, 
 (select id_alumno from tbl_alumno where cedula='0401971874'),(select id_carrera_actual from tbl_alumno where cedula='0401971874'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SPORTING CLUB', now(), false, 'p', 1, 1);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1004252795'),(select id_carrera_actual from tbl_alumno where cedula='1004252795'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='0401876966'),(select id_carrera_actual from tbl_alumno where cedula='0401876966'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1003114087'),(select id_carrera_actual from tbl_alumno where cedula='1003114087'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1003539804'),(select id_carrera_actual from tbl_alumno where cedula='1003539804'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1003973797'),(select id_carrera_actual from tbl_alumno where cedula='1003973797'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1724217805'),(select id_carrera_actual from tbl_alumno where cedula='1724217805'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1004278444'),(select id_carrera_actual from tbl_alumno where cedula='1004278444'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1004152912'),(select id_carrera_actual from tbl_alumno where cedula='1004152912'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (17, 
 (select id_alumno from tbl_alumno where cedula='1003602776'),(select id_carrera_actual from tbl_alumno where cedula='1003602776'), 1, 3);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS DEL B', now(), false, 'p', 1, 1);
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SEGUNDO DERECHO', now(), false, 'p', 1, 1);

-- BASKET MASCULINO
-- LOS NIUPI, SPORTING CLUB, ANONYMOUS, PRIMERO C, SEGUNDO DERECHO, LOS DEL B,
-- select * from vta_equipo_solo where id_diciplina=2 and genero=true
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS NIUPI', now(), true, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='1002635959'),(select id_carrera_actual from tbl_alumno where cedula='1002635959'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='502876907'),(select id_carrera_actual from tbl_alumno where cedula='0502876907'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='1004182505'),(select id_carrera_actual from tbl_alumno where cedula='1004182505'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='1721736872'),(select id_carrera_actual from tbl_alumno where cedula='1721736872'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='1002928131'),(select id_carrera_actual from tbl_alumno where cedula='1002928131'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='1004491278'),(select id_carrera_actual from tbl_alumno where cedula='1004491278'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (20, 
 (select id_alumno from tbl_alumno where cedula='1002967923'),(select id_carrera_actual from tbl_alumno where cedula='1002967923'), 1, 2);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SPORTING CLUB', now(), true, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1003723903'),(select id_carrera_actual from tbl_alumno where cedula='1003723903'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1004691323'),(select id_carrera_actual from tbl_alumno where cedula='1004691323'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1002642658'),(select id_carrera_actual from tbl_alumno where cedula='1002642658'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1003930037'),(select id_carrera_actual from tbl_alumno where cedula='1003930037'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='0401892500'),(select id_carrera_actual from tbl_alumno where cedula='0401892500'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='0502885932'),(select id_carrera_actual from tbl_alumno where cedula='0502885932'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='0401784046'),(select id_carrera_actual from tbl_alumno where cedula='0401784046'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1003760400'),(select id_carrera_actual from tbl_alumno where cedula='1003760400'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='0402131064'),(select id_carrera_actual from tbl_alumno where cedula='0402131064'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1004080733'),(select id_carrera_actual from tbl_alumno where cedula='1004080733'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1004057806'),(select id_carrera_actual from tbl_alumno where cedula='1004057806'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (21, 
 (select id_alumno from tbl_alumno where cedula='1003675384'),(select id_carrera_actual from tbl_alumno where cedula='1003675384'), 1, 2);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('ANONYMOUS', now(), true, 'p', 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (22, 
 (select id_alumno from tbl_alumno where cedula='0401703046'),(select id_carrera_actual from tbl_alumno where cedula='0401703046'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (22, 
 (select id_alumno from tbl_alumno where cedula='1004826663'),(select id_carrera_actual from tbl_alumno where cedula='1004826663'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (22, 
 (select id_alumno from tbl_alumno where cedula='1004560536'),(select id_carrera_actual from tbl_alumno where cedula='1004560536'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (22, 
 (select id_alumno from tbl_alumno where cedula='1003110101'),(select id_carrera_actual from tbl_alumno where cedula='1003110101'), 1, 2);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('PRIMERO C', now(), true, 'p', 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1004130454'),(select id_carrera_actual from tbl_alumno where cedula='1004130454'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1004177943'),(select id_carrera_actual from tbl_alumno where cedula='1004177943'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1724843469'),(select id_carrera_actual from tbl_alumno where cedula='1724843469'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1003409602'),(select id_carrera_actual from tbl_alumno where cedula='1003409602'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1004186092'),(select id_carrera_actual from tbl_alumno where cedula='1004186092'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1003185657'),(select id_carrera_actual from tbl_alumno where cedula='1003185657'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1003768700'),(select id_carrera_actual from tbl_alumno where cedula='1003768700'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='0850239229'),(select id_carrera_actual from tbl_alumno where cedula='0850239229'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1003295530'),(select id_carrera_actual from tbl_alumno where cedula='1003295530'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (23, 
 (select id_alumno from tbl_alumno where cedula='1724497951'),(select id_carrera_actual from tbl_alumno where cedula='1724497951'), 1, 2);
 
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SEGUNDO DERECHO', now(), true, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (24, 
 (select id_alumno from tbl_alumno where cedula='0401831508'),(select id_carrera_actual from tbl_alumno where cedula='0401831508'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (24, 
 (select id_alumno from tbl_alumno where cedula='1003611512'),(select id_carrera_actual from tbl_alumno where cedula='1003611512'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (24, 
 (select id_alumno from tbl_alumno where cedula='1003329347'),(select id_carrera_actual from tbl_alumno where cedula='1003329347'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (24, 
 (select id_alumno from tbl_alumno where cedula='1003955430'),(select id_carrera_actual from tbl_alumno where cedula='1003955430'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (24, 
 (select id_alumno from tbl_alumno where cedula='1003309414'),(select id_carrera_actual from tbl_alumno where cedula='1003309414'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (24, 
 (select id_alumno from tbl_alumno where cedula='0803946615'),(select id_carrera_actual from tbl_alumno where cedula='0803946615'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS DEL B', now(), true, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='1004201560'),(select id_carrera_actual from tbl_alumno where cedula='1004201560'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='1003848353'),(select id_carrera_actual from tbl_alumno where cedula='1003848353'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='0401739156'),(select id_carrera_actual from tbl_alumno where cedula='0401739156'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='0401974449'),(select id_carrera_actual from tbl_alumno where cedula='0401974449'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='1004027718'),(select id_carrera_actual from tbl_alumno where cedula='1004027718'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='1003185392'),(select id_carrera_actual from tbl_alumno where cedula='1003185392'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='0401761861'),(select id_carrera_actual from tbl_alumno where cedula='0401761861'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (25, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1003847116'), 1, 2);


-- BASKET FEMENINO
-- LOS NIUPI, FURER, LOS DEL B, LOS VIAJEROS
-- select * from vta_equipo_solo where id_diciplina=2 and genero=false
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS NIUPI', now(), false, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1004964795'),(select id_carrera_actual from tbl_alumno where cedula='1004964795'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1003490065'),(select id_carrera_actual from tbl_alumno where cedula='1003490065'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='0401615141'),(select id_carrera_actual from tbl_alumno where cedula='0401615141'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1004448484'),(select id_carrera_actual from tbl_alumno where cedula='1004448484'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1005130487'),(select id_carrera_actual from tbl_alumno where cedula='1005130487'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1004413587'),(select id_carrera_actual from tbl_alumno where cedula='1004413587'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1004146070'),(select id_carrera_actual from tbl_alumno where cedula='1004146070'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (26, 
 (select id_alumno from tbl_alumno where cedula='1004115877'),(select id_carrera_actual from tbl_alumno where cedula='1004115877'), 1, 2);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('FURER', now(), false, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004412837'),(select id_carrera_actual from tbl_alumno where cedula='1004412837'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004171433'),(select id_carrera_actual from tbl_alumno where cedula='1004171433'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004543987'),(select id_carrera_actual from tbl_alumno where cedula='1004543987'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='0803947126'),(select id_carrera_actual from tbl_alumno where cedula='0803947126'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004555106'),(select id_carrera_actual from tbl_alumno where cedula='1004555106'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004429955'),(select id_carrera_actual from tbl_alumno where cedula='1004429955'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004006472'),(select id_carrera_actual from tbl_alumno where cedula='1004006472'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1004770309'),(select id_carrera_actual from tbl_alumno where cedula='1004770309'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1003487590'),(select id_carrera_actual from tbl_alumno where cedula='1003487590'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (27, 
 (select id_alumno from tbl_alumno where cedula='1002790531'),(select id_carrera_actual from tbl_alumno where cedula='1002790531'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS DEL B', now(), false, 'p', 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1009260948'),(select id_carrera_actual from tbl_alumno where cedula='1003260948'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1009651559'),(select id_carrera_actual from tbl_alumno where cedula='1003651559'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='0502884828'),(select id_carrera_actual from tbl_alumno where cedula='0502884828'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1003967690'),(select id_carrera_actual from tbl_alumno where cedula='1003967690'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1004731343'),(select id_carrera_actual from tbl_alumno where cedula='1004731343'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1004330955'),(select id_carrera_actual from tbl_alumno where cedula='1004330955'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='0401966197'),(select id_carrera_actual from tbl_alumno where cedula='0401966197'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1004138572'),(select id_carrera_actual from tbl_alumno where cedula='1004138572'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='401474440'),(select id_carrera_actual from tbl_alumno where cedula='0401474440'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1003733019'),(select id_carrera_actual from tbl_alumno where cedula='1003733019'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (28, 
 (select id_alumno from tbl_alumno where cedula='1003961974'),(select id_carrera_actual from tbl_alumno where cedula='1003961974'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS VIAJEROS', now(), false, 'p', 1, 2);
   insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (29, 
 (select id_alumno from tbl_alumno where cedula='0401888169'),(select id_carrera_actual from tbl_alumno where cedula='0401888169'), 1, 2);
   insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (29, 
 (select id_alumno from tbl_alumno where cedula='0401969993'),(select id_carrera_actual from tbl_alumno where cedula='0401969993'), 1, 2);
   insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (29, 
 (select id_alumno from tbl_alumno where cedula='1723530315'),(select id_carrera_actual from tbl_alumno where cedula='1723530315'), 1, 2);
   insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (29, 
 (select id_alumno from tbl_alumno where cedula='0803631464'),(select id_carrera_actual from tbl_alumno where cedula='0803631464'), 1, 2);
   insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (29, 
 (select id_alumno from tbl_alumno where cedula='1004340558'),(select id_carrera_actual from tbl_alumno where cedula='1004340558'), 1, 2);
   insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (29, 
 (select id_alumno from tbl_alumno where cedula='1004445217'),(select id_carrera_actual from tbl_alumno where cedula='1004445217'), 1, 2);

-- ECUAVOLEY MASCULINO
-- LOS DEL B, SPORTING CLUB, FURER, PRIMERO C, LOS VIAJEROS, LOS NIUPI, ANONYMOUS, 
-- select * from vta_equipo_solo where id_diciplina=3
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS DEL B', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (30, 
 (select id_alumno from tbl_alumno where cedula='1003637400'),(select id_carrera_actual from tbl_alumno where cedula='1003637400'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (30, 
 (select id_alumno from tbl_alumno where cedula='1003856190'),(select id_carrera_actual from tbl_alumno where cedula='1003856190'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (30, 
 (select id_alumno from tbl_alumno where cedula='1004680920'),(select id_carrera_actual from tbl_alumno where cedula='1004680920'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (30, 
 (select id_alumno from tbl_alumno where cedula='1003753033'),(select id_carrera_actual from tbl_alumno where cedula='1003753033'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SPORTING CLUB', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (31, 
 (select id_alumno from tbl_alumno where cedula='1004701734'),(select id_carrera_actual from tbl_alumno where cedula='1004701734'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (31, 
 (select id_alumno from tbl_alumno where cedula='1002742359'),(select id_carrera_actual from tbl_alumno where cedula='1002742359'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (31, 
 (select id_alumno from tbl_alumno where cedula='1003820188'),(select id_carrera_actual from tbl_alumno where cedula='1003820188'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (31, 
 (select id_alumno from tbl_alumno where cedula='1004596159'),(select id_carrera_actual from tbl_alumno where cedula='1004596159'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (31, 
 (select id_alumno from tbl_alumno where cedula='1004356406'),(select id_carrera_actual from tbl_alumno where cedula='1004356406'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('FURER', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (32, 
 (select id_alumno from tbl_alumno where cedula='1724000698'),(select id_carrera_actual from tbl_alumno where cedula='1724000698'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (32, 
 (select id_alumno from tbl_alumno where cedula='1004224901'),(select id_carrera_actual from tbl_alumno where cedula='1004224901'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (32, 
 (select id_alumno from tbl_alumno where cedula='1727979013'),(select id_carrera_actual from tbl_alumno where cedula='1727979013'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (32, 
 (select id_alumno from tbl_alumno where cedula='1004439152'),(select id_carrera_actual from tbl_alumno where cedula='1004439152'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (32, 
 (select id_alumno from tbl_alumno where cedula='1004162960'),(select id_carrera_actual from tbl_alumno where cedula='1004162960'), 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (32, 
 (select id_alumno from tbl_alumno where cedula='1004499255'),(select id_carrera_actual from tbl_alumno where cedula='1004499255'), 1, 3);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('PRIMERO C', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (33, 
 (select id_alumno from tbl_alumno where cedula='1002635959'),(select id_carrera_actual from tbl_alumno where cedula='1002635959'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (33, 
 (select id_alumno from tbl_alumno where cedula='1004182505'),(select id_carrera_actual from tbl_alumno where cedula='1004182505'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (33, 
 (select id_alumno from tbl_alumno where cedula='1721736872'),(select id_carrera_actual from tbl_alumno where cedula='1721736872'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (33, 
 (select id_alumno from tbl_alumno where cedula='1002928131'),(select id_carrera_actual from tbl_alumno where cedula='1002928131'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS VIAJEROS', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (34, 
 (select id_alumno from tbl_alumno where cedula='1004469852'),(select id_carrera_actual from tbl_alumno where cedula='1004469852'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (34, 
 (select id_alumno from tbl_alumno where cedula='1003733019'),(select id_carrera_actual from tbl_alumno where cedula='1003733019'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (34, 
 (select id_alumno from tbl_alumno where cedula='1003653696'),(select id_carrera_actual from tbl_alumno where cedula='1003653696'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('LOS NIUPI', now(), true, 'p', 1, 3);
insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (35, 
 (select id_alumno from tbl_alumno where cedula='1002022265'),(select id_carrera_actual from tbl_alumno where cedula='1002022265'), 1, 2);
insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (35, 
 (select id_alumno from tbl_alumno where cedula='1003723903'),(select id_carrera_actual from tbl_alumno where cedula='1003723903'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (35, 
 (select id_alumno from tbl_alumno where cedula='1004691323'),(select id_carrera_actual from tbl_alumno where cedula='1004691323'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (35, 
 (select id_alumno from tbl_alumno where cedula='1002642658'),(select id_carrera_actual from tbl_alumno where cedula='1002642658'), 1, 2);
 
insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('ANONYMOUS', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (36, 
 (select id_alumno from tbl_alumno where cedula='1004976476'),(select id_carrera_actual from tbl_alumno where cedula='1004976476'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (36, 
 (select id_alumno from tbl_alumno where cedula='1004826663'),(select id_carrera_actual from tbl_alumno where cedula='1004826663'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (36, 
 (select id_alumno from tbl_alumno where cedula='1004560536'),(select id_carrera_actual from tbl_alumno where cedula='1004560536'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (36, 
 (select id_alumno from tbl_alumno where cedula='1720995958'),(select id_carrera_actual from tbl_alumno where cedula='1720995958'), 1, 2);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (36, 
 (select id_alumno from tbl_alumno where cedula='1003110101'),(select id_carrera_actual from tbl_alumno where cedula='1003110101'), 1, 2);

 insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SEGUNDO DERECHO', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (37, 
 (select id_alumno from tbl_alumno where cedula='1724843469'),(select id_carrera_actual from tbl_alumno where cedula='1724843469'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (37, 
 (select id_alumno from tbl_alumno where cedula='1003109343'),(select id_carrera_actual from tbl_alumno where cedula='1003109343'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (37, 
 (select id_alumno from tbl_alumno where cedula='1003684311'),(select id_carrera_actual from tbl_alumno where cedula='1003684311'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (37, 
 (select id_alumno from tbl_alumno where cedula='1003768700'),(select id_carrera_actual from tbl_alumno where cedula='1003768700'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (37, 
 (select id_alumno from tbl_alumno where cedula='0850239229'),(select id_carrera_actual from tbl_alumno where cedula='0850239229'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (37, 
 (select id_alumno from tbl_alumno where cedula='1724497951'),(select id_carrera_actual from tbl_alumno where cedula='1724497951'), 1, 2);

 
 insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('MASTER LAW', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (38, 
 (select id_alumno from tbl_alumno where cedula='0401831508'),(select id_carrera_actual from tbl_alumno where cedula='0401831508'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (38, 
 (select id_alumno from tbl_alumno where cedula='1003611512'),(select id_carrera_actual from tbl_alumno where cedula='1003611512'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (38, 
 (select id_alumno from tbl_alumno where cedula='1003329347'),(select id_carrera_actual from tbl_alumno where cedula='1003329347'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (38, 
 (select id_alumno from tbl_alumno where cedula='1003955430'),(select id_carrera_actual from tbl_alumno where cedula='1003955430'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (38, 
 (select id_alumno from tbl_alumno where cedula='1003309414'),(select id_carrera_actual from tbl_alumno where cedula='1003309414'), 1, 2);

insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('JACK DANIELS', now(), true, 'p', 1, 3);
  insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='1004201560'),(select id_carrera_actual from tbl_alumno where cedula='1004201560'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='1003848353'),(select id_carrera_actual from tbl_alumno where cedula='1003848353'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='0401739156'),(select id_carrera_actual from tbl_alumno where cedula='0401739156'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='0401974449'),(select id_carrera_actual from tbl_alumno where cedula='0401974449'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='1004027718'),(select id_carrera_actual from tbl_alumno where cedula='1004027718'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='1003185392'),(select id_carrera_actual from tbl_alumno where cedula='1003185392'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='0401761861'),(select id_carrera_actual from tbl_alumno where cedula='0401761861'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (39, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1003847116'), 1, 2);
  
 insert into tbl_equipo (equipo, fecha, genero, modalidad, id_campeonato_actual, id_diciplina) values ('SPORT SYSTEM', now(), true, 'p', 1, 3);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (40, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='0401884044'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (40, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1727283911'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (40, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1723242598'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (40, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1003751136'), 1, 2);
 insert into tbl_equipo_alumno (id_equipo, id_alumno, id_carrera, id_campeonato, num_camiseta) values (40, 
 (select id_alumno from tbl_alumno where cedula='1003847116'),(select id_carrera_actual from tbl_alumno where cedula='1727961458'), 1, 2);
