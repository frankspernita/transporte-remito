<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Personas */

$this->title = $model->idPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPersona], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPersona], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPersona',
            'Codigo',
            'Nombre',
            'CUIT',
            'DireccionCom',
            'LocalidadCom',
            'ProvinciaCom',
            'CPCom',
            'DireccionDep',
            'LocalidadDep',
            'ProvinciaDep',
            'CPDep',
            'Rubro',
            'CategoriaIVA',
            'IIBB',
            'Telefono',
            'Mail',
            'Tipo',
            'Estado',
        ],
    ]) ?>

</div>
