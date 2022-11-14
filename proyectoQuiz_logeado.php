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
    <!-- <link href="https://fonts.cdnfonts.com/css/harry-potter" rel="stylesheet"> -->
   <title>Inicio</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo "Vuelve a Inicio from LOGEADO";
            //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_inicio.php');
        }
            //BOTÓN CERRAR_SESIÓN (Esquina Superior Derecha)
            /* echo "<form name='cierre' action='proyectoQuiz_cierre.php' method='POST'>";
                echo "<input type='submit' name='btn_cerrarSesion' value='Cerrar sesión'>";
            echo "</form>";
    
            if($_SESSION['origen'] == "login"){
                //MENSAJE BIENVENIDO
                echo "<p>¡Bienvenid@ ".$_SESSION['userName']."!</p>";
                echo "<p>¡Comienza tu aventura en Howgarts!</p>";
            }else{
                //MENSAJE RESULTADO PARTIDA
                echo "Resultado partida";
            }
    
            
    
            //BOTONES MostrarEstadísticas & Jugar
            echo "<a href='http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_ranking.php'>
                <button>Mostrar Estadísticas</button>
            </a>";
    
            echo "<a href='http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_jugar.php'>
                <button>Jugar</button>
            </a>"; */
    
            /* echo "<form name='form_ProyectoQuiz' action='proyectoQuiz_login' method='POST'>";
                echo "<input type='submit' value='Mostrar Estadísticas' name='evento_MostrarEstadisticas'>";
                echo "<input type='submit' value='Jugar' name='evento_Jugar'>";
            echo "</form>"; */
        


    ?>


    <section class="vh-100 bg-ranking">   
            <div class="h-100 row d-flex bg-ranking">

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
                <?php if($_SESSION['origen'] == "jugar"): ?>
                    <div id="carouselExampleSlidesOnly" class="carousel slide d-none col-xs-5 col-sm-5 col-md-7 mx-auto" data-bs-ride="carousel">
                <?php endif; ?>
                <?php if($_SESSION['origen'] != "jugar"): ?>
                    <div id="carouselExampleSlidesOnly" class="carousel slide col-xs-5 col-sm-5 col-md-7 mx-auto" data-bs-ride="carousel">
                    <?php endif; ?>
                <!-- <div id="carouselExampleSlidesOnly" class="carousel slide col-xs-5 col-sm-5 col-md-7 mx-auto" data-bs-ride="carousel"> -->
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



                <!-- DIV Botones -->
                <div class="col-xs-12 col-sm-12 col-md-12 py-4">
                    <div class="mx-auto col-xs-5 col-sm-5 col-md-2 d-flex align-items-center justify-content-around">
                        <a href="./proyectoQuiz_ranking.php" class="btn btn-success" role="button" data-bs-toggle="button">Ver Ranking</a>
                        <a href="./proyectoQuiz_jugar.php" class="btn btn-success" role="button" data-bs-toggle="button">Jugar</a>
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
