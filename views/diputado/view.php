<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diputado */

$this->title = $model->id;
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
            'id',
            'nombre',
            'apellido',
            'partido_id',
            'tipo_eleccion',
            'cunul',
            'correo',
            'periodo_inicio',
            'periodo_fin',
            'sexo',
            'edad',
            'distrito_id',
        ],
    ]) ?>

</div>
