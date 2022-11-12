<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
   <title>Área Personal</title>
</head>
<body>
    
    <?php
        
        if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo "Vuelve a Inicio from mostrarEstadisticas";
            //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_inicio.php');
        }
        
        //Declaración de Variables

        //Incluimos el código que crea la conexión 
        //include 'proyectoQuiz_crearConexion.php';

        
        //$puntuacionesUsuarios = $conn->query("SELECT nombre, SUM(puntuacion) as puntuacionTotal FROM partidas GROUP BY nombre ORDER BY puntuacionTotal DESC LIMIT 5")->fetchAll();

        


    ?>

    <section class="vh-100" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-12 col-xl-10">

            <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
                <div class="mt-3 mb-4">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava2-bg.webp"
                    class="rounded-circle img-fluid" style="width: 100px;" />
                </div>
                <h4 class="mb-2">Julie L. Arsenault</h4>
                <p class="text-muted mb-4">@Programmer <span class="mx-2">|</span> <a
                    href="#!">mdbootstrap.com</a></p>
                <div class="mb-4 pb-2">
                <!-- <button type="button" class="btn btn-outline-primary btn-floating">
                    <i class="fab fa-facebook-f fa-lg"></i>
                </button>
                <button type="button" class="btn btn-outline-primary btn-floating">
                    <i class="fab fa-twitter fa-lg"></i>
                </button>
                <button type="button" class="btn btn-outline-primary btn-floating">
                    <i class="fab fa-skype fa-lg"></i>
                </button> -->
                </div>
                <button type="button" class="btn btn-primary btn-rounded btn-lg">
                Message now
                </button>
                <div class="d-flex justify-content-between text-center mt-5 mb-2">
                <div>
                    <p class="mb-2 h5">8471</p>
                    <p class="text-muted mb-0">Número de partidas</p>
                </div>
                <div class="px-3">
                    <p class="mb-2 h5">8512</p>
                    <p class="text-muted mb-0">Puntuacion total</p>
                </div>
                <div>
                    <p class="mb-2 h5">4751</p>
                    <p class="text-muted mb-0">Total Transactions</p>
                </div>
                </div>
            </div>
            </div>

        </div>
        </div>
    </div>
    </section>

    <!-- https://mdbootstrap.com/docs/standard/extended/profiles/ -->
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>