<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiputadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diputado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'apellido') ?>

    <?= $form->field($model, 'partido_id') ?>

    <?= $form->field($model, 'tipo_eleccion') ?>

    <?php // echo $form->field($model, 'cunul') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'periodo_inicio') ?>

    <?php // echo $form->field($model, 'periodo_fin') ?>

    <?php // echo $form->field($model, 'sexo') ?>

    <?php // echo $form->field($model, 'edad') ?>

    <?php // echo $form->field($model, 'distrito_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
