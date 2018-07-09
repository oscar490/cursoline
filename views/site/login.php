<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Acceso';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('/css/login.css');

?>
<div class="site-login">
    

    
    <div class="row centrado">
        <div id="titulo" class="col-md-4">
            CursoLine
        </div>
    </div>
    <br>

    <div class="row centrado">
        <div class="col-md-4">
            <div id="form-login" class="panel panel-primary">
                <div class="panel-heading">
                    <?php $form = ActiveForm::begin([
                    
                    ]); ?>

                        <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                    ]) ?>

                    <div class="form-group">
                        <div class="">
                            <?= Html::submitButton('Acceder', ['class' => 'btn btn-primary enlace_personalizado', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
