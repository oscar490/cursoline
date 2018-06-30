<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $cursos yii\data\ActiveDataProvider */

$this->title = 'Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cursos-index">

    <h1>CursoLine</h1>

    <h2>Cursos</h2>
    
    <?=
        ListView::widget([
            'dataProvider' => $cursos,
            'itemView' => '_curso',
            'summary' => '',
        ]);
    ?>
</div>
