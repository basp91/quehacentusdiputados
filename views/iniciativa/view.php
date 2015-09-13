<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\User;



/* @var $this yii\web\View */
/* @var $model app\models\Iniciativa */

$this->title = $model->asunto;
$this->params['breadcrumbs'][] = ['label' => 'Iniciativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="iniciativa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
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

            <div class="container">
                    <h4> Inicia sesión para votar o ver los resultados!</h4>
                </div>
            </div>

        <?php else: ?>

            <?php if($vot_ciud->usuarioVoto(Yii::$app->user->id, $model->id)): ?>

                <div class="container">
                    <h4>¡Los resultados son los siguientes</h4>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3>A favor</h3>
                    <h1><b><?= Yii::$app->formatter->format($vot_ciud->votacion($model->id)['favor'], ['percent', 2]); ?></b></h1>
                </div>
                <div class="col-lg-6">
                    <h3>En contra</h3>
                    <h1><b><?= Yii::$app->formatter->format($vot_ciud->votacion($model->id)['contra'], ['percent', 2]); ?></b></h1>
                </div>
            </div>
            <br>
            <div class="row">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        [
                            'attribute' => 'user_id',
                            'label' => 'Usuario',
                            'value' => function($dataProvider){
                                return User::find('username')->where(['id'=>$dataProvider->user_id])->one()->username;
                            }
                        ],
                        'comentario'
                    ],
                ]); ?>

                <?php if(!$vot_ciud->usuarioComento(Yii::$app->user->id, $model->id)): ?>
                    <?= $this->render('_comenta', [
                        'modelo_votacion' => $vot_ciud,
                    ]) ?>
                <?php endif; ?>

            <?php else: ?>

                    <div class="container">
                        <h4>¿Tu qué opinas de esta iniciativa?</h4>
                    </div>
                </div>

                <?= $this->render('_vota', [
                    'modelo_votacion' => $vot_ciud,
                ]) ?>

            <?php endif; ?>


        <?php endif; ?>

    </div>


</div>
