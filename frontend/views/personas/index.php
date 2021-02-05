<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PersonasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-index">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cargar Cliente', ['create'], ['class' => 'btn btn-success']) ?>
        <?php echo $searchModel->Estado == 'Activo' ?
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-ok-sign"></i>',
            ['index', 'i' => 1], ['class' => 'btn btn-success']) :
            Html::a('Filtrar dados de baja <i class="glyphicon glyphicon-remove-sign"></i>',
            ['index'], ['class' => 'btn btn-danger'])
        ?>
    </p>

    <div class="row">
        <div class="col-sm-12">  

    <?php Pjax::begin(); ?>
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
            ['class' => 'yii\grid\SerialColumn'],
            //'idPersona',
            'Codigo',
            'Nombre',
            'CUIT',
           // 'DireccionCom',
            [
                'attribute' => 'LocalidadCom',
                'label' => 'Localidad',
            ],
            [
                'attribute' => 'DireccionCom',
                'label' => 'Dirección',
            ], 
            //'LocalidadCom',
            //'ProvinciaCom',
            'Rubro',
            'Telefono',
            //'Estado',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Acciones',
                'template' => '{docs} {view} {update} {delete}',
                'buttons' => [
                  'docs' => function ($url, $model, $key) {
                      return $model->Estado == 'Activo' ?
                      Html::a(
                          '<span class="glyphicon glyphicon-briefcase"></span>',
                          $url,
                          [
                            'title' => 'Ver documentos',
                            'data' => [
                                'params' => [
                                    'id' => $model->idPersona,
                                ],
                            ],
                          ]
                      ) : null;
                    },
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
                                    'id' => $model->idPersona,
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
                                    'id' => $model->idPersona,
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
                                    'id' => $model->idPersona,
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
                                    'id' => $model->idPersona,
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
