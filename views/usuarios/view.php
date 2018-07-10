<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre . ' ' . $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Perfil';

$this->registerCssFile('/css/perfil.css');
?>
<div class="usuarios-view">

    <div class="row sombra_div">
        <div class="col-md-1">

                <!-- Imagen de perfil -->
                <?=
                    Html::img(
                        $model->url_imagen,
                        [
                            'alt' => 'imagen_perfil',
                            'class' => 'img_rounded'
                        ]
                    )
                ?>

                
        </div>

        <div class="col-md-10">
            <!-- Nombre del alumno. Título -->
            <h1>
                <?= 
                    Html::encode($model->nombre . ' ' . $model->apellidos) 
                ?>
            </h1>
        </div>
    </div>

</div>
