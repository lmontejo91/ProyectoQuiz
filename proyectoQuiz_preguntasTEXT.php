<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>preguntasRADIO</title>
</head>
<body>
    
    <?php
        
        if(!isset($_COOKIE[$categoriaPregunta]) || !isset($_COOKIE[$n_pregunta])) {
            echo "ERROR";
            //Aquí luego poner header que te redirija.
        }

        //Declaración de Variables
        $pregunta;
        $respuestas = [];

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = ($conn->query("SELECT pregunta FROM preguntas WHERE preguntaID=$_COOKIE[n_pregunta]")->fetch())['pregunta'];
        
        echo "<h2>".$pregunta."</h2><br>";
        echo "<form name='formulario_Text' action='./proyectoQuiz_jugar.php' method='POST'>";
            echo "<input type='text' id='preguntaForm_text' name='preguntaForm_text'/>";
            echo "<input type='submit' value='Siguiente'/>";
        echo "</form>";
        


    ?>

</body>
</html>