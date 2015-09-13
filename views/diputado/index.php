<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \app\models\Partido;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiputadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diputados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diputado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <!--< ?php // echo $this->render('_search', ['model' => $searchModel]); ?>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'nombre',
                'format'=>'raw',
                'value'=>function ($dataProvider) {
                    return Html::a($dataProvider->nombre, ["view?id=".$dataProvider->id]);
                },
            ],
            [
                'attribute' => 'apellido',
                'format'=>'raw',
                'value'=>function ($dataProvider) {
                    return Html::a($dataProvider->apellido, ["view?id=".$dataProvider->id]);
                },
            ],
            [
                'attribute' => 'partido_id',
                'label' => 'Partido',
                'value' => function($dataProvider){
                    return Partido::find()->where(['id'=>$dataProvider->partido_id])->one()->siglas;
                },
            ],
             'periodo_inicio',
             'periodo_fin',
        ],
    ]); ?>

    <p>
        <?= Html::a('Create Diputado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

</div>
