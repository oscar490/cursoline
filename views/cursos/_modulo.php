<?php
/* Vista de un módulo del curso */

use yii\helpers\Html;

$this->registerCssFile('/css/modulo.css');

$css = <<<CSS
    .seleccionado {
        transform: scale(1.1);
        transition: transform 0.15s;
    }

    div#acceso_modulo {
        display: none;
    }

    div.caption > h3 {
        font-weight: bold;
    }
CSS;

$this->registerCss($css);

$js = <<<JS
    $("div.thumbnail").hover(
        function() {
            $(this).addClass('seleccionado');
            $(this).find("div#acceso_modulo").slideDown();
        }, function() {

            $(this).removeClass('seleccionado');
            $(this).find("div#acceso_modulo").slideUp();

        }
    )
JS;

$this->registerJs($js);

?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail sombra_div">

        <!-- Imágen de módulo -->
        <?=
            Html::img(
                "images/portada_modulo.jpg",
                [
                    'alt' => 'imagen portada',
                    'class' => 'img-rounded'
                ]
            )
        ?>

        <div class="caption">

            <!-- Nombre del módulo -->
            <h3> <?= Html::encode($model->nombre) ?> </h3>

            <!-- Descripción del módulo -->
            <p>
                <?= Html::encode($model->descripcion) ?>
            </p>

            <!-- Enlace de acceso -->
            <div id="acceso_modulo">
                <p>
                    <?= Html::a(
                        'Acceder',
                        ['modulos/view', 'id' => $model->id],
                        [
                            'class'=>'btn btn-primary enlace_personalizado',
                        ]
                    ) ?>
                </p>
            </div>
        </div>
    </div>
</div>
