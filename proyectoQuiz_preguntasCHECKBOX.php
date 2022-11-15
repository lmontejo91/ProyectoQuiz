<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./styleCSS.css">
    <title>preguntasCHECKBOX</title>
</head>
<body>
    <?php
        
        if(!isset($_SESSION['categoriaPregunta']) || !isset($_SESSION['n_pregunta'])) {
            echo "ERROR";
            //Aquí luego poner header que te redirija.
        }
        
        //Declaración de Variables
        $pregunta;
        $respuestas = [];
        $_SESSION['contador_respCorrectas'] = 0;
        

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        $pregunta = $conn->query("SELECT pregunta, puntos FROM preguntas WHERE preguntaID=$_SESSION[n_pregunta]")->fetch();
        $respuestas = $conn->query("SELECT respuesta, acierto FROM respuestas WHERE preguntaID=$_SESSION[n_pregunta]")->fetchAll();

        $_SESSION['puntosPregunta'] = $pregunta['puntos'];

        $fotoPerfil_menu = $conn->query("SELECT fotoPerfil FROM jugadores WHERE nombre='".$_SESSION['userName']."'")->fetch()['fotoPerfil'];

        //echo $_SESSION['puntosPregunta'];
        /* foreach ($data as $row) {
            $respuestas[] = $row['respuesta'];
            if($row['acierto'] == "1"){
                $_SESSION['contador_respCorrectas'] = $row['respuesta'];
            }
        } */

        
        /* echo "<h2>".$pregunta['pregunta']."</h2>";
        echo "<form name='formulario_Checkbox' action='./proyectoQuiz_jugar.php' method='POST'>";
            foreach($respuestas as $index => $respuesta){
                echo "<input type='checkbox' id='respuesta".$index."' name='preguntaForm_checkbox' value='".$respuesta['acierto']."'/>";
                echo "<label for='respuesta".$index."'>'".$respuesta['respuesta']."'</label><br>";
                if($respuesta['acierto'] == "1"){
                    $_SESSION['contador_respCorrectas']++;
                }
            }
            echo "<input type='submit' name='enviarPregunta' value='Siguiente'/>";
        echo "</form>"; */
   
    ?>


    <section class="vh-100 bg-light">
        
        <!-- DIV Contenedor -->
        <div class="h-100 row d-flex justify-content-center align-items-center">
            
            <!-- DIV Menú Esquina Superior Derecha -->
            <div class="col-xs-12 col-sm-12 col-md-12 bg-dark bg-opacity-75 align-self-start">
                <div class="col-xs-5 col-sm-5 col-md-5 dropdown float-end mt-2 me-4">
                    <button class="btn btn-white float-end" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img
                            src="<?php echo "./uploads/".$fotoPerfil_menu ?>"
                            alt="" style="width: 65px; height: 65px" class="rounded-circle"/>
                    </button>
                    <ul class="col-xs-9 col-sm-9 col-md-9 dropdown-menu px-5 py-3" aria-labelledby="dropdownMenu2">
                        <li class="dropdown-item d-flex flex-row align-items-center justify-content-around">
                            <img
                                src="<?php echo "./uploads/".$fotoPerfil_menu ?>"
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


            <!-- DIV Central Pregunta -->
            <div class="container mt-4 mb-5">
                <div class="mx-7 p-4 bg-white rounded">
                    <h2><?php echo $pregunta['pregunta'] ?></h2>
                    
                    <form name='formulario_Checkbox' action='./proyectoQuiz_jugar.php' method='POST'>

                        <?php foreach ($respuestas as $index => $respuesta):?>
                            <input type='checkbox' id='<?php echo "respuesta".$index ?>' name='preguntaForm_checkbox' value='<?php echo $respuesta['acierto'] ?>'/>";
                            <label for='<?php echo "respuesta".$index ?>'><?php echo $respuesta['respuesta'] ?></label><br>";
                            <?php if($respuesta['acierto'] == "1"):
                                $_SESSION['contador_respCorrectas']++;
                            endif; ?>
                        <?php endforeach; ?>

                        <input type='submit' name='enviarPregunta' value='Enviar'/>

                    </form>

                </div>
            </div>
            
            
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>