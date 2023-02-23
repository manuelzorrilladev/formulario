<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contenido</title>
        <link rel="stylesheet" href="css/estilos.css">
    </head>
    <body>

               <!-- CONTENDOR PRINCIPAL -->
        <div class="contenedor">
            <h1 class="titulo">Registrate</h1>
            <hr class="border"/>
            
                    <!-- FORMULARIO -->


                    <!-- TODAS LAS CLASSES DE LOS ELEMENTOS I, SON ICONOS DE FONTAWESOME!!! -->

            <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" method="POST" class="formulario" name="login">
        
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="text" name="usuario" class="usuario" placeholder="Usuario">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="password" name="password" class="password" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i><input type="password" name="password2" class="password_btn" placeholder="Repetir Contraseña">
                <i class="submit-btn fa fa-arrow-rigth" onclick="login.submit()"></i>
            </div>
        
            <?php if(!empty($errores)):  ?>
                <div class="error">
                    <ul>
                        <?php echo $errores; ?>
                    </ul>
                </div>

            <?php endif;  ?>
        
            </form>
            <p class="texto-registrate">
                ¿ Ya tienes cuenta ?
                <a href="login.php">Iniciar Sesión</a>
            </p>
        </div>
    </body>
</html>