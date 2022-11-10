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
        
        if(!isset($_SESSION['categoriaPregunta']) || !isset($_SESSION['n_pregunta'])) {
            echo "ERROR";
            //Aquí luego poner header que te redirija.
        }
        print_r($_SESSION['preguntasRandom']);
        //Declaración de Variables
        $pregunta;
        $respuestas = [];

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = ($conn->query("SELECT pregunta FROM preguntas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch())['pregunta'];
        $data = $conn->query("SELECT respuesta, acierto FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetchAll();

        foreach ($data as $row) {
            $respuestas[$row['respuesta']] = $row['acierto'];
        }
        
        echo "<h2>".$pregunta."</h2>";
        echo "<form name='formulario_Select' action='./proyectoQuiz_jugar.php' method='POST'>";
        echo "<select name='preguntaSelect'/>";
        foreach ($respuestas as $respuesta => $valor){
            echo "<option value='$valor'>$respuesta</option>";
        }  
        echo "<br><input type='submit' name='enviarPregunta' value='Siguiente'/>";
    echo "</form>";


    ?>

</body>
</html>