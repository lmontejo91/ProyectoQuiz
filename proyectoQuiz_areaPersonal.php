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
   <title>Área Personal</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_login.php');
        }

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        //Guardamos en variables las consultas
        $puntuacion_usuario = $conn->query("SELECT SUM(puntuacion) as puntuacionTotal FROM partidas WHERE nombre='".$_SESSION['userName']."'")->fetch()['puntuacionTotal'];
        $partidas_usuario = $conn->query("SELECT COUNT(*) as num_partidas FROM partidas WHERE nombre='".$_SESSION['userName']."'")->fetch()['num_partidas'];
        $nivel_usuario = $conn->query("SELECT nivel FROM jugadores WHERE nombre='".$_SESSION['userName']."'")->fetch()['nivel'];

    ?>


    <section class="vh-100 bg-light bg-image" style="background-image: url('./images/hm_castillo_personajes.jpg'); height:100%">
    <!-- <section class="vh-100 bg-ranking">  -->  
            <div class="h-100 row d-flex bg-secondary bg-opacity-75">

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

                <!-- DIV TARJETA CENTRAL -->
                <div class="mx-auto col col-md-9 col-lg-7 col-xl-6 px-6 pb-2">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-around text-black">
                                
                                <!-- COLUMNA DATOS JUGADOR -->
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1"><?php echo $_SESSION['userName'] ?></h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;"><?php echo $nivel_usuario ?></p>
                                    <div class="d-flex justify-content-start rounded-3 p-2 mb-2" style="background-color: #efefef;">
                                        <div class="text-center">
                                            <p class="small text-muted mb-1">Número de partidas</p>
                                            <p class="h5 mb-0"><?php echo $partidas_usuario ?></p>
                                        </div>
                                        <div class="px-3 text-center">
                                            <p class="small text-muted mb-1">Puntuación total</p>
                                            <p class="h5 mb-0"><?php echo $puntuacion_usuario ?></p>
                                        </div>
                                    </div>
                                    <div class="d-flex pt-1">
                                        <button type="button" class="btn btn-outline-primary me-1 flex-grow-1">Ranking</button>
                                        <button type="button" class="btn btn-primary flex-grow-1">Jugar</button>
                                    </div>
                                </div>

                                <!-- DIV Columna con IMAGEN DEL NIVEL DE JUGADOR -->
                                <div class="flex-shrink-0 ms-1">
                                    <?php if($nivel_usuario == 'Troll'): ?>
                                        <img src="./images/img_niveles/troll.png"
                                        alt="Imagen nivel Troll" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                    <?php endif; ?>
                                    <?php if($nivel_usuario == 'Muggle'): ?>
                                        <img src="./images/img_niveles/muggle.jpg"
                                        alt="Imagen nivel Muggle" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                    <?php endif; ?>
                                    <?php if($nivel_usuario == 'Wizard'): ?>
                                        <img src="./images/img_niveles/wizard.jpg"
                                        alt="Imagen nivel Wizard" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                    <?php endif; ?>
                                    <?php if($nivel_usuario == 'Auror'): ?>
                                        <img src="./images/img_niveles/auror.png"
                                        alt="Imagen nivel Auror" class="img-fluid"
                                        style="width: 180px; border-radius: 10px;">
                                    <?php endif; ?>
                                </div>

                            </div>
                        </div>
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



    <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>