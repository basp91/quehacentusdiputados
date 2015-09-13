<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiputadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diputados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diputado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Diputado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'apellido',
            'partido_id',
            'tipo_eleccion',
            // 'cunul',
            // 'correo',
            // 'periodo_inicio',
            // 'periodo_fin',
            // 'sexo',
            // 'edad',
            // 'distrito_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
