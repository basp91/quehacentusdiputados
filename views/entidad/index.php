<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Entidades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entidad-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'nombre',
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Entidad', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
