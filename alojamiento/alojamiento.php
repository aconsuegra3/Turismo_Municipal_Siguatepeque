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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema para registrar los lugares turisticos de Siguatepeque" />
    <meta name="author" content="Abel Consuegra" />
    <title>Servicios de alojamiento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/estilos.css" rel="stylesheet" />
    <link rel="icon" href="../img/logo_turismo.png">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-#32357b px-2">
        <button class="btn btn-link btn-sm order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <!-- <a class="ml-2" href="index.php"></a> -->
        <img class="ml-2" src="../img/logo_turismo.png" width="50px" alt="">

        <!-- <a class="m-auto" href="index.php"><img src="img/logo_muni.png" width="40px" alt=""></a> -->
        <p class="text-light mt-3 ml-2">Turismo Municipal Siguatepeque</p>
        <div class="fecha mr-1 ml-auto text-light">
            <script type="text/javascript">
                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                var f = new Date();
                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
            </script>
        </div>


    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav sb-sidenav-dark" id="sidenavAccordion" style="background-color: #181936;">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="mt-3 mx-auto" href="../index.php"><img src="../img/logo_muni.png" width="100px" alt=""></a>
                        <a class="nav-link mt-3" href="../index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Servicios</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-hotel"></i></div>
                            Alojamiento
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav" style="padding-top: 0px; margin-top: 0px;">
                                <a class="nav-link" href="alojamiento.php"><i class="fas fa-eye"></i> &nbsp; Ver todos</a>
                                <a class="nav-link" href="agregar_alojamiento.php"><i class="fas fa-plus"></i> &nbsp; Agregar nuevo</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            Alimentos y bebidas
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages" style="padding-top: 0px; margin-top: 0px;">
                                <a class="nav-link" href="../alimentos_y_bebidas/alimentosYBebidas.php"><i class="fas fa-eye"></i> &nbsp; Ver todos</a>
                                <a class="nav-link" href="../alimentos_y_bebidas/agregar.php"><i class="fas fa-plus"></i> &nbsp; Agregar nuevo</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="../assets/manual_de_usuario.pdf" target="_blank">
                            <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                            Ayuda
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer" style="background-color: #0e0f1f;">
                    <div class="small">Municipalidad de Siguatepeque</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container mt-1 pt-3 px-2">

                    <h3 class="text-center mt-4 mb-3">Servicios de alojamiento en Siguatepeque</h3>



                    <div class="row ">
                        <a class="btn btn-success ml-2" href="agregar_alojamiento.php"><i class="fas fa-plus"></i> Agregar nuevo</a>
                        <div class="row align-items-center ml-auto mr-2" style="display: flex; justify-content: flex-end;">
                            <input data-table="order-table" id="buscar" class="form-control form-control-sm mr-1 w-75 light-table-filter" type="text" placeholder="Buscar" aria-label="Search">
                            <button id="btnBuscar" class="btn"><i class="fas fa-search" aria-hidden="true"></i></button>
                        </div>

                    </div>


                    <div class="row mt-3 ">
                        <table class="table order-table">
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


            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-center small">
                        <div class="text-muted text-center">Copyright &copy; Abel Consuegra 2020</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="../js/eliminar.js" type="text/javascript"></script>
    <script src="../js/buscar.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

</body>

</html>