<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Cotizaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idContacto')->textInput() ?>

    <?= $form->field($model, 'idPersona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'FormaPago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LugarEntrega')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PlazoEntrega')->textInput() ?>

    <?= $form->field($model, 'ValidezEntrega')->textInput() ?>

    <?= $form->field($model, 'Nota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Alicuota')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Observaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
