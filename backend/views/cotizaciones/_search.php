<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CotizacionesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizaciones-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCotizacion') ?>

    <?= $form->field($model, 'idContacto') ?>

    <?= $form->field($model, 'idPersona') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'FormaPago') ?>

    <?php // echo $form->field($model, 'LugarEntrega') ?>

    <?php // echo $form->field($model, 'PlazoEntrega') ?>

    <?php // echo $form->field($model, 'ValidezEntrega') ?>

    <?php // echo $form->field($model, 'Nota') ?>

    <?php // echo $form->field($model, 'Alicuota') ?>

    <?php // echo $form->field($model, 'Observaciones') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
