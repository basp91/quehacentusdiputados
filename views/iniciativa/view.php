<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\VotacionCiudadana;


/* @var $this yii\web\View */
/* @var $model app\models\Iniciativa */

$this->title = $model->asunto;
$this->params['breadcrumbs'][] = ['label' => 'Iniciativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="iniciativa-view">

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
            'fecha',
            'asunto',
            'descripcion:ntext',
        ],
    ]) ?>

    <div class="row">

        <?php if(Yii::$app->user->isGuest): ?>
            Inicia sesión para votar o ver los resultados!
        <?php else: ?>

            <?php if($vot_ciud->usuarioVoto(Yii::$app->user->id)): ?>

            Los resultados son los siguientes
            </div>
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">

                </div>

            <?php else: ?>

            Vota!
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3>A favor</h3>
                    <h1><?= $vot_ciud->votacion($model->id)['favor'] ?> %</h1>
                </div>
                <div class="col-lg-6">
                    <h3>En contra</h3>
                    <h1><?= $vot_ciud->votacion($model->id)['contra'] ?> % </h1>
                </div>
            <?php endif; ?>


        <?php endif; ?>

    </div>


</div>
