<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ContactosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="lineasremito-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'idRemito',
          //  'Fecha',
            [
                'attribute' => 'Fecha',
                'label' => 'Fecha de Cobro',
            ], 
            'Pago',
            'Observacion',
        ],
    ]); ?>
</div>
