<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>preguntasCHECKBOX</title>
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
        $data = $conn->query("SELECT respuesta FROM preguntas WHERE preguntaID=$_COOKIE[n_pregunta]")->fetchAll();

        foreach ($data as $row) {

            foreach($respuestas as $opcion){
                $opcion = $row['respuesta'];
            }
        }

        
        echo "<h2>".$pregunta."</h2>";
        echo "<form name='formulario_Checkbox' action='./proyectoQuiz_jugar.php' method='POST'>";
            foreach($respuestas as $index => $respuesta){
                echo "<input type='checkbox' id='respuesta".$index."' name='preguntaForm_checkbox' value='".$respuesta."'/>";
                echo "<label for='respuesta1'>'".$respuesta."'</label><br>";
            }
            echo "<input type='submit' value='Siguiente'/>";
        echo "</form>";


        
    ?>
</body>
</html>