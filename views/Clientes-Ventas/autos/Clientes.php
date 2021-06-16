<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metas -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web de Autos</title>
    <meta name="description" content="Sitio Web básico para evaluar las unidades 1 y 2 de programación Web  (Marzo-Julio del 2021).">

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

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400%7CUbuntu:400,700%7COpen+Sans" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="images/ico.png">
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
                    <img src="images/logoRayo.png" alt="Site Logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right" id="one-page-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#clientes">Registrar</a></li>
                    <li><a href="#buscar">Buscar  ID</a></li>
                    <li><a href="#actualizar">Actualizar</a></li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Navigation End -->

    <!-- Banner Area -->
    <div id="banner" class="banner">
        <div class="banner-item banner-1 steller-parallax" data-stellar-background-ratio="0.5">
            <div class="banner-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="banner-text-content">
                                <h1 class="banner-title">Sitio Web de Autos <br/>Concesionaria: "Kuchau"</h1>
                                <p class="banner-text">Desarrollada por: Salazar Flores Carlos Francisco</p>
                                <div class="button-group">
                                    <a class="btn btn-lg" href="#">Home</a>
                                    <a class="btn btn-lg btn-border video-play" href="https://youtu.be/vZyrKl5CuY0"><i class="fa fa-play"></i> Ver video</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm hidden-xs">
                            <div class="mock right-style">
                                <img class="back-mock wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s" src="images/LogoRayo.png" alt="mock back">
                                <img class="front-mock wow fadeInUp" data-wow-duration="1.5s" src="images/rey.png" alt="mock front">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Area End -->

    <div class="main-wrap">     
        <!-- Contact area -->
        <div id="clientes" class="section contact-area">
            <div class="map-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 right-image hidden-sm hidden-xs steller-parallax" data-stellar-background-ratio="0.5">
                            <div class="overlay-black"></div>
                        </div>
						
                        <div class="col-md-3 map-area">
                             <img class="front-mock wow fadeInUp" data-wow-duration="1.5s" src="images/clie.png" alt="mock front">
                        
                    </div>
                </div>
            </div>
            <div class="form-wrap text-white">
			
			<?PHP
				//$modelo = $_POST["modelo"];
				if(isset($_POST['reg_nom'])==null)
				{
			?>
			
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Clientes</h3>
                                <p class="section-subtext">Si es la primera vez que el cliente realiza una compra favor de solicitarle los siguients datos:</p>
                            </div>
                            <form id="regForm" class="contact-form" action="Clientes.php" method="post">
                                <p>
                                    <input id="reg_nom" type="text" name="reg_nom" placeholder="Nombre:" required>
                                </p>
								
								<p>
                                    <input id="reg_pat" type="text" name="reg_pat" placeholder="Apellido Paterno:" required>
                                </p>
								
								<p>
                                    <input id="reg_mat" type="text" name="reg_mat" placeholder="Apellido Materno:" required>
                                </p>
                                
                                <p>
                                    <input id="reg_tel" type="tel" name="reg_tel" placeholder="Telefono:" required>
                                </p>
                                <p>
                                    <textarea id="reg_dir" name="reg_dir" placeholder="Dirección" rows="5" required></textarea>
                                </p>
                                <button type="submit" class="btn"><i class="submit"></i> Guardar</button>
                                <!-- 
								<p class="input-success">El usuario se registró correctamente!</p>
                                <p class="input-error">Disculpe, uno de los datos no permite finalizar el registro</p>
								-->
                            </form>
                        </div>
                    </div>
                </div>
				
			<?PHP
				}
				else{
					//Recarga la pagina, ahora si existem variables de POST
					$nom = $_POST["reg_nom"];
					$pat = $_POST["reg_pat"];
					$mat = $_POST["reg_mat"];
					$tel = $_POST["reg_tel"];
					$dir = $_POST["reg_dir"];
					
					require_once "php/cls_Autos.php";
					require_once "php/utiles.php";
		
					//objeto para utiles
					$objAutos = new cls_Autos();
					$objUtiles = new utiles();
					
					$r=$objUtiles->val_tel($tel);
					
					if($r==1){
						$SQL="INSERT INTO clientes VALUES ('','$nom','$pat','$mat','$dir','$tel',1);";
						$r=$objAutos->insertClientes($SQL);
						
						if($r == ""){
							$objUtiles->MsgBox("'ALTA DEL CLIENTE EXITOSA!'");
						}
						else{
							$objUtiles->MsgBox("'Ocurrió un ERROR al guardar los datos!!!'");
						}
					}
					else{
						$objUtiles->MsgBox("'ERROR: El telefono que ingresó no es válido!'");
					}
			?>
			
			
			<div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Clientes</h3>
                                <p class="section-subtext">Si es la primera vez que el cliente realiza una compra favor de solicitarle los siguients datos:</p>
                            </div>
                            <form id="regForm" class="contact-form" action="Clientes.php" method="post">
                                <p>
                                    <input id="reg_nom" type="text" name="reg_nom" placeholder="Nombre:" required>
                                </p>
								
								<p>
                                    <input id="reg_pat" type="text" name="reg_pat" placeholder="Apellido Paterno:" required>
                                </p>
								
								<p>
                                    <input id="reg_mat" type="text" name="reg_mat" placeholder="Apellido Materno:" required>
                                </p>
                                
                                <p>
                                    <input id="reg_tel" type="tel" name="reg_tel" placeholder="Telefono:" required>
                                </p>
                                <p>
                                    <textarea id="reg_dir" name="reg_dir" placeholder="Dirección" rows="5" required></textarea>
                                </p>
                                <button type="submit" class="btn"><i class="submit"></i> Guardar</button>
                                <!-- 
								<p class="input-success">El usuario se registró correctamente!</p>
                                <p class="input-error">Disculpe, uno de los datos no permite finalizar el registro</p>
								-->
                            </form>
                        </div>
                    </div>
                </div>

			<?PHP
				}
			?>
			
            </div>
			<div class="col-md-5 hidden-sm hidden-xs">
                            <div class="mock right-style">
                                <img class="front-mock wow fadeInUp" data-wow-duration="1.5s" src="images/clientes.png" alt="mock front">
                            </div>
            </div>
        </div>
        <!-- Contact area end -->
    </div>

    <footer>

        <!-- Footer Subscribe -->
        <div id= "buscar" class="subscription-area section-padding theme-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="wow fadeInLeft" data-wow-duration="1.5s">¿Hubo algun error al capturar los datos de un cliente?<br/>No se apure, lo podemos corregir!</h3>
                    </div>
					<div class="col-md-6">
						<form id="buscar" class="contact-form" action="Clientes.php" method="post">
								<div class="form-group">
									<select id= "modelo" class="form-control" name="modelo" style="color:#000000">
										<option value="-1" selected>Seleccionar cliente:</option>
										<?PHP
											require_once "php/cls_Autos.php";
											//Objeto para autos | 0    1      2  
											$sql="SELECT DISTINCT id, nombre, apellido_pat, apellido_mat FROM `clientes` order by apellido_pat";
											$objAutos = new cls_Autos();
											$r = $objAutos->listAutos($sql);
											while($r<>null){
												echo "<option value='$r[0]'>$r[2] $r[3] $r[1]</option>";
												$r= $objAutos->sigAutos();
											}
											$objAutos->CerrarConn();
										?>
										<!--
										<option value="Uno">Uno</option>
										<option value="Dos">Dos</option>
										-->
									</select>	
								</div>	
								<?PHP
									if(isset($_POST['modelo'])==null)
									{
									}
									else{
										$mod=$_POST['modelo'];
										if($mod == -1)
										{
											echo "<div class='col-sm-4'>
													<small id='modeloHelp' class 'text-danger'>
														Debes seleccionar un empleado de la Lista
													</small>
												 </div>";
										}
										else{
											require_once "php/utiles.php";
		
											$objUtiles = new utiles();
											$mensaje="El ID de este usuario es:   ".$mod;
											$objUtiles->MsgBox("'$mensaje'");
										}
										
									}
								?>
                                <button type="submit class="submit"> Mostrar ID</button>
								<p class="input-success">El usuario se registró correctamente!</p>
                                <p class="input-error">Disculpe, uno de los datos no permite finalizar el registro</p>
                            </form>
						</div>
                </div>
            </div>
        </div>
        <!-- Footer Subscribe -->
		
		<div class="main-wrap">     

        <!-- Contact area -->
        <div id="actualizar" class="section contact-area">
            <div class="map-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-5 right-image hidden-sm hidden-xs steller-parallax" data-stellar-background-ratio="0.5">
                            <div class="overlay-black"></div>
                        </div>
                        
						<div class="col-md-3 ">
                             <img class="front-mock wow fadeInUp" data-wow-duration="1.5s" src="images/clie.png" alt="mock front">
                        </div>
						
                    </div>
                </div>
            </div>
			
			<?PHP
				//$modelo = $_POST["modelo"];
				if(isset($_POST['up_id'])==null)
				{
			?>
			
            <div class="form-wrap text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Clientes</h3>
                                <p class="section-subtext">Corrija los datos del cliente que se desea:</p>
                            </div>
                            <form id="upForm" class="contact-form" action="Clientes.php" method="post">
                                <p>
                                    <input id="up_id" type="text" name="up_id" placeholder="ID del cliente" required>
                                </p>
								<p>
                                    <input id="up_nom" type="text" name="up_nom" placeholder="Nombre:" required>
                                </p>
								
								<p>
                                    <input id="up_pat" type="text" name="up_pat" placeholder="Apellido Paterno:" required>
                                </p>
								
								<p>
                                    <input id="up_mat" type="text" name="up_mat" placeholder="Apellido Materno:" required>
                                </p>
                                
                                <p>
                                    <input id="up_tel" type="tel" name="up_tel" placeholder="Telefono:" required>
                                </p>
                                <p>
                                    <textarea id="up_dir" name="up_dir" placeholder="Dirección" rows="5" required></textarea>
                                </p>
                                <button type="submit" class="btn"><i class="submit"></i> Actualizar</button>
                                <!-- 
								<p class="input-success">El usuario se registró correctamente!</p>
                                <p class="input-error">Disculpe, uno de los datos no permite finalizar el registro</p>
								-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			<?PHP
				}
				else{
					//Recarga la pagina, ahora si existem variables de POST
					$id  = $_POST["up_id"];
					$nom = $_POST["up_nom"];
					$pat = $_POST["up_pat"];
					$mat = $_POST["up_mat"];
					$tel = $_POST["up_tel"];
					$dir = $_POST["up_dir"];
					
					require_once "php/cls_Autos.php";
					require_once "php/utiles.php";
		
					//objeto para utiles
					$objAutos = new cls_Autos();
					$objUtiles = new utiles();
					
					$r=$objUtiles->val_tel($tel);
					
					$SQL="SELECT * FROM `clientes` WHERE id=$id;";	
					$r=$objAutos->existAuto($SQL);
					
					if($r>0){
						$r=$objUtiles->val_tel($tel);
						if($r==1){
							$SQL="UPDATE clientes 
									SET 
									`nombre`='$nom',
									`apellido_pat`='$pat',	
									`apellido_mat`='$mat',
									`direccion`= '$dir',
									`telefono`='$tel',
									estado_logico=1
									WHERE id=$id;";
							$r=$objAutos->updateClientes($SQL);
						
						
							echo $r;
						
							if($r == ""){
								$objUtiles->MsgBox("'ACTUALIZACIÓN DEL CLIENTE EXITOSA!'");
							}
							else{
								$objUtiles->MsgBox("'Ocurrió un ERROR al actualizar los datos!!!'");
							}
						}
						else{
							$objUtiles->MsgBox("'ERROR: El telefono que ingresó no es válido!'");
						}
					}
					else{
						$objUtiles->MsgBox("'ERROR: El usuario que esta buscando NO existe!'");
					}
			?>
				<div class="form-wrap text-white">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-xs-12">
                            <div class="section-header style-2">
                                <h3 class="section-title">Clientes</h3>
                                <p class="section-subtext">Corrija los datos del cliente que se desea:</p>
                            </div>
                            <form id="upForm" class="contact-form" action="Clientes.php" method="post">
                                <p>
                                    <input id="up_id" type="text" name="up_id" placeholder="ID del cliente" required>
                                </p>
								<p>
                                    <input id="up_nom" type="text" name="up_nom" placeholder="Nombre:" required>
                                </p>
								
								<p>
                                    <input id="up_pat" type="text" name="up_pat" placeholder="Apellido Paterno:" required>
                                </p>
								
								<p>
                                    <input id="up_mat" type="text" name="up_mat" placeholder="Apellido Materno:" required>
                                </p>
                                
                                <p>
                                    <input id="up_tel" type="tel" name="up_tel" placeholder="Telefono:" required>
                                </p>
                                <p>
                                    <textarea id="up_dir" name="up_dir" placeholder="Dirección" rows="5" required></textarea>
                                </p>
                                <button type="submit" class="btn"><i class="submit"></i> Actualizar</button>
                                <!-- 
								<p class="input-success">El usuario se registró correctamente!</p>
                                <p class="input-error">Disculpe, uno de los datos no permite finalizar el registro</p>
								-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<?PHP
				}
			?>
			
			
			
        </div>
        <!-- Contact area end -->
    </div>
	

        <!-- Footer logo and social media button -->
        <div class="logo-social-area section-padding">
            <div class="container text-center">
                <a class="logo logo-footer wow fadeInDown" data-wow-duration="1.5s" href="#">
                    <img src="images/client/logo-3.png" alt="Site Logo">
                </a>
                <div class="socials wow fadeInUp" data-wow-duration="1.5s">
                    <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.google.com"><i class="fa fa-google-plus"></i></a>
                    <a href="https://www.youtube.com"><i class="fa fa-youtube-play"></i></a>
                </div>
            </div>
        </div>
        <!-- Footer logo and social media button -->

        <!-- Footer copyrgiht and navigation -->
        <div class="copyright-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <p class="copyright">Copyright 2021, <a href="#">Carlos Francisco Salazar Flores</a>. Programación Web</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer copyrgiht and navigation -->
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJjq5DIg_K9fv6RE72OY__p9jz0YTMI"></script>
    <script src="js/map.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>