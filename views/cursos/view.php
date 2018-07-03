<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="cursos-view">

    <h2><?= Html::encode($this->title) ?></h2>
    <br>

    <?= $this->render('lista_modulos', [
        'curso' => $model,
    ]) ?>

</div>
