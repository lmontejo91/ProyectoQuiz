<?php
    session_start();

    session_destroy();
    session_register_shutdown();
    echo "Sesión Cerrada";
    header('Location: http://localhost/PROYECTOS/Proyecto%20QUIZ/proyectoQuiz_login.php');
    
    
?>
