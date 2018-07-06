<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $cursos yii\data\ActiveDataProvider */

$this->title = 'CursoLine';
// $this->params['breadcrumbs'][] = $this->title;

$css = <<<CSS
    #titulo {
        color: white;
        background-color: #84caf3 !important;
        border-radius: 7px;
        padding-top: 2px;
        padding-bottom: 2px;
        padding-left: 6px;
        padding-right: 6px;
        font-weight: 1000;
    }
CSS;

$this->registerCss($css);
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
