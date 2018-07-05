<?php
/* Vista de un módulo del curso */

use yii\helpers\Html;

$this->registerCssFile('/css/modulo.css');

$css = <<<CSS

    div#acceso_modulo {
        display: none;
    }
CSS;

$this->registerCss($css);

$js = <<<JS
    $("div.thumbnail").hover(
        function() {
            $(this).find("div#acceso_modulo").slideDown();
        }, function() {
            $(this).find("div#acceso_modulo").slideUp();

        }
    )
JS;

$this->registerJs($js);

?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">

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
                        ['cursos/index'],
                        [
                            'class'=>'btn btn-primary',
                            'id' => 'enlace_modulo'
                        ]
                    ) ?>
                </p>
            </div>
        </div>
    </div>
</div>


