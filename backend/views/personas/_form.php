<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Personas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="personas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idPersona')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CUIT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionCom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LocalidadCom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProvinciaCom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CPCom')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionDep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LocalidadDep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProvinciaDep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CPDep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Rubro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CategoriaIVA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IIBB')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Mail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
