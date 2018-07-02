<?php

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use app\components\MyHelpers;

$this->registerCssFile('/css/curso.css');

$js = <<<JS
    $(document).ready(function() {
        $("button#button_flecha").on('click', function() {
            let modulos = $(this).parent().next().next();
            let icon = '';
            
            if (modulos.css('display') != 'none') {
                icon = 'glyphicon glyphicon-chevron-right';

            } else {
                icon = 'glyphicon glyphicon-chevron-down';
            }

            modulos.slideToggle();

            $(this).find('span').attr('class', icon);
        })
    })
JS;

$this->registerJs($js);
?>

<h3>
    <?= $model->nombre ?> 

    <?=
        Html::button(
            MyHelpers::icon('glyphicon glyphicon-chevron-down'),
            [
                'class'=>'btn btn-xs btn-primary',
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