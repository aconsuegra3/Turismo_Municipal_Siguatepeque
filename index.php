<!-- cambiar el tipo hotel, agregar piscina, cambiar colores -->

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo Municipal Siguatepeque</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilos.css">

    <link rel="icon" href="img/logo_muni.png">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100 ">

    <nav class="navbar navbar-dark">
        <!-- <a class="mr-auto ml-4" href="index.php"><i class="fas fa-sync-alt text-light" style="font-size: 25px;"></i></a> -->
        <a class="mr-auto" href="index.php"><img src="img/logo_turismo.png" width="50px" alt=""></a>
        <div class="mr-5 text-light">
            <script type="text/javascript">
                var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                var f = new Date();
                document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " del " + f.getFullYear());
            </script>
        </div>
        <script type="text/javascript">
            function startTime() {
                today = new Date();
                h = today.getHours();
                m = today.getMinutes();
                s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                document.getElementById('reloj').innerHTML = h + ":" + m + ":" + s;
                t = setTimeout('startTime()', 500);
            }

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            window.onload = function() {
                startTime();
            }
        </script>
        <div class="text-light mr-5" id="reloj" style="font-size:20px;"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-auto ">
                    <hr class="my-0" width="400px"> <a class="nav-link text-center" href="index.php"> <i class="fas fa-home mr-1"></i> Inicio</a>
                    <hr class="my-0">
                </li>
                <li class="nav-item mx-auto ">
                    <a class="nav-link text-center" href="alojamiento/alojamiento.php"><i class="fas fa-hotel mr-1"></i> Alojamiento</a>
                    <hr class="my-0" width="400px">
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link text-center" href="alimentos_y_bebidas/alimentosYBebidas.php"><i class="fas fa-utensils mr-1"></i> Alimentos y bebidas</a>
                    <hr class="my-0" width="400px">
                </li>
            </ul>
        </div>
    </nav>

    <div class="container contenedorInicio align-items-center">
        <!-- <h1 class="text-center mt-5 mb-5">Turismo Municipal Siguatepeque</h1> -->
        <img class=" mb-4" src="img/banner_muni.jpg" alt="Turismo Municipal Siguatepeque">
        <div class="container mt-4 menuInicio" style="display: flex; flex-direction: column; align-items:center;">
            <a class="btn btn-success my-3 " href="alojamiento/alojamiento.php">SERVICIOS DE ALOJAMIENTO</a>
            <a class="btn btn-success my-3 mt-4" href="alimentos_y_bebidas/alimentosYBebidas.php">ALIMENTOS Y BEBIDAS</a>
        </div>
    </div>

    <footer class="footer mt-3 py-3 text-center">
        <div class="container">
            <hr>
            <span class="text-muted">© Abel Consuegra - 2020</span><br><br>
        </div>
    </footer>
</body>

</html>