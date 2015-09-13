<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Iniciativa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="iniciativa-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($modelo_votacion, 'voto')->radioList([0 => 'Acepto', 1 => 'Rechazo'])->hiddenInput()->label('') ?>

    <?= $form->field($modelo_votacion, 'comentario')->textarea(['lines'=>5]) ?>

    <div class="form-group">
        <?= Html::submitButton('Comenta', [
            'class' => 'btn btn-success',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
