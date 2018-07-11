<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre . ' ' . $model->apellidos;
$this->params['breadcrumbs'][] = 'Perfil';

$this->registerCssFile('/css/perfil.css');

$formato = Yii::$app->formatter;
?>
<div class="usuarios-view">

    <!-- Cabecera -->
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
    <br>

    <!-- Cuerpo -->
    <div id="cuerpo_general" class="row sombra_div">

        <div class="col-md-6">
            <div id="detalles_user" class="row sombra_div contenedor_simple">
                <div class="col-md-12">
                    <h3>Detalles del usuario</h3>
                    <hr>
                </div>

                <div class="col-md-6">
                    <p>Nombre y apellidos</p>
                    <?= $model->nombre . ' ' . $model->apellidos ?>
                </div>

                <div class="col-md-6">
                    <p>Dirección de correo</p>
                    <?= $model->email ?>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="row sombra_div contenedor_simple">
                <div class="col-md-12">
                    <h3>Actividades de acceso</h3>
                    <hr>
                </div>

                <div class="col-md-6">
                    <p>Primer acceso al sitio</p>
                    <?= $formato->asDateTime($model->primer_acceso) ?>
                    <?= ' (' . $formato->asRelativeTime($model->primer_acceso) . ') ' ?>
                </div>

                <?php if ($model->ultimo_acceso !== null): ?>
                    <div class="col-md-6">
                        <p>Último acceso al sitio</p>
                        <?= $formato->asDateTime($model->ultimo_acceso) ?>
                        <?= ' (' . $formato->asRelativeTime($model->ultimo_acceso) . ') ' ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
