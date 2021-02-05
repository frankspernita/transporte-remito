<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\LineasremitoSearch;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Remito */

$this->title = "Pago del Remito Nº ".$model->idRemito;
$this->params['breadcrumbs'][] = ['label' => 'Pago Remito', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="remito-view">


    <p>
        
        <?= Html::a('Modificar', ['update', 'id' => $model->idPagosRemito], ['class' => 'btn btn-primary']) ?>
        <?php
              if($model->Estado == 'Activo'){
                  echo Html::a('Dar de baja', ['delete', 'id' => $model->idPagosRemito], [
                      'class' => 'btn btn-danger',
                      'data' => [
                          'confirm' => '¿Dar de baja?',
                          'method' => 'post',
                      ],
                  ]);
              }else{
                echo Html::a('Dar de alta', ['delete', 'id' => $model->idPagosRemito], [
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
          //  'idPagosRemito',
           // 'idRemito',
            [
                            'attribute' => 'idRemito',
                            'label' => 'N° Remito',
                        ],
            'Fecha',
            'Pago',
            'Observacion',
            'Estado',
        ],
    ]) ?>

        </div>
    </div>

    

</div>
