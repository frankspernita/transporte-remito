<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Lineasremito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lineasremito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idRemito')->textInput() ?>

    <?= $form->field($model, 'Bultos')->textInput() ?>

    <?= $form->field($model, 'Detalle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Peso')->textInput() ?>

    <?= $form->field($model, 'Aforo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Importe')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
