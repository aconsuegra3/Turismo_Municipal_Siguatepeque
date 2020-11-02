<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Sistema para registrar los lugares turisticos de Siguatepeque" />
    <meta name="author" content="Abel Consuegra" />
    <title>Turismo Siguatepeque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <link rel="icon" href="img/logo_turismo.png">
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/a018cd853a.js" crossorigin="anonymous"></script>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="css/estilos.css" rel="stylesheet" />
    <!-- <link rel="icon" href="img/logo_muni.png"> -->
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-#32357b px-2">
        <button class="btn btn-link btn-sm order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <!-- <a class="ml-2" href="index.php"></a> -->
        <img class="ml-2" src="img/logo_turismo.png" width="50px" alt="">

        <!-- <a class="m-auto" href="index.php"><img src="img/logo_muni.png" width="40px" alt=""></a> -->
        <p class="text-light mt-3 ml-2">Turismo Municipal Siguatepeque</p>
        
        <div class="fecha mr-1 ml-auto text-light " >
            
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
                        <a class="mt-3 mx-auto" href="index.php"><img src="img/logo_muni.png" width="100px" alt=""></a>
                        <a class="nav-link mt-3" href="index.php">
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
                                <a class="nav-link" href="alojamiento/alojamiento.php" ><i class="fas fa-eye"></i> &nbsp; Ver todos</a>
                                <a class="nav-link" href="alojamiento/agregar_alojamiento.php"><i class="fas fa-plus"></i> &nbsp; Agregar nuevo</a>
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
                                <a class="nav-link" href="alimentos_y_bebidas/alimentosYBebidas.php"><i class="fas fa-eye"></i> &nbsp; Ver todos</a>
                                <a class="nav-link" href="alimentos_y_bebidas/agregar.php"><i class="fas fa-plus"></i> &nbsp; Agregar nuevo</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="assets/manual_de_usuario.pdf" target="_blank">
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
            <main class="mainInicio">
                <div class="container contenedorInicio align-items-center">
                    <!-- <h1 class="text-center mt-5 mb-5">Turismo Municipal Siguatepeque</h1> -->
                    <img class=" mb-4" src="img/banner_muni.jpg" alt="Turismo Municipal Siguatepeque">
                    <div class="container mt-4 menuInicio" style="display: flex; flex-direction: column; align-items:center;">
                        <a class="btn btn-success my-3 " href="alojamiento/alojamiento.php">SERVICIOS DE ALOJAMIENTO</a>
                        <a class="btn btn-success my-3 mt-4" href="alimentos_y_bebidas/alimentosYBebidas.php">ALIMENTOS Y BEBIDAS</a>
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
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    
</body>

</html>