<?php
  session_start();

  //IF que solo se ejecuta una vez antes de empezar a jugar para inicializar la variable de sesión $_SESSION['preguntasRandom']. NO se ejecutará cuando se esté jugando cada vez que se cambia de pregunta.
  if (!($_SERVER["REQUEST_METHOD"] == "POST")){
    $_SESSION['preguntasRandom'] = array();
  }


  //IF para actualizar el valor de $_SESSION['puntuacionTotal'] cada vez que se responde una palabra, es decir, la petición viene de POST.
  if (($_SERVER["REQUEST_METHOD"] == "POST")){
    if (isset($_POST['enviarPregunta'])){

      if(!empty($_POST['preguntaForm_radio'])){
          $_SESSION['puntuacionTotal'] += $_SESSION['puntosPregunta'];
      }

      if(!empty($_POST['preguntaForm_checkbox'])){
        if((count($_POST['preguntaForm_checkbox']) == $_SESSION['contador_respCorrectas']) && !in_array(0, $_POST['preguntaForm_checkbox'])){
          $_SESSION['puntuacionTotal'] += $_SESSION['puntosPregunta'];
        }
      }

      if(!empty($_POST['preguntaForm_text'])){
          if($_POST['preguntaForm_text'] == $_SESSION['respuesta_correcta']){
            $_SESSION['puntuacionTotal'] += $_SESSION['puntosPregunta'];
          }
      }

      if(!empty($_POST['preguntaForm_button'])){
          $_SESSION['puntuacionTotal'] += $_SESSION['puntosPregunta'];
      }

      if(!empty($_POST['preguntaForm_select'])){
          $_SESSION['puntuacionTotal'] += $_SESSION['puntosPregunta'];
      }       
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
      
  }else{
    

    echo "JUEGO FINALIZADO";
    unset($_SESSION['preguntasRandom']);
    unset($_SESSION['puntuacionTotal']);
  }
    
?>
