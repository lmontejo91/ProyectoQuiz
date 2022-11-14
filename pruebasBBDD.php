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

    /* //FORM RADIO
    $pregunta = "¿Quién mató a Dobby?";
    $respuestas = ["Lucius Malfoy"=>0, "Fenrir Greyback"=>0, "Bellatrix Lestrange"=>1, "Alecto Carrow"=>0];

     echo "<h2>".$pregunta."</h2>";
        echo "<form name='formulario_Radio' action='".$_SERVER['PHP_SELF']."' method='POST'>";
            echo "<input type='radio' id='respuesta1' name='preguntaForm_radio' value='".array_values($respuestas)[0]."'/>";
            echo "<label for='respuesta1'>'".array_keys($respuestas)[0]."'</label><br>";
            echo "<input type='radio' id='respuesta2' name='preguntaForm_radio' value='".array_values($respuestas)[1]."'/>";
            echo "<label for='respuesta2'>'".array_keys($respuestas)[1]."'</label><br>";
            echo "<input type='radio' id='respuesta3' name='preguntaForm_radio' value='".array_values($respuestas)[2]."'/>";
            echo "<label for='respuesta3'>'".array_keys($respuestas)[2]."'</label><br>";
            echo "<input type='radio' id='respuesta4' name='preguntaForm_radio' value='".array_values($respuestas)[3]."'/>";
            echo "<label for='respuesta4'>'".array_keys($respuestas)[3]."'</label>";
            echo "<input type='submit' name='enviarPregunta' value='Siguiente'/>";
        echo "</form>";

    if(isset($_POST['enviarPregunta'])){
        if(isset($_POST['preguntaForm_radio'])){
            echo $_POST['enviarPregunta'];
            echo "<br>xxx<br>";
           // print_r($_POST['formulario_Radio']);
            print_r($_POST['preguntaForm_radio']);
            echo gettype($_POST['preguntaForm_radio']);
            echo "<br>";
            echo gettype((int)$_POST['preguntaForm_radio']);
            echo "<br>";
            echo "<br>xxx<br>";
            if(!empty($_POST['preguntaForm_radio'])){
                echo "entra";
            }else{
                echo "no entra";
            }
        }
    } 

    //FORM SELECT
    echo "<form name='formulario_Select' action='".$_SERVER['PHP_SELF']."' method='POST'>";
        echo "<label for='cars'>Choose a car:</label>";

        echo "<select name='cars' id='cars'>";
        echo "<option value='1'>Volvo</option>";
        echo "<option value='0'>Saab</option>";
        echo "<option value='0'>Mercedes</option>";
        echo "<option value='0'>Audi</option>";
        echo "</select>";
        echo "<br><input type='submit' name='enviarPregunta' value='Siguiente'/>";
    echo "</form>";

    if(isset($_POST['enviarPregunta'])){
        if(isset($_POST['cars'])){
            echo $_POST['enviarPregunta'];
            echo "<br>xxx<br>";
            print_r($_POST['cars']);
            echo "<br>xxx<br>";
            if(!empty($_POST['cars'])){
                echo "entra";
            }else{
                echo "no entra";
            }
        }
    } 

    //FORM CHECKBOX
    $pregunta = "¿Quién mató a Dobby?";
    $respuestas = ["Capa de Invisibilidad"=>1, "Varita de Saúco"=>1, "Diadema de Ravenclaw"=>0, "Piedra de resurrección"=>1, "Diario de Tom Riddle"=>0];

     echo "<h2>".$pregunta."</h2>";
        echo "<form name='formulario_checkbox' action='".$_SERVER['PHP_SELF']."' method='POST'>";
            echo "<input type='checkbox' id='respuesta1' name='preguntaForm_checkbox[]' value='".array_values($respuestas)[0]."'/>";
            echo "<label for='respuesta1'>'".array_keys($respuestas)[0]."'</label><br>";
            echo "<input type='checkbox' id='respuesta2' name='preguntaForm_checkbox[]' value='".array_values($respuestas)[1]."'/>";
            echo "<label for='respuesta2'>'".array_keys($respuestas)[1]."'</label><br>";
            echo "<input type='checkbox' id='respuesta3' name='preguntaForm_checkbox[]' value='".array_values($respuestas)[2]."'/>";
            echo "<label for='respuesta3'>'".array_keys($respuestas)[2]."'</label><br>";
            echo "<input type='checkbox' id='respuesta4' name='preguntaForm_checkbox[]' value='".array_values($respuestas)[3]."'/>";
            echo "<label for='respuesta4'>'".array_keys($respuestas)[3]."'</label><br>";
            echo "<input type='checkbox' id='respuesta5' name='preguntaForm_checkbox[]' value='".array_values($respuestas)[4]."'/>";
            echo "<label for='respuesta5'>'".array_keys($respuestas)[4]."'</label><br>";
            echo "<input type='submit' name='enviarPregunta' value='Siguiente'/>";
        echo "</form>";

    if(isset($_POST['enviarPregunta'])){
        if(isset($_POST['preguntaForm_checkbox'])){
            echo $_POST['enviarPregunta'];
            echo "<br>xxx<br>";
            //print_r($_POST['formulario_checkbox']);
            print_r($_POST['preguntaForm_checkbox']);
            echo "<br>xxx<br>";
            var_dump($_POST['preguntaForm_checkbox']);
            if(!empty($_POST['preguntaForm_checkbox'])){
                echo "entra";
            }else{
                echo "no entra";
            }
        }
    }  */


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

$n1 = "hola";
$n2 = "hola";
$n3 = "hola";
$n4 = "hola";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleCSS.css">
</head>
<body>
<section class="vh-100" style="background-color: #9de2ff;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <!-- DIV Menú Esquina Superior Derecha -->
        <div class="col-xs-12 col-sm-12 col-md-12 bg-dark bg-opacity-75 align-self-start">
                    <div class="col-xs-5 col-sm-5 col-md-5 dropdown float-end mt-2 me-4">
                        <button class="btn btn-white float-end" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img
                                src="./images/fotoPerfil01.jpg"
                                alt="" style="width: 65px; height: 65px" class="rounded-circle"/>
                        </button>
                        <ul class="col-xs-9 col-sm-9 col-md-9 dropdown-menu px-5 py-3" aria-labelledby="dropdownMenu2">
                            <li class="dropdown-item d-flex flex-row align-items-center justify-content-around">
                                <img
                                    src="./images/fotoPerfil01.jpg"
                                    alt="" style="width: 65px; height: 65px" class="rounded-circle"/>
                                <div>
                                    <p class="fw-bold mb-1"><?php echo $_SESSION['userName'] ?></p>
                                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                                </div> 
                            </li>
                            <li class="py-2"><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item  text-center" href="./proyectoQuiz_inicio.php">Inicio</a></li>
                            <li><a class="dropdown-item  text-center" href="./proyectoQuiz_areaPersonal.php">Área Personal</a></li>
                            <li><a class="dropdown-item  text-center" href="./proyectoQuiz_cierre.php">Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>


      <div class="col col-md-9 col-lg-7 col-xl-5">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-4">
            <div class="d-flex text-black">
              <div class="flex-shrink-0">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-profiles/avatar-1.webp"
                  alt="Generic placeholder image" class="img-fluid"
                  style="width: 180px; border-radius: 10px;">
              </div>
              <div class="flex-grow-1 ms-3">
                <h5 class="mb-1">Danny McLoan</h5>
                <p class="mb-2 pb-1" style="color: #2b2a2a;">Senior Journalist</p>
                <div class="d-flex justify-content-start rounded-3 p-2 mb-2"
                  style="background-color: #efefef;">
                  <div>
                    <p class="small text-muted mb-1">Articles</p>
                    <p class="mb-0">41</p>
                  </div>
                  <div class="px-3">
                    <p class="small text-muted mb-1">Followers</p>
                    <p class="mb-0">976</p>
                  </div>
                  <div>
                    <p class="small text-muted mb-1">Rating</p>
                    <p class="mb-0">8.5</p>
                  </div>
                </div>
                <div class="d-flex pt-1">
                  <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Chat</button>
                  <button type="button" class="btn btn-primary flex-grow-1">Follow</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>


<!-- <!DOCTYPE html>
<html>
<head>
    <title>Ejercicios Clase: JSON</title>
</head>
<body>

    php
        echo "<h2>Lo que sea</h2>";
        echo "<form name='formulario_Button' action='".$_SERVER['PHP_SELF']."' method='POST'>";
                echo "<input type='button' class='0' name='boton2' value='hola' onclick='asignarValue()'/>";
                echo "<input type='button' class='1' name='boton1' value='HOLA' onclick='asignarValue()'/>";
                echo "<input type='hidden' id='custId' name='custId' value=''/>";
            echo "<br><input type='submit' name='enviarPregunta' value='Envia'/>";
        echo "</form>";

        if(isset($_POST['enviarPregunta'])){
            echo $_POST['enviarPregunta'];
            echo "<br>xxx<br>";
            echo $_POST['custId'];
        }    
    ?>

</body>
<script>
    function asignarValue(){
        let valorMarcado = event.target.className;
        console.log(event.target.name);
        event.target.style.borderStyle='outset';
        console.log(valorMarcado);
        document.getElementById('custId').value=valorMarcado;
    }    
</script>
</html>
 -->









