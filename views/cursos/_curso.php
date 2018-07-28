<?php

use yii\helpers\Html;
use app\components\MyHelpers;

$this->registerCssFile('/css/curso.css');

$this->registerJsFile(
    '/js/curso.js',
    ['depends' => 'yii\web\JqueryAsset']
);

?>

<!-- Curso -->
<h3>
    <?= $model->enlace ?>

    <?=
        Html::button(
            MyHelpers::icon('glyphicon glyphicon-chevron-down'),
            [
                'class'=>'btn btn-xs btn-default',
                'id' => 'button_flecha'
            ]
        );
    ?>
</h3>
<br>

<!-- Módulos del curso -->
<div id="modulos">
    <?= $this->render('lista_modulos', [
        'curso' => $model,
    ]) ?>
</div>
