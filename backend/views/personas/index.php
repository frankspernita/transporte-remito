<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPersona',
            'Codigo',
            'Nombre',
            'CUIT',
            'DireccionCom',
            //'LocalidadCom',
            //'ProvinciaCom',
            //'CPCom',
            //'DireccionDep',
            //'LocalidadDep',
            //'ProvinciaDep',
            //'CPDep',
            //'Rubro',
            //'CategoriaIVA',
            //'IIBB',
            //'Telefono',
            //'Mail',
            //'Tipo',
            //'Estado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
