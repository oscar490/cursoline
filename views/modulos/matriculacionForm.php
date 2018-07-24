<?php
/* Vista de formulario de Automatriculación */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modulos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clave')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Matricularse', ['class' => 'btn btn-success btn-block']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
