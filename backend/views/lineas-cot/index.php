<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LineasCotSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lineas Cots';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lineas-cot-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lineas Cot', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLineaCot',
            'idCotizacion',
            'Cantidad',
            'Detalle',
            'Importe',
            //'Estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
