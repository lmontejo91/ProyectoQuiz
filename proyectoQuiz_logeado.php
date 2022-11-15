<?php
    session_start();

    function limpiarDatos($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION['origen'] = "login";
        $userName_POST = limpiarDatos($_POST['userName']);
        $password_POST = limpiarDatos($_POST['password']);

            if(isset($_POST["evento_LogIn"])){
                echo "ENTRA login";
                if(buscarUsuario()){
                    $conn = null;
                    header('Location: ./proyectoQuiz_inicio.php');
                }else{
                    header('Location: ./proyectoQuiz_login.php');
                }            
                
            }elseif(isset($_POST["evento_RegistrarUsuario"])){
                echo "ENTRA registrar";
                if(anadirUsuario()){
                    header('Location: ./proyectoQuiz_inicio.php');
                }else{
                    header('Location: ./proyectoQuiz_login.php');
                }              
            }       
        
    }else{
        echo "ENTRA ELSE no POST";
        header('Location: ./proyectoQuiz_login.php');
    }

    function buscarUsuario(){
        include 'proyectoQuiz_crearConexion.php';
        global $userName_POST, $password_POST;

        $usuario = $conn->query("SELECT nombre, contrasena FROM jugadores WHERE nombre='$userName_POST'")->fetch();

        if($usuario){
            if($usuario["nombre"] == $userName_POST && $usuario["contrasena"] == $password_POST){
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

        if($_FILES['profilePhoto']['size'] == 0){
            $file = null;
        }else{
            $file = $_FILES['profilePhoto']['name'];
            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], "./uploads/$file");
        }

        if(!(buscarUsuario())){
            $sql_addUser = "INSERT INTO jugadores (nombre, contrasena, fotoPerfil) VALUES ('$userName_POST', '$password_POST', '$file')";

            if($conn->query($sql_addUser)){
                $_SESSION['userName'] = $userName_POST;
                $_SESSION['password'] = $password_POST;
                $_SESSION['loggedIn'] = true;
                return true;
            }
        }
        return false;
    }
    
?>