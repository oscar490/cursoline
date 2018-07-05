<?php
/* Contenido del curso */

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = $this->title;

$js = <<<JS
    $("select.form-control").on('change', function() {
        let url_redirect = $(this).val();
        window.location = url_redirect;
    })
JS;

$this->registerJs($js);
?>

<div class="cursos-view">
    <div class='row centrado'>
        <div class='col-md-4'>
            
            <!-- Lista de cursos -->
            <select class="form-control">
                <?php foreach ($cursos as $curso): 
                    $seleccionado = ($curso->id == $model->id)
                        ? 'selected' : '';

                    $direccion = Url::to(['cursos/view', 'id' => $curso->id], true);
                ?>
                    <option value="<?= $direccion ?>" <?= $seleccionado ?> ><?= $curso->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <br><br>

    <?= $this->render('lista_modulos', [
        'curso' => $model,
    ]) ?>

</div>
