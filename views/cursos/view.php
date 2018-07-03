<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cursos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="cursos-view">
    <div class='row'>
        <div class='col-md-5'>
            
            <!-- Lista de cursos -->
            <select class="form-control">
                <?php foreach ($cursos as $curso): 
                    $seleccionado = ($curso->id == $model->id)
                        ? 'selected' : '';
                ?>
                    <option value="<?= $curso->id ?>" <?= $seleccionado ?> ><?= $curso->nombre ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <br>

    <?= $this->render('lista_modulos', [
        'curso' => $model,
    ]) ?>

</div>
