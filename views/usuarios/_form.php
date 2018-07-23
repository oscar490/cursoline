<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
$url_update = Url::to(['usuarios/update', 'id' => $model->id]);

/** JavaScript **/
$js = <<<JS
    var formulario = $('form#update_user');
    var submit = formulario.find("button[type='submit']");

    submit.on('click', function(event) {
        event.preventDefault();

        $.ajax({
            url: '$url_update',
            type: 'POST',
            data: formulario.serialize(),
            success: function (data) {
                $("#modal_update_user").modal('hide');

                for (let x in data) {
                    let atributo = x;
                    let valor = data[atributo];

                    if (valor == "") {
                        let enlace = $("<a></a>")
                        .attr('href', "#modal_update_user")
                        .attr('data-target', '#modal_update_user')
                        .attr('data-toggle', 'modal')
                        .text("Añadir " + atributo);

                        $("div#" + atributo).html(enlace);
                        continue;
                    }

                    $("div#" + atributo).text(valor);
                }
            }
        });
    })
JS;

$this->registerJs($js);
?>

<!-- Formulario de datos del usuario -->
<div class="usuarios-form">

    <?php $form = ActiveForm::begin(['id' => 'update_user']); ?>

    <?= $form->field($model, 'nombre')->textInput([
        'maxlength' => true,
        'disabled'=>true,
        ]
    ) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'disabled'=>true]) ?>

    <?= $form->field($model, 'descripcion')->textarea([
        'maxlength' => true,
        'rows' => 5,
        ])
    ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pais')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
