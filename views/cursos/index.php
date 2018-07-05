<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $cursos yii\data\ActiveDataProvider */

$this->title = 'CursoLine';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-index">
    
    <h2><strong>Cursos</strong></h2>
    
    <?=
        ListView::widget([
            'dataProvider' => $cursos,
            'itemView' => '_curso',
            'summary' => '',
        ]);
    ?>
</div>
