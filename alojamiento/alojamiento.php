<?php

$txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtDireccion = (isset($_POST['txtDireccion'])) ? $_POST['txtDireccion'] : "";
$txtTelefono = (isset($_POST['txtTelefono'])) ? $_POST['txtTelefono'] : "";
// Detecta la acción del botón a clickear
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

// Crear la conexion con la base de datos
include("../conexion/conexion.php");
// Variable contador para mostrar el número en la tabla html y siempre sea exacto (sin saltos al eliminar algún campo de la BD)
$c = 0;

switch ($accion) {
    case "btnEstado":

        // Comprueba si el establecimiento está activo o no para luego realizar la actualizacion de estado
        $comprobarActivo = $pdo->prepare("SELECT * FROM hoteles WHERE id=:id");
        $comprobarActivo->bindParam(':id', $txtId);
        $comprobarActivo->execute();
        $hotel = $comprobarActivo->fetch(PDO::FETCH_ASSOC);

        $elementoActivo = $hotel['activo'];

        // Si el establecimiento está inactivo entonces se actualizará como habilitado(1)
        if ($elementoActivo == 0) {
            $sentencia = $pdo->prepare("UPDATE hoteles SET activo=1 WHERE id=:id");

            // bindParam será para asignar los valores referenciados anteriormente
            $sentencia->bindParam(':id', $txtId);

            // Ejecutar la instrucción de la sentencia
            $sentencia->execute();
        } else {
            // Caso contrario, si está activo cambiará su estado a inactivo(0)
            $sentencia = $pdo->prepare("UPDATE hoteles SET activo=0 WHERE id=:id");

            // bindParam será para asignar los valores referenciados anteriormente
            $sentencia->bindParam(':id', $txtId);

            // Ejecutar la instrucción de la sentencia
            $sentencia->execute();
        }

        header("alojamiento.php");
        break;
}

$eliminar = $_GET['del'] ?? '';

if ($eliminar) {
    $id = $_GET['del'];
    // Creando la sentencia SQL para eliminar los valores en la BD
    // Utilizo pdo para preparar la sentencia
    $sentencia = $pdo->prepare("DELETE FROM hoteles WHERE id=:id");

    // bindParam será para asignar los valores referenciados anteriormente        
    $sentencia->bindParam(':id', $id);

    // Ejecutar la instrucción de la sentencia
    $sentencia->execute();

    if ($sentencia) {
        echo '<script language="javascript">alert("Registro eliminado correctamente");window.location.href="alojamiento.php"</script>';
    }
    // header("alojamiento.php");
} else {
}


// Sentencia de consulta para seleccionar los hoteles
$sentencia = $pdo->prepare("SELECT * FROM hoteles");
// Ejecuta la sentencia
$sentencia->execute();
// Almacena la información en la lista de hoteles. Fetch_Assoc es la que devuelve la información de la BD
$listaHoteles = $sentencia->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios de alojamiento</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="icon" href="../img/logo_muni.png">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100 ">

    <nav class="navbar navbar-dark">
        <a title="Atrás" href="../index.php"><i class="fas fa-arrow-left text-light" style="font-size: 25px;"></i></a>
        <a title="Inicio" class="mr-auto ml-4" href="../index.php"><i class="fas fa-home text-light" style="font-size: 25px;"></i></a>
        <a class="mr-auto" href="../index.php"><img src="../img/logo_turismo.png" width="50px" alt=""></a>
        <button title="Menú" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="../index.php"> <i class="fas fa-home mr-1"></i> Inicio</a>
                </li>
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="#"><i class="fas fa-hotel mr-1"></i> Alojamiento</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="../alimentos_y_bebidas/alimentosYBebidas.php"><i class="fas fa-utensils mr-1"></i> Alimentos y bebidas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3 pt-1">

        <h3 class="text-center mt-4 mb-3">Servicios de alojamiento en Siguatepeque</h3>

        <a class="btn btn-success" href="agregar_alojamiento.php"><i class="fas fa-plus"></i> Agregar nuevo</a>

        <div class="row mt-3 ">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Dirección</th>
                        <th class="text-center">Telefono</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <?php foreach ($listaHoteles as $hotel) { ?>
                    <?php
                    $c = $c + 1;
                    if ($hotel['activo']) { ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo $c; ?></td>
                            <td class="text-center align-middle"> <a class="text-decoration-none text-dark" title="Ver información" href="hotel.php?id=<?php echo $hotel['id']; ?>"><?php echo $hotel['nombre']; ?></a></td>
                            <td style="width: 35%;" class="text-center align-middle"><?php echo $hotel['direccion']; ?></td>
                            <td style="width: 24%;" class="text-center align-middle"><?php echo $hotel['telefono']; ?></td>
                            <td style="width: 20%;" class="text-center align-middle">

                                <form action="" method="post">
                                    <input type="hidden" name="txtId" value="<?php echo $hotel['id']; ?>">
                                    <input type="hidden" name="txtNombre" value="<?php echo $hotel['nombre']; ?>">
                                    <input type="hidden" name="txtDireccion" value="<?php echo $hotel['direccion']; ?>">
                                    <input type="hidden" name="txtTelefono" value="<?php echo $hotel['telefono']; ?>">

                                    <a style="font-size: 13px;" class="btn btn-primary text-center m-1" title="Ver información" href="hotel.php?id=<?php echo $hotel['id']; ?>"><i class="fas fa-eye"></i></a>
                                    <a style="font-size: 13px;" class="btn btn-success text-center m-1" title="Editar" href="actualizar_alojamiento.php?id=<?php echo $hotel['id']; ?>"><i class="fas fa-edit"></i></a>
                                    <a href='#' style="font-size: 13px;" class="btn btn-danger m-1" title="Eliminar permanentemente" onclick="preguntar(<?php echo $hotel['id'] ?>)"><i class="fas fa-trash-alt"></i></a>
                                    <button style="font-size: 13px;" class="btn btn-dark m-1" value="btnEstado" title="Deshabilitar" type="submit" name="accion"><i class="fas fa-minus-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                            <td class="text-muted text-center"><?php echo $c; ?></td>
                            <td class="text-muted text-center"><?php echo $hotel['nombre']; ?> (deshabilitado)</td>
                            <td class="text-muted text-center"><?php echo $hotel['direccion']; ?></td>
                            <td class="text-muted text-center"><?php echo $hotel['telefono']; ?></td>
                            <td class="text-center">

                                <form action="" method="post">
                                    <input type="hidden" name="txtId" value="<?php echo $hotel['id']; ?>">
                                    <input type="hidden" name="txtNombre" value="<?php echo $hotel['nombre']; ?>">
                                    <input type="hidden" name="txtDireccion" value="<?php echo $hotel['direccion']; ?>">
                                    <input type="hidden" name="txtTelefono" value="<?php echo $hotel['telefono']; ?>">

                                    <a style="font-size: 13px;" href='#' type="submit" title="Eliminar permanentemente" class="btn btn-danger" onclick="preguntar(<?php echo $hotel['id'] ?>)"><i class="fas fa-trash-alt"></i></a>
                                    <button style="font-size: 13px;" class="btn btn-dark" title="Habilitar" value="btnEstado" type="submit" name="accion"><i class="fas fa-plus-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                <?php } ?>
            </table>
        </div>
    </div>    


    <footer class="footer mt-auto py-3 text-center">
        <div class="container">
            <hr>
            <span class="text-muted">© Abel Consuegra - 2020</span><br><br>
        </div>
    </footer>

    <script src="../js/eliminar.js" type="text/javascript"></script>


</body>

</html>