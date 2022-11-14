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
        
        if(!isset($_SESSION['categoriaPregunta']) || !isset($_SESSION['n_pregunta'])) {
            echo "ERROR";
            //Aquí luego poner header que te redirija.
        }
        
        print_r($_SESSION['preguntasRandom']);
        print_r($_SESSION['puntuacionTotal']);
        //Declaración de Variables
        $pregunta;
        $respuestas = [];
        $_SESSION['contador_respCorrectas'] = 0;
        

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = $conn->query("SELECT pregunta, puntos FROM preguntas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch();
        $respuestas = $conn->query("SELECT respuesta, acierto FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetchAll();

        $_SESSION['puntosPregunta'] = $pregunta['puntos'];
        echo $_SESSION['puntosPregunta'];
        /* foreach ($data as $row) {
            $respuestas[] = $row['respuesta'];
            if($row['acierto'] == "1"){
                $_SESSION['contador_respCorrectas'] = $row['respuesta'];
            }
        } */

        
        echo "<h2>".$pregunta['pregunta']."</h2>";
        echo "<form name='formulario_Checkbox' action='./proyectoQuiz_jugar.php' method='POST'>";
            foreach($respuestas as $index => $respuesta){
                echo "<input type='checkbox' id='respuesta".$index."' name='preguntaForm_checkbox' value='".$respuesta['acierto']."'/>";
                echo "<label for='respuesta".$index."'>'".$respuesta['respuesta']."'</label><br>";
                if($respuesta['acierto'] == "1"){
                    $_SESSION['contador_respCorrectas']++;
                }
            }
            echo "<input type='submit' name='enviarPregunta' value='Siguiente'/>";
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