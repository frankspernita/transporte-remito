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

$this->title = 'Pagos de Remitos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remito-index">

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

            [
                'attribute' => 'camionero.Nombre',
                'label' => 'Transporte',
                'options' => ['style' => 'width: 15%;'],
            ],            
           
            [
                'attribute' => 'persona.Nombre',
                'label' => 'Remitente',
                'options' => ['style' => 'width: 15%;'],
            ],
            [
                'attribute' => 'destinatario.Nombre',
                'label' => 'Destinatario',
                'options' => ['style' => 'width: 15%;'],
            ],                    
            
                        
            'Flete',
             
            'Seguro',
            'GCReembolso',
           // 'Total',
            [
                'attribute' => 'Total',
                'label' => 'Total ($)',
            ], 

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

            'VD',
            'Factura',
            'CReembolso',         
            'Estado',
];

echo ExportMenu::widget([
      'dataProvider' => $dataProvider,
      'columns' => $gridColumns
]);



?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>Para ver el estado de pago de los clientes debe filtrar el campo Pago S/Pagado y N/No pagado, se puede modificar este estado modificando el remito</p>
    <p>
        
    <div class="row">
        <div class="col-sm-4">   
        <?= $searchModel->Estado == 'Activo' ?
              Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-ok-sign"></i>',
              ['index','i' => 1], ['class' => 'btn btn-success']) :
              Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-remove-sign"></i>',
              ['index'], ['class' => 'btn btn-danger']) ?>
        </div>
    </div>
    </p>

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
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new PagosremitoSearch();
                    $searchModel->idRemito = $model->idRemito;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$model->idRemito);

                    return Yii::$app->controller->renderPartial(
                        '_lineaspagos',
                        [
                            'searchModel' => $searchModel,
                            'dataProvider' => $dataProvider,
                        ]
                    );
                },
            ],
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

            [
                'attribute' => 'idCamionero',
                'value' => 'camionero.Nombre',
                'label' => 'Transporte',
                'options' => ['style' => 'width: 15%;'],
            ],            
   /*         
            [
                'attribute' => 'persona.Nombre',
                'label' => 'Remitente',
                'options' => ['style' => 'width: 15%;'],
            ],
            [
                'attribute' => 'destinatario.Nombre',
                'label' => 'Destinatario',
                'options' => ['style' => 'width: 15%;'],
            ],                    
     */       
                        
           // 'Flete',
             
            //'Seguro',
            //'GCReembolso',
            //'Total',
            [
                'attribute' => 'Total',
                'label' => 'Total ($)',
            ], 

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

            //'VD',
            //'Factura',
            //'CReembolso',         
            //'Estado',

            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                      return $model->Estado == 'Activo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-eye-open"></span>',
                          $url,
                          [
                            'title' => 'Detalles',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $model->idRemito,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  'update' => function ($url, $model, $key) {
                      return $model->Estado == 'Activo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-pencil"></span>',
                          $url,
                          [
                            'title' => 'Modificar',
                            'data' => [
                                'method' => 'post',
                                'params' => [
                                    'id' => $model->idRemito,
                                ],
                            ],
                          ]
                      ) : null;
                    },
                  'delete' => function ($url, $model, $key) {
                      return $model->Estado == 'Inactivo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-arrow-up"></span>',
                          $url,
                          [
                            'title' => 'Dar de alta',
                            'data' => [
                                'method' => 'post',
                                'confirm' => '¿Dar de alta?',
                                'params' => [
                                    'id' => $model->idRemito,
                                ],
                            ],
                          ]
                      ) :
                      Html::a(
                          '<span class="glyphicon glyphicon-arrow-down"></span>',
                          $url,
                          [
                            'title' => 'Dar de baja',
                            'data' => [
                                'method' => 'post',
                                'confirm' => '¿Dar de baja?',
                                'params' => [
                                    'id' => $model->idRemito,
                                ],
                            ],
                          ]
                      );
                  },
                ]
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