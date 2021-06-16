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
                    <li><a href="#r">Reparaciones</a></li>
                    <li><a href="#v">Ventas</a></li>
                    <li><a href="#e">Empleados</a></li>
                    <li><a href="#aa">Alta Autos</a></li>
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
                                <h3 class="section-title">Alta de Autos</h3>
                            </div>
                            <form id="frmAltaAutos" class="contact-form" action="Autos.php" method="post">
                                <p>
                                <input id="matricula" type="text" name="matricula" placeholder="Matricula" required>
                                </p>
                                <p>
                                <input id="motor" type="text" name="motor" placeholder="Motor" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "modelo" name="modelo">
									  <option value="-1" selected >Selecciona el modelo</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para autos  |   0    1      2  
									  $sql = "SELECT DISTINCT id, marca, modelo FROM modelo;";
									  $objAutos = new cls_Autos();
									  $r = $objAutos->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1] : $r[2]</option>";
                                        $r = $objAutos->sigAutos();										
									  }
									  $objAutos->CerrarConn();
									  ?>
									  <!-- 
									  <option value="Uno">Uno</option>
									  <option value="Dos">Dos</option> -->
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
					$mod = $_POST["modelo"];
					if($mod == -1) //-1 NO HA SELECIONADO NADA MODELO
					{
			     ?>
               <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Alta de Autos</h3>
                            </div>
                            <form id="frmAltaAutos" class="contact-form" action="Autos.php" method="post">
                                <p>
                                <input id="matricula" type="text" name="matricula" placeholder="Matricula" required>
                                </p>
                                <p>
                                <input id="motor" type="text" name="motor" placeholder="Motor" required>
                                </p>
								<div class="form-group">
									<select class="form-control" id= "modelo" name="modelo">
									  <option value="-1" selected >Selecciona el modelo</option>
									  <?PHP
									  require_once "php/cls_Autos.php";
									  //objeto para autos
									  $sql = "SELECT DISTINCT id, marca, modelo FROM modelo;";
									  $objAutos = new cls_Autos();
									  $r = $objAutos->listAutos($sql);
									  while($r <> null)
									  {
										echo "<option value='$r[0]'> $r[1] : $r[2]</option>";
                                        $r = $objAutos->sigAutos();										
									  }
									  $objAutos->CerrarConn();
									  ?>
									</select>
								</div>	
                                <?PHP
								if($mod == -1)
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
						$mat = $_POST['matricula'];
						$mot = $_POST['motor'];
						$mod = $_POST['modelo'];
						//echo "|matricula: ". $mat ."| motor: ".$mot."| modelo: ". $mod."<br>";
						require_once "php/cls_Autos.php";
						require_once "php/utiles.php";
						//objeto para utiles
						$objUtiles = new utiles();
						$objAutos = new cls_Autos();
                        if($objUtiles->valMatricula($mat) != -1)
						{
						  $sql = "SELECT matricula FROM coches WHERE matricula='$mat';";
						  $n = $objAutos->existAuto($sql);
						  if($n == 0)
						  {
						   $sql = "INSERT INTO coches VALUES ('','$mat','$mot',$mod, 'false');";
						  //Ok la validacion matricula: guardar a la base de datos
						   $r = $objAutos->insertAutos($sql);
						   if($r == "")
						      $objUtiles->Msgbox("'YA SE DIO DE ALTA EL AUTO'");
						   else
							   $objUtiles->Msgbox("'error!!!'");
						  }
						  else
							  $objUtiles->Msgbox("'Error: Ya existe el auto'");
							  
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
