<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizaciones */

$this->title = 'Update Cotizaciones: ' . $model->idCotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Cotizaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCotizacion, 'url' => ['view', 'id' => $model->idCotizacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cotizaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
