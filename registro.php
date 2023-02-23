<?php session_start();

/* Si esta seteada la variable usuario, nos redigira al inicio de sesion */

if (isset($_SESSION['usuario'])){
    header('Location: login.php');
    die();
} 

/* Recibimos los valores del formulario y lo almacenamos en variables */

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = filter_var(htmlspecialchars(strtolower($_POST['usuario'])));
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


    $errores = '';

/* primero comprobamos que haya texto en todos los campos */

    if (empty($usuario) or empty($password) or empty($password2)){
        $errores .= '<li>Por favor rellena los datos correctamente</li>';
    } else {
                
/*  Utilizamos el metodo PDO para conectarnos a la base de datos */
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=curso_login', 'root', '');
        } catch (PDOException $e) {

            echo "Error: " . $e->getMessage();
        }
/* Seleccionamos la tabla que estaremos utilizando */

        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute(array(':usuario' => $usuario));
        $resultado = $statement->fetch();



        if ($resultado != false) {
            $errores .= '<li>El nombre de usuario ya existe</li>';
        }


/*   encriptamos la contraseña */

        $password = hash('sha512', $password);
        $password2 = hash('sha512', $password2);


        if ($password != $password2){
            $errores .= '<li>Las contraseñas no son iguales</li>';
        }
    }


/*  Insertamos los valores en la tabla para continuar */


    if ($errores == ''){
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, pass) VALUES (null, :usuario, :pass)');
        $statement->execute(array(':usuario' => $usuario, ':pass' => $password));

        header('Location: login.php');
    }
}


/* Traemos el archivo de la vista, esta linea es la primera que se escribe */


require 'view/registro.view.php';

?>