<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distritos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distrito-index">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'nombre',
            'municipio_id',
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Distrito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
