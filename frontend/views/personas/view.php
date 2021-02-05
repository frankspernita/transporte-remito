<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model frontend\models\Personas */

$this->title = "Codigo del Cliente: ".$model->Codigo;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="personas-view">


    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Dar de Baja', ['delete', 'id' => $model->idPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Estas seguro que deseas dar de baja este cliente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
<div class="row">
            <div class="col-sm-6">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'idPersona',
            'Codigo',
            'Nombre',
            'CUIT',
            [
                'attribute' => 'ProvinciaCom',
                'label' => 'Provincia',
            ],
            [
                'attribute' => 'LocalidadCom',
                'label' => 'Localidad',
            ],
            [
                'attribute' => 'DireccionCom',
                'label' => 'Dirección',
            ],             'Rubro',
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
