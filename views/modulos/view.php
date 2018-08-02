<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\MatriculacionForm;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\Modulos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = [
    'label' => $model->curso->nombre,
    'url' => ['cursos/view', 'id' => $model->curso->id],
];
$this->params['breadcrumbs'][] = $this->title;

$usuario_login = \Yii::$app->user->identity;

$this->registerCssFile('css/modulo_content.css');
?>
<div class="modulos-view">

    <!-- Nombre del módulo. Cabecera -->
    <div  class="row">

        <div class="col-md-12">


            <div id="cabecera" class="contenedor_diseño sombra_div">

                <h1>
                    <?= Html::encode($this->title) ?>
                </h1>
            </div>
        </div>
    </div>

    <div id="content_modulo">
        <!-- Contenido del módulo -->
        <?php if ($usuario_login->getEstaMatriculado($model->id)): ?>
            <div class="row">
                <div class="col-md-9">
                    <!-- Temarios, Unidades del módulo -->

                        <div class="contenedor_diseño sombra_div">
                            <?=
                                ListView::widget([
                                    'dataProvider' => $unidades,
                                    'itemView' => '_unidad',
                                    'summary' => '',
                                ]);
                            ?>
                        </div>

                </div>

                <!-- Actividades recientes -->
                <div class="col-md-3">
                    <div id="actividades" class="contenedor_diseño sombra_div">
                        <h4>Actividad Reciente</h4>

                        <p>
                            No tiene ninguna actividad reciente.
                        </p>
                    </div>


                </div>
            </div>

        <?php else: ?>
            <?= $this->render('matriculacion_form', [
                'model' => new MatriculacionForm,
                'modulo' => $model,
            ]); ?>

        <?php endif; ?>
    </div>

</div>
