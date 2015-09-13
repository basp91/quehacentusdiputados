<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Yo en la cámara de diputados';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yo en la cámara de diputados</h1>

        <p class="lead">El lugar donde mi voz se escucha en la cámara de diputados</p>

        <p><a class="btn btn-lg btn-success" href="about">Participa!</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'attribute' => 'fecha',
                            'contentOptions'=>[
                                'style'=>'min-width: 80px;'
                            ]
                        ],
                        [
                            'attribute' => 'asunto',
                            'value' => function ($dataProvider) {
                                return Html::a($dataProvider->asunto, ["iniciativa/view?id=".$dataProvider->id]);
                            },
                            'format' => 'raw',
                            'contentOptions'=>[
                                'style'=>'min-width: 160px;'
                            ]
                        ],
                        'descripcion'
                    ],
                    'summary' =>'Próximas iniciativas a discutir en la cámara de diputados',

                ]); ?>
            </div>
            <div class="col-lg-4">
                <h4><b>Participa en las próximas decisiones de la cámara de diputados!</b></h4>

                <p>Da click en alguna de las futuras iniciativas de la cámara que se muestran aquí a la izquierda y vota!</p>
                <p>Explora a detalle la lista de iniciativas de los diputados o navega por los perfiles de los diputados
                    con los botones de aquí abajo</p>
                <div class="row">
                    <div class="col-lg-5">
                        <p><?= Html::a('Diputados', ['/diputado/index'], ['class'=>'btn btn-default span4']) ?></p>
                    </div>
                    <div class="col-lg-5">
                        <p><?= Html::a('Iniciativas', ['/iniciativa/index'], ['class'=>'btn btn-default span4']) ?></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
