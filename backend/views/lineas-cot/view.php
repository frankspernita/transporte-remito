<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LineasCot */

$this->title = $model->idLineaCot;
$this->params['breadcrumbs'][] = ['label' => 'Lineas Cots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lineas-cot-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idLineaCot' => $model->idLineaCot, 'idCotizacion' => $model->idCotizacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idLineaCot' => $model->idLineaCot, 'idCotizacion' => $model->idCotizacion], [
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
            'idLineaCot',
            'idCotizacion',
            'Cantidad',
            'Detalle',
            'Importe',
            'Estado',
        ],
    ]) ?>

</div>
