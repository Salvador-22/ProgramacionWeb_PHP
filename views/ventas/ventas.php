<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos</title>
    <meta name="description" content="Autos">

    <!-- External CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/et-line.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" href="assets/css/plyr.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icon-114x114.png">
	<title>Ventas de Autos</title>
</head>
<body>
	<div class="loader-wrap" id="loader-wrap">
        <div class="cssload-loader"></div>
    </div>

    <nav class="navbar navbar-default" data-spy="affix" data-offset-top="60">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <img src="images/logo.png" alt="logo del sitio">
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right" id="one-page-nav">
                    <li><a href="index.php">Inicio</a></li>
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
					   <li><a class="dropdown-item" href="#">Otro</a></li>
					</ul>
					</li>
                    <li><a href="#ac">Clientes</a></li>
                    <li><a href="#r">Reparaciones</a></li>
                    <li><a href="#v">Ventas</a></li>
                    <li><a href="#e">Empleados</a></li>
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Autos
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altAutos.php">Alta</a></li>
					   <li><a class="dropdown-item" href="#">Modificación</a></li>
					</ul>
					</li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Navigation End -->



     <div class="main-wrap"> 

            <!-- Contact area -->
        <div id="aa" class="section contact-area">
            <div class="map-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 right-image " >
                           <div class="overlay-black"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-wrap text-white">
			<?PHP
			  if (isset($_POST['fechaCompra'])== null or isset($_POST['nombreVendedor'])==null)
              {  
			?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Generar venta de Auto</h3>
                            </div>
                            <form id="frmVentAuto" class="contact-form" action="ventas.php" method="post">
                                <p>
                                <label for="fechaCompra">Seleccione la fecha de compra</label>
                                <input id="fechaCompra" type="date" name="fechaCompra">
                                <script type="text/javascript">
                                	var today = new Date();
									var dd = String(today.getDate()).padStart(2, '0');
									var mm = String(today.getMonth() + 1).padStart(2, '0');
									var yyyy = today.getFullYear();
									today = yyyy + '-' + mm + '-' + dd;
									var fechaInp = document.getElementById('fechaCompra');
									fechaInp.setAttribute("min", today);
									fechaInp.setAttribute("max", "2021-12-31");
                                </script>
                                </p>
                                <p>
                                	<label for="cocheID">Seleccione el ID del coche que ser&aacute; vendido</label>
                              		<div class="form-group">
										<select class="form-control" id= "cocheID" name="cocheID">
                                    <?PHP
                                        if(isset($_POST['cocheID'])==null){
                                    ?>
									<option value="-1" selected >Selecciona el ID del coche</option>
									<?PHP
                                        require_once "php/cls_Autos.php";
                                        $sql = "SELECT id from coches;";
                                        $objAutos = new cls_Autos();
                                        $r = $objAutos->listAutos($sql);
                                        while ($r<> null) {
                                            echo "<option value='$r[0]'>$r[0]</option>";
                                            $r = $objAutos->sigAutos(); 
                                        }
                                        $objAutos->CerrarConn();
                                    }else{
                                        $range =isset($_POST['cocheID']);
                                       echo "<option value='$range' selected>$range</option>"; 
                                    }
									 	
									 ?>
										</select>
									</div>
                                </p>
								<p>
									<label>Modelo del coche</label>
                                    <?PHP
                                    if(isset($_POST['cocheID'])<> null){
                                        require_once "php/cls_Autos.php";
                                        $idcar = isset($_POST['cocheID']);
                                        $sql = "SELECT matricula from coches WHERE id = '$idcar';";
                                        $objAutos = new cls_Autos();
                                        $r = $objAutos->listAutos($sql);
                                        while ($r<> null) {
                                            echo "<input type='text' name='modCoche' id='modCoche' value='$r[0]' readonly>";
                                            $r = $objAutos->sigAutos(); 
                                        }
                                        $objAutos->CerrarConn();
                                    }else{
                                        echo "<input type='text' name='modCoche' id='modCoche' readonly>";
                                    }
                                    ?>
								</p>
								<p>
									<label>Clave o ID del vendedor</label>
									<div class="form-group">
										<select class="form-control" id= "vendedorID" name="vendedorID">
                                    <?PHP 
                                        if(isset($_POST['vendedorID'])==null){
                                    ?>
									  		<option value="-1" selected >Selecciona el ID del vendedor</option>
									 <?PHP
									 	require_once "php/cls_Autos.php";
                                        $sql = "SELECT id from empleados;";
                                        $objAutos = new cls_Autos();
                                        $r = $objAutos->listAutos($sql);
                                        while ($r<> null) {
                                            echo "<option value='$r[0]'>$r[0]</option>";
                                            $r = $objAutos->sigAutos(); 
                                        }
                                        $objAutos->CerrarConn();
                                    }else{
                                        $idvend =isset($_POST['vendedorID']);
                                       echo "<option value='$idvend' selected>$idvend</option>";  
                                    }
									 ?>
										</select>
									</div>
								</p>
                                <p>
                                    <label>Nombre del vendedor</label>
                                    <?PHP
                                    if(isset($_POST['vendedorID'])<> null){
                                        require_once "php/cls_Autos.php";
                                        $idcar = isset($_POST['vendedorID']);
                                        $sql = "SELECT nombre, apellido_pat, apellido_mat from empleados WHERE id = '$idcar';";
                                        $objAutos = new cls_Autos();
                                        $r = $objAutos->listAutos($sql);
                                        while ($r<> null) {
                                            echo "<input type='text' name='nombreVendedor' id='nombreVendedor' value='$r[0] $r[1] $r[2]' readonly>";
                                            $r = $objAutos->sigAutos(); 
                                        }
                                        $objAutos->CerrarConn();
                                    }else{
                                        echo "<input type='text' name='nombreVendedor' id='nombreVendedor' readonly>";
                                    }
                                    ?>
                                </p>

                                <p>
                                    <label>Clave o ID del cliente</label>
                                    <div class="form-group">
                                        <select class="form-control" id= "clienteID" name="clienteID">
                                    <?PHP 
                                        if(isset($_POST['clienteID'])==null){
                                    ?>
                                            <option value="-1" selected >Selecciona el ID del cliente</option>
                                     <?PHP
                                        require_once "php/cls_Autos.php";
                                        $sql = "SELECT id from clientes;";
                                        $objAutos = new cls_Autos();
                                        $r = $objAutos->listAutos($sql);
                                        while ($r<> null) {
                                            echo "<option value='$r[0]'>$r[0]</option>";
                                            $r = $objAutos->sigAutos(); 
                                        }
                                        $objAutos->CerrarConn();
                                    }else{
                                        $idclien =isset($_POST['clienteID']);
                                       echo "<option value='$idclien' selected>$idclien</option>";  
                                    }
                                     ?>
                                        </select>
                                    </div>
                                </p>					
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i> Guadar</button>
                                <p class="input-success">Congrates, your message is being sent</p>
                                <p class="input-error">Sorry, we failed to send your message, something's wrong</p>
                            </form>
                        </div>
                    </div>
                    <?PHP                         
                }else{
                    require_once "php/cls_Autos.php";
                    require_once "php/utiles.php";
                    $objUtiles = new utiles();
                    $objAutos = new cls_Autos();
                    $fech = isset($_POST['fechaCompra']);
                    $idcoche = isset($_POST['cocheID']);
                    $idvendedor = isset($_POST['vendedorID']);
                    $idcliente = isset($_POST['clienteID']);
                    $sql = "INSERT INTO ventas (fecha, id_coche, id_vendedor, id_cliente, estado_logico) VALUES ('$fech', '$idcoche', '$idvendedor', '$idcliente', '0');";
                    $r = $objAutos->insertAutos($sql);
                           if($r == "")
                              $objUtiles->Msgbox("'YA SE DIO DE ALTA EL AUTO'");
                           else
                               $objUtiles->Msgbox("'error!!!'");
                }
                ?> 
                </div>
                
            </div>
        </div>
        <!-- Contact area end -->
    </div>

    <footer>

        <!-- Footer copyrgiht and navigation -->
        <div class="copyright-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <p class="copyright">Copyright 2021 All Right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.nav.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.localScroll.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="assets/js/plyr.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="assets/js/jquery.stellar.min.js"></script>
    <script src="js/custom.js"></script>
</body>
</html>
