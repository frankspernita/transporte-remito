<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\models\Lineasremito;
use frontend\models\LineasremitoSearch;
use frontend\models\PersonasSearch;
use frontend\models\Personas;
use yii\widgets\DetailView;
use kartik\daterange\DateRangePicker;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\RemitoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Remitos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remito-index">

  <div class="row">
    <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $modelClient,
        'attributes' => [
            'Nombre',
            'CUIT',
            'DireccionCom',
            'LocalidadCom',
            'Telefono',
        ],
    ]) ?>
    </div>
</div>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <div class="row">
        <div class="col-sm-12">    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                  if($model->Estado == 'Inactivo'){
                      return ['class' => 'danger'];
                  }else{
                      return ['class' => 'success'];
                  }
              },
        'columns' => [
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new LineasremitoSearch();
                    $searchModel->idRemito = $model->idRemito;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$model->idRemito);

                    return Yii::$app->controller->renderPartial(
                        '_lineasremito',
                        [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]
                    );
                },
            ],
            'Codigo',
            [
                'attribute' => 'rango_fecha',
                'value' => 'Fecha',
                'label' => 'Fecha',
                'format' => 'date',
                'options' => ['style' => 'width: 20%;'],
                'filter' => '<div class="drp-container input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>'.DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'rango_fecha',
                    'useWithAddon'=>false,
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'timePicker' => true,
                        'timePickerIncrement' => 1,
                        'locale'=>['format'=>'Y-m-d']
                    ],
                ])
            ],
            
                            
            
                        
            //'Flete',
            //'Seguro',
            //'GCReembolso',
            //'Total',
            [
                'attribute' => 'Total',
                'label' => 'Total ($)',
            ],  
            //'VD',
            //'Factura',
            //'CReembolso',
            
            [
                'attribute' => 'Cobrado',
                'label' => 'Cobrado ($)',
            ],
            [
                'attribute' => 'Diferencia',
                'label' => 'Diferencia ($)',
            ], 

            
        ],
    ]); ?>
    </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <p>
            <?= Html::a('Limpiar Filtros', ['index'], ['class' => 'btn btn-success']); ?></p>
        </div>
    </div>
    <?php Pjax::end(); ?>
</div>