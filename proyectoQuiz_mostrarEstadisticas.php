<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>mostrar Estadísticas</title>
</head>
<body>
    
    <?php
        
        /* if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo "Vuelve a Inicio from mostrarEstadisticas";
            //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_inicio.php');
        } */
        
        //Declaración de Variables

        //Incluimos el código que crea la conexión 
        include 'proyectoQuiz_crearConexion.php';

        
        $puntuacionesUsuarios = $conn->query("SELECT nombre, SUM(puntuacion) as puntuacionTotal FROM partidas GROUP BY nombre ORDER BY puntuacionTotal DESC LIMIT 5")->fetchAll();

        /* echo "<table>";
                echo "<tr>";
                    echo "<th></th>";
                    echo "<th>Jugador</th>";
                    echo "<th>Nivel</th>";
                    echo "<th>Puntos</th>";
                echo "</tr>";
                
                foreach($puntuacionesUsuarios as $puntuacion){
                    $usuarioRanking = $conn->query("SELECT nombre, fotoPerfil, nivel FROM jugadores WHERE nombre='".$puntuacion["nombre"]."'")->fetch();
                    
                    echo "<tr>";
                        echo "<td>".$usuarioRanking['fotoPerfil']."</td>";
                        echo "<td>".$usuarioRanking['nombre']."</td>";
                        echo "<td>".$puntuacion['puntuacionTotal']."</td>";
                        echo "<td>".$usuarioRanking['nivel']."</td>";
                    echo "</tr>"; 
                }  
            echo "</table>"; */

    ?>
<div class="container">
    <table class='class="table align-middle mb-0 bg-white"'>
        <thead class="bg-light">
            <tr>
                <th></th>
                <th>Jugador</th>
                <th>Nivel</th>
                <th>Puntos</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($puntuacionesUsuarios as $puntuacion):
            $usuarioRanking = $conn->query("SELECT nombre, fotoPerfil, nivel FROM jugadores WHERE nombre='".$puntuacion["nombre"]."'")->fetch(); ?>
            <tr>
                <td><?php echo $usuarioRanking['fotoPerfil'] ?></td>
                <td><?php echo $usuarioRanking['nombre'] ?></td>
                <td><?php echo $usuarioRanking['nivel'] ?></td>
                <td><?php echo $puntuacion['puntuacionTotal'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
    


    <!-- <table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
        <tr>
        <th>Name</th>
        <th>Title</th>
        <th>Status</th>
        <th>Position</th>
        <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                <img
                    src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                    alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
                <div class="ms-3">
                    <p class="fw-bold mb-1">John Doe</p>
                    <p class="text-muted mb-0">john.doe@gmail.com</p>
                </div>
                </div>
            </td>
            <td>
                <p class="fw-normal mb-1">dsdefdfd</p>
                <p class="text-muted mb-0">IT department</p>
            </td>
            <td>
                <span class="badge badge-success rounded-pill d-inline">Active</span>
            </td>
            <td>Senior</td>
            <td>
                <button type="button" class="btn btn-link btn-sm btn-rounded">Edit
                </button>
            </td>
        </tr>
        <tr>
        <td>
            <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/6.jpg"
                class="rounded-circle" alt="" style="width: 45px; height: 45px"/>
            <div class="ms-3">
                <p class="fw-bold mb-1">Alex Ray</p>
                <p class="text-muted mb-0">alex.ray@gmail.com</p>
            </div>
            </div>
        </td>
        <td>
            <p class="fw-normal mb-1">Consultant</p>
            <p class="text-muted mb-0">Finance</p>
        </td>
        <td>
            <span class="badge badge-primary rounded-pill d-inline">Onboarding</span>
        </td>
        <td>Junior</td>
        <td>
            <button
                    type="button"
                    class="btn btn-link btn-rounded btn-sm fw-bold"
                    data-mdb-ripple-color="dark">Edit
            </button>
        </td>
        </tr>
        <tr>
        <td>
            <div class="d-flex align-items-center">
            <img
                src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                class="rounded-circle"
                alt=""
                style="width: 45px; height: 45px"/>
            <div class="ms-3">
                <p class="fw-bold mb-1">Kate Hunington</p>
                <p class="text-muted mb-0">kate.hunington@gmail.com</p>
            </div>
            </div>
        </td>
        <td>
            <p class="fw-normal mb-1">Designer</p>
            <p class="text-muted mb-0">UI/UX</p>
        </td>
        <td>
            <span class="badge badge-warning rounded-pill d-inline">Awaiting</span>
        </td>
        <td>Senior</td>
        <td>
            <button
                    type="button"
                    class="btn btn-link btn-rounded btn-sm fw-bold"
                    data-mdb-ripple-color="dark">Edit
            </button>
        </td>
        </tr>
    </tbody>
    </table> -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>


<!-- https://mdbootstrap.com/docs/standard/data/tables/ -->