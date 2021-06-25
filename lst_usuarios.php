<?PHP
session_start();
$priv = $_SESSION['privilegios'];
$us = $_SESSION['sessionwork'];
$sql = "SELECT count(*) FROM paginas WHERE nombre='lst_usuarios.php' AND nivel = $priv;";
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
    <title>Lista de Autos</title>
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
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false">
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
        <div id="user" class="section contact-area">
            <div class="map-wrap">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 right-image ">
                            <div class="overlay-black"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-wrap text-white">
                <div class="container">
                    <h2>Lista de Usuarios</h2>
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Contraseña (HASH)</th>
                            <th>Tipo</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?PHP
                  $sql = "SELECT a.id, a.usuario, a.psswd, m.tipo, a.estado_logico
                  FROM usuarios a 
                  JOIN tipos_usuarios m 
                  ON a.id_tipo = m.id;";
                  require_once("php/cls_Autos.php");
                  $objAuto = new cls_Autos();
                  $rs = $objAuto->listAutos($sql);
                  while($rs <> null){
                    echo "<tr>",
                      "<td>",$rs[0],"</td>",
                      "<td>",$rs[1],"</td>",
                      "<td>",$rs[2],"</td>",
                      "<td>",$rs[3],"</td>",
                      "<td>",$rs[4],"</td>",
                      "<td><a href='mdfUsuarios.php?id=$rs[0]'>Modificar</a>","</td>",
                      "<td>","</td>",
                      "</tr>";
                      $rs = $objAuto->sigAutos();
                  }
                  $objAuto->CerrarConn();
                  ?>
                    </table>
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
                        <p class="copyright">Copyright 2021 @ Gpo 186601 - <a href="https://toluca.tecnm.mx/"
                                target="new">ITTOLUCA</a> -</p>
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