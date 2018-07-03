<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <br>

    <?= $this->render('lista_modulos', [
        'curso' => $model,
    ]) ?>

</div>
