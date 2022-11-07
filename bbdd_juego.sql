CREATE DATABASE IF NOT EXISTS Juego;

USE Juego;


-- #CREAR TABLAS-----------------------------------------

CREATE TABLE jugadores(
	nombre VARCHAR(20) PRIMARY KEY,
	contrasena VARCHAR(12) NOT NULL,
	fotoPerfil VARCHAR(50),
	nivel ENUM('Troll', 'Muggle', 'Wizard', 'Auror') NOT NULL
);

CREATE TABLE partidas(
	partidaID INT PRIMARY KEY AUTO_INCREMENT,
	puntuacion INT DEFAULT 0,
	nombre VARCHAR(20),
	FOREIGN KEY (nombre) REFERENCES jugadores(nombre)
);

CREATE TABLE preguntas(
	preguntaID INT PRIMARY KEY AUTO_INCREMENT,
	pregunta VARCHAR(500) NOT NULL,
	categoria ENUM('radio', 'checkbox', 'text', 'button', 'select') NOT NULL,
	puntos INT
);

CREATE TABLE respuestas(
	respuestaID INT PRIMARY KEY AUTO_INCREMENT,
	respuesta VARCHAR(500) NOT NULL,
	preguntaID INT,
	acierto BOOLEAN,
	FOREIGN KEY (preguntaID) REFERENCES preguntas(preguntaID)
);



-- #INSERTAR DATOS - PREGUNTAS-----------------------------------------

INSERT INTO preguntas (pregunta, categoria, puntos) VALUES ("¿Quién mató a Dobby?",'radio', 3),
							   ("¿En qué posición juega Harry Potter en el equipo de Quidditch?",'radio', 3),
							   ("¿A quién abofeteó Hermione en Harry Potter y el prisionero de Azkaban?",'radio', 3),
							   ("¿Qué hechizo usó Harry para matar a Lord Voldemort?",'radio', 3),
							   ("En la primera reunión del Club de Duelos, ¿A qué animal convocó Draco Malfoy con el hechizo 'Serpensortia'?",'select', 3),
							   ("Es Levi-O-sa, no ...",'button', 3),
							   ("¿Las lágrimas de qué animal son el único antídoto conocido contra el veneno de basilisco?",'radio', 3),
							   ("Cuando se desentierra, ¿qué hará una mandrágora?",'radio', 3),
							   ("¿Cómo se llama el perro de 3 cabezas de Hagrid que protege la Piedra Filosofal?",'radio', 3),
							   ("¿Quién noquea al troll en el baño de mujeres en Harry Potter y la piedra filosofal?",'select', 3),
							   ("¿Cuándo es el cumpleaños de Harry Potter?",'radio', 5),
							   ("¿Qué es 'El Quisquilloso'?",'radio', 5),
							   ("¿Quién escribió el libro de texto 'Criaturas fantásticas y dónde encontrarlas'?",'radio', 5),
							   ("¿De qué color es la sangre de unicornio?",'button', 5),
							   ("¿Quién le dio el primer beso a Ron Weasley?",'radio', 5),
							   ("¿Cuál es el verdadero nombre de Voldemort?",'radio', 5),
							   ("¿Cuáles son las tres reliquias de la muerte?",'checkbox', 5),
							   ("¿Qué Patronus pertenece a Luna Lovegood?",'radio', 5),
							   ("Selecciona todas las 3 'Maldiciones imperdonables'.",'checkbox', 5),
							   ("¿Cuál es la contraseña que Ron y Hermione, disfrazados de Crabbe y Goyle, usan para ingresar a la sala común de Slytherin?",'radio', 5),
							   ("¿Qué hay que decir cuando se termina de usar el Mapa del Merodeador? Escríbelo:",'text', 5),
							   ("¿Quién es el mayor de los Weasley?",'select', 10),
							   ("¿Cómo se llamaba el fantasma “La Dama Gris”?",'radio', 10),
							   ("¿Quién era la madre de Tom Riddle?",'radio', 10),
							   ("¿Quién creó el Mapa del Merodeador?",'checkbox', 10),
							   ("¿Quién se casó con George Weasley?",'radio', 10),
							   ("¿Quién debería haber sido originalmente el único campeón representando a Hogwarts en el Torneo de los Tres Magos?",'radio', 10),
							   ("¿Dónde se besaron Harry y Ginny por primera vez?",'radio', 10),
							   ("¿'El ingenio sin medida es el mayor tesoro del hombre' es el lema de qué casa?",'radio', 10),
							   ("¿Qué Horrocrux destruyó Albus Dumbledore?",'radio', 10),
							   ("Selecciona todos los Horrocruxes que Voldemort creó:",'checkbox', 10),
							   ("¿En qué año fue la Batalla de Hogwarts?",'radio', 15),
							   ("Verdadero o falso: ¿James Sirius Potter es el padre de Harry?",'button', 15),
							   ("Escribe el nombre de la poción usada para cambiar tu apariencia a la de otra persona.",'text', 15),
							   ("¿Cuántas escaleras tiene Hogwarts?",'radio', 15),
							   ("Escribe el nombre propio del fundador de la casa Slytherin:",'text', 15),
							   ("¿Cuál es el principal ingrediente de la varita de Harry Potter?",'radio', 15),
							   ("¿Cuál NO es una contraseña usada para entrar en la Sala Común de Gryffindor? Márcalas:",'checkbox', 15),
							   ("Escribe el hechizo que siempre usa Hermione para arreglar las gafas a Harry.",'text', 15),
							   ("¿Cómo se llamaba el elfo doméstico de la familia Black?",'radio', 15),
							   ("¿A qué raza de dragón se enfrentó Cedric Diggory en el Torneo de los Tres Magos?",'radio', 15);


-- #INSERTAR DATOS - RESPUESTAS-----------------------------------------

INSERT INTO respuestas (respuesta, preguntaID, acierto) VALUES ("Lucius Malfoy", 1, false),
								("Fenrir Greyback", 1, false),
								("Bellatrix Lestrange", 1, true),
								("Alecto Carrow", 1, false),
								("Cazador", 2, false),
								("Guardián", 2, false),
								("Bateador", 2, false),
								("Buscador", 2, true),
								("Draco Malfoy", 3, true),
								("Vincent Crabbe", 3, false),
								("Ron Weasley", 3, false),
								("Gregory Goyle", 3, false),
								("Expelliarmus", 4, true),
								("Expecto Patronum", 4, false),
								("Avada Kedavra", 4, false),
								("Accio", 4, false),
								("Rana", 5, false),
								("Serpiente", 5, true),
								("Dragón", 5, false),
								("León", 5, false),
								("Levi-o-SA", 6, true),
								("LEVI-o-sa", 6, false),
								("Fénix", 7, true),
								("Billywig", 7, false),
								("Hipogrifo", 7, false),
								("Boggart", 7, false),
								("Bailar", 8, false),
								("Eructar", 8, false),
								("Gritar", 8, true),
								("Reír", 8, false),
								("Firenze", 9, false),
								("Bane", 9, false),
								("Fluffy", 9, true),
								("Aragog", 9, false),
								("Harry", 10, false),
								("Ron", 10, false),
								("Hermione", 10, true),
								("Snape", 10, false),
								("El 31 de julio de 1980", 11, true),
								("El 30 de junio de 1980", 11, false),
								("El 30 de julio de 1981", 11, false),
								("El 29 de junio de 1981", 11, false),
								("Un hechizo", 12, false),
								("Un periódico", 12, true),
								("Una criatura fantástica", 12, false),
								("Una ciudad llena de magos y brujas", 12, false),
								("Espora Phyllida", 13, false),
								("Eduardo Lima", 13, false),
								("Bathilda Bagshot", 13, false),
								("Newt Scamander", 13, true),
								("Oro", 14, false),
								("Azul", 14, false),
								("Plata", 14, true),
								("Rosa", 14, false),
								("Lavender Brown", 15, true),
								("Hermione Granger ", 15, false),
								("Katie Bell", 15, false),
								("Cho Chang", 15, false),
								("Tom Sorvolost Riddle", 16, false),
								("Tom Marvolo Riddle", 16, true),
								("Thomas Sorvolo Riddle", 16, false),
								("Tom Marvin Rid", 16, false),
								("Nagini", 17, false),
								("Capa de Invisibilidad", 17, true),
								("Varita de Saúco", 17, true),
								("Diadema de Ravenclaw", 17, false),
								("Piedra de resurrección", 17, true),
								("Diario de Tom Riddle", 17, false),
								("Gama", 18, false),
								("Conejo", 18, true),
								("Perro", 18, false),
								("Caballo", 18, false),
								("Imperio", 19, true),
								("Confundus", 19, false),
								("Crucio", 19, true),
								("Bombarda", 19, false),
								("Oppugno", 19, false),
								("Avada Kedavra", 19, true),
								("Flipendo", 19, false),
								("Sorbete de limón", 20, false),
								("Sangre pura", 20, true),
								("Hocico de cerdo", 20, false),
								("Somormujo", 20, false),
								("travesura realizada", 21, true),
								("George Weasley", 22, false),
								("Charlie Weasley", 22, false),
								("Percy Weasley", 22, false),
								("Bill Weasley", 22, true),
								("Helena Ravenclaw", 23, true),
								("Susan Ravenclaw", 23, false),
								("Diana Ravenclaw", 23, false),
								("Rorena Ravenclaw", 23, false),
								("Miranda Slytherin", 24, false),
								("Mérope Gaunt", 24, true),
								("Alexa Slytherin", 24, false),
								("Mariah Gaunt", 24, false),
								("Godric Gryffindor", 25, false),
								("George Weasley", 25, false),
								("Fred Weasley", 25, false),
								("Helga Hufflepuff", 25, false),
								("Ron Weasley", 25, false),
								("James Potter", 25, true),
								("Sirius Black", 25, true),
								("Harry Potter", 25, false),
								("Rowena Ravenclaw", 25, false),
								("Remus Lupin", 25, true),
								("Peter Pettigrew", 25, true),
								("Salazar Slytherin", 25, false),
								("Hermione Granger", 25, false),
								("Alicia Spinnet", 26, false),
								("Angelina Johnson", 26, true),
								("Demelza Robins", 26, false),
								("Katie Bell", 26, false),
								("Fred Weasley", 27, false),
								("Oliver Wood", 27, false),
								("Cedric Diggory", 27, true),
								("Seamus Finnigan", 27, false),
								("En el campo de Quidditch de Hogwarts", 28, false),
								("En la Sala Común de Gryffindor", 28, true),
								("En el Gran Salón", 28, false),
								("En Hogsmeade", 28, false),
								("Gryffindor", 29, false),
								("Hufflepuff", 29, false),
								("Ravenclaw", 29, true),
								("Slytherin", 29, false),
								("El relicario de Slytherin", 30, false),
								("Nagini", 30, false),
								("Copa de Hufflepuff", 30, false),
								("El anillo de Marvolo Gaunt", 30, true),
								("El relicario de Slytherin", 31, false),
								("Copa de Hufflepuff", 31, true),
								("El anillo de Marvolo Gaunt", 31, true),
								("Espada de Godric Gryffindor", 31, false),
								("Diario de Tom Ryddle", 31, true),
								("Varita de Saúco", 31, false),
								("Giratiempo", 31, false),
								("Guardapelo de Salazar Slytherin", 31, true),
								("Diadema de Rowena Ravenclaw", 31, true),
								("Cáliz de fuego", 31, false),
								("1998", 32, true),
								("2000", 32, false),
								("1997", 32, false),
								("1999", 32, false),
								("Verdadero", 33, false),
								("Falso", 33, true),
								("multijugos", 34, true),
								("364", 35, false),
								("142", 35, true),
								("758", 35, false),
								("87", 35, false),
								("salazar", 36, true),
								("Pelo de Cola de Unicornio", 37, false),
								("Pluma de Fénix", 37, true),
								("Corazón de Dragón", 37, false),
								("Cuerno de Basilisco", 37, false),
								("Caput draconis", 38, false),
								("Sorbete de limón", 38, true),
								("Sangre pura", 38, true),
								("Hocico de cerdo", 38, false),
								("Somormujo", 38, false),
								("Fortuna major", 38, false),
								("Pitapatafrita", 38, false),
								("Rompetechos", 38, false),
								("Vil bellaco", 38, false),
								("Baratijas", 38, false),
								("Píldoras ácidas", 38, true),
								("oculus reparo", 39, true),
								("Dobby", 40, false),
								("Winky", 40, false),
								("Kreacher", 40, true),
								("Hockey", 40, false),
								("Hocicorto sueco", 41, true),
								("Galés Verde común", 41, false),
								("Bola de Fuego Chino", 41, false),
								("Colacuerno Húngaro", 41, false);


-- #CREAR TRIGGER - PARTIDAS-----------------------------------------

DELIMITER $$

CREATE TRIGGER actualizarNivel
AFTER INSERT ON partidas 
FOR EACH ROW
BEGIN

DECLARE punt INT;
SET punt = (SELECT SUM(puntuacion) FROM partidas WHERE nombre = NEW.nombre);

IF (punt > 30 AND punt < 86)
	THEN
		UPDATE jugadores SET nivel = 'Muggle' WHERE nombre = NEW.nombre;
ELSEIF (punt > 85 AND punt < 186)
	THEN
		UPDATE jugadores SET nivel = 'Wizard' WHERE nombre = NEW.nombre;
ELSEIF (punt > 185)
	THEN
		UPDATE jugadores SET nivel = 'Auror' WHERE nombre = NEW.nombre;
END IF;

END $$

DELIMITER ;

--https://www.php.net/manual/en/mysqli.quickstart.multiple-statement.php