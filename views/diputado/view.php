<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Partido;
use app\models\Distrito;
use yii\grid\GridView;
use app\models\Iniciativa;
use app\models\VotacionDiputado;
use app\models\VotacionCiudadana;

/* @var $this yii\web\View */
/* @var $model app\models\Diputado */

$this->title = $model->nombre.' '.$model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Diputados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model_id = $model->id;
$model_distrito = $model->distrito_id;

?>
<div class="diputado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */
function getVotacion($id_iniciativa, $model_id){
    $votDiputado = new VotacionDiputado();
    return $votDiputado->votacion($id_iniciativa,$model_id);
}

function getVotacionDistrito($id_iniciativa, $model_distrito){
    $votCiudadana = new VotacionCiudadana();
    return $votCiudadana->votacionPorDistrito($id_iniciativa,$model_distrito);
}
        ?>
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
            [
                'label' => 'Sexo',
                'value' => $model->sexo(),
            ],
            'edad',
            [
                'label' => 'Distrito',
                'value' => Distrito::find()->where(['id'=>$model->distrito_id])->one()->nombre
            ],
        ],
    ]) ?>

    <h3>Iniciativas</h3>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'fecha',
            [
                'attribute'=>'asunto',
                'format'=>'raw',
                'value'=>function ($dataProvider) { 
                    return Html::a($dataProvider->asunto, ["iniciativa/view?id=".$dataProvider->id]);
                },
            ],
            [
                'label'=>'Votó',
                'format'=>'raw',
                'value'=>function ($dataProvider, $model_id) { 
                    return getVotacion($dataProvider->id, $model_id);
                },
            ],
            [
                'label'=>'Voto ciudadano para su distrito',
                'format'=>'raw',
                'value'=>function ($dataProvider,$model_distrito) { 
                    $res = getVotacionDistrito($dataProvider->id, $model_distrito);
                    $respuesta = "A favor: ".Yii::$app->formatter->format($res['favor'], ['percent', 2]). 
                        " En contra: ".Yii::$app->formatter->format($res['contra'], ['percent', 2]).
                        " Total: ".Yii::$app->formatter->format($res['total'], ['percent', 2]);
                    return $respuesta;
                },
            ],
        ],
    ]); ?>
</div>
