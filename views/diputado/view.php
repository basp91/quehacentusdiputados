<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Partido;
use app\models\Distrito;

/* @var $this yii\web\View */
/* @var $model app\models\Diputado */

$this->title = $model->nombre.' '.$model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Diputados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diputado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'apellido',
            [
                'label' => 'Partido',
                'value' => Partido::find()->where(['id'=>$model->partido_id])->one()->siglas
            ],
            [
                'label' => 'Tipo de elección',
                'value' => $model->tipoEleccion(),
            ],
            'cunul',
            'correo',
            'periodo_inicio',
            'periodo_fin',
            'sexo',
            'edad',
            [
                'label' => 'Distrito',
                'value' => Distrito::find()->where(['id'=>$model->distrito_id])->one()->nombre
            ],
            'distrito_id',
        ],
    ]) ?>

</div>
