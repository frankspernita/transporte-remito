<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LineasremitoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lineasremito-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idLineasRemitos') ?>

    <?= $form->field($model, 'idRemito') ?>

    <?= $form->field($model, 'Bultos') ?>

    <?= $form->field($model, 'Detalle') ?>

    <?= $form->field($model, 'Peso') ?>

    <?php // echo $form->field($model, 'Aforo') ?>

    <?php // echo $form->field($model, 'Importe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
