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
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Reparaciones
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altReparaciones.php">Alta</a></li>
					   <li><a class="dropdown-item" href="listar_reparaciones.php">Listar</a></li>
					</ul>
					</li>
                    <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Empleados
					</a>
					<ul  class="dropdown-menu" aria-labelledby="navbarDropdown">
					   <li><a class="dropdown-item" href="altEmpleados.php">Alta</a></li>
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
			    //$puesto = $_POST["puesto"];
                require_once "php/cls_Empleados.php";
                $id_empleado = $_GET['id'];
                $objSrc = new cls_Empleados();
                $sqlSrcEmpleado = "SELECT e.id, e.nombre, e.apellido_pat, e.apellido_mat, e.contratacion, e.salario, p.nombre, p.id 
                FROM empleados e JOIN puesto p ON e.id_puesto = p.id 
                WHERE e.id = $id_empleado;";
                $rsSrc = $objSrc->listEmpleados($sqlSrcEmpleado);
                $objSrc->CerrarConn();
				if(isset($_POST['puesto']) == null || isset($_GET['id']) == null)
				{
			?>
                <div class="container">
				 <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Modificación de Empleados</h3>
                            </div>
                            <h4>id :<?= $id_auto ?></h4>
                            <form id="frmAltaEmpleados" class="contact-form" action="eliEmpleados.php" method="post">
                                <p>
                                <input id="id" name="id" value=<?= $id_auto ?> type="hidden">
                                </p>
                                <p>
                                <input id="nombre" type="text" name="nombre" placeholder="Nombre" required>
                                </p>
                                <p>
                                <input id="apellidopat" type="apellidopat" name="apellidopat" placeholder="Apellido Paterno" required>
                                </p>
								<p>
                                <input id="apellidomat" type="apellidomat" name="apellidomat" placeholder="Apellido Materno" required>
                                </p>
								<p>
                                <input id="contratacion" type="contratacion" name="contratacion" placeholder="Contratacion" required>
                                </p>
								<p>
                                <input id="salario" type="salario" name="salario" placeholder="Salario" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "puesto" name="puesto">
									  <option value="-1" selected >Selecciona el puesto</option>
									  <?PHP
									  //objeto para autos  |   0    1        
									  $sql = "SELECT DISTINCT id, nombre, FROM puesto;";
									  $objEmpleados = new cls_Empleados();
									  $r = $objEmpleados->listEmpleados($sql);
									  while($r <> null)
									  {
                                        if ($r[0] == $rsSrc[1]) {
										    echo "<option selected value='$r[0]'> $r[1] </option>";
                                        }else{
										    echo "<option value='$r[0]'> $r[1] </option>";
                                        }
                                        $r = $objEmpleados->sigEmpleados();
									  }
									  $objEmpleados->CerrarConn();
									  ?>
									</select>
								</div>								
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i> Actualizar</button>
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
					if($pues == -1) //-1 NO HA SELECIONADO NADA MODELO
					{
			     ?>
               <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Modificación de Empleados</h3>
                            </div>
                            <h4>id :<?= $id_auto ?></h4>
                            <form id="frmAltaEmpleados" class="contact-form" action="intEmpleados.php" method="post">
                                <p>
                                <input id="nombre" type="text" name="nombre" placeholder="Nombre" required>
                                </p>
                                <p>
                                <input id="apellidopat" type="apellidopat" name="apellidopat" placeholder="Apellido Paterno" required>
                                </p>
								<p>
                                <input id="apellidomat" type="apellidomat" name="apellidomat" placeholder="Apellido Materno" required>
                                </p>
								<p>
                                <input id="contratacion" type="contratacion" name="contratacion" placeholder="Contratacion" required>
                                </p>
								<p>
                                <input id="salario" type="salario" name="salario" placeholder="Salario" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "empleado" name="empleado">
									  <option value="-1" selected >Selecciona el empleado</option>
									  <?PHP
									  //objeto para autos  |   0    1      2  
									  $sql = "SELECT DISTINCT id, nombre, FROM puesto;";
									  $objEmpleados = new cls_Empleados();
									  $r = $objEmpleados->listEmpleados($sql);
									  while($r <> null)
									  {
                                        if ($r[0] == $rsSrc[2]) {
										    echo "<option selected value='$r[0]'> $r[1] </option>";
                                        }else{
										    echo "<option value='$r[0]'> $r[1] </option>";
                                        }
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
									        <small id='empleadoHelp' class='text-danger'>
											  Debes seleccionar un empleado de lista
											</small>
									      </div>";
								}
                                ?>						
                                <button type="submit" class="btn"><i class="fa fa-paper-plane"></i> Actualizar</button>
                                <p class="input-success">Congrates, your message is being sent</p>
                                <p class="input-error">Sorry, we failed to send your message, something's wrong</p>
                            </form>
                        </div>
                    </div>
                </div>				 
				 
			    <?PHP
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
