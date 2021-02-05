<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Remito */

$this->title = 'Crear Remito';
$this->params['breadcrumbs'][] = ['label' => 'Remitos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="remito-create">

    <div class="row">
        <div class="col-sm-12">
            <div class="box box-primary">
                <?= $this->render('_form', [
                    'model' => $model,
                    'modelsLineas' => $modelsLineas,
                    'listapersonas' => $listapersonas,
                    'listacamionero' => $listacamionero,     
                    'remitocount' => $remitocount,
                ]) ?>
            </div>
        </div>
    </div>

</div>
