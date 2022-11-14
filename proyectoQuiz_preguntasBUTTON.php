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
        print_r($_SESSION['puntuacionTotal']);
        //Declaración de Variables
        $pregunta;
        //$respuestas = [];

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = $conn->query("SELECT pregunta, puntos FROM preguntas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch();
        $respuestas = $conn->query("SELECT respuesta, acierto FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetchAll();

        $_SESSION['puntosPregunta'] = $pregunta['puntos'];
        echo $_SESSION['puntosPregunta'];
        /* foreach ($data as $row) {
            $respuestas[] = $row['respuesta'];
            if($row['acierto'] == "1"){
                $_SESSION['respuesta_correcta'] = $row['respuesta'];
            }
        } */

        
        echo "<h2>".$pregunta['pregunta']."</h2>";
        echo "<form name='formulario_Button' action='./proyectoQuiz_jugar.php' method='POST'>";
            foreach($respuestas as $respuesta){
                echo "<input type='button' class='".$respuesta['acierto']."' value='".$respuesta['respuesta']."' onclick='asignarValue()'/>";
            }
            echo "<input type='hidden' id='input_hidden' name='preguntaForm_button' value=''/>";
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

<script>
    function asignarValue(){
        let botones = document.querySelectorAll('input[type="button"]');
        for(boton of botones){
            boton.style.borderColor="black";
        }
        let botonMarcado = event.target.className;
        event.target.style.borderColor='blue';
        //console.log(valorMarcado);
        document.getElementById('input_hidden').value=botonMarcado;
    } 
</script>

</html>