<!DOCTYPE html>
<html>
<head>
<title>proyectoQuiz_inicio</title>
</head>
<body>
    <form name='form_ProyectoQuiz' action='proyectoQuiz_login' method='POST'>
        <label for='input_userName'>Usuario: </label>
            <input id='input_userName' type='text' name='userName' pattern='[A-Za-z0-9]{3,}'>
        <label for='input_password'>Contraseña: </label>
            <input id='input_password' type='password' name='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter (min.8 or more characters)'>
        <input type='submit' value='Entrar' name='evento_LogIn'>
        <input type='submit' value='Registrar' name='evento_RegistrarUsuario'>
    </form>
</body>
</html>