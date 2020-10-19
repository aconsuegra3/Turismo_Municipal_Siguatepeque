<?php

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
    case "btnAgregar":
        // Creando la sentencia SQL para insertar los valores en la BD
        // Utilizo pdo para preparar la sentencia
        $sentencia = $pdo->prepare("INSERT INTO alimentos_y_bebidas(nombre, direccion, fecha_registro, telefono, correo, pag_web, id_comercial, horarios, precios, aire_acondicionado, tarjetas_de_credito, n_mesas, n_sillas, observaciones, activo)
         values (:nombre, :direccion, :fecha_registro, :telefono, :correo, :pag_web, :id_comercial, :horarios, :precios, :aire_acondicionado, :tarjetas_de_credito, :n_mesas, :n_sillas, :observaciones, 1)");

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
        $sentencia->bindParam(':precios', $txtPrecios );

        $sentencia->bindParam(':aire_acondicionado', $aireAcondicionado );
        $sentencia->bindParam(':tarjetas_de_credito', $tarjetasCredito);

        $sentencia->bindParam(':n_mesas', $txtNumeroMesas );
        $sentencia->bindParam(':n_sillas', $txtNumeroSillas );
        $sentencia->bindParam(':observaciones', $txtObservaciones );


        // Ejecutar la instrucción de la sentencia
        $sentencia->execute();

        // Sentencia de consulta para seleccionar el servicio de alimentos insertado para poder sacar el id
        $sentenciaIdAlimentos = $pdo->prepare("SELECT * FROM alimentos_y_bebidas ORDER BY id DESC LIMIT 1");
        $sentenciaIdAlimentos->execute();
        $alimentos = $sentenciaIdAlimentos->fetch(PDO::FETCH_ASSOC);

        $idAlimentos = (isset($alimentos['id'])) ? $alimentos['id'] : "";
        

        // Sentencia para insertar en la tabla de tarifas según el id_hotel al que pertenece
        $sentenciaOferta = $pdo->prepare("INSERT INTO tipo_oferta_alimentos(restaurante, cafeteria, cafe, pizzeria, reposteria_tipica, heladeria, comedor, centro, penia, comida_rapida, gastronomia, otro, id_alimentos)
         values (:restaurante, :cafeteria, :cafe, :pizzeria, :reposteria_tipica, :heladeria, :comedor, :centro, :penia, :comida_rapida, :gastronomia, :otro, :id_alimentos)");

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
        $sentenciaOferta->bindParam(':otro', $txtOtroTipoOferta );
        $sentenciaOferta->bindParam(':id_alimentos', $idAlimentos);


        $sentenciaOferta->execute();

        // Sentencia para insertar en la tabla de servicios según el hotel al que pertenece
        $sentenciaEspecialidadOferta = $pdo->prepare("INSERT INTO especialidad_oferta_alimentos(carnes, pescado_mariscos, pastas, comida_vegetariana, mixtas, comida_rapida, otro, id_alimentos)
         values (:carnes, :pescado_mariscos, :pastas, :comida_vegetariana, :mixtas, :comida_rapida, :otro, :id_alimentos)");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaEspecialidadOferta->bindParam(':carnes', $checkCarnes);
        $sentenciaEspecialidadOferta->bindParam(':pescado_mariscos', $checkPescados_Mariscos);
        $sentenciaEspecialidadOferta->bindParam(':pastas', $checkPastas);
        $sentenciaEspecialidadOferta->bindParam(':comida_vegetariana', $checkComida_vegetariana);
        $sentenciaEspecialidadOferta->bindParam(':mixtas', $checkMixtas);
        $sentenciaEspecialidadOferta->bindParam(':comida_rapida', $checkComida_rapida);
        $sentenciaEspecialidadOferta->bindParam(':id_alimentos', $idAlimentos);
        $sentenciaEspecialidadOferta->bindParam(':otro', $txtOtroEspecialidadOferta);
    
        $sentenciaEspecialidadOferta->execute();

        $sentenciaTipoServicio = $pdo->prepare("INSERT INTO tipos_servicio_alimentos(a_la_carta, buffet, comida_rapida, otro, id_alimentos)
         values (:a_la_carta, :buffet, :comida_rapida, :otro, :id_alimentos)");

        // bindParam será para asignar los valores referenciados anteriormente
        $sentenciaTipoServicio->bindParam(':a_la_carta', $checkAlaCarta);
        $sentenciaTipoServicio->bindParam(':buffet', $checkBuffet);
        $sentenciaTipoServicio->bindParam(':comida_rapida', $checkComidaRapida);
        $sentenciaTipoServicio->bindParam(':otro', $txtOtroTipoServicio);
        $sentenciaTipoServicio->bindParam(':id_alimentos', $idAlimentos);

        $sentenciaTipoServicio->execute();

        if ($sentencia && $sentenciaOferta && $sentenciaEspecialidadOferta && $sentenciaTipoServicio) {
            echo '<script language="javascript">alert("Registro agregado exitosamente");window.location.href="alimentosYBebidas.php"</script>';
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oferta de Alimentos y Bebidas</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="icon" href="../img/logo_muni.png">
    <link rel="stylesheet" href="../css/estilos.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100 ">

    <nav class="navbar navbar-dark">
        <a title="Atrás" href="alimentosYBebidas.php"><i class="fas fa-arrow-left text-light" style="font-size: 25px;"></i></a>
        <a title="Inicio" class="mr-auto ml-4" href="../index.php"><i class="fas fa-home text-light" style="font-size: 25px;"></i></a>
        <img class="mr-auto" src="../img/logo_muni2.png" width="50px" alt="">
        <button title="Menú" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="../index.php"> <i class="fas fa-home mr-1"></i> Inicio</a>
                </li>
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="../alojamiento/alojamiento.php"><i class="fas fa-hotel mr-1"></i> Alojamiento</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="alimentosYBebidas.php"><i class="fas fa-utensils mr-1"></i> Alimentos y bebidas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">
        <form class="form-group" action="" method="post" enctype="multipart/form-data">

            <h3 class="mt-4 text-center">FICHA DE INVENTARIO DE ALIMENTOS Y BEBIDAS</h3>
            <h4 class="mt-4 mb-4">Información general</h4>

            <div class="row">

                <div class="col-lg-6">
                    <label for="">Nombre: </label>
                    <input class="form-control " type="text" name="txtNombre" value="" placeholder="" id="txtNombre" require="" required>
                </div>
                <br>

                <div class="col-lg-6">
                    <label for="">Dirección: </label>
                    <input class="form-control" type="text" name="txtDireccion" value="" placeholder="" id="txtDireccion" require="" required>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3">
                    <label for="">Teléfono: </label>
                    <input class="form-control" type="text" name="txtTelefono" value="" placeholder="" id="txtTelefono" require="" required>
                    <br>
                </div>

                <div class="col-lg-4">
                    <label for="">Correo electrónico: </label>
                    <input class="form-control" type="text" name="txtCorreo" value="" placeholder="" id="txtCorreo" require="">
                </div>
                <div class="col-lg-5">
                    <label for="">Página Web o Facebook: </label>
                    <input class="form-control" type="text" name="txtPaginaWeb" value="" placeholder="" id="txtPaginaWeb" require="">
                </div>
            </div>
            <br>

            <div class="row">

                <div class="col-lg-7">

                    <!-- Tipo de oferta -->
                    <h3>Tipo de oferta</h3>
                    <div class="row ml-3">

                        <div class="col-lg-5 ml-3">
                            <input class="form-check-input" type="checkbox" id="checkRestaurante" name="checkRestaurante" value="1">
                            <label class="form-check-label" for="restaurante">Restaurante</label><br>
                            <input class="form-check-input" type="checkbox" id="checkCafeteria" name="checkCafeteria" value="1">
                            <label class="form-check-label" for="cafeteria">Cafetería</label><br>
                            <input class="form-check-input" type="checkbox" id="checkCafe" name="checkCafe" value="1">
                            <label class="form-check-label" for="cafe">Café</label><br>
                            <input class="form-check-input" type="checkbox" id="checkPizzeria" name="checkPizzeria" value="1">
                            <label class="form-check-label" for="pizzeria">Pizzeria</label><br>
                            <input class="form-check-input" type="checkbox" id="checkReposteria_tipica" name="checkReposteria_tipica" value="1">
                            <label class="form-check-label" for="Reposteria_tipica">Repostería Típica</label><br>
                            <input class="form-check-input" type="checkbox" id="checkHeladeria" name="checkHeladeria" value="1">
                            <label class="form-check-label" for="heladeria">Heladeria</label><br>
                        </div>


                        <div class="col-lg-5 ml-3">
                            <input class="form-check-input" type="checkbox" id="checkComedor" name="checkComedor" value="1">
                            <label class="form-check-label" for="comedor">Comedor</label><br>
                            <input class="form-check-input" type="checkbox" id="checkCentro" name="checkCentro" value="1">
                            <label class="form-check-label" for="centro">Centro</label><br>
                            <input class="form-check-input" type="checkbox" id="checkPenia" name="checkPenia" value="1">
                            <label class="form-check-label" for="penia">Peña</label><br>
                            <input class="form-check-input" type="checkbox" id="checkComida_rapida" name="checkComida_rapida" value="1">
                            <label class="form-check-label" for="comida_rapida">Comida Rápida</label><br>
                            <input class="form-check-input" type="checkbox" id="checkGastronomia" name="checkGastronomia" value="1">
                            <label class="form-check-label" for="gastrsonomia">Gastronomía</label><br>

                        </div>

                        <div class="col-lg-5 row">

                            <label class="form-check-label mt-4" for="Otro">Otro: </label>
                            <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroTipoOferta" value="" placeholder="" id="txtOtroTipoOferta" require=""> <br><br>
                        </div>

                    </div>
                </div>
                <br>
                <div class="col-lg-5 mt-2">
                    <br>
                    <label for="">Horarios de servicio: </label>
                    <input class="form-control" type="text" name="txtHorario" value="" placeholder="" id="txtHorario" require="" required>
                    <br>
                </div>
            </div>
                    
            <br>

            <div class="row">
                <div class="col-lg-6">
                    <label for="">Datos de ID comercial: </label>
                    <input class="form-control" type="text" name="txtIdComercial" value="" placeholder="" id="txtIdComercial" require="">
                    <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Precios: </label>
                    <input class="form-control" type="text" name="txtPrecios" value="" placeholder="" id="txtPrecios" require="">
                    <br>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-lg-3">
                    <label for="">Aire Acondicionado: </label>
                    <select class="form-control" name="aireAcondicionado" id="aireAcondicionado" required>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select><br>
                </div>
                <div class="col-lg-3">
                    <label for="">Aceptan tarjetas de crédito: </label>
                    <select class="form-control" name="tarjetasCredito" id="tarjetasCredito" required>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select><br>
                </div>

                <div class="col-lg-3">
                    <label for="">Número de mesas: </label>
                    <input class="form-control" type="number" min="0" name="txtNumeroMesas" value="" placeholder="" id="txtNumeroMesas" require=""> <br>
                </div>
                <div class="col-lg-3">
                    <label for="">Número de sillas: </label>
                    <input class="form-control" type="number" min="0" name="txtNumeroSillas" value="" placeholder="" id="txtNumeroSillas" require="">
                </div>

            </div>
            <br>
            <br>           


            <div class="row ml-3">
                <div class="column col-lg-6">
                    <h3>Especialidad de oferta</h3>

                    <div class="col-lg-6 ml-3">
                        <input class="form-check-input" type="checkbox" id="checkCarnes" name="checkCarnes" value="1">
                        <label class="form-check-label" for="Carnes">Carnes</label><br>
                        <input class="form-check-input" type="checkbox" id="checkPescados_Mariscos" name="checkPescados_Mariscos" value="1">
                        <label class="form-check-label" for="Pescados_Mariscos">Pescados/Mariscos</label><br>
                        <input class="form-check-input" type="checkbox" id="checkPastas" name="checkPastas" value="1">
                        <label class="form-check-label" for="pastas">Pastas</label><br>
                    </div>


                    <div class="col-lg-6 ml-3">
                        <input class="form-check-input" type="checkbox" id="checkComida_vegetariana" name="checkComida_vegetariana" value="1">
                        <label class="form-check-label" for="comida_vegetariana">Comida Vegetariana</label><br>
                        <input class="form-check-input" type="checkbox" id="checkMixtas" name="checkMixtas" value="1">
                        <label class="form-check-label" for="Mixtas">Mixtas</label><br>
                        <input class="form-check-input" type="checkbox" id="checkComida_rapida" name="checkComida_rapida" value="1">
                        <label class="form-check-label" for="comida_rapida">Comida Rápida</label><br>

                    </div>

                    <div class="col-lg-6 row">

                        <label class="form-check-label mt-4" for="Otro">Otro: </label>
                        <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroEspecialidadOferta" value="" placeholder="" id="txtOtroEspecialidadOferta" require=""> <br><br>
                    </div>
                </div>


                <div class="column col-lg-6">
                    <h3>Tipos de servicio que presta:</h3>
                    <div class="ml-3 col-lg-6">

                        <input class="ml-4 form-check-input" type="checkbox" id="checkAlaCarta" name="checkAlaCarta" value="1">
                        <label class="ml-5 form-check-label" for="a_la_carta">A la carta</label><br>
                        <input class="ml-4 form-check-input" type="checkbox" id="checkBuffet" name="checkBuffet" value="1">
                        <label class="ml-5 form-check-label" for="buffet">Buffet</label><br>
                        <input class="ml-4 form-check-input" type="checkbox" id="checkComidaRapida" name="checkComidaRapida" value="1">
                        <label class="ml-5 form-check-label" for="comida_rapida">Comida Rápida</label><br>
                        <br>
                    </div>
                    <div class="col-lg-6 row">

                        <label class="form-check-label mt-4" for="Otro">Otro: </label>
                        <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtroTipoServicio" value="" placeholder="" id="txtOtroEspecialidadOferta" require=""> <br><br>
                    </div>
                </div>
            </div>



            <br>
            <br>
            <div class="col-lg-14 mx-2 row">
                <label for="">Observaciones: </label>
                <input class="form-control w-7" type="text" name="txtObservaciones" value="" placeholder="" id="txtObservaciones" require="">
            </div>
            <br>
            <br>


            <div class="text-center">
                <button class="btn btn-success" value="btnAgregar" type="submit" name="accion">Agregar</button>
                <!-- <button class="btn btn-primary" value="btnModificar" type="submit" name="accion">Modificar</button> -->
                <!-- <button class="btn btn-danger" value="btnEliminar" type="submit" name="accion">Eliminar</button> -->
                <a href="alimentosYBebidas.php" class="btn btn-danger" value="btnCancelar" type="submit" name="accion">Cancelar</a><br>
            </div>
        </form>
    </div>

    <footer class="footer mt-auto py-3 text-center">
        <div class="container">
            <span class="text-muted">© Abel Consuegra - 2020</span><br><br>
        </div>
    </footer>
</body>

</html>