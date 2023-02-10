/*Procedimientos almacenados*/
/*para ver usuarios*/
create procedure seeUsuario()
select * from usuario;

/*para buscar usuario*/

create procedure searchUsuario(in _Usuario varchar(100), in _Contraseña varchar(140))
select * from usuario where email= _Usuario and contraseña =_Contraseña or usuario= _Usuario and contraseña =_Contraseña;

create procedure searchUsuarioId(in _Id int)
select * from usuario where id=_Id;

/*para insertar datos del usuario*/
CREATE Procedure addUsuario(in _Fecha date, in _Nombre varchar(100), in _Email varchar(100), in _Usuario varchar(100), in _Avatar varchar(20), in _Telefono varchar(14), in _Contraseña varchar(140))
INSERT INTO usuario(fecha, nombre, email, usuario, avatar, telefono, contraseña) VALUES(_Fecha, _Nombre, _Email, _Usuario, _Avatar, _Telefono, _Contraseña);

/*Modificat usaurio*/
CREATE PROCEDURE updateUsuario(in _Id int, in _Nombre varchar(100), in _Email varchar(100), in _Usuario varchar(100), in _Avatar varchar(20), in _Telefono varchar(14), in _Contraseña varchar(140))
UPDATE usuario SET nombre = _Nombre , email = _Email, usuario = _Usuario, avatar = _Avatar, telefono = _Telefono, contraseña = _Contraseña where id= _Id;
call updateUsuario('2', 'Carbonell Castillo', 'carbonell@gmai.com', 'carbonell01', 'avatar5', '', '4312');
/*create procedure para agregar tipo*/
create Procedure addTipo(in _TIpo char(40))
INSERT INTO tipo(tipo) VALUES(_TIpo);


/*create procedre para a;adir tood*/

CREATE Procedure addToDoUsuarios(in _IdUsuario varchar(100), in _IdTipo int, in _Titulo varchar(100), in _Fecha date, in _Color varchar(20), in _Nota varchar(200))
INSERT INTO toDo(id_usuario, id_tipo, titulo, fecha, color,  nota) VALUES(_IdUsuario, _IdTipo, _Titulo, _Fecha, _Color, _Nota);

/*create procedure para ver todo*/

CREATE Procedure seeTodoUsuario(in _Usuario varchar(100))
select todo.id as id, tipo.id as idTipo, tipo, titulo, todo.fecha, color, nota 
from todo inner join tipo
on todo.id_tipo= tipo.id
inner join usuario
on todo.id_usuario= usuario.id
where id_usuario=_Usuario;

CREATE Procedure UsuarioPensamientoTodo(in _Usuario varchar(100))
select todo.id as id, tipo.id as idTipo, tipo, titulo, todo.fecha, color, nota 
from todo inner join tipo
on todo.id_tipo= tipo.id
inner join usuario
on todo.id_usuario= usuario.id
where id_usuario=_Usuario and todo.id_tipo=1;

CREATE Procedure seeToDoAmorUsuario(in _Usuario varchar(100))
select todo.id as id, tipo.id as idTipo, tipo, titulo, todo.fecha, color, nota 
from todo inner join tipo
on todo.id_tipo= tipo.id
inner join usuario
on todo.id_usuario= usuario.id
where id_usuario=_Usuario and todo.id_tipo=2;

CREATE Procedure seeToDoTristezaUsuario(in _Usuario varchar(100))
select todo.id as id, tipo.id as idTipo, tipo, titulo, todo.fecha, color, nota 
from todo inner join tipo
on todo.id_tipo= tipo.id
inner join usuario
on todo.id_usuario= usuario.id
where id_usuario=_Usuario and todo.id_tipo=3;

CREATE Procedure seeToDoOtroUsuario(in _Usuario varchar(100))
select todo.id as id, tipo.id as idTipo, tipo, titulo, todo.fecha, color, nota 
from todo inner join tipo
on todo.id_tipo= tipo.id
inner join usuario
on todo.id_usuario= usuario.id
where id_usuario=_Usuario and todo.id_tipo=4;

CREATE Procedure UsuarioTodo3(in _Usuario varchar(100))
select todo.id as id, tipo.id as idTipo, tipo, titulo, todo.fecha, color, nota 
FROM todo INNER JOIN tipo
ON todo.id_tipo= tipo.id
INNER JOIN usuario
ON todo.id_usuario= usuario.id
WHERE id_usuario=_Usuario LIMIT 3;


/*create procedure seeTiposToDO()
select * from tipo;*/

CREATE Procedure updateToDoUsuario(in _Id int, in _IdUsuario int, in _IdTipo int, in _Titulo varchar(100), in _Fecha date,  in _Nota varchar(200))
UPDATE todo SET id_tipo = _IdTipo , titulo = _Titulo, fecha = _Fecha, nota = _Nota where id= _Id and todo.id_usuario =_IdUsuario;


CREATE Procedure deleteToDoUsuario(in _IdUsuario int, in _Id int)
delete from todo where id=_Id and todo.id_usuario =_IdUsuario;