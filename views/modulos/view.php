<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\MatriculacionForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modulos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = $this->title;

$usuario_login = \Yii::$app->user->identity;
?>
<div class="modulos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($usuario_login->getEstaMatriculado($model->id)): ?>
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nombre',
            ],
        ]) ?>

    <?php else: ?>
        <?= $this->render('matriculacion_form', [
            'model' => new MatriculacionForm,
            'modulo' => $model,
        ]); ?>

    <?php endif; ?>



</div>
