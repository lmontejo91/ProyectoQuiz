<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>preguntasSELECT</title>
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
        echo "<form name='formulario_Select' action='./proyectoQuiz_jugar.php' method='POST'>";
        echo "<select name='preguntaSelect'/>";
        foreach ($respuestas as $respuesta => $valor){
            echo "<option value='$valor'>$personaje</option>";
        }  
        echo "<input type='submit' value='Siguiente'/>";
    echo "</form>";


    ?>

</body>
</html>