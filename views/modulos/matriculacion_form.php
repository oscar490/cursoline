<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


$this->registerCssFile('css/matriculacion_form.css');
$url_send = Url::to(['modulos/matricular', 'id' => $modulo->id]);
$url_render = Url::to(['modulos/render-content', 'id' => $modulo->id]);


$js = <<<JS
    let formulario = $("#matriculacion-form");
    console.log(formulario);
    formulario.on('beforeSubmit', function() {


        $.ajax({
            url: '$url_send',
            data: $(this).serialize(),
            type: 'POST',
            success: function(data) {
                console.log();

                if (!$.isEmptyObject(data)) {
                    $("div.help-block").text('Clave incorrecta');
                    $("div.help-block").closest("div.form-group").addClass('has-error');

                } else {

                    $("div.modulos-view").slideUp();

                    $.ajax({
                        url: '$url_render',
                        type: 'GET',
                        data: {},
                        success: function(data) {
                            $("div.modulos-view").html(data);
                            $("div.modulos-view").slideDown();

                            $.growl.notice({ title: "¡Felicidades!", message: "Has sido matriculado" });

                        }
                    })
                }





            }
        });

        return false;
    })
JS;

$this->registerJs($js);
?>

<div class="row">
    <div class="col-md-4">
        <div id="form_matriculacion" class="sombra_div">
            <?php $form = ActiveForm::begin([
                'id' => 'matriculacion-form',
            ]); ?>

                <?= $form->field($model, 'clave')->passwordInput() ?>

                <?= Html::submitButton('Matricularse', ['class' => 'btn btn-success']) ?>

            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
