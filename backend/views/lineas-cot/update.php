<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LineasCot */

$this->title = 'Update Lineas Cot: ' . $model->idLineaCot;
$this->params['breadcrumbs'][] = ['label' => 'Lineas Cots', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idLineaCot, 'url' => ['view', 'idLineaCot' => $model->idLineaCot, 'idCotizacion' => $model->idCotizacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lineas-cot-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
