
alter table PELICULA
add ( VIDEO_BLOB BLOB default empty_blob() );

alter table pelicula add VIDEO_BLOB BLOB null;

alter table pelicula 
add TIPO_VIDEO VARCHAR2(50) null;

alter table pelicula 
add NOMBRE_VIDEO VARCHAR2(100) null; 