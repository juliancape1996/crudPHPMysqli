<?php
    include 'conexion.php';

    //Obtener el id enviado de index

    $idRegistro = $_GET['id'];

    //Seleccionar los datos asociados al registro

    $query = "SELECT * FROM usuarios WHERE id='".$idRegistro."'";

    $usuario = mysqli_query($con,$query)or die(mysqli_error($con));

    //pasamos los datos de ese registro en una fila 
    $fila = mysqli_fetch_assoc($usuario);
    
    //actualizacion de usuario
    if (isset($_POST['borrarRegistro'])) {

        $query = "DELETE FROM usuarios WHERE id='$idRegistro'";

            if (!mysqli_query($con,$query)) {
                die('Error :' .mysqli_error($con));
                $error ="No se pudo Eliminar el registro";
            }else {
                $mensaje = "Registro Eliminado Correctamente";
                header('Location: index.php?mensaje='.urlencode($mensaje));
                exit();
            }
    }
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="css/estilos.css" rel="stylesheet">

    <title>CRUD PHP Y MYSQL</title>
  </head>
  <body>
    <h1 class="text-center">CRUD PHP Y MYSQL</h1>
    <div class="container">

    <div class="row">
        <h4>Borrar un Registro Existente</h4>
    </div>


        <div class="row caja">

       

            <div class="col-sm-6 offset-3">
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" value="<?php echo $fila['nombre']?>" readonly name="nombre" placeholder="Ingresa el nombre">                    
                </div>
                
                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" value="<?php echo $fila['apellidos']?>"  readonly placeholder="Ingresa los apellidos">                    
                </div>

                <div class="mb-3">
                    <label for="telefono" class="form-label">Telefono:</label>
                    <input type="number" class="form-control" name="telefono" value="<?php echo $fila['telefono']?>" readonly placeholder="Ingresa el teléfono">                    
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $fila['email']?>" readonly placeholder="Ingresa el email">                    
                </div>
              
                <button type="submit" class="btn btn-primary w-100" name="borrarRegistro">Borrar Registro</button>

                </form>
            </div>
        </div>
    </div>
  </body>
</html>