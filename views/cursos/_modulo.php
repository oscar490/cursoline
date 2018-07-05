<?php
/* Vista de un módulo del curso */

use yii\helpers\Html;

$this->registerCssFile('/css/modulo.css');

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


