<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model frontend\models\Camionero */

$this->title = "Nombre del Transportista: ". $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => 'Camioneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personas-view">


    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idCamionero], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dar de Baja', ['delete', 'id' => $model->idCamionero], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que deseas dar de baja este Transportista?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="row">
            <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'idCamionero',
            'DNI',
            'Nombre',
            'Telefono',
            'Estado',
        ],
    ]) ?>

            </div>
</div>

    <div class="row">
        <div class="col-sm-1">
            <?= Html::a('Volver', ['index'], ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

</div>
