<?PHP
session_start();
$priv = $_SESSION['privilegios'];
$us = $_SESSION['sessionwork'];
$sql = "SELECT count(*) FROM paginas WHERE nombre='altEmpleados.php' AND nivel = $priv;";
require_once('php/cls_Autos.php');
$objAuto = new cls_Autos();
$r = $objAuto->listAutos($sql);
if ($r[0] == 1) {  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
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

    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.min.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- Preloader -->
    <div class="loader-wrap" id="loader-wrap">
        <div class="cssload-loader"></div>
    </div>
    <!-- Preloader End -->

    <!-- Navigation -->
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
					    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
                        <ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="login.php">Iniciar sesión</a></li>
                            <li><a class="dropdown-item" href="cerrar.php">Cerrar sesión</a></li>
                            <li><a class="dropdown-item" href="#">Otro</a></li>
                        </ul>
					</li>
                    <li><a href="#ac">Clientes</a></li>
                    <li><a href="#r">Reparaciones</a></li>
                    <li><a href="#v">Ventas</a></li>
                    <li><a href="#e">Empleados</a></li>
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Autos</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altAutos.php">Alta</a></li>
					   <li><a class="dropdown-item" href="views/autos/modf_autos.php">Modificación</a></li>
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
				if(isset($_POST['puesto']) == null)
				{
			?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Alta de Empleados</h3>
                            </div>
                            <form id="frmAltaEmp" class="contact-form" action="altEmpleados.php" method="post">
                                <p>
                                <input id="nombre" type="text" name="nombre" placeholder="nombre" required>
                                </p>
                                <p>
                                <input id="apePat" type="text" name="apePat" placeholder="Apellido Paterno" required>
                                </p>
                                <p>
                                <input id="apeMat" type="text" name="apeMat" placeholder="Apellido Materno" required>
                                </p>
                                <p>
                                <input id="contratacion" type="date" name="contratacion" placeholder="contratacion" required>
                                </p>
                                <p>
                                <input id="salario" type="text" name="salario" placeholder="salario" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "puesto" name="puesto">
									  <option value="-1" selected >Selecciona el puesto</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para autos  |   0    1      2  
									  $sql = "SELECT DISTINCT id, nombre FROM puestos;";
									  $objAutos = new cls_Autos();
									  $r = $objAutos->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objAutos->sigAutos();										
									  }
									  $objAutos->CerrarConn();
									  ?>
									</select>
								</div>								
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i> Guadar</button>
                                <p class="input-success">Congrates, your message is being sent</p>
                                <p class="input-error">Sorry, we failed to send your message, something's wrong</p>
                            </form>
                        </div>
                    </div>
                </div>
				<?PHP
				}else{
					/*recarga la pag, ahora si existe las varibles de 
					POST*/
					$puesto = $_POST["puesto"];
					if($puesto == -1) //-1 NO HA SELECIONADO NADA puesto
					{
			     ?>
               <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Alta de Empleados</h3>
                            </div>
                            <form id="frmAltaEmp" class="contact-form" action="altEmpleados.php" method="post">
                                <p>
                                <input id="nombre" type="text" name="nombre" placeholder="nombre" required>
                                </p>
                                <p>
                                <input id="apePat" type="text" name="apePat" placeholder="Apellido Paterno" required>
                                </p>
                                <p>
                                <input id="apeMat" type="text" name="apeMat" placeholder="Apellido Materno" required>
                                </p>
                                <p>
                                <input id="contratacion" type="date" name="contratacion" placeholder="contratacion" required>
                                </p>
                                <p>
                                <input id="salario" type="text" name="salario" placeholder="salario" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "puesto" name="puesto">
									  <option value="-1" selected >Selecciona el puesto</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para autos  |   0    1      2  
									  $sql = "SELECT DISTINCT id, nombre FROM puestos;";
									  $objAutos = new cls_Autos();
									  $r = $objAutos->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objAutos->sigAutos();										
									  }
									  $objAutos->CerrarConn();
									  ?>
									</select>
								</div>	
                                <?PHP
								if($puesto == -1)
								{
									echo "<div class='col-sm-4'>
									        <small id='modeloHelp' class='text-danger'>
											  Debes seleccionar un puesto de lista
											</small>
									      </div>";
								}
                                ?>								
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i> Guadar</button>
                                <p class="input-success">Congrates, your message is being sent</p>
                                <p class="input-error">Sorry, we failed to send your message, something's wrong</p>
                            </form>
                        </div>
                    </div>
                </div>				 
				 
			    <?PHP
					}
					else{
                        $nomb = $_POST['nombre'];
                        $apPat = $_POST['apePat'];
                        $apMat = $_POST['apeMat'];
                        $hdate = $_POST['contratacion'];
                        $salario = $_POST['salario'];
                        
						require_once "php/cls_Autos.php";
						require_once "php/utiles.php";
						$objUtiles = new utiles();
						$objAutos = new cls_Autos();
                        if(ctype_alpha(str_replace(' ', '', $nomb)) && ctype_alpha(str_replace(' ', '', $apPat)) && ctype_alpha(str_replace(' ', '', $apMat)))
						{
                            $sql = "INSERT INTO empleados VALUES ('', '$nomb', '$apPat', '$apMat', '$hdate', $salario, $puesto, 1);";
                            echo $sql;
                            $r = $objAutos->insertAutos($sql);
                            if ($r == ""){
                                $objUtiles->Msgbox("'Empleado dado de alta'");
                            }
                            else{
                                $objUtiles->Msgbox("'error!!!'");
                            }
						}
                        else{
                            $objUtiles->Msgbox("'Verifique datos ingresados'");
                        }
					}
				}
				?>
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
                        <p class="copyright">Copyright 2021 @ Gpo 186601 - <a href="https://toluca.tecnm.mx/" target="new">ITTOLUCA</a> -</p>
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
<?PHP 
}else{
    require_once "php/utiles.php";
    $objUtl = new utiles();
    $objUtl->MsgBox("'GUARDIAS, SUELTEN A LOS PERROS'");
    header("refresh: 1; url=index.php");
}
?>