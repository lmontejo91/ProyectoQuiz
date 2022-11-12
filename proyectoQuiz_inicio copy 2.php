<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>proyectoQuiz_inicio</title>
</head>
<body>
    <!-- <form name='form_ProyectoQuiz' action='proyectoQuiz_login' method='POST'>
        <label for='input_userName'>Usuario: </label>
            <input id='input_userName' type='text' name='userName' pattern='[A-Za-z0-9]{3,}'>
        <label for='input_password'>Contraseña: </label>
            <input id='input_password' type='password' name='password' pattern='(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter (min.8 or more characters)'>
        <input type='submit' value='Entrar' name='evento_LogIn'>
        <input type='submit' value='Registrar' name='evento_RegistrarUsuario'>
    </form> -->

    <!-- style="background-image: url('./images/seamless-pattern.webp'); height:100%" -->

    <section class="vh-100">
    <!-- DIV Contenedor -->
    <div class="container-fluid h-100 row d-flex justify-content-center align-items-center">
        <!-- <div class="row d-flex justify-content-center align-items-center h-100"> -->

        <!-- DIV Imagen -->
        <div class="col-md-9 col-lg-6 col-xl-5">
            <img src="./images/Harry-Potter-Transparent-Image.png" 
            class="img-fluid" alt="Sample image">
        </div>

        <!-- DIV Formulario -->
        <div class="col-md-6 col-lg-5 col-xl-3 offset-xl-1">
            <form name='form_ProyectoQuiz' action='proyectoQuiz_login' method='POST'>
    

            <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">🗲</p>
            </div>

            <!-- UserName input -->
            <div class="form-outline mb-4">
                <input type="text" name="userName" id="input_userName" pattern="[A-Za-z0-9]{3,}" class="form-control form-control-lg"
                placeholder="Introduce tu nombre de usuario aquí" />
                <!-- <label class="form-label" for="input_userName">Nombre de usuario</label> -->
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
                <input type="password" name="password" id="input_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}' title='Must contain at least one number and one uppercase and lowercase letter (min.8 or more characters)" class="form-control form-control-lg"
                placeholder="Enter password" title="Must contain at least one number and one uppercase and lowercase letter (min.8 or more characters)"/>
                <!-- <label class="form-label" for="input_password">Password</label> -->
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                <label class="form-check-label" for="form2Example3">
                    Remember me
                </label>
                </div>
                <a href="#!" class="text-body">Forgot password?</a>
            </div>

            <!-- Input Entrar (botón) -->
            <div class="text-center text-lg-start mt-4 pt-3">
                <input type='submit' value='Entrar' name='evento_LogIn' class="btn btn-primary btn-lg">
            </div>

            <!-- Input Registrarse (botón) -->
            <div class="d-flex align-items-center justify-content-center pb-4 pt-5">
                    <p class="mb-0 me-2">¿Aún no tienes una cuenta?</p>
                    <input type='submit' value='Registrar' name='evento_RegistrarUsuario' class="btn btn-outline-danger ms-2">
                    <!-- Create new</button> -->
            </div>

             <!-- Input profilePhoto (botón) -->
             <div class="mt-4 pt-3">
                <input type='file' id='profilePhoto' name='profilePhoto' class="form-control form-control-md" >
            </div>
            </form>
        </div>
    </div>

    <!-- DIV Footer -->
    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-info bg-opacity-50">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
        Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <!-- <div>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
            <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
            <i class="fab fa-linkedin-in"></i>
        </a>
        </div> -->
        <!-- Right -->
    </div>
    </section>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>


<!-- https://getbootstrap.com/docs/5.1/getting-started/introduction/
https://mdbootstrap.com/docs/standard/extended/login/
https://mdbootstrap.com/docs/standard/extended/registration/
https://www.youtube.com/watch?v=-qfEOE4vtxE -->
