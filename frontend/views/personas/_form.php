<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Personas */
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
        <?= $form->field($model, 'Codigo')->textInput()->label('Código') ?>
        </div>
        <div class="col-sm-6"> 
    <?= $form->field($model, 'CUIT')->textInput(['maxlength' => true])->label('CUIT') ?>
        </div>
        <div class="col-sm-12"> 
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true])->label('Nombre Completo') ?>
        </div>        
        <div class="col-sm-12"> 
    <?= $form->field($model, 'ProvinciaCom')->textInput(['maxlength' => true])->label('Provincia') ?>
        </div>
        <div class="col-sm-12"> 
    <?= $form->field($model, 'LocalidadCom')->textInput(['maxlength' => true])->label('Localidad') ?>
        </div>
        <div class="col-sm-12"> 
    <?= $form->field($model, 'DireccionCom')->textInput(['maxlength' => true])->label('Dirección') ?>
        </div>              
        <div class="col-sm-6"> 
    <?= $form->field($model, 'Rubro')->textInput(['maxlength' => true])->label('Rubro') ?>
        </div>
        <div class="col-sm-6"> 
    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true])->label('Teléfono') ?>
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