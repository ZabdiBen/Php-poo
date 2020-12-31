<?php
$contactos = ControladorFormularios::ctrSeleccionarContactos();
?>
<?php foreach ($contactos as $key => $eliminar) :
    $id = $eliminar["id_noRegistrados"];
?>

    <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="eliminar<?php echo $id; ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="POST">
                    <h3 class="text-center">Are you sure <?php echo $eliminar["name_noRegistrados"]; ?> ?</h3>
                    <h5 class="text-center">the elimination is permanent</h5>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="eliminarContacto">

                    <div class="mb-2 d-flex justify-content-center">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="px-3 py-1 fa-2x fas fa-times"></i>
                        </button>
                        <button type="submit" class="ml-2 btn btn-warning">
                            <i class="text-white px-3 py-1 fa-2x fa-lg fas fa-trash-alt "></i>
                        </button>
                        <?php
                        $eliminar = ControladorFormularios::ctrEliminarcontactos();
                        if ($eliminar == "ok") {
                            echo '<script>
                            if ( window.history.replaceState ) {
                                window.history.replaceState( null, null);
                            }
                                </script>';
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php endforeach ?>