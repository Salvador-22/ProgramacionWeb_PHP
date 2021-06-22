<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados</title>
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
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="Site Logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right" id="one-page-nav">
                    <li><a href="#banner">Inicio</a></li>
                    <li><a href="#au">Usuarios</a></li>
                    <li><a href="#ac">Clientes</a></li>
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Reparaciones
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altReparaciones.php">Alta</a></li>
					   <li><a class="dropdown-item" href="listar_reparaciones.php">Listar</a></li>
					</ul>
                    <li><a href="#v">Ventas</a></li>
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Empleados
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altEmpleados.php">Alta</a></li>
					   <li><a class="dropdown-item" href="modEmpleados.php">Modificación</a></li>
					   <li><a class="dropdown-item" href="delEmpleados.php">Eliminar</a></li>
					</ul>
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Autos
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altAutos.php">Alta</a></li>
					   <li><a class="dropdown-item" href="modAutos.php">Modificación</a></li>
					</ul>
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
			    //$modelo = $_POST["puesto"];
				if(isset($_POST['puesto']) == null)
				{
			?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Agregar Reparaciones</h3>
                            </div>
                            <form id="frmAltaEmpleados" class="contact-form" action="Empleados.php" method="post">
                                <label for="start">Start date:</label>
								<input type="date" id="fecha" name="fecha"
                                   value="2021-06-22"
                                 min="2021-01-01" max="2021-12-31">
                                <p>
                                <input id="hora" type="hora" name="hora" placeholder="Hora" required>
                                </p>
								<label for="appt">Ingrese la hora:</label>
                                <input type="time" id="hora" name="hora"
                                 min="01:00" max="24:00" required>
								<div class="form-group">
									<select class="form-control" id= "coche" name="coche">
									  <option value="-1" selected >Selecciona el coche</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para autos  |   0    1        
									  $sql = "SELECT DISTINCT id, matricula FROM Autos;";
									  $objAutos- = new cls_Autos();
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
                                <div class="form-group">
									<select class="form-control" id= "mecanico" name="mecanico">
									  <option value="-1" selected >Selecciona el mecanico</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para mecanico| 0      1        2     3       
									  $sql = "SELECT DISTINCT e.id, e.nombre, p.id, p.nombre 
									          FROM empleados e JOIN puestos p ON a.id_puesto = p.id
											  WHERE p.nombre = 'mecanico';";
									  $objMecanico- = new cls_Autos();
									  $r = $objMecanico->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objMecanico->sigAutos();										
									  }
									  $objMecanico->CerrarConn();
									  ?>
									</select>
								</div>	
                                <div class="form-group">
									<select class="form-control" id= "cliente" name="cliente">
									  <option value="-1" selected >Selecciona el mecanico</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para clientes |   0      1        2     3       
									  $sql = "SELECT DISTINCT id, nombre
									          FROM clientes
											  WHERE estado_logico = '0';";
									  $objClientes- = new cls_Autos();
									  $r = $objClientes->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objClientes->sigAutos();										
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
					$coch = $_POST["coche"];
					$mec = $_POST["mecanico"];
					$clie = $_POST["cliente"];
					if($coch == -1 && $mec == -1 && $clie == -1) //-1 NO HA SELECIONADO NADA PUESTO
					{
			     ?>
               <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Agregar Reparaciones</h3>
                            </div>
                            <form id="frmAltaEmpleados" class="contact-form" action="Empleados.php" method="post">
                                <label for="start">Start date:</label>
								<input type="date" id="start" name="trip-start"
                                   value="2021-06-22"
                                 min="2021-01-01" max="2021-12-31">
                                <p>
                                <input id="hora" type="hora" name="hora" placeholder="Hora" required>
                                </p>
								<label for="appt">Ingrese la hora:</label>
                                <input type="time" id="hora" name="hora"
                                 min="01:00" max="24:00" required>
								<div class="form-group">
									<select class="form-control" id= "coche" name="coche">
									  <option value="-1" selected >Selecciona el coche</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para autos  |   0    1        
									  $sql = "SELECT DISTINCT id, matricula FROM Autos;";
									  $objAutos- = new cls_Autos();
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
                                <div class="form-group">
									<select class="form-control" id= "mecanico" name="mecanico">
									  <option value="-1" selected >Selecciona el mecanico</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para mecanico| 0      1        2     3       
									  $sql = "SELECT DISTINCT e.id, e.nombre, p.id, p.nombre 
									          FROM empleados e JOIN puestos p ON a.id_puesto = p.id
											  WHERE p.nombre = 'mecanico';";
									  $objMecanico- = new cls_Autos();
									  $r = $objMecanico->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objMecanico->sigAutos();										
									  }
									  $objMecanico->CerrarConn();
									  ?>
									</select>
								</div>	
                                <div class="form-group">
									<select class="form-control" id= "mecanico" name="mecanico">
									  <option value="-1" selected >Selecciona el mecanico</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para clientes |   0      1        2     3       
									  $sql = "SELECT DISTINCT id, nombre
									          FROM clientes
											  WHERE estado_logico = '0';";
									  $objClientes- = new cls_Autos();
									  $r = $objClientes->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1]</option>";
                                        $r = $objClientes->sigAutos();										
									  }
									  $objAutos->CerrarConn();
									  ?>
									</select>
								</div>		
                                <?PHP
								if($coch == -1)
								{
									echo "<div class='col-sm-4'>
									        <small id='modeloHelp' class='text-danger'>
											  Debes seleccionar un auto de la lista
											</small>
									      </div>";
								}
								if($mec == -1)
								{
									echo "<div class='col-sm-4'>
									        <small id='modeloHelp' class='text-danger'>
											  Debes seleccionar un modelo un mecanico de la lista
											</small>
									      </div>";
								}
								if($clie == -1)
								{
									echo "<div class='col-sm-4'>
									        <small id='modeloHelp' class='text-danger'>
											  Debes seleccionar un cliente de lista
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
						$fech = $_POST['fecha'];
						$horas = $_POST['hora'];
						$idcoche = $_POST['coche'];
						$idmec = $_POST['mecanico'];
						$idclie = $_POST['cliente'];
						//echo "|matricula: ". $mat ."| motor: ".$mot."| modelo: ". $mod."<br>";
						require_once "php/cls_Reparacioness.php";
						//objeto para utiles
						$objUtiles = new utiles();
						$objReparaciones = new cls_Reparaciones();
                       
						   $sql = "INSERT INTO reparaciones VALUES ('','$fech','$horas','$idcoche', '$idmec',$idclie, '1');";
						  //Ok la validacion matricula: guardar a la base de datos
						   $r = $objReparacions->insertEmpleados($sql);
						   if($r == "")
						      $objUtiles->Msgbox("'SE AÑADIO LA REPARACION'");
						   else
							   $objUtiles->Msgbox("'error!!!'");
						  
												  
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
