<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>logeado</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo "Vuelve a Inicio from LOGEADO";
            //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_inicio.php');
        }else{
            //BOTÓN CERRAR_SESIÓN (Esquina Superior Derecha)
            echo "<form name='cierre' action='proyectoQuiz_cierre.php' method='POST'>";
                echo "<input type='submit' name='btn_cerrarSesion' value='Cerrar sesión'>";
            echo "</form>";
    
            if($_SESSION['origen'] == "login"){
                //MENSAJE BIENVENIDO
                echo "<p>¡Bienvenid@ ".$_SESSION['userName']."!</p>";
            }else{
                //MENSAJE RESULTADO PARTIDA
                echo "Resultado partida";
            }
    
            
    
            //BOTONES MostrarEstadísticas & Jugar
            echo "<a href='http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_mostrarEstadisticas.php'>
                <button>Mostrar Estadísticas</button>
            </a>";
    
            echo "<a href='http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_jugar.php'>
                <button>Jugar</button>
            </a>";
    
            /* echo "<form name='form_ProyectoQuiz' action='proyectoQuiz_login' method='POST'>";
                echo "<input type='submit' value='Mostrar Estadísticas' name='evento_MostrarEstadisticas'>";
                echo "<input type='submit' value='Jugar' name='evento_Jugar'>";
            echo "</form>"; */
        }


    ?>

</body>
</html>
