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

        /* $pregunta = "¿Quién mató a Dobby?";
        $respuestas = ["Lucius Malfoy", "Fenrir Greyback", "Bellatrix Lestrange", "Alecto Carrow"];    
        echo "<h2>".$pregunta."</h2>";
        echo "<form>";
            echo "<input type='button' value='".$respuestas[0]."'/>";
            echo "<input type='button' value='".$respuestas[1]."'/>";
            echo "<input type='button' value='".$respuestas[2]."'/>";
            echo "<input type='button' value='".$respuestas[3]."'/>";
        echo "</form>"; */






       /*  $numeroRepetido = true;
        $_SESSION['preguntasRandom'] = array();
        $numero;
  
        if(count($_SESSION['preguntasRandom']) < 10){
  
        //echo "Entra IF<br>";
          do{
              $numero = rand(1,41);
              //echo $numero;
              echo "<br>";
              if (!in_array($numero, $_SESSION['preguntasRandom'])) {
                $_SESSION['preguntasRandom'][] = $numero;
                $numeroRepetido = false;
              }
              print_r($_SESSION['preguntasRandom']);
          }while ($numeroRepetido == true);
          
          echo "<br>Final array -->";
          print_r($_SESSION['preguntasRandom']);

        }else{
            echo "JUEGO TERMINADO";
            unset($_SESSION['preguntasRandom']);
        } */


?>
<!DOCTYPE html>
<html>
<head>
    <title>Ejercicios Clase: JSON</title>
</head>
<body>

    <?php
        echo "<h2>Lo que sea</h2>";
        echo "<form name='formulario_Button' action='".$_SERVER['PHP_SELF']."' method='POST'>";
                echo "<input type='button' name='boton2' value='hola' onclick='asignarValue()'/>";
                echo "<input type='button' name='boton1' value='HOLA' onclick='asignarValue()'/>";
                echo "<input type='hidden' id='custId' name='custId' value=''/>";
            echo "<br><input type='submit' name='enviarPregunta' value='Envia'/>";
        echo "</form>";

        if(isset($_POST['enviarPregunta'])){
            //echo $_POST['formulario_Button'];
            echo $_POST['enviarPregunta'];
            //echo $_POST['boton2'];
            //echo $_POST['boton1'];
            echo "<br>xxx<br>";
            echo $_POST['custId'];
        }    
    //onclick='asignarValue()
    ?>

</body>
<script>
    /* window.onload = () => window.addEventListener('click', event => {
        let valorMarcado = event.target.value;
        console.log(valorMarcado);
        document.getElementById('custId').value=valorMarcado;
        console.log(document.getElementById('custId').value);
    }); */


    function asignarValue(){
        let valorMarcado = event.target.value;
        //console.log(valorMarcado);
        document.getElementById('custId').value=valorMarcado;
    }    

</script>
</html>