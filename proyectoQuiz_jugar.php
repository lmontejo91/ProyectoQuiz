<?php
    session_start();

    if (!($_SERVER["REQUEST_METHOD"] == "POST")){
      $_SESSION['preguntasRandom'] = array();
    }

    if (($_SERVER["REQUEST_METHOD"] == "POST")){
      if (isset($_POST['enviarPregunta'])){

      }
    }

    $numeroRepetido = true;
    $numero;

    if(count($_SESSION['preguntasRandom']) < 10){

    //echo "Entra IF<br>";
      do{
          $numero = rand(1,41);
          /* echo $numero;
          echo "<br>"; */
          if (!in_array($numero, $_SESSION['preguntasRandom'])) {
            array_push($_SESSION['preguntasRandom'], $numero);
            $numeroRepetido = false;
          }
      }while ($numeroRepetido == true);
         

    

    include 'proyectoQuiz_crearConexion.php';
    //foreach($_SESSION['preguntasRandom'] as $pregunta){
        $result = $conn->query("SELECT categoria FROM preguntas WHERE preguntaID = $numero")->fetch();
        switch ($result['categoria']) {
            case 'radio':
                $_SESSION['categoriaPregunta'] = 'radio';
                $_SESSION['n_pregunta'] = $numero;
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasRADIO.php');
              break;
            case 'checkbox':
              $_SESSION['categoriaPregunta'] = 'checkbox';
              $_SESSION['n_pregunta'] = $numero;
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasCHECKBOX.php');
              break;
            case 'text':
              $_SESSION['categoriaPregunta'] = 'text';
              $_SESSION['n_pregunta'] = $numero;
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasTEXT.php');
              break;
            case 'button':
              $_SESSION['categoriaPregunta'] = 'button';
              $_SESSION['n_pregunta'] = $numero;
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasBUTTON.php');
                break;
            case 'select':
                $_SESSION['categoriaPregunta'] = 'select';
                $_SESSION['n_pregunta'] = $numero;
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasSELECT.php');
                break;
            default:
              echo "Error";
          }
        
    //}

  }else{
    echo "JUEGO FINALIZADO";
  }

    //unset($_SESSION["preguntasRandom"])
    
?>
