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


// Defino los campos enviados desde el post para poder utilizarlos en la programación
// $txtId=(isset($_POST['txtId']))?$_POST['txtId']:"";
$txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
$txtDireccion = (isset($_POST['txtDireccion'])) ? $_POST['txtDireccion'] : "";
$txtTelefono = (isset($_POST['txtTelefono'])) ? $_POST['txtTelefono'] : "";
$txtCorreo = (isset($_POST['txtCorreo'])) ? $_POST['txtCorreo'] : "";
$txtPaginaWeb = (isset($_POST['txtPaginaWeb'])) ? $_POST['txtPaginaWeb'] : "";
$txtHorario = (isset($_POST['txtHorario'])) ? $_POST['txtHorario'] : "";

// Alojamiento
$checkHotel = (isset($_POST['checkHotel'])) ? $_POST['checkHotel'] : 0;
$checkAparthotel = (isset($_POST['checkAparthotel'])) ? $_POST['checkAparthotel'] : 0;
$checkHospedaje = (isset($_POST['checkHospedaje'])) ? $_POST['checkHospedaje'] : 0;
$checkCampamento = (isset($_POST['checkCampamento'])) ? $_POST['checkCampamento'] : 0;
$checkCasaHuespedes = (isset($_POST['checkCasaHuespedes'])) ? $_POST['checkCasaHuespedes'] : 0;
$checkMotel = (isset($_POST['checkMotel'])) ? $_POST['checkMotel'] : 0;
$checkVillas_Cabanas = (isset($_POST['checkVillas_Cabanas'])) ? $_POST['checkVillas_Cabanas'] : 0;
$txtOtroAlojamiento = (isset($_POST['txtOtroAlojamiento'])) ? $_POST['txtOtroAlojamiento'] : "";


$txtSencilla = (isset($_POST['txtSencilla'])) ? $_POST['txtSencilla'] : "";
$txtDoble = (isset($_POST['txtDoble'])) ? $_POST['txtDoble'] : "";
$txtTriple = (isset($_POST['txtTriple'])) ? $_POST['txtTriple'] : "";
$txtCuadruple = (isset($_POST['txtCuadruple'])) ? $_POST['txtCuadruple'] : "";
$txtSuite = (isset($_POST['txtSuite'])) ? $_POST['txtSuite'] : "";
$txtSuitePresidencial = (isset($_POST['txtSuitePresidencial'])) ? $_POST['txtSuitePresidencial'] : "";
$txtNumeroCamas = (isset($_POST['txtNumeroCamas'])) ? $_POST['txtNumeroCamas'] : "";
$txtNumeroHabitaciones = (isset($_POST['txtNumeroHabitaciones'])) ? $_POST['txtNumeroHabitaciones'] : "";

$checkTelefono = (isset($_POST['checkTelefono'])) ? $_POST['checkTelefono'] : 0;
$checkTelevision = (isset($_POST['checkTelevision'])) ? $_POST['checkTelevision'] : 0;
$checkWifi = (isset($_POST['checkWifi'])) ? $_POST['checkWifi'] : 0;
$checkPos = (isset($_POST['checkPos'])) ? $_POST['checkPos'] : 0;
$checkAguaCaliente = (isset($_POST['checkAguaCaliente'])) ? $_POST['checkAguaCaliente'] : 0;
$checkAireAcondicionado = (isset($_POST['checkAireAcondicionado'])) ? $_POST['checkAireAcondicionado'] : 0;
$checkCafeteria = (isset($_POST['checkCafeteria'])) ? $_POST['checkCafeteria'] : 0;
$checkVentilador = (isset($_POST['checkVentilador'])) ? $_POST['checkVentilador'] : 0;
$checkEstacionamiento = (isset($_POST['checkEstacionamiento'])) ? $_POST['checkEstacionamiento'] : 0;
$checkLavanderia = (isset($_POST['checkLavanderia'])) ? $_POST['checkLavanderia'] : 0;
$checkPiscina = (isset($_POST['checkPiscina'])) ? $_POST['checkPiscina'] : 0;
$checkServicioHabitacion = (isset($_POST['checkServicioHabitacion'])) ? $_POST['checkServicioHabitacion'] : 0;

$txtOtro = (isset($_POST['txtOtro'])) ? $_POST['txtOtro'] : "";
$desayunoIncluido = (isset($_POST['desayunoIncluido'])) ? $_POST['desayunoIncluido'] : "";
$txtSalonEventos = (isset($_POST['txtSalonEventos'])) ? $_POST['txtSalonEventos'] : "";

$checkLocales = (isset($_POST['checkLocales'])) ? $_POST['checkLocales'] : 0;
$checkNacionales = (isset($_POST['checkNacionales'])) ? $_POST['checkNacionales'] : 0;
$checkExtranjeros = (isset($_POST['checkExtranjeros'])) ? $_POST['checkExtranjeros'] : 0;

// Detecta la acción del botón a clickear
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

// Verificar qué botón presionó el usuario
switch ($accion) {
    case "btnModificar":
        // $fechaActual = date('d-m-Y');
        $sentencia = $pdo->prepare("UPDATE hoteles SET nombre=:nombre, direccion=:direccion, telefono=:telefono, correo=:correo, pag_web=:pag_web, horario=:horario, numero_camas=:numero_camas, numero_habitaciones=:numero_habitaciones, desayuno_incluido=:desayuno_incluido, capacidad_salon_eventos=:capacidad_salon_eventos, activo=1 WHERE id=:id");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentencia->bindParam(':nombre', $txtNombre);
        // $sentencia->bindParam(':fecha_registro', $fechaActual);
        $sentencia->bindParam(':direccion', $txtDireccion);
        $sentencia->bindParam(':telefono', $txtTelefono);
        $sentencia->bindParam(':correo', $txtCorreo);
        $sentencia->bindParam(':pag_web', $txtPaginaWeb);
        $sentencia->bindParam(':horario', $txtHorario);

        $sentencia->bindParam(':numero_camas', $txtNumeroCamas);
        $sentencia->bindParam(':numero_habitaciones', $txtNumeroHabitaciones);

        $sentencia->bindParam(':desayuno_incluido', $desayunoIncluido);

        $sentencia->bindParam(':capacidad_salon_eventos', $txtSalonEventos);

        $sentencia->bindParam(':id', $id);
        // Ejecutar la instrucción de la sentencia
        $sentencia->execute();

        // Sentencia de tipo_alojamiento
        $sentenciaTipoAlojamiento = $pdo->prepare("UPDATE tipo_alojamiento SET hotel=:hotel, aparthotel=:aparthotel, hospedaje=:hospedaje, campamento=:campamento, casa_huespedes=:casa_huespedes, motel=:motel, villas_cabanas=:villas_cabanas, Otro=:Otro WHERE id_hotel=:id_hotel");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaTipoAlojamiento->bindParam(':hotel', $checkHotel);
        $sentenciaTipoAlojamiento->bindParam(':aparthotel', $checkAparthotel);
        $sentenciaTipoAlojamiento->bindParam(':hospedaje', $checkHospedaje);
        $sentenciaTipoAlojamiento->bindParam(':campamento', $checkCampamento);
        $sentenciaTipoAlojamiento->bindParam(':casa_huespedes', $checkCasaHuespedes);
        $sentenciaTipoAlojamiento->bindParam(':motel', $checkMotel);
        $sentenciaTipoAlojamiento->bindParam(':villas_cabanas', $checkVillas_Cabanas);
        $sentenciaTipoAlojamiento->bindParam(':Otro', $txtOtroAlojamiento);
        $sentenciaTipoAlojamiento->bindParam(':id_hotel', $hotelId);

        $sentenciaTipoAlojamiento->execute();


        $sentenciaTarifas = $pdo->prepare("UPDATE tarifas_hotel SET sencilla=:sencilla, doble=:doble, triple=:triple, cuadruple=:cuadruple, suite=:suite, suite_presidencial=:suite_presidencial WHERE id_hotel=:id_hotel");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaTarifas->bindParam(':sencilla', $txtSencilla);
        $sentenciaTarifas->bindParam(':doble', $txtDoble);
        $sentenciaTarifas->bindParam(':triple', $txtTriple);
        $sentenciaTarifas->bindParam(':cuadruple', $txtCuadruple);
        $sentenciaTarifas->bindParam(':suite', $txtSuite);
        $sentenciaTarifas->bindParam(':suite_presidencial', $txtSuitePresidencial);
        $sentenciaTarifas->bindParam(':id_hotel', $id);

        $sentenciaTarifas->execute();

        $sentenciaServicios = $pdo->prepare("UPDATE servicios_hotel SET telefono=:telefono, television=:television, wifi=:wifi, pos=:pos, agua_caliente=:agua_caliente, aire_acondicionado=:aire_acondicionado, 
    cafeteria=:cafeteria, ventilador=:ventilador, estacionamiento=:estacionamiento, lavanderia=:lavanderia, piscina=:piscina, servicio_habitacion=:servicio_habitacion, Otro=:Otro WHERE id_hotel=:id");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaServicios->bindParam(':telefono', $checkTelefono);
        $sentenciaServicios->bindParam(':television', $checkTelevision);
        $sentenciaServicios->bindParam(':wifi', $checkWifi);
        $sentenciaServicios->bindParam(':pos', $checkPos);
        $sentenciaServicios->bindParam(':agua_caliente', $checkAguaCaliente);
        $sentenciaServicios->bindParam(':aire_acondicionado', $checkAireAcondicionado);
        $sentenciaServicios->bindParam(':cafeteria', $checkCafeteria);
        $sentenciaServicios->bindParam(':ventilador', $checkVentilador);
        $sentenciaServicios->bindParam(':estacionamiento', $checkEstacionamiento);
        $sentenciaServicios->bindParam(':lavanderia', $checkLavanderia);
        $sentenciaServicios->bindParam(':piscina', $checkPiscina);
        $sentenciaServicios->bindParam(':servicio_habitacion', $checkServicioHabitacion);
        $sentenciaServicios->bindParam(':Otro', $txtOtro);
        $sentenciaServicios->bindParam(':id', $id);

        $sentenciaServicios->execute();

        $sentenciaEstanciaHuespedes = $pdo->prepare("UPDATE estancia_huespedes_hotel SET locales=:locales, nacionales=:nacionales, extranjeros=:extranjeros WHERE id_hotel=:id");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaEstanciaHuespedes->bindParam(':locales', $checkLocales);
        $sentenciaEstanciaHuespedes->bindParam(':nacionales', $checkNacionales);
        $sentenciaEstanciaHuespedes->bindParam(':extranjeros', $checkExtranjeros);
        $sentenciaEstanciaHuespedes->bindParam(':id', $id);

        $sentenciaEstanciaHuespedes->execute();

        if ($sentencia && $sentenciaEstanciaHuespedes && $sentenciaServicios && $sentenciaTarifas) {
            echo '<script language="javascript">alert("Registro actualizado correctamente");window.location.href="alojamiento.php"</script>';
        }

        // header('location: alojamiento.php');
        break;
    case "btnCancelar":
        header('location: alojamiento.php');
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
    <title>Actualizar alojamiento</title>
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
                <div class="container mt-1 pt-3 px-2">

                    <form class="form-group" action="" method="post" enctype="multipart/form-data">

                        <h3 class="mt-4 text-center">INGRESO DE EMPRESAS DE SERVICIO DE ALOJAMIENTO</h3>
                        <h4 class="mt-4 mb-4">Información general</h4>

                        <div class="row">

                            <div class="col-lg-6">
                                <label for="">Nombre: </label>
                                <input class="form-control " type="text" name="txtNombre" value="<?php echo $hotel['nombre'] ?>" placeholder="" id="txtNombre" require="" required>
                            </div>
                            <br>

                            <div class="col-lg-6">
                                <label for="">Dirección: </label>
                                <input class="form-control" type="text" name="txtDireccion" value="<?php echo $hotel['direccion'] ?>" placeholder="" id="txtDireccion" require="" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="">Teléfono: </label>
                                <input class="form-control" type="text" name="txtTelefono" value="<?php echo $hotel['telefono'] ?>" placeholder="" id="txtTelefono" require="" required>
                                <br>
                            </div>

                            <div class="col-lg-4">
                                <label for="">Correo electrónico: </label>
                                <input class="form-control" type="text" name="txtCorreo" value="<?php echo $hotel['correo'] ?>" placeholder="" id="txtCorreo" require="">
                            </div>
                            <div class="col-lg-5">
                                <label for="">Página Web o Facebook: </label>
                                <input class="form-control" type="text" name="txtPaginaWeb" value="<?php echo $hotel['pag_web'] ?>" placeholder="" id="txtPaginaWeb" require="">
                            </div>
                        </div>
                        <br>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Horarios de servicio: </label>
                                <input class="form-control" type="text" name="txtHorario" value="<?php echo $hotel['horario'] ?>" placeholder="" id="txtHorario" require="" required>
                                <br>
                            </div>

                            <div class="col-lg-6">                                
                            </div>
                        </div>

                        <br>

                        <h3>Tipo de Alojamiento</h3>
                        <div class="row ml-3">

                            <div class="col-lg-4 ml-3">
                                <?php if ($tipoAlojamiento['hotel']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkHotel" name="checkHotel" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkHotel" name="checkHotel" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="hotel">Hotel</label><br>
                                <?php if ($tipoAlojamiento['aparthotel']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkAparthotel" name="checkAparthotel" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkAparthotel" name="checkAparthotel" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Aparthotel">Aparthotel</label><br>
                                <?php if ($tipoAlojamiento['hospedaje']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkHospedaje" name="checkHospedaje" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkHospedaje" name="checkHospedaje" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Hospedaje">Hospedaje</label><br>
                                <?php if ($tipoAlojamiento['campamento']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkCampamento" name="checkCampamento" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkCampamento" name="checkCampamento" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Campamento">Campamento</label><br>

                            </div>


                            <div class="col-lg-4 ml-3">
                                <?php if ($tipoAlojamiento['casa_huespedes']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkCasaHuespedes" name="checkCasaHuespedes" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkCasaHuespedes" name="checkCasaHuespedes" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="CasaHuespedes">Casa de huéspedes</label><br>
                                <?php if ($tipoAlojamiento['motel']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkMotel" name="checkMotel" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkMotel" name="checkMotel" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Motel">Motel</label><br>
                                <?php if ($tipoAlojamiento['villas_cabanas']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkVillas_Cabanas" name="checkVillas_Cabanas" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkVillas_Cabanas" name="checkVillas_Cabanas" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Villas_Cabanas">Villas, Cabañas</label><br>
                            </div>

                            <div class="col-lg-4 row">

                                <label class="form-check-label mt-4" for="Otro">Otro: </label>
                                <?php if ($tipoAlojamiento['Otro']) { ?>
                                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroAlojamiento" value="<?php echo $tipoAlojamiento['Otro'] ?>" placeholder="" id="txtOtroAlojamiento" require="">
                                <?php } else { ?>
                                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroAlojamiento" value="" placeholder="" id="txtOtroAlojamiento" require="">
                                <?php } ?>
                            </div>


                        </div>
                        <br>
                        <br>
                        <h4 for="">Tarifas </h4>
                        <br>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="">Sencilla: </label>
                                <?php if ($tarifas['sencilla']) { ?>
                                    <input class="form-control" type="text" name="txtSencilla" value="<?php echo $tarifas['sencilla'] ?>" placeholder="" id="txtSencilla" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtSencilla" value="" placeholder="" id="txtSencilla" require="">
                                <?php } ?>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Doble: </label>
                                <?php if ($tarifas['doble']) { ?>
                                    <input class="form-control" type="text" name="txtDoble" value="<?php echo $tarifas['doble'] ?>" placeholder="" id="txtDoble" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtDoble" value="" placeholder="" id="txtDoble" require="">
                                <?php } ?>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Triple: </label>
                                <?php if ($tarifas['triple']) { ?>
                                    <input class="form-control" type="text" name="txtTriple" value="<?php echo $tarifas['triple'] ?>" placeholder="" id="txtTriple" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtTriple" value="" placeholder="" id="txtTriple" require="">
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-lg-4">
                                <label for="">Cuádruple: </label>
                                <?php if ($tarifas['cuadruple']) { ?>
                                    <input class="form-control" type="text" name="txtCuadruple" value="<?php echo $tarifas['cuadruple'] ?>" placeholder="" id="txtCuadruple" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtCuadruple" value="" placeholder="" id="txtCuadruple" require="">
                                <?php } ?>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Suite: </label>
                                <?php if ($tarifas['suite']) { ?>
                                    <input class="form-control" type="text" name="txtSuite" value="<?php echo $tarifas['suite'] ?>" placeholder="" id="txtSuite" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtSuite" value="" placeholder="" id="txtSuite" require="">
                                <?php } ?>
                            </div>
                            <div class="col-lg-4">
                                <label for="">Suite Presidencial: </label>
                                <?php if ($tarifas['suite_presidencial']) { ?>
                                    <input class="form-control" type="text" name="txtSuitePresidencial" value="<?php echo $tarifas['suite_presidencial'] ?>" placeholder="" id="txtSuitePresidencial" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtSuitePresidencial" value="" placeholder="" id="txtSuitePresidencial" require="">
                                <?php } ?>
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Numero de camas: </label>
                                <input class="form-control" type="number" min="0" name="txtNumeroCamas" value="<?php echo $hotel['numero_camas'] ?>" placeholder="" id="txtNumeroCamas" require="">
                                <br>
                            </div>
                            <div class="col-lg-6">
                                <label for="">Numero de habitaciones: </label>
                                <input class="form-control" type="number" min="0" name="txtNumeroHabitaciones" value="<?php echo $hotel['numero_habitaciones'] ?>" placeholder="" id="txtNumeroHabitaciones" require="">

                            </div>
                        </div>
                        <br>

                        <h3>Servicios</h3>
                        <div class="row ml-3">

                            <div class="col-lg-4 ml-3">
                                <?php if ($servicios['telefono']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkTelefono" name="checkTelefono" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkTelefono" name="checkTelefono" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="telefono">Teléfono</label><br>
                                <?php if ($servicios['television']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkTelevision" name="checkTelevision" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkTelevision" name="checkTelevision" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="television">Televisión</label><br>
                                <?php if ($servicios['wifi']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkWifi" name="checkWifi" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkWifi" name="checkWifi" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Wifi">Wifi</label><br>
                                <?php if ($servicios['pos']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkPos" name="checkPos" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkPos" name="checkPos" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="POS">POS</label><br>
                                <?php if ($servicios['agua_caliente']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkAguaCaliente" name="checkAguaCaliente" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkAguaCaliente" name="checkAguaCaliente" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="AguaCaliente">Agua Caliente</label><br>
                                <?php if ($servicios['piscina']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkPiscina" name="checkPiscina" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkPiscina" name="checkPiscina" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Piscina">Piscina</label><br>
                            </div>


                            <div class="col-lg-4 ml-3">
                                <?php if ($servicios['aire_acondicionado']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkAireAcondicionado" name="checkAireAcondicionado" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkAireAcondicionado" name="checkAireAcondicionado" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="AireAcondicionado">Aire Acondicionado</label><br>

                                <?php if ($servicios['cafeteria']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkCafeteria" name="checkCafeteria" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkCafeteria" name="checkCafeteria" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Cafeteria">Cafeteria</label><br>

                                <?php if ($servicios['ventilador']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkVentilador" name="checkVentilador" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkVentilador" name="checkVentilador" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Ventilador">Ventilador</label><br>

                                <?php if ($servicios['estacionamiento']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkEstacionamiento" name="checkEstacionamiento" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkEstacionamiento" name="checkEstacionamiento" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Estacionamiento">Estacionamiento</label><br>

                                <?php if ($servicios['lavanderia']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkLavanderia" name="checkLavanderia" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkLavanderia" name="checkLavanderia" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Lavanderia">Lavandería</label><br>

                                <?php if ($servicios['servicio_habitacion']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkServicioHabitacion" name="checkServicioHabitacion" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkServicioHabitacion" name="checkServicioHabitacion" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="servicioHabitacion">Servicio a la Habitación</label><br>

                            </div>

                            <div class="col-lg-4 row">

                                <label class="form-check-label mt-4" for="Otro">Otro: </label>
                                <?php if ($servicios['Otro']) { ?>
                                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtro" value="<?php echo $servicios['Otro'] ?>" placeholder="" id="txtOtro" require="">
                                <?php } else { ?>
                                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtro" value="" placeholder="" id="txtOtro" require="">
                                <?php } ?>
                            </div>

                        </div>

                        <br>
                        <div class="row mx-auto mt-2" style="justify-content:center;">
                            <div class="col-lg-3">
                                <label for="">Servicio de desayuno incluido: </label>
                                <select class="form-control" name="desayunoIncluido" id="desayunoIncluido" required>
                                    <option value="<?php echo $hotel['desayuno_incluido'] ?>"><?php if ($hotel['desayuno_incluido']) {
                                                                                                    echo "Si";
                                                                                                } else {
                                                                                                    echo "No";
                                                                                                } ?></option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select><br>
                            </div>

                            <div class="col-lg-3">
                                <label for="">Capacidad del salón de eventos: </label>
                                <?php if ($hotel['capacidad_salon_eventos']) { ?>
                                    <input class="form-control" type="text" name="txtSalonEventos" value="<?php echo $hotel['capacidad_salon_eventos'] ?>" placeholder="" id="txtSalonEventos" require="">
                                <?php } else { ?>
                                    <input class="form-control" type="text" name="txtSalonEventos" value="" placeholder="" id="txtSalonEventos" require="">
                                <?php } ?>


                            </div>

                        </div>
                        <br>
                        <h3>Estancia de los huéspedes</h3>
                        <div class="row ml-3 text-center mt-3 mb-4">
                            <h5>Procedencia: </h5>
                            <div class="col-lg-3 ml-3">
                                <?php if ($estancia['locales']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkLocales" name="checkLocales" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkLocales" name="checkLocales" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Locales">Locales</label><br>
                            </div>
                            <div class="col-lg-3 ml-3">
                                <?php if ($estancia['nacionales']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkNacionales" name="checkNacionales" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkNacionales" name="checkNacionales" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Nacionales">Nacionales</label><br>
                            </div>
                            <div class="col-lg-3 ml-3">
                                <?php if ($estancia['extranjeros']) { ?>
                                    <input class="form-check-input" type="checkbox" id="checkExtranjeros" name="checkExtranjeros" value="1" checked>
                                <?php } else { ?>
                                    <input class="form-check-input" type="checkbox" id="checkExtranjeros" name="checkExtranjeros" value="1">
                                <?php } ?>
                                <label class="form-check-label" for="Extranjeros">Extranjeros</label><br>
                            </div>
                        </div>

                        <div class="text-center mt-5 pb-3">
                            <button class="btn btn-success" value="btnModificar" type="submit" name="accion">Guardar Cambios</button>
                            <a href="alojamiento.php" class="btn btn-danger" value="btnCancelar" type="submit" name="accion">Cancelar</a><br>
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
    <script src="../js/actualizar.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

</body>

</html>