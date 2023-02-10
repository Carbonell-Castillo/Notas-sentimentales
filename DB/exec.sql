/*agregar*/
CALL addUsuario('Bruce Castillo', 'bruce@gmail.com', 'bruce_cast18', 'avatar4', '', '123');

/*modificar usuario*/
call updateUsuario('2', 'Carbonell Castillo', 'carbonell@gmai.com', 'carbonell01', 'avatar5', '', '4312');

call seeUsuario();

call searchUsuario('bruce@gmail.com', '1234');
call searchUsuario('bruce_cast18', '123');
call searchUsuarioId('1');

/*agregar tipo*/
call addTipo('Pensamiento');
call addTipo('Amor');
call addTipo('Triste');
call addTipo('Otro');
call seeToDoUsuario('1');
call addTodo('2', '2', 'Eres tú', now(), 'success', 'Tienes en el rito de tu ser, todo el palpilar de una cancion y eres la razon de mi existir');
call seeTodoPensamientosUsuario('1');
CALL UsuarioTodo3('2');
call seeTodoUsuarioThink('1');
 call UsuarioPensamientoTodo('1');
 call seeToDoAmorUsuario('1');
 
select * from todo;
call updateToDoUsuario('1', '1', '1', 'Simplemente tu', now(), 'Te amo 3 mil veces mas');

call deleteToDoUsuario('1', '1');