<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Lineasremito */

$this->title = 'Update Lineasremito: ' . $model->idLineasRemitos;
$this->params['breadcrumbs'][] = ['label' => 'Lineasremitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLineasRemitos, 'url' => ['view', 'id' => $model->idLineasRemitos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lineasremito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
