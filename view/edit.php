<?php
$contactos = ControladorFormularios::ctrSeleccionarContactos();
?>

<!-- Modal -->
<?php foreach ($contactos as $key => $boton) :; ?>
    <div class="modal fade" id="editar<?php echo $boton["id_noRegistrados"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update <?php echo $boton["name_noRegistrados"]; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!--// ────────FORMULARIO──────────────────────────────────────────────────────────-->
                    <form class="pl-3 pt-1 pb-2 factualizar rounded" method="post" id="formulario">

                        <!----------- *   Nombre y mail    --->
                        <div class="form-row">
                            <div class="col-lg-8">
                                <label class="text-white" for="validationCustom01">Name</label>
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="iconos text-white rounded-0"">
                                        <i class=" fas fa-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="campo" id="validationCustom01" value="<?php echo $boton["name_noRegistrados"]; ?>" name="actualizarName" required>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <label class="text-white" for="validationCustom02">Mail</label>
                                <div class="mb-3 input-group">
                                    <div class="input-group-prepend">
                                        <span class="iconos text-white rounded-0"">
                                <i class=" far fa-envelope-open"></i>
                                        </span>
                                    </div>
                                    <input type="mail" class="campo" id="validationCustom02" value="<?php echo $boton["email_noRegistrados"]; ?>" name="actualizarEmail">
                                </div>
                            </div>
                        </div>

                        <!-------------------------- SECTION   Phone  -------->

                        <div class="col-md-7 mb-3 p-0">
                            <label class="text-white" for="validationCustomUsername">Phone</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="iconos text-white rounded-0"">
                                <i class=" fas fa-phone"></i>
                                    </span>
                                </div>
                                <input type="tel" class="campo" id="validationCustomUsername" value="<?php echo $boton["phone_noRegistrados"]; ?>" aria-describedby="inputGroupPrepend" name="actualizarPhone" required>
                            </div>
                        </div>

                        <!--------------------------------SECTION  FOTO--------------->

                        <div class="col-md-7 mb-3 p-0">
                            <label class="text-white" for="validationCustom03">Photo</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="iconos text-white rounded-0"">
                            <i class=" fas fa-camera-retro"></i>
                                    </span>
                                </div>
                                <input type="file" class="campo" id="validationCustom03" placeholder="Photo" name="actualizarPhoto">
                            </div>
                        </div>

                        <!----------------------------------  SECTION NOTES  --------->

                        <div class="col-md-7 mb-3 p-0">
                            <label class="text-white" for="validationCustom04">Notes</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="iconos text-white rounded-0"">
                            <i class=" far fa-sticky-note"></i>
                                    </span>
                                </div>
                                <input type="text" class="campo" id="validationCustom04" value="<?php echo $boton["notes_noRegistrados"]; ?>" name="actualizarNote">
                            </div>
                        </div>

                        <!-------------------------------- Save ------------------------>
                        <?php

                        ?>
                        <div class="modal-footer">
                            <input type="hidden" id="id" value="<?php echo $value["id_noRegistrados"]; ?>">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" value="">Update</button>
                        </div>
                    </form>
                    <!--// ────────FIN DE FORMULARIO────────────────────────────────────────────────────-->

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>