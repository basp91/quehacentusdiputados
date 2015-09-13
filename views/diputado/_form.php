<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Partido;
use app\models\Distrito;

/* @var $this yii\web\View */
/* @var $model app\models\Diputado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diputado-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'partido_id')->dropDownList(
        ArrayHelper::map(Partido::find()->all(),'id','nombre'))
    ?>

    <?= $form->field($model, 'tipo_eleccion')->radioList(
        [0 => 'Directo', 1 => 'Plurinominal']
    ) ?>

    <?= $form->field($model, 'cunul')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'periodo_inicio')->widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'periodo_fin')->widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
    ]) ?>

    <?= $form->field($model, 'sexo')->radioList(
        [0 => 'Hombre', 1 => 'Mujer']
    ) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= $form->field($model, 'distrito_id')->dropDownList(
        ArrayHelper::map(Distrito::find()->all(),'id','nombre'))
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
