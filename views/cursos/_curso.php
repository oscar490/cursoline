<?php

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use app\components\MyHelpers;

$this->registerCssFile('/css/curso.css');

$this->registerJsFile(
    '/js/curso.js',
    ['depends' => 'yii\web\JqueryAsset']
);

?>

<h3>
    <?= $model->nombre ?> 

    <?=
        Html::button(
            MyHelpers::icon('glyphicon glyphicon-chevron-down'),
            [
                'class'=>'btn btn-xs btn-default',
                'id' => 'button_flecha'
            ]
        );
    ?>
</h3>
<br>

<div id="modulos">
    <div class="row">
        <?= 
            ListView::widget([
                'dataProvider' => new ActiveDataProvider([
                    'query' => $model->getModulos()
                ]),
                'itemView' => '_modulo',
                'summary' => '',
            ]);
        ?>
    </div>
</div>