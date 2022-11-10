<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>mostrar Estadísticas</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo "Vuelve a Inicio from mostrarEstadisticas";
            //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_inicio.php');
        }
        
        //Declaración de Variables

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        
        $puntuacionesUsuarios = $conn->query("SELECT nombre, SUM(puntuacion) as puntuacionTotal FROM partidas GROUP BY nombre ORDER BY puntuacionTotal DESC LIMIT 5")->fetchAll();

        echo "<table>";
                echo "<tr>";
                    echo "<th></th>";
                    echo "<th>Jugador</th>";
                    echo "<th>Nivel</th>";
                echo "</tr>";
                foreach($puntuacionesUsuarios as $puntuacion){
                    $usuarioRanking = $conn->query("SELECT nombre, fotoPerfil, nivel FROM jugadores WHERE nombre='".$puntuacion["nombre"]."'")->fetch();
                    
                    echo "<tr>";
                        echo "<td>".$usuarioRanking['fotoPerfil']."</td>";
                        echo "<td>".$usuarioRanking['nombre']."</td>";
                        echo "<td>".$puntuacion['puntuacionTotal']."</td>";
                        echo "<td>".$usuarioRanking['nivel']."</td>";
                    echo "</tr>"; 
                }  
            echo "</table>";


    ?>

</body>
</html>