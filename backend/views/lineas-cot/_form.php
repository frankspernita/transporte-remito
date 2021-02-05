<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\LineasCot */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lineas-cot-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idLineaCot')->textInput() ?>

    <?= $form->field($model, 'idCotizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Detalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Importe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
