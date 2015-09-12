<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diputado */

$this->title = 'Create Diputado';
$this->params['breadcrumbs'][] = ['label' => 'Diputados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diputado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
