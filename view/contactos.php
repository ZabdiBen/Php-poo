<?php
$contactos = ControladorFormularios::ctrSeleccionarContactos();
?>

<div class="tabla pt-3">
  <div class="container mt-5 d-flex flex-wrap">

    <?php foreach ($contactos as $key => $value) : ?>

      <div class="col-md-4">
        <span class="position-absolute iconosEditar">
          <!-- Iconos de editar y borrar --->
          <i class="fa-lg fas fa-user-edit mr-3 shadow"></i>
          <i class="fa-lg fas fa-trash-alt shadow"></i>
        </span>
        <!-- Widget: user widget style 1 -->
        <div class="card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <span class="d-none"><?php echo $value["id_noRegistrados"]; ?></span>
            <h3 class="widget-user-username"><?php echo $value["name_noRegistrados"]; ?></h3>
            <h5 class="widget-user-desc"><?php echo $value["email_noRegistrados"]; ?></h5>
          </div>
          <div class="widget-user-image">
            <!--! WARNING tengo que arreglar lo de la imagen aca --->
            <img class="img-circle elevation-2" src="view/img/user1-128x128.jpg" alt="User Avatar">
          </div>
          <div class="card-footer">
            <div class="">
              <h5 class="text-center"><?php echo $value["phone_noRegistrados"]; ?></h5>
              <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="description-block">
              <p class="px-2"><?php echo $value["notes_noRegistrados"]; ?></p>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.widget-user -->
        </div>
      </div>

    <?php endforeach ?>

  </div>
</div>