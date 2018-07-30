<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\bootstrap\Modal;
use app\models\MatriculacionForm;

/* @var $this yii\web\View */
/* @var $cursos yii\data\ActiveDataProvider */

$this->title = 'CursoLine';
// $this->params['breadcrumbs'][] = $this->title;


?>
<div class="cursos-index">

    <h2><strong id="titulo">Cursos</strong></h2>

    <?=
        ListView::widget([
            'dataProvider' => $cursos,
            'itemView' => '_curso',
            'summary' => '',
        ]);
    ?>
</div>
