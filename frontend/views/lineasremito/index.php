<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LineasremitoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lineasremitos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lineasremito-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lineasremito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idLineasRemitos',
            'idRemito',
            'Bultos',
            'Detalle',
            'Peso',
            //'Aforo',
            //'Importe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
