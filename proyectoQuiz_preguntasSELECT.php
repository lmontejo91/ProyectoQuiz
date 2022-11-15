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
    <title>preguntasSELECT</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['categoriaPregunta']) || !isset($_SESSION['n_pregunta'])) {
            echo "ERROR";
            //Aquí luego poner header que te redirija.
        }
        
        
        /* print_r($_SESSION['preguntasRandom']);
        print_r($_SESSION['puntuacionTotal']); */
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
        }
        
        $fotoPerfil_menu = $conn->query("SELECT fotoPerfil FROM jugadores WHERE nombre='".$_SESSION['userName']."'")->fetch()['fotoPerfil'];

        /* echo "<h2>".$pregunta['pregunta']."</h2>";
        echo "<form name='formulario_Select' action='./proyectoQuiz_jugar.php' method='POST'>";
            echo "<select name='preguntaForm_select'>";
                foreach ($respuestas as $respuesta => $valor){
                    echo "<option value='$valor'>$respuesta</option>";
                }  
            echo "</select>";
            echo "<br><input type='submit' name='enviarPregunta' value='Enviar'/>";
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
                    <form name='formulario_Select' action='./proyectoQuiz_jugar.php' method='POST'>
                        <select name='preguntaForm_select'>
                            <?php foreach ($respuestas as $respuesta => $valor):?>
                                <option value='<?php echo $valor ?>'><?php echo $respuesta ?></option>
                            <?php endforeach; ?>
                        </select>
                        <br><input type='submit' name='enviarPregunta' value='Enviar'/>
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