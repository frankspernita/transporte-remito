<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\RemitoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="remito-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idRemito') ?>

    <?= $form->field($model, 'idPersona') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'idDestinatario') ?>

    <?php // echo $form->field($model, 'Flete') ?>

    <?php // echo $form->field($model, 'Seguro') ?>

    <?php // echo $form->field($model, 'GCReembolso') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <?php // echo $form->field($model, 'VD') ?>

    <?php // echo $form->field($model, 'Factura') ?>

    <?php // echo $form->field($model, 'CReembolso') ?>

    <?php // echo $form->field($model, 'Pagado') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
