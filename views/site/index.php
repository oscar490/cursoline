<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'CursoLine';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>CursoLine</h1>

        <p class="lead">Desarrolla tus conicimientos en estos Cursos Online</p>

        <?=
            Html::a(
                'Iniciar sesión',
                ['site/login'],
                ['class'=>'btn btn-lg btn-success']
            );
        ?>
    </div>

    
</div>
