create database sentimentalNotes character set utf8;

use sentimentalNotes;

create table usuario(
	id int not null primary key auto_increment,
    fecha date not null,
	nombre varchar(100) not null,
    email varchar(100) not null,
    usuario varchar(100) not null,
    avatar char(20) not null,
    telefono varchar(14) not null,
    contraseña varchar(140) not null
);
create table tipo(
	id int not null primary key auto_increment,
	tipo char(40) not null
);
create table todo(
  id int not null primary key auto_increment,
  id_usuario int not null,
  id_tipo int not null,
  titulo varchar(100) not null,
  fecha date not null,
  color varchar(20) not null,
  nota varchar(200) not null
);

create table todo2(
  id int not null primary key auto_increment,
  id_usuario int not null,
  id_tipo int not null,
  titulo varchar(100) not null,
  fecha date not null,
  color varchar(20) not null,
  nota varchar(200) not null
);
create table todo3(
  id int not null primary key auto_increment,
  id_usuario int not null,
  id_tipo int not null,
  titulo varchar(100) not null,
  fecha date not null,
  color varchar(20) not null,
  nota varchar(200) not null
);


select * from todo;
INSERT INTO todo2(id_usuario, id_tipo, titulo, fecha, color, nota) 
    VALUES('1', '2', 'na', now(), 'sucess', 'erestyu');



select tipo, titulo, fecha, nota 
from todo inner join tipo
on todo.id_tipo= tipo.id
inner join usuario
on tipo.usuario= usuario.usuario
where usuario=_Usuario;