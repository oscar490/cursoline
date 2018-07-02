<?php
/* Vista de un módulo del curso */

use yii\helpers\Html;


?>

<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <?=
            Html::img(
                "images/portada_modulo.jpg",
                ['alt' => 'imagen portada']
            )
        ?>
        
        <div class="caption">
            <h3> <?= $model->nombre ?> </h3>

            <p>
                <?= $model->descripcion ?>
            </p>

            <p>
                <?= Html::a('Acceder', ['cursos/index'], ['class'=>'btn btn-primary']) ?>
            </p>
        </div>
    </div>
</div>


