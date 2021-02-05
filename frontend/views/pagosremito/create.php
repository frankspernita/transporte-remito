<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Pagosremito */

$this->title = 'Cargar Pago de Remito';
$this->params['breadcrumbs'][] = ['label' => 'Pagosremitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagosremito-create">

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">

			    <?= $this->render('_form', [
			        'model' => $model,
			        'listaremito' => $listaremito,
			        
			    ]) ?>
			</div>
        </div>
    </div>

</div>
