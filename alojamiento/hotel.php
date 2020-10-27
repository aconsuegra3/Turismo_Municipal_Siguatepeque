<?php

// Crear la conexion con la base de datos
include("../conexion/conexion.php");

$id = $_GET['id'] ?? '';
$consultaHotel = $pdo->prepare("SELECT * FROM hoteles WHERE id=:id");
$consultaHotel->bindParam(':id', $id);
$consultaHotel->execute();

$hotel = $consultaHotel->fetch(PDO::FETCH_ASSOC);

$consultaTipoAlojamiento = $pdo->prepare("SELECT * FROM tipo_alojamiento WHERE id_hotel=:id");
$consultaTipoAlojamiento->bindParam(':id', $id);
$consultaTipoAlojamiento->execute();

$tipoAlojamiento = $consultaTipoAlojamiento->fetch(PDO::FETCH_ASSOC);

$consultaTarifas = $pdo->prepare("SELECT * FROM tarifas_hotel WHERE id_hotel=:id");
$consultaTarifas->bindParam(':id', $id);
$consultaTarifas->execute();

$tarifas = $consultaTarifas->fetch(PDO::FETCH_ASSOC);

$consultaServicios = $pdo->prepare("SELECT * FROM servicios_hotel WHERE id_hotel=:id");
$consultaServicios->bindParam(':id', $id);
$consultaServicios->execute();

$servicios = $consultaServicios->fetch(PDO::FETCH_ASSOC);

$consultaEstanciaHuespedes = $pdo->prepare("SELECT * FROM estancia_huespedes_hotel WHERE id_hotel=:id");
$consultaEstanciaHuespedes->bindParam(':id', $id);
$consultaEstanciaHuespedes->execute();

$estancia = $consultaEstanciaHuespedes->fetch(PDO::FETCH_ASSOC);

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
    header("alojamiento.php");
} else {
}


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema para registrar los lugares turisticos de Siguatepeque" />
    <meta name="author" content="Abel Consuegra" />
    <title><?php echo $hotel['nombre'] ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- <link rel="icon" href="../img/logo_muni.png"> -->
    
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
                <div class="container mt-4 pt-3 pb-2 mb-4 px-3" style="-webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
           box-shadow: 0 0 5px 2px rgba(0, 0, 0, .2);">

                    <!-- Nombre y Fecha de Registro -->
                    <div class="row">
                        <div class="ml-2 row align-items-center col-lg-9">
                            <h2><?php echo $hotel['nombre'] ?></h2>
                        </div>

                        <div class="ml-2 row align-items-center col-lg-3">
                            <h6>Fecha de registro: </h6>
                            <p class="ml-2 mb-2"> <?php echo $hotel['fecha_registro'] ?></p>
                        </div>
                    </div>
                    <!-- Linea horizontal -->
                    <hr>
                    <h6>Información:</h6>
                    <div class="ml-3 mt-4 pt-1 row align-items-center col-lg-12">
                        <h6>Dirección: </h6>
                        <p class="ml-2 mb-2"> <?php echo $hotel['direccion'] ?></p>
                    </div>
                    <!-- Dirección, Teléfono, Correo Electrónico -->
                    <div class="ml-2 mt-4 pt-1 row align-items-center">

                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Teléfono: </h6>
                            <p class="ml-2 mb-2"> <?php echo $hotel['telefono'] ?></p>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Correo electrónico: </h6>
                            <?php if ($hotel['correo']) { ?>
                                <p class="ml-2 mb-2"> <?php echo $hotel['correo'] ?></p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Tipo de alojamiento: </h6>
                            <?php if ($tipoAlojamiento['hotel']) { ?>
                                <p class="ml-2 mb-2">Hotel,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['aparthotel']) { ?>
                                <p class="ml-2 mb-2">Aparthotel,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['hospedaje']) { ?>
                                <p class="ml-2 mb-2">Hospedaje,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['campamento']) { ?>
                                <p class="ml-2 mb-2">Campamento,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['casa_huespedes']) { ?>
                                <p class="ml-2 mb-2">Casa de huéspedes,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['motel']) { ?>
                                <p class="ml-2 mb-2">Motel,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['villas_cabanas']) { ?>
                                <p class="ml-2 mb-2">Villas, Cabañas,</p>
                            <?php } ?>
                            <?php if ($tipoAlojamiento['Otro']) { ?>
                                <p class="ml-2 mb-2"><?php echo $tipoAlojamiento['Otro']; ?>.</p>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Página Web / Facebook: </h6>
                            <?php if ($hotel['pag_web']) { ?>
                                <a class="ml-2 mb-2" title="Ir al sitio web" target="_blank" href="http://<?php echo $hotel['pag_web'] ?>"> <?php echo $hotel['pag_web'] ?></a>
                            <?php } else { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Horarios de servicio: </h6>
                            <p class="ml-2 mb-2"> <?php echo $hotel['horario'] ?></p>
                        </div>

                    </div>

                    <!-- Dentro de las tarifas se comprueba si hay precio, si no las hay entonces no hay disponibles -->
                    <h6 class="mt-5">Tarifas:</h6>
                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Sencilla: </h6>
                            <?php if ($tarifas['sencilla'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2"><?php echo $tarifas['sencilla'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Doble: </h6>
                            <?php if ($tarifas['doble'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2"><?php echo $tarifas['doble'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Triple: </h6>
                            <?php if ($tarifas['triple'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2"><?php echo $tarifas['triple'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Cuádruple: </h6>
                            <?php if ($tarifas['cuadruple'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2"><?php echo $tarifas['cuadruple'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Suite: </h6>
                            <?php if ($tarifas['suite'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2"><?php echo $tarifas['suite'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Suite Presidencial: </h6>
                            <?php if ($tarifas['suite_presidencial'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2"><?php echo $tarifas['suite_presidencial'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <h6 class="mt-5">Capacidad:</h6>
                    <div class="ml-2 mt-4 pt-1 row align-items-center justify-content-center">
                        <div class="ml-2 row align-items-center col-lg-6 ">
                            <h6>Número de camas: </h6>
                            <p class="ml-2 mb-2"> <?php echo $hotel['numero_camas'] ?></p>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-6 ">
                            <h6>Número de habitaciones: </h6>
                            <p class="ml-2 mb-2"> <?php echo $hotel['numero_habitaciones'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <h6 class="mt-5">Servicios:</h6>
                            <div class="ml-2 mt-4 pt-1 col-lg-9">
                                <?php if ($servicios['telefono']) { ?>
                                    <li class="ml-2 mb-2">Teléfono</li>
                                <?php } ?>
                                <?php if ($servicios['television']) { ?>
                                    <li class="ml-2 mb-2">Televisión</li>
                                <?php } ?>
                                <?php if ($servicios['wifi']) { ?>
                                    <li class="ml-2 mb-2">Wifi</li>
                                <?php } ?>
                                <?php if ($servicios['pos']) { ?>
                                    <li class="ml-2 mb-2">POS</li>
                                <?php } ?>
                                <?php if ($servicios['agua_caliente']) { ?>
                                    <li class="ml-2 mb-2">Agua Caliente</li>
                                <?php } ?>
                                <?php if ($servicios['aire_acondicionado']) { ?>
                                    <li class="ml-2 mb-2">Aire Acondicionado</li>
                                <?php } ?>
                                <?php if ($servicios['cafeteria']) { ?>
                                    <li class="ml-2 mb-2">Cafetería</li>
                                <?php } ?>
                                <?php if ($servicios['ventilador']) { ?>
                                    <li class="ml-2 mb-2">Ventilador</li>
                                <?php } ?>
                                <?php if ($servicios['estacionamiento']) { ?>
                                    <li class="ml-2 mb-2">Estacionamiento</li>
                                <?php } ?>
                                <?php if ($servicios['lavanderia']) { ?>
                                    <li class="ml-2 mb-2">Lavanderia</li>
                                <?php } ?>
                                <?php if ($servicios['piscina']) { ?>
                                    <li class="ml-2 mb-2">Piscina</li>
                                <?php } ?>
                                <?php if ($servicios['servicio_habitacion']) { ?>
                                    <li class="ml-2 mb-2">Servicio a la Habitación</li>
                                <?php } ?>
                                <?php if ($servicios['Otro']) { ?>
                                    <li class="ml-2 mb-2"><?php echo $servicios['Otro'] ?></li>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="col-lg-4 mt-5">
                            <div class="ml-2 mt-4 pt-1 align-items-center row">
                                <h6>Desayuno incluido: </h6>
                                <?php if ($hotel['desayuno_incluido']) { ?>
                                    <p class="ml-2 mb-2"> Si</p>
                                <?php } else { ?>
                                    <p class="ml-2 mb-2"> No</p>
                                <?php } ?>
                            </div>
                            <div class="ml-2 mt-4 pt-1 align-items-center row">
                                <h6>Capacidad del salón de eventos: </h6>
                                <?php if ($hotel['capacidad_salon_eventos']) { ?>
                                    <p class="ml-2 mb-2"><?php echo $hotel['capacidad_salon_eventos'] ?></p>
                                <?php } else { ?>
                                    <p class="ml-2 mb-2 text-muted">No disponible</p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-5">
                            <h6 class="mt-3">Procedencia de los huéspedes:</h6>
                            <div class="ml-3 mt-2 pt-1  align-items-center">
                                <?php if ($estancia['locales']) { ?>
                                    <li class="ml-3 mb-2">Locales</li>
                                <?php } ?>
                                <?php if ($estancia['nacionales']) { ?>
                                    <li class="ml-3 mb-2">Nacionales</li>
                                <?php } ?>
                                <?php if ($estancia['extranjeros']) { ?>
                                    <li class="ml-3 mb-2">Extranjeros</li>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center my-3">
                        <a class="btn btn-primary" href="actualizar_alojamiento.php?id=<?php echo $hotel['id']; ?>">Modificar</a>
                        <!-- <button class="btn btn-primary" value="btnModificar" type="submit" name="accion">Modificar</button> -->
                        <!-- <a href='#' title="Eliminar permanentemente" class="btn btn-danger" onclick="preguntar(<?php echo $hotel['id'] ?>)">Eliminar</a> -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

</body>

</html>