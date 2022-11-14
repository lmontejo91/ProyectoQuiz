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
        print_r($_SESSION['puntuacionTotal']);
        //Declaración de Variables
        $pregunta;
        $respuestas = [];

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = $conn->query("SELECT pregunta, puntos FROM preguntas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch();
        $data = $conn->query("SELECT respuesta, acierto FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetchAll();

        $_SESSION['puntosPregunta'] = $pregunta['puntos'];
        echo $_SESSION['puntosPregunta'];
        foreach ($data as $row) {
            $respuestas[$row['respuesta']] = $row['acierto'];
        }
        
        echo "<h2>".$pregunta['pregunta']."</h2>";
        echo "<form name='formulario_Select' action='./proyectoQuiz_jugar.php' method='POST'>";
        echo "<select name='preguntaForm_select'/>";
        foreach ($respuestas as $respuesta => $valor){
            echo "<option value='$valor'>$respuesta</option>";
        }  
        echo "<br><input type='submit' name='enviarPregunta' value='Enviar'/>";
    echo "</form>";


    ?>

    <section class="vh-100 bg-image" style="background-image: url('./images/Marauders-Map_BUENA.jpg'); height:100%">
        
        <!-- DIV Contenedor -->
        <div class="h-100 row d-flex justify-content-center align-items-center">
            
            
            
        </div>

        <!-- DIV Footer -->
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
            <!-- Copyright -->
            <div class="text-light mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div>
        </div>

    </section>

</body>
</html>