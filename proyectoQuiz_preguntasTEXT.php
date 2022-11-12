<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>preguntasTEXT</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['categoriaPregunta']) || !isset($_SESSION['n_pregunta'])) {
            echo "ERROR";
            //Aquí luego poner header que te redirija.
        }
        
        print_r($_SESSION['preguntasRandom']);
        print_r($_SESSION['puntuacionTotal']);
        //Declaración de Variables
        $pregunta;

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = $conn->query("SELECT pregunta, puntos FROM preguntas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch();
        $respuesta = $conn->query("SELECT respuesta FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch()['respuesta'];
        
        $_SESSION['puntosPregunta'] = $pregunta['puntos'];
        echo $_SESSION['puntosPregunta'];
        $_SESSION['respuesta_correcta'] = $respuesta;


        echo "<h2>".$pregunta['pregunta']."</h2><br>";
        echo "<form name='formulario_Text' action='./proyectoQuiz_jugar.php' method='POST'>";
            echo "<input type='text' id='preguntaForm_text' name='preguntaForm_text'/>";
            echo "<br><input type='submit' name='enviarPregunta' value='Enviar'/>";
        echo "</form>";
        


    ?>

</body>
</html>