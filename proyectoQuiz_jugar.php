<?php
    session_start();

    $arrayPreguntas = array();

    do{
        array_push($arrayPreguntas, rand(1,41));
        $arrayPreguntas = array_unique($arrayPreguntas);
    }while (count($arrayPreguntas) < 10);

    //print_r($arrayPreguntas);

    include 'proyectoQuiz_crearConexion.php';
    foreach($arrayPreguntas as $pregunta){
        $result = $conn->query("SELECT categoria FROM preguntas WHERE preguntaID = $pregunta")->fetch();
        switch ($result['categoria']) {
            case 'radio':
                setcookie('categoriaPregunta', 'radio');
                setcookie('n_pregunta', $pregunta);
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasRADIO.php');
              break;
            case 'checkbox':
                setcookie('categoriaPregunta', 'checkbox');
                setcookie('n_pregunta', $pregunta);
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasCHECKBOX.php');
              break;
            case 'text':
                setcookie('categoriaPregunta', 'text');
                setcookie('n_pregunta', $pregunta);
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasTEXT.php');
              break;
            case 'button':
                setcookie('categoriaPregunta', 'button');
                setcookie('n_pregunta', $pregunta);
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasBUTTON.php');
                break;
            case 'select':
                setcookie('categoriaPregunta', 'select');
                setcookie('n_pregunta', $pregunta);
                header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_preguntasSELECT.php');
                break;
            default:
              echo "Error";
          }
        
    }
    
?>
