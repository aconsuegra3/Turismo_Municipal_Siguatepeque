<?php

// Crear la conexion con la base de datos
include("../conexion/conexion.php");

$id = $_GET['id'] ?? '';
$consultaAlimentos = $pdo->prepare("SELECT * FROM alimentos_y_bebidas WHERE id=:id");
$consultaAlimentos->bindParam(':id', $id);
$consultaAlimentos->execute();

$alimentos = $consultaAlimentos->fetch(PDO::FETCH_ASSOC);

$consultaTipoOfertas = $pdo->prepare("SELECT * FROM tipo_oferta_alimentos WHERE id_alimentos=:id");
$consultaTipoOfertas->bindParam(':id', $id);
$consultaTipoOfertas->execute();

$tipoOfertas = $consultaTipoOfertas->fetch(PDO::FETCH_ASSOC);

$consultaTipoServicio = $pdo->prepare("SELECT * FROM tipos_servicio_alimentos WHERE id_alimentos=:id");
$consultaTipoServicio->bindParam(':id', $id);
$consultaTipoServicio->execute();

$tipoServicio = $consultaTipoServicio->fetch(PDO::FETCH_ASSOC);

$consultaOferta = $pdo->prepare("SELECT * FROM especialidad_oferta_alimentos WHERE id_alimentos=:id");
$consultaOferta->bindParam(':id', $id);
$consultaOferta->execute();

$ofertas = $consultaOferta->fetch(PDO::FETCH_ASSOC);

$eliminar = $_GET['del'] ?? '';

if ($eliminar) {
    $id = $_GET['del'];
    // Creando la sentencia SQL para eliminar los valores en la BD
    // Utilizo pdo para preparar la sentencia
    $sentencia = $pdo->prepare("DELETE FROM alimentos_y_bebidas WHERE id=:id");

    // bindParam será para asignar los valores referenciados anteriormente        
    $sentencia->bindParam(':id', $id);

    // Ejecutar la instrucción de la sentencia
    $sentencia->execute();
    header("alimentosYBebidas.php");
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
    <title><?php echo $alimentos['nombre'] ?></title>
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
                                <a class="nav-link" href="../alojamiento/alojamiento.php"><i class="fas fa-eye"></i> &nbsp; Ver todos</a>
                                <a class="nav-link" href="../alojamiento/agregar_alojamiento.php"><i class="fas fa-plus"></i> &nbsp; Agregar nuevo</a>
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
                                <a class="nav-link" href="alimentosYBebidas.php"><i class="fas fa-eye"></i> &nbsp; Ver todos</a>
                                <a class="nav-link" href="agregar.php"><i class="fas fa-plus"></i> &nbsp; Agregar nuevo</a>
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
                <div class="container mt-4 p-3 mb-4 pb-2" style="-webkit-box-shadow: 0 0 5px 2px rgba(0, 0, 0, .5);
           box-shadow: 0 0 5px 2px rgba(0, 0, 0, .2);">

                    <!-- Nombre y Fecha de Registro -->
                    <div class="row">
                        <div class="ml-2 row align-items-center col-lg-9">
                            <h2><?php echo $alimentos['nombre'] ?></h2>
                        </div>

                        <div class="ml-2 row align-items-center col-lg-3">
                            <h6>Fecha de registro: </h6>
                            <p class="ml-2 mb-1"> <?php echo $alimentos['fecha_registro'] ?></p>
                        </div>
                    </div>
                    <!-- Linea horizontal -->
                    <hr>
                    <h6>Información:</h6>
                    <div class="ml-3 mt-4 pt-1 row align-items-center col-lg-12">
                        <div class="row align-items-center col-lg-8">

                            <h6>Dirección: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['direccion'] ?></p>
                        </div>
                        <div class=" row align-items-center col-lg-4">
                            <h6>Datos de ID comercial: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['id_comercial'] ?></p>
                        </div>

                    </div>
                    <!-- Dirección, Teléfono, Correo Electrónico -->
                    <div class="ml-2 mt-4 pt-1 row align-items-center">

                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Teléfono: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['telefono'] ?></p>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Correo electrónico: </h6>
                            <?php if ($alimentos['correo']) { ?>
                                <p class="ml-2 mb-2"> <?php echo $alimentos['correo'] ?></p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Tipo de oferta: </h6>
                            <?php if ($tipoOfertas['restaurante']) { ?>
                                <p class="ml-2 mb-2">Restaurante</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['cafeteria']) { ?>
                                <p class="ml-2 mb-2">Cafeteria</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['cafe']) { ?>
                                <p class="ml-2 mb-2">Cafe</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['pizzeria']) { ?>
                                <p class="ml-2 mb-2">Pizzeria</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['reposteria_tipica']) { ?>
                                <p class="ml-2 mb-2">Reposteria Tipica</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['heladeria']) { ?>
                                <p class="ml-2 mb-2">Heladeria</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['comedor']) { ?>
                                <p class="ml-2 mb-2">Comedor</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['centro']) { ?>
                                <p class="ml-2 mb-2">Centro</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['penia']) { ?>
                                <p class="ml-2 mb-2">Peña</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['comida_rapida']) { ?>
                                <p class="ml-2 mb-2">Comida Rápida</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['gastronomia']) { ?>
                                <p class="ml-2 mb-2">Gastronomía</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['otro']) { ?>
                                <p class="ml-2 mb-2"><?php echo $tipoOfertas['otro']; ?>.</p>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Página Web / Facebook: </h6>
                            <?php if ($alimentos['pag_web']) { ?>
                                <a class="ml-2 mb-2" title="Ir al sitio web" target="_blank" href="http://<?php echo $alimentos['pag_web'] ?>"> <?php echo $alimentos['pag_web'] ?></a>
                            <?php } else { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Horarios de servicio: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['horarios'] ?></p>
                        </div>

                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Precios: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['precios'] ?></p>
                        </div>

                    </div>

                    <!-- Dentro de las tarifas se comprueba si hay precio, si no las hay entonces no hay disponibles -->
                    <!-- <h6 class="mt-5">Tarifas:</h6> -->
                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Aire acondicionado: </h6>
                            <?php if ($alimentos['aire_acondicionado'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2">Si</p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Acepta tarjetas de crédito: </h6>
                            <?php if ($alimentos['tarjetas_de_credito'] == 0) { ?>
                                <p class="ml-2 mb-2 text-muted">No disponible</p>
                            <?php } else { ?>
                                <p class="ml-2 mb-2">Si</p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Tipo de oferta: </h6>
                            <?php if ($tipoOfertas['restaurante']) { ?>
                                <p class="ml-2 mb-2">Restaurante</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['cafeteria']) { ?>
                                <p class="ml-2 mb-2">Cafetería</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['cafe']) { ?>
                                <p class="ml-2 mb-2">Cafe</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['pizzeria']) { ?>
                                <p class="ml-2 mb-2">Pizzería</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['reposteria_tipica']) { ?>
                                <p class="ml-2 mb-2">Reposteria tipica</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['heladeria']) { ?>
                                <p class="ml-2 mb-2">Heladería</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['comedor']) { ?>
                                <p class="ml-2 mb-2">Comedor</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['centro']) { ?>
                                <p class="ml-2 mb-2">Centro</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['penia']) { ?>
                                <p class="ml-2 mb-2">Peña</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['comida_rapida']) { ?>
                                <p class="ml-2 mb-2">Comida rápida</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['gastronomia']) { ?>
                                <p class="ml-2 mb-2">Gastronomía</p>
                            <?php } ?>
                            <?php if ($tipoOfertas['otro']) { ?>
                                <p class="ml-2 mb-2"><?php echo $tipoOfertas['otro'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Tipos de servicios que presta: </h6>
                            <?php if ($tipoServicio['a_la_carta']) { ?>
                                <p class="ml-2 mb-2">A la carta</p>
                            <?php } ?>
                            <?php if ($tipoServicio['buffet']) { ?>
                                <p class="ml-2 mb-2">Buffet</p>
                            <?php } ?>
                            <?php if ($tipoServicio['comida_rapida']) { ?>
                                <p class="ml-2 mb-2">Comida rápida</p>
                            <?php } ?>
                            <?php if ($tipoServicio['otro']) { ?>
                                <p class="ml-2 mb-2"><?php echo $tipoServicio['otro'] ?></p>
                            <?php } ?>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Número de mesas: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['n_mesas'] ?></p>
                        </div>
                        <div class="ml-2 row align-items-center col-lg-4">
                            <h6>Número de sillas: </h6>
                            <p class="ml-2 mb-2"> <?php echo $alimentos['n_sillas'] ?></p>
                        </div>

                    </div>

                    <div class="ml-2 mt-4 pt-1 row align-items-center">
                        <div class="ml-2 row align-items-center col-lg-6">
                            <h6>Tipo de especialidad: </h6>
                            <?php if ($ofertas['carnes']) { ?>
                                <p class="ml-2 mb-2">Carnes</p>
                            <?php } ?>
                            <?php if ($ofertas['pescado_mariscos']) { ?>
                                <p class="ml-2 mb-2">Pescados / Mariscos</p>
                            <?php } ?>
                            <?php if ($ofertas['comida_vegetariana']) { ?>
                                <p class="ml-2 mb-2">Comida vegetariana</p>
                            <?php } ?>
                            <?php if ($ofertas['mixtas']) { ?>
                                <p class="ml-2 mb-2">Mixtas</p>
                            <?php } ?>
                            <?php if ($ofertas['comida_rapida']) { ?>
                                <p class="ml-2 mb-2">Comida rápida</p>
                            <?php } ?>
                            <?php if ($ofertas['otro']) { ?>
                                <p class="ml-2 mb-2"><?php echo $ofertas['otro'] ?></p>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="ml-4 mt-4 pt-1 row align-items-center">
                        <h6 class="ml-2 ">Observaciones: </h6>
                        <?php if ($alimentos['observaciones']) { ?>
                            <p class="ml-2 mb-2"><?php echo $alimentos['observaciones'] ?></p>
                        <?php } ?>
                    </div>


                    <div class="text-center my-3">
                        <a class="btn btn-primary" href="actualizar.php?id=<?php echo $alimentos['id']; ?>">Modificar</a>
                        <!-- <button class="btn btn-primary" value="btnModificar" type="submit" name="accion">Modificar</button> -->
                        <!-- <a href='#' title="Eliminar permanentemente" class="btn btn-danger" onclick="preguntar(<?php echo $alimentos['id'] ?>)">Eliminar</a> -->
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
    <script src="../js/eliminar_alimentos.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

</body>

</html>