<?php
include_once("../includes/database.php");
include_once("../includes/estructura.php");
?>

<form data-abide action="nuevaBORRAR.php" method="post">
    <div class="px-4 py-5 my-5 text-right">
        <img class="d-block mx-auto mb-4" src="../imagenes/logo_fusion.png" alt="" width="25%" height="25%">
        <h2 class="display-5 fw-bold">INTRODUZCA LOS DATOS PARA LA NUEVA PUBLICACIÓN</h2>
        <div class="col-lg-6 mx-auto">
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            </div>
        </div>


        <div class="row">
            <div class="columns small-12 medium-2">
                <label><strong>Identificación publicación</strong>
                    <input type="text" name="id" required="required" placeholder="" <?php if(isset($row["id"])){echo 'value="'.$row["id"].'"';} ?> />
                </label>
                <small class="error">Este campo es necesario.</small>
            </div>
        </div>
        <div class="row">
            <div class="columns small-6 medium-6">
                <label><strong>Título</strong>
                    <textarea type="text" placeholder="" name="titulo"><?php if(isset($row["titulo"])){echo $row["titulo"]; } ?></textarea>
                </label>
                <small class="error">Este campo es necesario.</small>
            </div>
        </div>

        <div class="row">
            <div class="columns small-12 medium-4">
                <label><strong>Fecha de la publicación</strong>
                    <input type="text" placeholder="" name="fecha_pub" <?php if(isset($row["fecha_pub"])){echo 'value="'.$row["fecha_pub"].'"';} ?> />
                </label>
            </div>

            <div class="columns small-6 medium-4">
                <label><strong>Otros Autores:</strong>
                    <input type="text" placeholder="" name="otros_aut" <?php if(isset($row["otros_aut"])){echo 'value="'.$row["otros_aut"].'"';} ?> />
                </label>
            </div>
            <div class="columns small-6 medium-4">
                <label><strong>Publicado en:</strong>
                    <input type="text" placeholder="" name="publicado_en" <?php if(isset($row["publicado_en"])){echo 'value="'.$row["publicado_en"].'"';} ?> />
                </label>
            </div>
            <div class="columns small-6 medium-4">
                <label><strong>Tipo de publicación:</strong>
                    <input type="text" placeholder="" name="tipo_pub" <?php if(isset($row["tipo_pub"])){echo 'value="'.$row["tipo_pub"].'"';} ?> />
                </label>
            </div>
            <div class="columns small-6 medium-4">
                <label><strong>D.O.I.:</strong>
                    <input type="text" placeholder="" name="doi" <?php if(isset($row["doi"])){echo 'value="'.$row["doi"].'"';} ?> />
                </label>
            </div>
            <div class="columns small-6 medium-4">
                <label><strong>Número de citaciones:</strong>
                    <input type="text" placeholder="" name="num_citaciones" <?php if(isset($row["num_citaciones"])){echo 'value="'.$row["num_citaciones"].'"';} ?> />
                </label>
            </div>
        </div>

    </div>

    <div class="row" style="margin-top: 2em;">
        <?php if( isset($id) ){ ?>
            <div class="columns small-12 medium-6">
                <button class="expand" type="submit"><i class="fa fa-pencil"></i>Modificar</button>
            </div>
        <?php }else{ ?>
            <div class="columns small-12 medium-6">
                <button class="expand" type="submit"><i class="fa fa-pencil"></i>Crear</button>
            </div>
        <?php } ?>

    </div>
</form>
<?php



$accion = filter_input(INPUT_POST, 'accion');
if( isset($accion) ) {
    $error = false;
    $fields = array();
    $fields['id'] = filter_input(INPUT_POST, 'id');
    $fields['titulo'] = filter_input(INPUT_POST, 'titulo');
    $fields['fecha_pub'] = filter_input(INPUT_POST, 'fecha_pub');
    $fields['otros_aut'] = filter_input(INPUT_POST, 'otros_aut');
    $fields['publicado_en'] = filter_input(INPUT_POST, 'publicado_en');
    $fields['tipo_pub'] = filter_input(INPUT_POST, 'tipo_pub');
    $fields['doi'] = filter_input(INPUT_POST, 'doi');
    $fields['num_citaciones'] = filter_input(INPUT_POST, 'num_citaciones');


    if ($accion == "new") {
        database::queryInsert("resultado_db", $fields);

        }


}



?>


