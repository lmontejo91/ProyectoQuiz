<?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        include 'proyectoQuiz_crearConexion.php';

        $userName_POST = limpiarDatos($_POST['userName']);
        $password_POST = limpiarDatos($_POST['password']);

            if(isset($_POST["evento_LogIn"])){
                //echo "entra Primero";
                if(buscarUsuario()){
                    $conn = null;
                    header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_logeado.php');
                }else{
                    echo "NO existe. Vuelve a Inicio";
                    //ENVIAR mnsj "El usuario introducido NO existe en el sistema"
                    //header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_inicio.php');
                }            
                
            }elseif(isset($_POST["evento_RegistrarUsuario"])){
                //echo "entra Segundo";
                
                if(anadirUsuario()){
                    header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_logeado.php');
                }else{
                    echo "YA existe. Vuelve a Inicio";
                    //ENVIAR mnsj "El usuario introducido YA existe en el sistema"
                    //header('Location: http://localhost/PROYECTOS/A04_BaseDeDatosPHP/Ejercicio%20D%20-%20mejorado/A04_BBDD_PHP_inicio.php');
                }              
            }


            function buscarUsuario(){
                include 'proyectoQuiz_crearConexion.php';
                global $userName_POST, $password_POST;

                $sql_getData = "SELECT nombre, contrasena FROM jugadores";
                $result_getData = $conn->query($sql_getData)->fetchAll();

                foreach($result_getData as $row){
                    if($row["nombre"] == $userName_POST && $row["contrasena"] == $password_POST){
                        $_SESSION['userName'] = $userName_POST;
                        $_SESSION['password'] = $password_POST;
                        $_SESSION['loggedIn'] = true;
                        return true;
                    }
                }
        
                return false;
            }
            
            function anadirUsuario(){
                include 'proyectoQuiz_crearConexion.php';
                global $userName_POST, $password_POST;

                if(!(buscarUsuario())){
                    $sql_addUser = "INSERT INTO Jugadores (nombre, contrasena) VALUES ($userName_POST, $password_POST)";
                    if($conn->query($sql_addUser) === true){
                        return true;
                    }
                }
                return false;
            }
            

            function limpiarDatos($data){
                $data=trim($data);
                $data=stripslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
        
    }

    
?>