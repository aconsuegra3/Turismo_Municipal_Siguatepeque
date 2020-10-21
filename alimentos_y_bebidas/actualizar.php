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


// Defino los campos enviados desde el post para poder utilizarlos en la programación
// $txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtDireccion = (isset($_POST['txtDireccion'])) ? $_POST['txtDireccion'] : "";
$txtTelefono = (isset($_POST['txtTelefono'])) ? $_POST['txtTelefono'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";
$txtPaginaWeb = (isset($_POST['txtPaginaWeb'])) ? $_POST['txtPaginaWeb'] : "";
$txtHorario = (isset($_POST['txtHorario'])) ? $_POST['txtHorario'] : "";


$checkRestaurante = (isset($_POST['checkRestaurante'])) ? $_POST['checkRestaurante'] : 0;
$checkCafeteria = (isset($_POST['checkCafeteria'])) ? $_POST['checkCafeteria'] : 0;
$checkCafe = (isset($_POST['checkCafe'])) ? $_POST['checkCafe'] : 0;
$checkPizzeria = (isset($_POST['checkPizzeria'])) ? $_POST['checkPizzeria'] : 0;
$checkReposteria_tipica = (isset($_POST['checkReposteria_tipica'])) ? $_POST['checkReposteria_tipica'] : 0;
$checkHeladeria = (isset($_POST['checkHeladeria'])) ? $_POST['checkHeladeria'] : 0;
$checkComedor = (isset($_POST['checkComedor'])) ? $_POST['checkComedor'] : 0;
$checkCentro = (isset($_POST['checkCentro'])) ? $_POST['checkCentro'] : 0;
$checkPenia = (isset($_POST['checkPenia'])) ? $_POST['checkPenia'] : 0;
$checkComida_rapida = (isset($_POST['checkComida_rapida'])) ? $_POST['checkComida_rapida'] : 0;
$checkGastronomia = (isset($_POST['checkGastronomia'])) ? $_POST['checkGastronomia'] : 0;
$txtOtroTipoOferta = (isset($_POST['txtOtroTipoOferta'])) ? $_POST['txtOtroTipoOferta'] : "";

$aireAcondicionado = (isset($_POST['aireAcondicionado'])) ? $_POST['aireAcondicionado'] : "";
$tarjetasCredito = (isset($_POST['tarjetasCredito'])) ? $_POST['tarjetasCredito'] : "";

$txtIdComercial = (isset($_POST['txtIdComercial'])) ? $_POST['txtIdComercial'] : "";
$txtPrecios = (isset($_POST['txtPrecios'])) ? $_POST['txtPrecios'] : "";
$txtNumeroMesas = (isset($_POST['txtNumeroMesas'])) ? $_POST['txtNumeroMesas'] : "";
$txtNumeroSillas = (isset($_POST['txtNumeroSillas'])) ? $_POST['txtNumeroSillas'] : "";

$checkCarnes = (isset($_POST['checkCarnes'])) ? $_POST['checkCarnes'] : 0;
$checkPescados_Mariscos = (isset($_POST['checkPescados_Mariscos'])) ? $_POST['checkPescados_Mariscos'] : 0;
$checkPastas = (isset($_POST['checkPastas'])) ? $_POST['checkPastas'] : 0;
$checkComida_vegetariana = (isset($_POST['checkComida_vegetariana'])) ? $_POST['checkComida_vegetariana'] : 0;
$checkMixtas = (isset($_POST['checkMixtas'])) ? $_POST['checkMixtas'] : 0;
$checkComida_rapida = (isset($_POST['checkComida_rapida'])) ? $_POST['checkComida_rapida'] : 0;
$txtOtroEspecialidadOferta = (isset($_POST['txtOtroEspecialidadOferta'])) ? $_POST['txtOtroEspecialidadOferta'] : "";

$txtOtroTipoServicio = (isset($_POST['txtOtroTipoServicio'])) ? $_POST['txtOtroTipoServicio'] : "";
$checkAlaCarta = (isset($_POST['checkAlaCarta'])) ? $_POST['checkAlaCarta'] : 0;
$checkBuffet = (isset($_POST['checkBuffet'])) ? $_POST['checkBuffet'] : 0;
$checkComidaRapida = (isset($_POST['checkComidaRapida'])) ? $_POST['checkComidaRapida'] : 0;

$txtObservaciones = (isset($_POST['txtObservaciones'])) ? $_POST['txtObservaciones'] : "";

// Detecta la acción del botón a clickear
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

// Crear la conexion con la base de datos
include("../conexion/conexion.php");

// Verificar qué botón presionó el usuario
switch ($accion) {
    case "btnModificar":
        // Creando la sentencia SQL para insertar los valores en la BD
        // Utilizo pdo para preparar la sentencia
        $sentencia = $pdo->prepare("UPDATE alimentos_y_bebidas SET nombre=:nombre, direccion=:direccion, fecha_registro=:fecha_registro, telefono=:telefono, correo=:correo, pag_web=:pag_web, id_comercial=:id_comercial, horarios=:horarios, precios=:precios, aire_acondicionado=:aire_acondicionado, tarjetas_de_credito=:tarjetas_de_credito, n_mesas=:n_mesas, n_sillas=:n_sillas, observaciones=:observaciones, activo=1 WHERE id=:id");

        $fechaActual = date('d-m-Y');
        // bindParam será para asignar los valores referenciados anteriormente
        $sentencia->bindParam(':nombre', $txtNombre);
        $sentencia->bindParam(':direccion', $txtDireccion);
        $sentencia->bindParam(':fecha_registro', $fechaActual);
        $sentencia->bindParam(':telefono', $txtTelefono);
        $sentencia->bindParam(':correo', $txtCorreo);
        $sentencia->bindParam(':pag_web', $txtPaginaWeb);
        $sentencia->bindParam(':id_comercial', $txtIdComercial);
        $sentencia->bindParam(':horarios', $txtHorario);
        $sentencia->bindParam(':precios', $txtPrecios);

        $sentencia->bindParam(':aire_acondicionado', $aireAcondicionado);
        $sentencia->bindParam(':tarjetas_de_credito', $tarjetasCredito);

        $sentencia->bindParam(':n_mesas', $txtNumeroMesas);
        $sentencia->bindParam(':n_sillas', $txtNumeroSillas);
        $sentencia->bindParam(':observaciones', $txtObservaciones);

        $sentencia->bindParam(':id', $id);

        // Ejecutar la instrucción de la sentencia
        $sentencia->execute();

        // Sentencia de consulta para seleccionar el servicio de alimentos insertado para poder sacar el id
        $sentenciaIdAlimentos = $pdo->prepare("SELECT * FROM alimentos_y_bebidas ORDER BY id DESC LIMIT 1");
        $sentenciaIdAlimentos->execute();
        $alimentos = $sentenciaIdAlimentos->fetch(PDO::FETCH_ASSOC);

        $idAlimentos = (isset($alimentos['id'])) ? $alimentos['id'] : "";


        // Sentencia para insertar en la tabla de tarifas según el id_hotel al que pertenece
        $sentenciaOferta = $pdo->prepare("UPDATE tipo_oferta_alimentos SET restaurante=:restaurante, cafeteria=:cafeteria, cafe=:cafe, pizzeria=:pizzeria, reposteria_tipica=:reposteria_tipica, heladeria=:heladeria, comedor=:comedor, centro=:centro, penia=:penia, comida_rapida=:comida_rapida, gastronomia=:gastronomia, otro=:otro WHERE id_alimentos=:id_alimentos");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaOferta->bindParam(':restaurante', $checkRestaurante);
        $sentenciaOferta->bindParam(':cafeteria', $checkCafeteria);
        $sentenciaOferta->bindParam(':cafe', $checkCafe);
        $sentenciaOferta->bindParam(':pizzeria', $checkPizzeria);
        $sentenciaOferta->bindParam(':reposteria_tipica', $checkReposteria_tipica);
        $sentenciaOferta->bindParam(':heladeria', $checkHeladeria);
        $sentenciaOferta->bindParam(':comedor', $checkComedor);
        $sentenciaOferta->bindParam(':centro', $checkCentro);
        $sentenciaOferta->bindParam(':penia', $checkPenia);
        $sentenciaOferta->bindParam(':comida_rapida', $checkComida_rapida);
        $sentenciaOferta->bindParam(':gastronomia', $checkGastronomia);
        $sentenciaOferta->bindParam(':otro', $txtOtroTipoOferta);
        $sentenciaOferta->bindParam(':id_alimentos', $idAlimentos);


        $sentenciaOferta->execute();

        // Sentencia para insertar en la tabla de servicios según el hotel al que pertenece
        $sentenciaEspecialidadOferta = $pdo->prepare("UPDATE especialidad_oferta_alimentos SET carnes=:carnes, pescado_mariscos=:pescado_mariscos, pastas=:pastas, comida_vegetariana=:comida_vegetariana, mixtas=:mixtas, comida_rapida=:comida_rapida, otro=:otro WHERE id_alimentos=:id_alimentos");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaEspecialidadOferta->bindParam(':carnes', $checkCarnes);
        $sentenciaEspecialidadOferta->bindParam(':pescado_mariscos', $checkPescados_Mariscos);
        $sentenciaEspecialidadOferta->bindParam(':pastas', $checkPastas);
        $sentenciaEspecialidadOferta->bindParam(':comida_vegetariana', $checkComida_vegetariana);
        $sentenciaEspecialidadOferta->bindParam(':mixtas', $checkMixtas);
        $sentenciaEspecialidadOferta->bindParam(':comida_rapida', $checkComida_rapida);
        $sentenciaEspecialidadOferta->bindParam(':otro', $txtOtroEspecialidadOferta);
        $sentenciaEspecialidadOferta->bindParam(':id_alimentos', $idAlimentos);

        $sentenciaEspecialidadOferta->execute();

        $sentenciaTipoServicio = $pdo->prepare("UPDATE tipos_servicio_alimentos SET a_la_carta=:a_la_carta, buffet=:buffet, comida_rapida=:comida_rapida, otro=:otro WHERE id_alimentos=:id_alimentos");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaTipoServicio->bindParam(':a_la_carta', $checkAlaCarta);
        $sentenciaTipoServicio->bindParam(':buffet', $checkBuffet);
        $sentenciaTipoServicio->bindParam(':comida_rapida', $checkComidaRapida);
        $sentenciaTipoServicio->bindParam(':otro', $txtOtroTipoServicio);
        $sentenciaTipoServicio->bindParam(':id_alimentos', $idAlimentos);

        $sentenciaTipoServicio->execute();

        if ($sentencia && $sentenciaOferta && $sentenciaEspecialidadOferta && $sentenciaTipoServicio) {
            echo '<script language="javascript">alert("Registro actualizado exitosamente");window.location.href="alimentosYBebidas.php"</script>';
        }
        // // Header sirve para redireccionar a la direccion que se desee
        // header('location: alojamiento.php');

        break;
    case "btnCancelar":
        break;
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
    <title>Actualizar Alimentos y Bebidas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="icon" href="../img/logo_muni.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../css/estilos.css" rel="stylesheet" />
    <link rel="icon" href="../img/logo_muni.png">
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
        <div class="mr-1 ml-auto text-light">
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

                    <form class="form-group" action="" method="post" enctype="multipart/form-data">

                        <h3 class="mt-4 text-center">FICHA DE INVENTARIO DE ALIMENTOS Y BEBIDAS</h3>
                        <h4 class="mt-4 mb-4">Información general</h4>

                        <div class="row">

                            <div class="col-lg-6">
                                <label for="">Nombre: </label>
                                <input class="form-control " type="text" name="txtNombre" value="<?php echo $alimentos['nombre'] ?>" placeholder="" id="txtNombre" require="" required>
                            </div>
                            <br>

                            <div class="col-lg-6">
                                <label for="">Dirección: </label>
                                <input class="form-control" type="text" name="txtDireccion" value="<?php echo $alimentos['direccion'] ?>" placeholder="" id="txtDireccion" require="" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Teléfono: </label>
                                <input class="form-control" type="text" name="txtTelefono" value="<?php echo $alimentos['telefono'] ?>" placeholder="" id="txtTelefono" require="" required>
                                <br>
                            </div>

                            <div class="col-lg-4">
                                <label for="">Correo electrónico: </label>
                                <input class="form-control" type="text" name="txtCorreo" value="<?php echo $alimentos['correo'] ?>" placeholder="" id="txtCorreo" require="">
                            </div>
                            <div class="col-lg-5">
                                <label for="">Página Web o Facebook: </label>
                                <input class="form-control" type="text" name="txtPaginaWeb" value="<?php echo $alimentos['pag_web'] ?>" placeholder="" id="txtPaginaWeb" require="">
                            </div>
                        </div>
                        <br>

                        <div class="row">

                            <div class="col-lg-7">

                                <!-- Tipo de oferta -->
                                <h3>Tipo de oferta</h3>
                                <div class="row ml-3">

                                    <div class="col-lg-5 ml-3">
                                        <?php if ($tipoOfertas['restaurante']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkRestaurante" name="checkRestaurante" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkRestaurante" name="checkRestaurante" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="restaurante">Restaurante</label><br>

                                        <?php if ($tipoOfertas['cafeteria']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkCafeteria" name="checkCafeteria" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkCafeteria" name="checkCafeteria" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="cafeteria">Cafetería</label><br>

                                        <?php if ($tipoOfertas['cafe']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkCafe" name="checkCafe" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkCafe" name="checkCafe" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="cafe">Café</label><br>

                                        <?php if ($tipoOfertas['pizzeria']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkPizzeria" name="checkPizzeria" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkPizzeria" name="checkPizzeria" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="pizzeria">Pizzeria</label><br>

                                        <?php if ($tipoOfertas['reposteria_tipica']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkReposteria_tipica" name="checkReposteria_tipica" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkReposteria_tipica" name="checkReposteria_tipica" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="Reposteria_tipica">Repostería Típica</label><br>

                                        <?php if ($tipoOfertas['heladeria']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkHeladeria" name="checkHeladeria" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkHeladeria" name="checkHeladeria" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="heladeria">Heladeria</label><br>
                                    </div>


                                    <div class="col-lg-5 ml-3">
                                        <?php if ($tipoOfertas['comedor']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkComedor" name="checkComedor" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkComedor" name="checkComedor" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="comedor">Comedor</label><br>

                                        <?php if ($tipoOfertas['centro']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkCentro" name="checkCentro" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkCentro" name="checkCentro" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="centro">Centro</label><br>

                                        <?php if ($tipoOfertas['penia']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkPenia" name="checkPenia" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkPenia" name="checkPenia" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="penia">Peña</label><br>

                                        <?php if ($tipoOfertas['comida_rapida']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkComida_rapida" name="checkComida_rapida" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkComida_rapida" name="checkComida_rapida" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="comida_rapida">Comida Rápida</label><br>

                                        <?php if ($tipoOfertas['gastronomia']) { ?>
                                            <input class="form-check-input" type="checkbox" id="checkGastronomia" name="checkGastronomia" value="1" checked>
                                        <?php } else { ?>
                                            <input class="form-check-input" type="checkbox" id="checkGastronomia" name="checkGastronomia" value="1">
                                        <?php } ?>
                                        <label class="form-check-label" for="gastrsonomia">Gastronomía</label><br>

                                    </div>

                                    <div class="col-lg-5 row">

                                        <label class="form-check-label mt-4" for="Otro">Otro: </label>
                                        <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroTipoOferta" value="<?php echo $tipoOfertas['otro'] ?>" placeholder="" id="txtOtroTipoOferta" require=""> <br><br>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <div class="col-lg-5 mt-2">
                                <br>
                                <label for="">Horarios de servicio: </label>
                                <input class="form-control" type="text" name="txtHorario" value="<?php echo $alimentos['horarios'] ?>" placeholder="" id="txtHorario" require="" required>
                                <br>
                            </div>
                        </div>
                        <br>


                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Datos de ID comercial: </label>
                                <input class="form-control" type="text" name="txtIdComercial" value="<?php echo $alimentos['id_comercial'] ?>" placeholder="" id="txtIdComercial" require="">
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Precios: </label>
                                <input class="form-control" type="text" name="txtPrecios" value="<?php echo $alimentos['precios'] ?>" placeholder="" id="txtPrecios" require="">
                                <br>
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Aire Acondicionado: </label>
                                <select class="form-control" name="aireAcondicionado" id="aireAcondicionado" required>
                                    <option value="<?php echo $alimentos['aire_acondicionado'] ?>"><?php if ($alimentos['aire_acondicionado']) {
                                                                                                        echo "Si";
                                                                                                    } else {
                                                                                                        echo "No";
                                                                                                    } ?></option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select><br>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Aceptan tarjetas de crédito: </label>
                                <select class="form-control" name="tarjetasCredito" id="tarjetasCredito" required>
                                    <option value="<?php echo $alimentos['tarjetas_de_credito'] ?>"><?php if ($alimentos['tarjetas_de_credito']) {
                                                                                                        echo "Si";
                                                                                                    } else {
                                                                                                        echo "No";
                                                                                                    } ?></option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select><br>
                            </div>

                            <div class="col-lg-3">
                                <label for="">Número de mesas: </label>
                                <input class="form-control" type="number" min="0" name="txtNumeroMesas" value="<?php echo $alimentos['n_mesas'] ?>" placeholder="" id="txtNumeroMesas" require=""> <br>
                            </div>
                            <div class="col-lg-3">
                                <label for="">Número de sillas: </label>
                                <input class="form-control" type="number" min="0" name="txtNumeroSillas" value="<?php echo $alimentos['n_sillas'] ?>" placeholder="" id="txtNumeroSillas" require="">
                            </div>

                        </div>
                        <br>
                        <br>


                        <div class="row ml-3">
                            <div class="column col-lg-6">
                                <h3>Especialidad de oferta</h3>

                                <div class="col-lg-6 ml-3">

                                    <?php if ($ofertas['carnes']) { ?>
                                        <input class="form-check-input" type="checkbox" id="checkCarnes" name="checkCarnes" value="1" checked>
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" id="checkCarnes" name="checkCarnes" value="1">
                                    <?php } ?>
                                    <label class="form-check-label" for="Carnes">Carnes</label><br>

                                    <?php if ($ofertas['pescado_mariscos']) { ?>
                                        <input class="form-check-input" type="checkbox" id="checkPescados_Mariscos" name="checkPescados_Mariscos" value="1" checked>
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" id="checkPescados_Mariscos" name="checkPescados_Mariscos" value="1">
                                    <?php } ?>
                                    <label class="form-check-label" for="Pescados_Mariscos">Pescados/Mariscos</label><br>

                                    <?php if ($ofertas['pastas']) { ?>
                                        <input class="form-check-input" type="checkbox" id="checkPastas" name="checkPastas" value="1" checked>
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" id="checkPastas" name="checkPastas" value="1">
                                    <?php } ?>
                                    <label class="form-check-label" for="pastas">Pastas</label><br>
                                </div>


                                <div class="col-lg-6 ml-3">
                                    <?php if ($ofertas['comida_vegetariana']) { ?>
                                        <input class="form-check-input" type="checkbox" id="checkComida_vegetariana" name="checkComida_vegetariana" value="1" checked>
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" id="checkComida_vegetariana" name="checkComida_vegetariana" value="1">
                                    <?php } ?>
                                    <label class="form-check-label" for="comida_vegetariana">Comida Vegetariana</label><br>

                                    <?php if ($ofertas['mixtas']) { ?>
                                        <input class="form-check-input" type="checkbox" id="checkMixtas" name="checkMixtas" value="1" checked>
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" id="checkMixtas" name="checkMixtas" value="1">
                                    <?php } ?>
                                    <label class="form-check-label" for="Mixtas">Mixtas</label><br>

                                    <?php if ($ofertas['comida_rapida']) { ?>
                                        <input class="form-check-input" type="checkbox" id="checkComida_rapida" name="checkComida_rapida" value="1" checked>
                                    <?php } else { ?>
                                        <input class="form-check-input" type="checkbox" id="checkComida_rapida" name="checkComida_rapida" value="1">
                                    <?php } ?>
                                    <label class="form-check-label" for="comida_rapida">Comida Rápida</label><br>

                                </div>

                                <div class="col-lg-6 row">

                                    <label class="form-check-label mt-4" for="Otro">Otro: </label>
                                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroEspecialidadOferta" value="<?php echo $ofertas['otro'] ?>" placeholder="" id="txtOtroEspecialidadOferta" require=""> <br><br>
                                </div>
                            </div>


                            <div class="column col-lg-6">
                                <h3>Tipos de servicio que presta:</h3>
                                <div class="ml-3 col-lg-6">

                                    <?php if ($tipoServicio['a_la_carta']) { ?>
                                        <input class="ml-4 form-check-input" type="checkbox" id="checkAlaCarta" name="checkAlaCarta" value="1" checked>
                                    <?php } else { ?>
                                        <input class="ml-4 form-check-input" type="checkbox" id="checkAlaCarta" name="checkAlaCarta" value="1">
                                    <?php } ?>
                                    <label class="ml-5 form-check-label" for="a_la_carta">A la carta</label><br>

                                    <?php if ($tipoServicio['buffet']) { ?>
                                        <input class="ml-4 form-check-input" type="checkbox" id="checkBuffet" name="checkBuffet" value="1" checked>
                                    <?php } else { ?>
                                        <input class="ml-4 form-check-input" type="checkbox" id="checkBuffet" name="checkBuffet" value="1">
                                    <?php } ?>
                                    <label class="ml-5 form-check-label" for="buffet">Buffet</label><br>

                                    <?php if ($tipoServicio['comida_rapida']) { ?>
                                        <input class="ml-4 form-check-input" type="checkbox" id="checkComidaRapida" name="checkComidaRapida" value="1" checked>
                                    <?php } else { ?>
                                        <input class="ml-4 form-check-input" type="checkbox" id="checkComidaRapida" name="checkComidaRapida" value="1">
                                    <?php } ?>
                                    <label class="ml-5 form-check-label" for="comida_rapida">Comida Rápida</label><br>
                                    <br>
                                </div>
                                <div class="col-lg-6 row">

                                    <label class="form-check-label mt-4" for="Otro">Otro: </label>
                                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroTipoServicio" value="<?php echo $tipoServicio['otro'] ?>" placeholder="" id="txtOtroEspecialidadOferta" require=""> <br><br>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="col-lg-14 mx-2 row">
                            <label for="">Observaciones: </label>
                            <input class="form-control w-7" type="text" name="txtObservaciones" value="<?php echo $alimentos['observaciones'] ?>" placeholder="" id="txtObservaciones" require="" required>
                        </div>
                        <br>
                        <br>


                        <div class="text-center">
                            <button class="btn btn-success" value="btnModificar" type="submit" name="accion">Guardar cambios</button>
                            <!-- <button class="btn btn-primary" value="btnModificar" type="submit" name="accion">Modificar</button> -->
                            <!-- <button class="btn btn-danger" value="btnEliminar" type="submit" name="accion">Eliminar</button> -->
                            <a href="alimentosYBebidas.php" class="btn btn-danger" value="btnCancelar" type="submit" name="accion">Cancelar</a><br>
                        </div>
                    </form>
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