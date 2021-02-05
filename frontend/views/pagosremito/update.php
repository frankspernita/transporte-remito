<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pagosremito */

$this->title = 'Modificar Pago de Remito: ' . $model->idRemito;
$this->params['breadcrumbs'][] = ['label' => 'Pagosremitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPagosRemito, 'url' => ['view', 'id' => $model->idPagosRemito]];
?>
<div class="pagosremito-update">

    <div class="row">
        <div class="col-sm-">
            <div class="box box-primary">

			    <?= $this->render('_form', [
			        'model' => $model,
			        'listaremito' => $listaremito,
			        
			    ]) ?>
			</div>
        </div>
    </div>

</div>
