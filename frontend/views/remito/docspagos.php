<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\models\Pagosremito;
use frontend\models\PagosremitoSearch;
use frontend\models\PersonasSearch;
use frontend\models\Personas;
use yii\widgets\DetailView;
use kartik\daterange\DateRangePicker;
use kartik\export\ExportMenu;
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
            'DNI',            
            'Telefono',
            'Estado',
        ],
    ]) ?>
    </div>
</div>
<?php 

$gridColumns = [

     [
                'attribute' => 'idRemito',
                'label' => 'Codigo',
            ], 
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
            
                            
            
                        
            'Flete',
            'Seguro',
            'GCReembolso',
            //'Total',
            [
                'attribute' => 'Total',
                'label' => 'Total ($)',
            ],  
            'VD',
            'Factura',
            'CReembolso',
            
            [
                'attribute' => 'Cobrado',
                'label' => 'Cobrado ($)',
            ],
            [
                'attribute' => 'Diferencia',
                'label' => 'Diferencia ($)',
            ], 

            [
                'label' => 'Estado',
                'filter' => false,
               // 'attribute' => 'estado_id',
                'value' => function($model){
                    if (
                        $model->Diferencia == 0 
                        ) {
                        return 'Pagado';
                    }
                    return 'No Pagado';
                },
            ],
];

echo ExportMenu::widget([
      'dataProvider' => $dataProvider,
      'columns' => $gridColumns
]);



?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <div class="row">
        <div class="col-sm-12">    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function($model){
                  if($model->Diferencia != 0){
                      return ['class' => 'danger'];
                  }else{
                      return ['class' => 'success'];
                  }
              },
        'columns' => [
           
            [
                'attribute' => 'idRemito',
                'label' => 'Codigo',
            ],
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

            [
                'label' => 'Estado',
                'filter' => false,
               // 'attribute' => 'estado_id',
                'value' => function($model){
                    if (
                        $model->Diferencia == 0 
                        ) {
                        return 'Pagado';
                    }
                    return 'No Pagado';
                },
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