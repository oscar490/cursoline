<?php
/* Vista de un módulo del curso */

use yii\helpers\Html;
use yii\bootstrap\Modal;
use app\models\MatriculacionForm;

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

//  JavaSript.
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
$usuario_logueado = \Yii::$app->user->identity;

//  Modal para automatriculación.
Modal::begin([
    'header' => '<h4><strong>Automatriculación</strong></h4>',
    'toggleButton' => false,
    'id' => 'modal_matriculacion',
    'size' => Modal::SIZE_SMALL,
]);
    echo $this->render('/modulos/matriculacionForm', [
        'model' => new MatriculacionForm(),
    ]);

Modal::end();

$options = [
    'class'=>'btn btn-primary enlace_personalizado',
];

if ($usuario_logueado->getEstaMatriculado($model->id)) {
    $href = ['modulos/view', 'id' => $model->id];

} else {
    $href = '#modal_matriculacion';
    $options['data-target'] = '#modal_matriculacion';
    $options['data-toggle'] = 'modal';

}

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
                            $href,
                            $options
                        ) ?>
                    </p>
            </div>
        </div>
    </div>
</div>
