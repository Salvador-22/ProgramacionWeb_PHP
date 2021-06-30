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
                              <h3 class="section-title">Coches en Venta</h3>
                          </div>
                          <form id="frmAltaAutos" class="contact-form" action="save_coches_venta.php" method="post">
                              <p>
                                 <input id="unidades" type="text" name="unidades" placeholder="Unidades" required>
                              </p>
                              <p>
                                 <input id="precio" type="text" name="precio" placeholder="Precio" required>
                              </p>
                              <p>
                                 <select class="" name="idEstado" required>
                                   <option value="">Estado</option>
                                   <option value="Nuevo">Nuevo</option>
                                   <option value="Usado">Usado</option>
                                 </select>
                              </p>
                              <p>
                                <select class="" name="idModelo" id="" required>
                                  <option value="">Modelos</option>
                                  <?php
                                    $query="SELECT * FROM modelo";
                                    $consulta=mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($consulta)) {

                                   ?>
                                   <option value="<?php echo $row[0] ?>"><?php echo $row[2] ?></option>
                                 <?php } ?>
                                </select>
                              </p>
                              <input type="submit" class="btn btn-success btn-block" name="save_auto_venta" value="Guardar">
                          </form>
                      </div>

                      <div class="col-md-8">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Modelo</th>
                              <th>Condición</th>
                              <th>Unidades</th>
                              <th>Precio</th>
                              <th>Estado</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                             $query= "SELECT coches_venta.id,coches_venta.estado,coches_venta.unidades,coches_venta.precio,coches_venta.estado_logico,modelo.modelo FROM coches_venta INNER JOIN modelo ON coches_venta.id_modelo=modelo.id ";
                             $result_modelo=mysqli_query($conn,$query);

                             while($row= mysqli_fetch_array($result_modelo)){ ?>
                               <tr>
                                 <td><?php echo $row['id'] ?></td>
                                 <td><?php echo $row['modelo'] ?></td>
                                 <td><?php echo $row['estado'] ?></td>
                                 <td><?php echo $row['unidades']?></td>
                                 <td><?php echo $row['precio']?></td>
                                 <td><?php echo $row['estado_logico']?></td>

                                 <td>
                                   <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary" >
                                     Editar
                                   </a>
                                   </td>
                                 <td>
                                 <a href="delete_coches_venta.php?id=<?php echo $row['id']?>" class="btn btn-danger" >
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
