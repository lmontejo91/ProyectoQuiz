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
   <title>Inicio</title>
</head>
<body>
    
    <?php

        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_login.php');
        }

        include 'proyectoQuiz_crearConexion.php';

        $puntuacion_ultimaPartida = $conn->query("SELECT puntuacion FROM partidas 
                                                    WHERE nombre='cris' 
                                                        AND partidaID = (SELECT MAX(partidaID) FROM partidas 
                                                                            WHERE nombre='cris')")->fetch()['puntuacion'];

        $datos_usuario = $conn->query("SELECT fotoPerfil, nivel FROM jugadores WHERE nombre='".$_SESSION['userName']."'")->fetch();
    
    ?>


    <section class="vh-100 bg-ranking">   
            <div class="h-100 row d-flex bg-ranking">

                <!-- DIV Menú Esquina Superior Derecha -->
                <div class="col-xs-12 col-sm-12 col-md-12 bg-dark bg-opacity-75 align-self-start">
                    <div class="col-xs-5 col-sm-5 col-md-5 dropdown float-end mt-2 me-4">
                        <button class="btn btn-white float-end" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            <img
                                src="<?php echo "./uploads/".$datos_usuario['fotoPerfil'] ?>"
                                alt="" style="width: 65px; height: 65px" class="rounded-circle"/>
                        </button>
                        <ul class="col-xs-9 col-sm-9 col-md-9 dropdown-menu px-5 py-3" aria-labelledby="dropdownMenu2">
                            <li class="dropdown-item d-flex flex-row align-items-center justify-content-around">
                                <img
                                    src="<?php echo "./uploads/".$datos_usuario['fotoPerfil'] ?>"
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

                <!-- DIV Mensaje Bienvenida -->
                <div class="fs-2 hp-font text-center py-5">
                    <?php if($_SESSION['origen'] == "login"): ?>
                        <p><?php echo "¡Bienvenid@ ".$_SESSION['userName']."!" ?></p>
                        <p><?php echo "¡Comienza tu aventura en Howgarts!" ?></p>
                    <?php endif; ?>
                    <?php if($_SESSION['origen'] != "login" && $_SESSION['origen'] != "jugar"): ?>
                        <p><?php echo "¡Bienvenid@ ".$_SESSION['userName']."!" ?></p>
                        <p><?php echo "¡Comienza tu aventura en Howgarts!" ?></p>
                    <?php endif; ?>
                    <?php if($_SESSION['origen'] == "jugar"): ?>
                        <p><?php echo "¡Bienvenid@ ".$_SESSION['userName']."!" ?></p>
                    <?php endif; ?>
                </div>
                
                <!-- DIV Carrusel Imágenes -->
                <?php if($_SESSION['origen'] != "jugar"): ?>
                <div id="carouselExampleSlidesOnly" class="carousel slide col-xs-5 col-sm-5 col-md-7 mx-auto" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./images/hm_castillo_banderas_ORIGINAL.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/hm_fantasmas_ORIGINAL.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/hm_castillo_fuegos_ORIGINAL.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./images/hm_hogsmeade_ORIGINAL.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- DIV Resultado Jugar -->
                <?php if($_SESSION['origen'] == "jugar"): ?>
                    <div class="col-xs-5 col-sm-5 col-md-5 mx-7 d-flex justify-content-center align-items-center mb-5 bg-white rounded">
                        <div>
                            <p>¡Enhorabuena <?php echo $_SESSION['userName'] ?>!</p>
                            <p>Has conseguido<span class="d-block"><?php echo $puntuacion_ultimaPartida." puntos" ?></span></p>
                        </div>
                        <div>
                            <?php if($datos_usuario['nivel'] == 'Troll'): ?>
                                <img src="./images/img_niveles/troll.png"
                                alt="Imagen nivel Troll" class="img-fluid"
                                style="width: 180px; border-radius: 10px;">
                            <?php endif; ?>
                            <?php if($datos_usuario['nivel'] == 'Muggle'): ?>
                                <img src="./images/img_niveles/muggle.jpg"
                                alt="Imagen nivel Muggle" class="img-fluid"
                                style="width: 180px; border-radius: 10px;">
                            <?php endif; ?>
                            <?php if($datos_usuario['nivel'] == 'Wizard'): ?>
                                <img src="./images/img_niveles/wizard.jpg"
                                alt="Imagen nivel Wizard" class="img-fluid"
                                style="width: 180px; border-radius: 10px;">
                            <?php endif; ?>
                            <?php if($datos_usuario['nivel'] == 'Auror'): ?>
                                <img src="./images/img_niveles/auror.png"
                                alt="Imagen nivel Auror" class="img-fluid"
                                style="width: 180px; border-radius: 10px;">
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>



                <!-- DIV Botones -->
                <div class="col-xs-12 col-sm-12 col-md-12 py-4">
                    <div class="mx-auto col-xs-5 col-sm-5 col-md-2 d-flex align-items-center justify-content-around">
                        <a href="proyectoQuiz_ranking.php">
                            <button type="button" class="btn btn-success btn-lg">Ver Ranking</button>
                        </a>
                        <a href="proyectoQuiz_jugar.php">
                            <button type="button" class="btn btn-success btn-lg">Jugar</button>
                        </a>
                        <!-- <a href="proyectoQuiz_ranking.php" class="btn btn-success" role="button" data-bs-toggle="button">Ver Ranking</a>
                        <a href="proyectoQuiz_jugar.php" class="btn btn-success" role="button" data-bs-toggle="button">Jugar</a> -->
                    </div>
                </div>


            </div>
    

        <!-- DIV Footer -->
        <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-dark">
            <!-- Copyright -->
            <div class="text-light mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
            </div>
        </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
