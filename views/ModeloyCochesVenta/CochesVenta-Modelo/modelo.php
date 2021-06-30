<?php
  include("conexion.php");
 ?>

<?php
  include("includes/header.php");
 ?>

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
             <div class="container">
                 <div class="row">
                     <div class="col-md-4">

                       <?php
                        if(isset($_SESSION['message']))
                        {
                          ?>
                          <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?=$_SESSION['message']?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php

                        session_unset();
                      }
                      ?>
                         <div class="section-header style-2">
                             <h3 class="section-title">Modelos</h3>
                         </div>
                         <form id="frmAltaAutos" class="contact-form" action="save_modelos.php" method="post">
                             <p>
                                <input id="marca" type="text" name="marca" placeholder="marca" required>
                             </p>
                             <p>
                                <input id="modelo" type="text" name="modelo" placeholder="modelo" required>
                             </p>
                             <p>
                                <input id="anio " type="text " name="anio" placeholder="anio" required>
                             </p>

                             <input type="submit" class="btn btn-success btn-block" name="save_modelo" value="Guardar">
                         </form>
                     </div>

                     <div class="col-md-8">
                       <table class="table table-bordered">
                         <thead>
                           <tr>
                             <th>Id</th>
                             <th>Marca</th>
                             <th>Modelo</th>
                             <th>Año</th>
                             <th>Acciones</th>
                           </tr>
                         </thead>
                         <tbody>
                           <?php
                            $query= "SELECT * FROM modelo";
                            $result_modelo=mysqli_query($conn,$query);

                            while($row= mysqli_fetch_array($result_modelo)){ ?>
                              <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['marca'] ?></td>
                                <td><?php echo $row['modelo'] ?></td>
                                <td><?php echo $row['anio']?></td>
                                <td>
                                  <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary" >
                                    Editar
                                  </a>
                                  </td>
                                <td>
                                <a href="delete_modelos.php?id=<?php echo $row['id']?>" class="btn btn-danger" >
                                    Eliminar
                                </a>
                              </td>
                            </tr>
                            <?php }
                          ?>
                         </tbody>
                       </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Contact area end -->
 </div>

 <?php
 include("includes/footer.php");
  ?>
