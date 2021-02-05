<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CotizacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cotizaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cotizaciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCotizacion',
            'idContacto',
            'idPersona',
            'Fecha',
            'FormaPago',
            //'LugarEntrega',
            //'PlazoEntrega',
            //'ValidezEntrega',
            //'Nota',
            //'Alicuota',
            //'Observaciones:ntext',
            //'Estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
