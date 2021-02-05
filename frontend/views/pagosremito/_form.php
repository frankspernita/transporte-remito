<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Remito */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="cotizaciones-form">

    <?php $form = ActiveForm::begin(
      ['options' => [
                'role' => 'form',
             ],
      'id' => 'dynamic-form'
      ]
    ); ?>

<div class="box-body">

<div class="row">
    
    <div class="col-sm-3"> 
    <?= $form->field($model, 'idRemito')->dropDownList($listaremito, ['id' => 'por', 'prompt' => 'Seleccionar Remito'])->label('N° Remito')?>
    </div>
    <div class="col-sm-5"> 
    <?= $form->field($model, 'Fecha')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
              'readonly' => true,
              'disabled' => 'disabled',
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ]) ?>
    </div>
    <div class="col-sm-4"> 
    <?= $form->field($model, 'Pago')->textInput(['maxlength' => true])->label('Pago ($)')?> 
    </div>
    <div class="col-sm-12"> 
    <?= $form->field($model, 'Observacion')->textInput(['maxlength' => true]) ?>
    </div>
    


</div>
    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success', 'data' => ['confirm' => 'Esta por generar un Remito ¿Desea continuar?']]) ?>        
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
</div>