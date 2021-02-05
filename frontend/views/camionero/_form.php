<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\Camionero */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="personas-form">
   
   <?php $form = ActiveForm::begin(
      ['options' => [
                'role' => 'form',
             ],
       'id' => 'dynamic-form'
      ]
    ); ?>

    <div class="box-body">
    <div class="row">
        <div class="col-sm-6">
    <?= $form->field($model, 'DNI')->textInput() ?>
    	</div>
        <div class="col-sm-6"> 
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
    	</div>
        <div class="col-sm-6"> 
    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>
    	</div>        

    </div>
    </div>

    <div class="box-footer">

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Volver', ['index'], ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>


</div>