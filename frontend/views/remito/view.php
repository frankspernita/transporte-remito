<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\LineasremitoSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use frontend\models\Personas;

/* @var $this yii\web\View */
/* @var $model frontend\models\Remito */

$this->title = "Remito Nº ".$model->Codigo;
$this->params['breadcrumbs'][] = ['label' => 'Remitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="remito-view">


    <p>
        <?= Html::a('Descargar', ['print', 'id' => $model->idRemito], ['class' => 'btn btn-primary', 'target' => '_blank']) ?>
        <?= Html::a('Modificar', ['update', 'id' => $model->idRemito], ['class' => 'btn btn-primary']) ?>
        <?php
              if($model->Estado == 'Activo'){
                  echo Html::a('Dar de baja', ['delete', 'id' => $model->idRemito], [
                      'class' => 'btn btn-danger',
                      'data' => [
                          'confirm' => '¿Dar de baja?',
                          'method' => 'post',
                      ],
                  ]);
              }else{
                echo Html::a('Dar de alta', ['delete', 'id' => $model->idRemito], [
                    'class' => 'btn btn-success',
                    'data' => [
                        'confirm' => '¿Dar de alta?',
                        'method' => 'post',
                    ],
                ]);
              }
           ?>
    </p>
    <div class="row">
            <div class="col-sm-6">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                       // 'idRemito',
                        //'idPersona',
                        [
                            'attribute' => 'persona.Nombre',
                            'label' => 'Remitente',
                        ],
                        [
                            'attribute' => 'idRemito',
                            'label' => 'Codigo',
                            
                        ],
                        [
                            'attribute' => 'Fecha',
                            'value' => Yii::$app->formatter->asDatetime($model->Fecha, 'd/M/y '),
                        ],
                        [
                            'attribute' => 'destinatario.Nombre',
                            'label' => 'Destinatario',
                        ],

                        [
                            'attribute' => 'camionero.Nombre',
                            'label' => 'Transportista',
                        ],
                        
                        'Flete',
                        'Seguro',
                        'GCReembolso',
                        'Total',
                        'VD',
                        'Factura',
                        'CReembolso',
                        'Estado',
                    ],
                ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-9">
          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              'columns' => [
                    'Bultos',
                    'Detalle',
                    'Peso',
                    'Aforo',
                    'Importe',
                   
              ],
          ]); ?>
        </div>
    </div>

    

</div>
