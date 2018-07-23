<?php
/* Vista de perfil de usuario */
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\MyHelpers;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre . ' ' . $model->apellidos;
$this->params['breadcrumbs'][] = 'Perfil';

$this->registerCssFile('/css/perfil.css');

$formato = Yii::$app->formatter;

Modal::begin([
    'header' => '<h4><strong>Modificación</strong></h4>',
    'toggleButton' => false,
    'id' => 'modal_update_user',
]);
    echo $this->render('update', [
        'model' => $model
    ]);

Modal::end();
?>

<div class="usuarios-view">

    <!-- Cabecera -->
    <div class="row sombra_div">
        <div class="col-xs-2 col-md-1">
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

        <!-- Datos -->
        <div class="col-xs-8 col-md-8">
            <!-- Nombre del alumno. Título -->
            <h1>
                <?=
                    Html::encode($model->nombre . ' ' . $model->apellidos)
                ?>
            </h1>

            <!-- Descripcion -->
            <div id="descripcion">
                <?=
                    $model->comprobarAtributo(
                        $model->descripcion,
                        'Añadir descripción'
                    );
                ?>
            </div>

        </div>

        <!-- Enlace a modificación del perfil -->
        <?php if (\Yii::$app->user->identity->id === $model->id): ?>
            <div id="update_user" class='col-md-2'>
                <?=
                    Html::a(
                        MyHelpers::icon('glyphicon glyphicon-cog'),
                        '#modal_update_user',
                        [
                            'class' => 'btn btn-default',
                            'data-target' => '#modal_update_user',
                            'data-toggle' => 'modal'
                        ]
                    )
                ?>
            </div>
        <?php endif; ?>

    </div>
    <br>

    <!-- Cuerpo -->
    <div id="cuerpo_general" class="row sombra_div">

        <!-- Detalles de usuario -->
        <div class="col-md-6">
            <div id="detalles_user" class="row sombra_div contenedor_simple">
                <div class="col-xs-12 col-md-12">
                    <h3>Detalles del usuario</h3>
                    <hr>
                </div>

                <!-- Nombre y apellidos -->
                <div class="col-xs-12 col-md-6">
                    <p>Nombre y apellidos</p>
                    <?= $model->nombre . ' ' . $model->apellidos ?>
                </div>

                <!-- Dirección de correo -->
                <div class="col-md-6">
                    <p>Dirección de correo</p>
                    <?= $model->email ?>
                </div>
            </div>
        </div>

        <!-- Actividades de acceso -->
        <div class="col-md-6">
            <div id="actividades_acceso" class="row sombra_div contenedor_simple">
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

        <!-- Detalles del curso -->
        <div class="col-md-6">
            <div id="detalles_curso" class="row sombra_div contenedor_simple">
                <div class="col-md-12">
                    <h3>Detalles del curso</h3>
                    <hr>
                </div>

                <div class="col-md-6">
                    <p>Módulos matriculados</p>


                    <?php foreach ($model->modulos as $modulo): ?>
                        <p>
                            <?= $modulo->enlace ?>
                        </p>
                    <?php endforeach; ?>

                </div>

            </div>
        </div>

        <!-- Detalles de perfil -->
        <div class="col-md-6">
            <div id="detalles_perfil" class="row sombra_div contenedor_simple">
                <div class='col-md-12'>
                    <h3>Detalles de perfil</h3>
                    <hr>
                </div>

                <!-- País -->
                <div class='col-md-6'>
                    <p>País</p>
                    <div id="pais">
                        <?= $model->comprobarAtributo($model->pais, 'Añadir pais') ?>
                    </div>
                </div>

                <!-- Ciudad -->
                <div class='col-md-6'>
                    <p>Ciudad</p>
                    <div id="ciudad">
                        <?= $model->comprobarAtributo($model->ciudad, 'Añadir ciudad') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
