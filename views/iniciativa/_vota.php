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

    <?= $form->field($modelo_votacion, 'voto')->radioList([0 => 'Acepto', 1 => 'Rechazo'])->hiddenInput() ?>

    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
            <div class="form-group">
                <?= Html::submitButton('Aceptar' , [
                    'class' => 'btn btn-success',
                    'onClick' => "$('#votacionciudadana-voto').val(0)"])
                ?>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                <?= Html::submitButton('Rechazar' , [
                    'class' => 'btn btn-success',
                    'onClick' => "$('#votacionciudadana-voto').val(1)"])
                ?>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
