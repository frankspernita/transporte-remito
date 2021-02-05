<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LineasCotSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lineas-cot-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idLineaCot') ?>

    <?= $form->field($model, 'idCotizacion') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'Detalle') ?>

    <?= $form->field($model, 'Importe') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
