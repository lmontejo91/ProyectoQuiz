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
    <title>mostrar Estadísticas</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo "Vuelve a Inicio from mostrarEstadisticas";
            //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_login.php');
        } 

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        //Guardamos en variables las consultas
        $puntuacionesUsuarios = $conn->query("SELECT nombre, SUM(puntuacion) as puntuacionTotal FROM partidas GROUP BY nombre ORDER BY puntuacionTotal DESC LIMIT 5")->fetchAll();
        $fotoPerfil_menu = $conn->query("SELECT fotoPerfil FROM jugadores WHERE nombre='".$_SESSION['userName']."'")->fetch()['fotoPerfil'];
    ?>

    <section class="vh-100 bg-image bg-ranking" style="background-image: url('./images/hm_castillo_banderas.jpg'); height:100%">
    <!-- <section class="vh-100 bg-ranking"> -->
    <!-- DIV Contenedor -->
        <div class="h-100 row d-flex justify-content-center align-items-center bg-secondary bg-opacity-75">
            
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

            <!-- DIV Boton Jugar -->
            <div class="col-xs-12 col-sm-12 col-md-12 pt-4">
                    <div class="mx-auto col-xs-5 col-sm-5 col-md-4 d-flex align-items-center justify-content-around">
                        <p class="fs-2 hp-font text-light">¿Tu nombre no aparece en el ranking? !Juega para conseguirlo!</p>
                        <a href="proyectoQuiz_jugar.php">
                            <button type="button" class="btn btn-success btn-lg">Jugar</button>
                        </a>
                    </div>
            </div>

            <!-- DIV Tabla Ranking -->
            <div class="container mt-4 mb-5">
                <div class="mx-7 p-4 bg-white rounded">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                            <th>Jugador</th>
                            <th>Nivel</th>
                            <th>Puntos</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($puntuacionesUsuarios as $puntuacion):
                                $usuarioRanking = $conn->query("SELECT nombre, fotoPerfil, nivel FROM jugadores WHERE nombre='".$puntuacion["nombre"]."'")->fetch(); ?>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                        <img
                                            src="<?php echo "./uploads/".$usuarioRanking['fotoPerfil'] ?>"
                                            alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1"><?php echo $usuarioRanking['nombre'] ?></p>
                                            <p class="text-muted mb-0">john.doe@gmail.com</p>
                                        </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if($usuarioRanking['nivel'] == 'Troll'): ?>
                                            <span class="badge badge-troll rounded-pill d-inline"><?php echo $usuarioRanking['nivel'] ?></span>
                                        <?php endif; ?>
                                        <?php if($usuarioRanking['nivel'] == 'Muggle'): ?>
                                            <span class="badge badge-muggle rounded-pill d-inline"><?php echo $usuarioRanking['nivel'] ?></span>
                                        <?php endif; ?>
                                        <?php if($usuarioRanking['nivel'] == 'Wizard'): ?>
                                            <span class="badge badge-wizard rounded-pill d-inline"><?php echo $usuarioRanking['nivel'] ?></span>
                                        <?php endif; ?>
                                        <?php if($usuarioRanking['nivel'] == 'Auror'): ?>
                                            <span class="badge badge-auror rounded-pill d-inline"><?php echo $usuarioRanking['nivel'] ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $puntuacion['puntuacionTotal'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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


<!-- https://mdbootstrap.com/docs/standard/data/tables/ -->