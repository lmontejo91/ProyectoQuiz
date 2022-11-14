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
            if($row['acierto'] == "1"){
                $_SESSION['respuesta_correcta'] = $row['respuesta'];
            }    
        }
        
        echo "<h2>".$pregunta['pregunta']."</h2>";
        echo "<form name='formulario_Radio' action='./proyectoQuiz_jugar.php' method='POST'>";
            echo "<input type='radio' id='respuesta1' name='preguntaForm_radio' value='".array_values($respuestas)[0]."'/>";
            echo "<label for='respuesta1'>'".array_keys($respuestas)[0]."'</label><br>";
            echo "<input type='radio' id='respuesta2' name='preguntaForm_radio' value='".array_values($respuestas)[1]."'/>";
            echo "<label for='respuesta2'>'".array_keys($respuestas)[1]."'</label><br>";
            echo "<input type='radio' id='respuesta3' name='preguntaForm_radio' value='".array_values($respuestas)[2]."'/>";
            echo "<label for='respuesta3'>'".array_keys($respuestas)[2]."'</label><br>";
            echo "<input type='radio' id='respuesta4' name='preguntaForm_radio' value='".array_values($respuestas)[3]."'/>";
            echo "<label for='respuesta4'>'".array_keys($respuestas)[3]."'</label><br>";
            echo "<input type='submit' name='enviarPregunta' value='Enviar'/>";
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


        <!-- <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="col-md-1 col-lg-2 col-xl-2">
                <img src="./images/corner-left.png" 
                class="img-fluid" alt="Sample image" width="75%">
            </div> 
        </div> -->


        <!-- https://mdbootstrap.com/docs/standard/components/progress/ -->