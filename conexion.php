<?php 

    //Conectar a MYSQL

    $con = mysqli_connect("localhost","root","","crud_php_mysql");

    //probar conexion
    if (mysqli_connect_errno()) {
        echo "Error al conectarse a la base de datos" . mysqli_connect_error();
    }

?>