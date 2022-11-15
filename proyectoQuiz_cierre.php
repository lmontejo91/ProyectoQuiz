<?php
    session_start();

    session_destroy();
    session_register_shutdown();
    echo "Sesión Cerrada";
    header('Location: ./proyectoQuiz_login.php');
    
    
?>
