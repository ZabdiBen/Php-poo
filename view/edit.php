<?php
$contactos = ControladorFormularios::ctrSeleccionarContactos();

?>


<!-- Modal -->
<?php foreach ($contactos as $key => $boton) :
    $id = $boton["id_noRegistrados"];
?>
    <div class="modal fade" id="editar<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

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
                    <form class="pl-3 pt-1 pb-2 factualizar rounded" method="POST" id="formulario">

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

                        <div class=" mb-3 p-0">
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

                        <div class=" mb-3 p-0">
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

                        <div class=" mb-3 p-0">
                            <label class="text-white" for="validationCustom04">Notes</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="iconos text-white rounded-0"">
                            <i class=" far fa-sticky-note"></i>
                                    </span>
                                </div>
                                <textarea class="campo" name="actualizarNote"><?php echo $boton["notes_noRegistrados"]; ?></textarea>
                            </div>
                        </div>
                        <input name="idUsuario" type="hidden" value="<?php echo $id; ?>">

                        <!-------------------------------- Save ------------------------>

                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                <i class="px-3 py-1 fa-2x fas fa-times"></i>
                            </button>

                            <input type="hidden" name="editar" value="editar">
                            <button type="submit" class="btn btn-primary">
                                <i class="px-5 py-1 fa-2x fas fa-paper-plane"></i>
                            </button>
                        </div>

                        <?php
                        $actualizar = ControladorFormularios::ctrActualizarContactos();

                        if ($actualizar == "ok") {

                            echo '<script>
                            if ( window.history.replaceState ) {
                                window.history.replaceState( null, null, window.location.href );
                            }
                                </script>';
                        };

                        ?>
                    </form>
                    <!--// ────────FIN DE FORMULARIO────────────────────────────────────────────────────-->

                </div>
            </div>
        </div>
    </div>

<?php endforeach ?>