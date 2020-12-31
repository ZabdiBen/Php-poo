<?php
$eliminar = ControladorFormularios::ctrEliminarcontactos();
if ($eliminar == "ok") {
  echo '<p class="eliminar d-none"> eliminar </p>';
}
$actualizar = ControladorFormularios::ctrActualizarContactos();
if ($actualizar == "ok") {
  echo '<p class="actualizar d-none"> actualizar </p>';
}
$contactos = ControladorFormularios::ctrSeleccionarContactos();

?>

<!-- ─── DIVS DE CONTACTOS ──────────────────────────────────────────────────────────-->

<div class="tabla pt-3">
  <div class="container mt-5 d-flex flex-wrap">

    <?php foreach ($contactos as $key => $value) : ?>

      <div class="col-md-4">
        <!-- ─── Iconos de editar y borrar ──────────────────────-->
        <span class="position-absolute iconosContactos">

          <!-- button de modal -->
          <button type="button" class="mr-3 botonesContactos py-2 px-1 rounded-top" data-toggle="modal" data-target="#editar<?php echo $value["id_noRegistrados"]; ?>" data-id="<?php echo $boton["id_noRegistrados"]; ?>">
            <i class="fa-lg fas fa-user-edit "></i>
          </button>

          <button type="button" class="botonesContactos py-2 px-1 rounded-top" data-toggle="modal" data-target="#eliminar<?php echo $value["id_noRegistrados"]; ?>">
            <i class=" fa-lg fas fa-trash-alt "></i>
          </button>

        </span>
        <!-- ─── FIN de Iconos de editar y borrar ──────────────-->

        <!-- Widget: user widget style 1 -->
        <div class=" card card-widget widget-user">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-info">
            <h3 class="widget-user-username"><?php echo $value["name_noRegistrados"]; ?></h3>
            <h5 class="widget-user-desc"><?php echo $value["email_noRegistrados"]; ?></h5>
          </div>
          <div class="widget-user-image">
            <!--! WARNING tengo que arreglar lo de la imagen aca --->
            <img class="img-circle elevation-2" src="<?php echo $value["photo_noRegistrados"]; ?>" alt="User Avatar">
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
    <!-- ───  DIVS DE CONTACTOS ──────────────────────────────────────────────────────────-->
    <!-- ─── TRIGGER MODAL ───────────────────────────────────────────────────────-->

    <?php
    require_once "view/edit.php"; ?>

    <!-- ─── FIN TRIGGER MODAL ─────────────────────────────────────────────-->

    <!-- ─── TRIGGER MODAL ELIMINAR───────────────────────────────────────────────────────-->

    <?php
    require_once "view/delete.php"; ?>

    <!-- ─── FIN TRIGGER MODAL ─────────────────────────────────────────────-->


  </div>
</div>