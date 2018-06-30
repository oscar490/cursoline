<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Modulos */

$this->title = 'Create Modulos';
$this->params['breadcrumbs'][] = ['label' => 'Modulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
