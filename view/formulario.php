<?php require_once "header.php";
#Para pasar variables post debemos definir el formulario con el method post, si coloco get las variables son visibles en la url 

?>

<!--──────────────────────── FORMULARIO  ─────────────────────────────-->

<form class="container pt-3 pb-2 bg-success rounded mb-5 formularioPrincipal" method="post" id="formulario">

    <!----------- *   Nombre y mail    --->

    <div class="form-row">
        <div class="col-lg-6">
            <label class="text-white" for="validationCustom01">Name</label>
            <div class="mb-3 input-group">
                <div class="input-group-prepend">
                    <span class="iconos text-white rounded-0"">
                                <i class=" fas fa-user"></i>
                    </span>
                </div>
                <!-- El campo name de los input, son las variables post que son pasadas a traves del formulario -------------------------->
                <input type="text" class="campo" id="validationCustom01" placeholder="Name that you want save" value="" name="formularioName" required>
            </div>
        </div>
        <div class="col-log-6">
            <label class="text-white" for="validationCustom02">Mail</label>
            <div class="mb-3 input-group">
                <div class="input-group-prepend">
                    <span class="iconos text-white rounded-0"">
                            <i class=" far fa-envelope-open"></i>
                    </span>
                </div>
                <input type="mail" class="campo" id="validationCustom02" placeholder="Mail" value="" name="formularioEmail">
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
            <input type="tel" class="campo" id="validationCustomUsername" placeholder="Phone" aria-describedby="inputGroupPrepend" name="formularioPhone" required>
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

            <input type="file" class="campo" id="validationCustom03" placeholder="Photo" name="formularioPhoto">
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
            <textarea placeholder="Notes about the contact" class="campo" id="validationCustom04" name="formularioNote"></textarea>
        </div>
    </div>

    <!-------------------------------- Save ------------------------>
    <?php

    $registro = ControladorFormularios::ctrNoRegistrado();

    if ($registro == "ok") {
        echo '<script>
				if ( window.history.replaceState ) {
					window.history.replaceState( null, null);
				}
            </script>';
        echo '<p class="ok d-none"> ok </p>';
        $registro = "";
    }
    ?>

    <div class="text-right my-3">
        <button class="btn btn-info mr-4" type="submit">
            <i class="px-5 py-1 fa-2x fas fa-paper-plane"></i>
        </button>
    </div>

</form>

<div class="pacman position-absolute"></div>


<!--────────────────────────TABLA ─────────────────────────────-->
<?php require_once "contactos.php"; ?>


<!--────────────────────────FOOTER ─────────────────────────────-->
<?php require_once "footer.php"; ?>