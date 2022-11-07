<?php
    session_start();
    /* $arrayPreguntas = array();

    do{
        array_push($arrayPreguntas, rand(1,41));
        $arrayPreguntas = array_unique($arrayPreguntas);
    }while (count($arrayPreguntas) < 10);

    //print_r($arrayPreguntas);

    include 'proyectoQuiz_crearConexion.php';

    foreach($arrayPreguntas as $pregunta){
        $result = $conn->query("SELECT categoria FROM preguntas WHERE preguntaID = $pregunta")->fetch();
        echo $pregunta." --> ";
        echo $result['categoria'];
        echo "<br>";
    } */

    /* $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
    echo $age[0]; */


    /*$pregunta = "¿Quién mató a Dobby?";
    $respuestas = ["Lucius Malfoy"=>0, "Fenrir Greyback"=>0, "Bellatrix Lestrange"=>1, "Alecto Carrow"=>0];

     echo "<h2>".$pregunta."</h2>";
        echo "<form>";
            echo "<input type='radio' id='respuesta1' name='preguntaForm_radio' value='".array_values($respuestas)[0]."'/>";
            echo "<label for='respuesta1'>'".array_keys($respuestas)[0]."'</label><br>";
            echo "<input type='radio' id='respuesta2' name='preguntaForm_radio' value='".array_values($respuestas)[1]."'/>";
            echo "<label for='respuesta2'>'".array_keys($respuestas)[1]."'</label><br>";
            echo "<input type='radio' id='respuesta3' name='preguntaForm_radio' value='".array_values($respuestas)[2]."'/>";
            echo "<label for='respuesta3'>'".array_keys($respuestas)[2]."'</label><br>";
            echo "<input type='radio' id='respuesta4' name='preguntaForm_radio' value='".array_values($respuestas)[3]."'/>";
            echo "<label for='respuesta4'>'".array_keys($respuestas)[3]."'</label>";
        echo "</form>"; */

        $pregunta = "¿Quién mató a Dobby?";
        $respuestas = ["Lucius Malfoy", "Fenrir Greyback", "Bellatrix Lestrange", "Alecto Carrow"];    
        echo "<h2>".$pregunta."</h2>";
        echo "<form>";
            echo "<input type='button' value='".$respuestas[0]."'/>";
            echo "<input type='button' value='".$respuestas[1]."'/>";
            echo "<input type='button' value='".$respuestas[2]."'/>";
            echo "<input type='button' value='".$respuestas[3]."'/>";
        echo "</form>";


?>