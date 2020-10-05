<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios de Alojamiento</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100 ">

    <nav class="navbar bg-dark navbar-dark">
        <a title="Atrás" href="alojamiento.php"><i class="fas fa-arrow-left text-light" style="font-size: 25px;"></i></a>
        <a title="Inicio" class="mr-auto ml-4" href="../index.php"><i class="fas fa-home text-light" style="font-size: 25px;"></i></a>
        <button title="Menú" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="../index.php"> <i class="fas fa-home mr-1"></i> Inicio</a>
                </li>
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="alojamiento.php"><i class="fas fa-hotel mr-1"></i> Alojamiento</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="../alimentos_y_bebidas/alimentosYBebidas.php"><i class="fas fa-utensils mr-1"></i> Alimentos y bebidas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-3">        
        <form class="form-group" action="" method="post" enctype="multipart/form-data">

            <h3 class="mt-4 text-center">INGRESO DE EMPRESAS DE SERVICIO DE ALOJAMIENTO</h3>
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
                <div class="col-lg-6">
                    <label for="">Horarios de servicio: </label>
                    <input class="form-control" type="text" name="txtHorario" value="" placeholder="" id="txtHorario" require="" required>
                    <br>
                </div>

                <div class="col-lg-6">
                    <label for="">Tipo de alojamiento: </label>
                    <select class="form-control" name="tipoAlojamiento" id="tipoAlojamiento" required>
                        <option value="Hotel">Hotel</option>
                        <option value="Apart.hotel">Apart.hotel</option>
                        <option value="Tiempo_Compartido">Tiempo Compartido</option>
                        <option value="Campamento">Campamento</option>
                        <option value="Albergue">Albergue</option>
                        <option value="Huespedes">Casa de Huéspedes</option>
                        <option value="Motel">Motel</option>
                        <option value="Villas">Villas, Cabañas</option>
                        <option value="Hospedaje">Hospedaje</option>
                    </select>
                </div>
            </div>

            <br>
            <h4 for="">Tarifas </h4>
            <br>
            <div class="row">
                <div class="col-lg-4">
                    <label for="">Sencilla: </label>
                    <input class="form-control" type="number" min="0" name="txtSencilla" value="" placeholder="" id="txtSencilla" require="">
                </div>
                <div class="col-lg-4">
                    <label for="">Doble: </label>
                    <input class="form-control" type="number" min="0" name="txtDoble" value="" placeholder="" id="txtDoble" require="">
                </div>
                <div class="col-lg-4">
                    <label for="">Triple: </label>
                    <input class="form-control" type="number" min="0" name="txtTriple" value="" placeholder="" id="txtTriple" require="">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-4">
                    <label for="">Cuádruple: </label>
                    <input class="form-control" type="number" min="0" name="txtCuadruple" value="" placeholder="" id="txtCuadruple" require="">
                </div>
                <div class="col-lg-4">
                    <label for="">Suite: </label>
                    <input class="form-control" type="number" min="0" name="txtSuite" value="" placeholder="" id="txtSuite" require="">
                </div>
                <div class="col-lg-4">
                    <label for="">Suite Presidencial: </label>
                    <input class="form-control" type="number" min="0" name="txtSuitePresidencial" value="" placeholder="" id="txtSuitePresidencial" require="">
                </div>

            </div>
            <br>

            <div class="row">
                <div class="col-lg-6">
                    <label for="">Numero de camas: </label>
                    <input class="form-control" type="number" min="0" name="txtNumeroCamas" value="" placeholder="" id="txtNumeroCamas" require="">
                    <br>
                </div>
                <div class="col-lg-6">
                    <label for="">Numero de habitaciones: </label>
                    <input class="form-control" type="number" min="0" name="txtNumeroHabitaciones" value="" placeholder="" id="txtNumeroHabitaciones" require="">

                </div>
            </div>
            <br>

            <h3>Servicios</h3>
            <div class="row ml-3">

                <div class="col-lg-4 ml-3">
                    <input class="form-check-input" type="checkbox" id="checkTelefono" name="checkTelefono" value="1">
                    <label class="form-check-label" for="telefono">Teléfono</label><br>
                    <input class="form-check-input" type="checkbox" id="checkTelevision" name="checkTelevision" value="1">
                    <label class="form-check-label" for="television">Televisión</label><br>
                    <input class="form-check-input" type="checkbox" id="checkWifi" name="checkWifi" value="1">
                    <label class="form-check-label" for="Wifi">Wifi</label><br>
                    <input class="form-check-input" type="checkbox" id="checkPos" name="checkPos" value="1">
                    <label class="form-check-label" for="POS">POS</label><br>
                    <input class="form-check-input" type="checkbox" id="checkAguaCaliente" name="checkAguaCaliente" value="1">
                    <label class="form-check-label" for="AguaCaliente">Agua Caliente</label><br>
                </div>


                <div class="col-lg-4 ml-3">
                    <input class="form-check-input" type="checkbox" id="checkAireAcondicionado" name="checkAireAcondicionado" value="1">
                    <label class="form-check-label" for="AireAcondicionado">Aire Acondicionado</label><br>
                    <input class="form-check-input" type="checkbox" id="checkCafeteria" name="checkCafeteria" value="1">
                    <label class="form-check-label" for="Cafeteria">Cafeteria</label><br>
                    <input class="form-check-input" type="checkbox" id="checkVentilador" name="checkVentilador" value="1">
                    <label class="form-check-label" for="Ventilador">Ventilador</label><br>
                    <input class="form-check-input" type="checkbox" id="checkEstacionamiento" name="checkEstacionamiento" value="1">
                    <label class="form-check-label" for="Estacionamiento">Estacionamiento</label><br>
                    <input class="form-check-input" type="checkbox" id="checkLavanderia" name="checkLavanderia" value="1">
                    <label class="form-check-label" for="Lavanderia">Lavandería</label><br>
                </div>

                <div class="col-lg-4 row">

                    <label class="form-check-label mt-4" for="Otro">Otro: </label>
                    <input class="form-control w-75 ml-3 mt-3" type="text" name="txtOtro" value="" placeholder="" id="txtOtro" require=""> <br><br>
                </div>

            </div>

            <br>
            <div class="row mx-auto mt-2" style="justify-content:center;">
                <div class="col-lg-3">
                    <label for="">Servicio de desayuno incluido: </label>
                    <select class="form-control" name="desayunoIncluido" id="desayunoIncluido" required>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select><br>
                </div>

                <div class="col-lg-3">
                    <label for="">Capacidad del salón de eventos: </label>
                    <input class="form-control" type="number" min="0" name="txtSalonEventos" value="" placeholder="" id="txtSalonEventos" require="">

                </div>

            </div>
            <br>
            <h3>Estancia de los huéspedes</h3>
            <div class="row ml-3 text-center mt-3 mb-4">
                <h5>Procedencia: </h5>
                <div class="col-lg-3 ml-3">
                    <input class="form-check-input" type="checkbox" id="checkLocales" name="checkLocales" value="1">
                    <label class="form-check-label" for="Locales">Locales</label><br>
                </div>
                <div class="col-lg-3 ml-3">
                    <input class="form-check-input" type="checkbox" id="checkNacionales" name="checkNacionales" value="1">
                    <label class="form-check-label" for="Nacionales">Nacionales</label><br>
                </div>
                <div class="col-lg-3 ml-3">
                    <input class="form-check-input" type="checkbox" id="checkExtranjeros" name="checkExtranjeros" value="1">
                    <label class="form-check-label" for="Extranjeros">Extranjeros</label><br>
                </div>
            </div>            

            <div class="text-center">
                <button class="btn btn-success" value="btnAgregar" type="submit" name="accion">Agregar</button>
                <!-- <button class="btn btn-primary" value="btnModificar" type="submit" name="accion">Modificar</button> -->
                <!-- <button class="btn btn-danger" value="btnEliminar" type="submit" name="accion">Eliminar</button> -->
                <a href="alojamiento.php" class="btn btn-danger" value="btnCancelar" type="submit" name="accion">Cancelar</a><br>
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