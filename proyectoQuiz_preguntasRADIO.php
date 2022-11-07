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
        $data = $conn->query("SELECT respuesta, acierto FROM preguntas WHERE preguntaID=$_COOKIE[n_pregunta]")->fetchAll();

        foreach ($data as $row) {

            foreach($respuestas as $opcion => $valor){
                $opcion = $row['respuesta'];
                $valor = $row['acierto'];
            }
        }

        
        echo "<h2>".$pregunta."</h2>";
        echo "<form name='formulario_Radio' action='./proyectoQuiz_jugar.php' method='POST'>";
            echo "<input type='radio' id='respuesta1' name='preguntaForm_radio' value='".array_values($respuestas)[0]."'/>";
            echo "<label for='respuesta1'>'".array_keys($respuestas)[0]."'</label><br>";
            echo "<input type='radio' id='respuesta2' name='preguntaForm_radio' value='".array_values($respuestas)[1]."'/>";
            echo "<label for='respuesta2'>'".array_keys($respuestas)[1]."'</label><br>";
            echo "<input type='radio' id='respuesta3' name='preguntaForm_radio' value='".array_values($respuestas)[2]."'/>";
            echo "<label for='respuesta3'>'".array_keys($respuestas)[2]."'</label><br>";
            echo "<input type='radio' id='respuesta4' name='preguntaForm_radio' value='".array_values($respuestas)[3]."'/>";
            echo "<label for='respuesta4'>'".array_keys($respuestas)[3]."'</label>";
            echo "<input type='submit' value='Siguiente'/>";
        echo "</form>";
        



    ?>

</body>
</html>