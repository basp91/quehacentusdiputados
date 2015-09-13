<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Iniciativa */

$this->title = 'Create Iniciativa';
$this->params['breadcrumbs'][] = ['label' => 'Iniciativas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iniciativa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
