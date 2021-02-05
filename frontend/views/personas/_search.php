<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PersonasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idPersona') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'CUIT') ?>

    <?= $form->field($model, 'DireccionCom') ?>

    <?php // echo $form->field($model, 'LocalidadCom') ?>

    <?php // echo $form->field($model, 'ProvinciaCom') ?>

    <?php // echo $form->field($model, 'Rubro') ?>

    <?php // echo $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
