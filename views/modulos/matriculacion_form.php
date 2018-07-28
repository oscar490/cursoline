<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'matriculacion-form',
    'enableAjaxValidation' => true,
    'action' => ['modulos/matricular', 'id' => $modulo->id],
]); ?>

    <?= $form->field($model, 'clave', ['enableAjaxValidation' => true])->passwordInput() ?>

    <?= Html::submitButton('Matricularse', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end() ?>
