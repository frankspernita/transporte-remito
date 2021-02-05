<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Personas */

$this->title = 'Seguimiento de Cliente';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-docs">
  <div class="row">


  <div class="col-sm-12">
    <!-- <h1><?= Html::encode($this->title) ?></h1> -->


    <div class="row">
      <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Codigo',
            'Nombre',
            'CUIT',
            'DireccionCom',
        ],
    ]) ?>
    </div>
    </div>
    <div class="row">
      <div class="col-sm-9">
        <?= $this->render('_optionsClient',['model' => $model]) ?>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <?= Html::a('Volver', Url::to(['index']), ['class' => 'btn btn-primary']) ?>
      </div>
    </div>
  </div>
</div>
</div>
