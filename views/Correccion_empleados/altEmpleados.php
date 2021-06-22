<?PHP
session_start();
if(isset($_SESSION['sessionwork']) != null)
{
	$us = $_SESSION['sessionwork'];
	$priv = $_SESSION['privilegios'];
	$sql = "SELECT count(*) FROM paginas WHERE nombre='altEmpleados.php' AND nivel=$priv;";
	// el resultado del query es: 1 muestra el alta y 0 sin privilegios
	require_once "php/cls_Empleados.php";
	$objEmpleado = new cls_Empleados();
	$r = $objEmpleado->listEmpleados($sql);
	if($r[0] == 1)
	{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
    <meta name="description" content="Empleados">

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
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="cerrar.php">Cerrar sesión: <?PHP echo $us?></a></li>
					</ul>
					</li>
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Empleados
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altEmpleados.php">Alta</a></li>
					   <li><a class="dropdown-item" href="modEmpleados.php">Modificación</a></li>
					   <li><a class="dropdown-item" href="delEmpleados.php">Eliminar</a></li>
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
			    //$modelo = $_POST["modelo"];
				if(isset($_POST['modelo']) == null)
				{
			?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Alta de Empleados</h3>
                            </div>
                            <form id="frmAltaEmpleados" class="contact-form" action="Empleados.php" method="post">
                                <p>
                                <input id="nombre" type="text" name="nombre" placeholder="Nombre" required>
                                </p>
                                <p>
                                <input id="apellidopat" type="text" name="apellidopat" placeholder="Apellido Paterno" required>
                                </p>
								<p>
                                <input id="apellidomat" type="text" name="apellidomat" placeholder="Apellido Materno" required>
                                </p>
								<p>
                                <input id="contratacion" type="text" name="contratacion" placeholder="Contratacion" required>
                                </p>
								<p>
                                <input id="salario" type="text" name="salario" placeholder="Salario" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "puesto" name="puesto">
									  <option value="-1" selected >Selecciona el puesto</option>
									  <?PHP
									  require_once "php/cls_Empleados.php";
									  //objeto para autos  |   0    1        
									  $sql = "SELECT DISTINCT id, nombre FROM puestos;";
									  $objEmpleados = new cls_Empleados();
									  $r = $objEmpleados->listEmpleados($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objEmpleados->sigEmpleados();										
									  }
									  $objEmpleados->CerrarConn();
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
					$pues = $_POST["puesto"];
					if($pues == -1) //-1 NO HA SELECIONADO NADA PUESTO
					{
			     ?>
               <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Alta de Empleado</h3>
                            </div>
                            <form id="frmAltaEmpleados" class="contact-form" action="Empleados.php" method="post">
                                 <p>
                                <input id="nombre" type="text" name="nombre" placeholder="Nombre" required>
                                </p>
                                <p>
                                <input id="apellidopat" type="text" name="apellidopat" placeholder="Apellido Paterno" required>
                                </p>
								<p>
                                <input id="apellidomat" type="text" name="apellidomat" placeholder="Apellido Materno" required>
                                </p>
								<p>
                                <input id="contratacion" type="text" name="contratacion" placeholder="Contratacion" required>
                                </p>
								<p>
                                <input id="salario" type="text" name="salario" placeholder="Salario" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "puesto" name="puesto">
									  <option value="-1" selected >Selecciona el puesto</option>
									  <?PHP
									  require_once "php/cls_Empleados.php";
									  //objeto para autos  |   0    1      2  
									  $sql = "SELECT DISTINCT id, nombre FROM puestos;";
									  $objEmpleados = new cls_Empleados();
									  $r = $objEmpleados->listEmpleados($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objEmpleados->sigEmpleados();										
									  }
									  $objEmpleados->CerrarConn();
									  ?>
									</select>
								</div>		
                                <?PHP
								if($pues == -1)
								{
									echo "<div class='col-sm-4'>
									        <small id='modeloHelp' class='text-danger'>
											  Debes seleccionar un modelo de lista
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
						$nom = $_POST['nombre'];
						$apellpat = $_POST['apellidopat'];
						$apellmat = $_POST['apellidopat'];
						$con = $_POST['contratacion'];
						$pues = $_POST['puesto'];
						//echo "|matricula: ". $mat ."| motor: ".$mot."| modelo: ". $mod."<br>";
						require_once "php/cls_Empleados.php";
						require_once "php/utiles.php";
						//objeto para utiles
						$objUtiles = new utiles();
						$objEmpleados = new cls_Empleados();
                       
						  $sql = "SELECT nombre FROM empleados WHERE nombre='$nom';";
						  $n = $objEmpleados->existEmpleado($sql);
						  if($n == 0)
						  {
						   $sql = "INSERT INTO empleados VALUES ('','$nom','$apellidopat','$apellidomat', '$contratacion',$puesto, '1');";
						  //Ok la validacion matricula: guardar a la base de datos
						   $r = $objEmpleados->insertEmpleados($sql);
						   if($r == "")
						      $objUtiles->Msgbox("'YA SE DIO DE ALTA EL AUTO'");
						   else
							   $objUtiles->Msgbox("'error!!!'");
						  }
						  else
							  $objUtiles->Msgbox("'Error: Ya existe el auto'");
							  
												  
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
	}
	else{
		  header("Location: http://localhost/autos/");
	}
}
else{
		  header("Location: http://localhost/autos/");
	}
?>

