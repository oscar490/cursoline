<?php

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;

?>

<h3><?= $model->nombre ?></h3>

<?= 
    ListView::widget([
        'dataProvider' => new ActiveDataProvider([
            'query' => $model->getModulos()
        ]),
        'itemView' => '_modulo',
        'summary' => '',
    ]);
?>