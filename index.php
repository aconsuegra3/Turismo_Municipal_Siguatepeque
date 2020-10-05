<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo Municipal Siguatepeque</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column h-100 ">

    <nav class="navbar bg-dark navbar-dark">        
        <a class="mr-auto ml-4" href="../index.php"><i class="fas fa-home text-light" style="font-size: 25px;"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="index.php"> <i class="fas fa-home mr-1"></i> Inicio</a>
                </li>
                <li class="nav-item mx-auto ">
                    <a class="nav-link" href="alojamiento/alojamiento.php"><i class="fas fa-hotel mr-1"></i> Alojamiento</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link" href="alimentos_y_bebidas/alimentosYBebidas.php"><i class="fas fa-utensils mr-1"></i> Alimentos y bebidas</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mt-5 mb-5">Turismo Municipal Siguatepeque</h1>
        <div class="container" style="display: flex; flex-direction: column; align-items:center;">
            <a class="btn btn-primary my-3 w-75" href="alojamiento/alojamiento.php">Servicios de alojamiento</a>
            <a class="btn btn-primary my-3 w-75" href="alimentos_y_bebidas/alimentosYBebidas.php">Alimentos y bebidas</a>            
        </div>
    </div>

    <footer class="footer mt-5 py-3 text-center">
        <div class="container">
            <span class="text-muted">© Abel Consuegra - 2020</span><br><br>
        </div>
    </footer>
</body>

</html>