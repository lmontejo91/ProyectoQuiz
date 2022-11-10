<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>preguntasBUTTON</title>
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
        $data = $conn->query("SELECT respuesta FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetchAll();

        foreach ($data as $row) {
            $respuestas[] = $row['respuesta'];
        }

        
        echo "<h2>".$pregunta."</h2>";
        echo "<form name='formulario_Button' action='./proyectoQuiz_jugar.php' method='POST'>";
            foreach($respuestas as $respuesta){
                echo "<input type='button' value='".$respuesta."'/>";
            }
            echo "<br><input type='submit' name='enviarPregunta' value='Siguiente'/>";
        echo "</form>";
        

    ?>

</body>
</html>