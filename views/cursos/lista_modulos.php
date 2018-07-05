<?php
/* Lista de módulos de un curso */

use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\helpers\Html;
use app\components\MyHelpers;
?>


<div class="row">
    <?= 
        ListView::widget([
            'dataProvider' => new ActiveDataProvider([
                'query' => $curso->getModulos()
            ]),
            'itemView' => '_modulo',
            'summary' => '',
        ]);
    ?>
</div>
