<?php require_once "header.php"; ?>

<div class="triangulo position-absolute"></div>
<div class="trapecio position-absolute"></div>

<div class="container">
    <div class="py-3">
        <h2 class="text-center titulo">Katir</h2>
        <hr class="bg-warning py-2">
    </div>
    <h4 class="text-center texto">Agend of contacts with JQUERY, PHP OOP, BOOTSTRAP</h4>
    <p class="text-center texto" style="font-size: 1.3rem">Please don't save important information, is just a prototype !!!</p>
</div>


<!-- ──────────────────────────────────────── ──────────
//   :::::: FORMULARIO  :     :        :          :
──────────────────────────────────────────────────── -->

<!------------------------------------------------------- 
Para pasar variables post debemos definir el formulario con el method post, si coloco get las variables son visibles en la url
/* -------------------------------------------------------->

<form class="container pt-5 pb-2 bg-success rounded mb-5 " style="width: 80%;" method="post" id="formulario">

    <!------------------------------------------------------ */
                SECTION      Nombre y mail          
    ------------------------------------------------------>

    <div class="form-row">
        <div class="col-lg-6">
            <label class="text-white" for="validationCustom01">Name</label>
            <div class="mb-3 input-group">
                <div class="input-group-prepend">
                    <span class="iconos text-white rounded-0"">
                             <i class=" fas fa-user"></i>
                    </span>
                </div>

                <!-- ------------------------------------------------------ 
                El campo name de los input, son las variables post que son pasadas a traves del formulario
                 -------------------------------------------------------->

                <input type="text" class="campo" id="validationCustom01" placeholder="Name that you want save" value="" name="formularioName" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
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
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------ */
    /*                SECTION          Phone            */
    /* ----------------------------------------------------->

    <div class="col-md-7 mb-3 p-0">
        <label class="text-white" for="validationCustomUsername">Phone</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="iconos text-white rounded-0"">
                         <i class=" fas fa-phone"></i>
                </span>
            </div>
            <input type="tel" class="campo" id="validationCustomUsername" placeholder="Phone" aria-describedby="inputGroupPrepend" name="formularioPhone">
            <div class="invalid-feedback">
                Please choose a username.
            </div>
        </div>
    </div>

    <!----------------------------------------------------- */
    /*                SECTION  FOTO                          */
    /* ------------------------------------------------------>

    <div class="col-md-7 mb-3 p-0">
        <label class="text-white" for="validationCustom03">Photo</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="iconos text-white rounded-0"">
                     <i class=" fas fa-camera-retro"></i>
                </span>
            </div>
            <input type="file" class="campo" id="validationCustom03" placeholder="Photo" name="formularioPhoto">
            <div class="invalid-feedback">
                Please provide a valid Photo.
            </div>
        </div>
    </div>

    <!----------------------------------------------------- */
    /*                SECTION NOTES                         */
    /* ---------------------------------------------------->

    <div class="col-md-7 mb-3 p-0">
        <label class="text-white" for="validationCustom04">Notes</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="iconos text-white rounded-0"">
                            <i class=" far fa-sticky-note"></i>
                </span>
            </div>
            <input type="text" class="campo" id="validationCustom04" placeholder="Notes about the contact" name="formularioNote">
            <div class="invalid-feedback">
                Please provide a valid state.
            </div>
        </div>
    </div>

    <!----------------------------------------------------- 
                                Save                          
     ---------------------------------------------------->
    <div class="text-right my-5">
        <button class="btn btn-info mr-4" type="submit">
            <i class="px-5 py-1 fa-2x fas fa-paper-plane"></i>
        </button>
    </div>

    <?php
    $registro = ControladorFormularios::ctrNoRegistrado();
    if ($registro == "ok") {
        echo '<script>

            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
            </script>';

        echo '<p class="ok d-none">ok</p>';
    } else {
        // echo '<p class="error d-none">error</p>';
    }
    ?>
</form>



<!-- ─── NOTE  ACCEDER A CLASES EN PHP ───────────────────────────────────────────────
 *  El simbolo de flecha, se usa para acceder a los metodos o propiedades de un objeto, si de antemano hicimos una nueva instancia.
 *  Instancia : Es un objeto de una clase existente.
 *  $obj = new MyObject();
 *  $obj->thisProperty = 'Fred';
 -->

<div class="pacman position-absolute"></div>


<!--────────────────────────TABLA ─────────────────────────────-->

<?php require_once "contactos.php"; ?>


<!--────────────────────────FOOTER ─────────────────────────────-->
<?php require_once "footer.php"; ?>