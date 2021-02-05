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
    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true,'value'=>$remitocount, 'readonly'=>'false']) ?>
    </div>
    <div class="col-sm-4">

    <?= $form->field($model, 'Fecha')->widget(DatePicker::className(), [
              'name' => 'datetime_10',
            //  'readonly' => true,
            //  'disabled' => 'disabled',
              'options' => ['placeholder' => 'Elija una fecha ...','value' => date('d-m-Y')],              
              'pluginOptions' => [
                  'format' => 'dd-mm-yyyy',
                  'todayHighlight' => true
              ]
              ]) ?>
    </div>
    <div class="col-sm-4"> 
    <?= $form->field($model, 'idCamionero')->dropDownList($listacamionero, ['id' => 'por', 'prompt' => 'Seleccionar Transportista'])->label('Transportista')?>
    </div>

</div>
<div class="row">
    <hr>
    <h4 align="center">Datos del Remitente</h4> 
    <div class="col-sm-6">  
    <?= $form->field($model, 'idPersona')->dropDownList($listapersonas, ['id' => 'por', 'prompt' => 'Seleccionar Cliente'])->label('Remitente')?>
    </div>
</div>
<div class="row">
    <hr>
    <h4 align="center">Datos del Destinatario</h4> 
    <div class="col-sm-6">
    <?= $form->field($model, 'idDestinatario')->dropDownList($listapersonas, ['id' => 'por', 'prompt' => 'Seleccionar Cliente'])->label('Destinatario')?>
    </div>   
    
</div>




    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                     <?php DynamicFormWidget::begin([
                        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                        'widgetBody' => '.container-items', // required: css class selector
                        'widgetItem' => '.item', // required: css class
                        'limit' => 999, // the maximum times, an element can be cloned (default 999)
                        'min' => 1, // 0 or 1 (default 1)
                        'insertButton' => '.add-item', // css class
                        'deleteButton' => '.remove-item', // css class
                        'model' => $modelsLineas[0],
                        'formId' => 'dynamic-form',
                        'formFields' => [
                            'Bultos',
                            'Detalle',
                            'Peso',
                            'Aforo',
                            'Importe',
                        ],
                    ]); ?>

                    <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsLineas as $i => $modelLinea): ?>
                        <div class="item panel panel-default"><!-- widgetBodys -->
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                    // necessary for update action.
                                    if (! $modelLinea->isNewRecord) {
                                        echo Html::activeHiddenInput($modelLinea, "[{$i}]idLineasRemitos");
                                    }
                                ?>

                                <div class="row">
                                    <div class="col-sm-1">
                                        <?= $form->field($modelLinea, "[{$i}]Bultos")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-5">
                                        <?= $form->field($modelLinea, "[{$i}]Detalle")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?= $form->field($modelLinea, "[{$i}]Peso")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?= $form->field($modelLinea, "[{$i}]Aforo")->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <?= $form->field($modelLinea, "[{$i}]Importe")->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div><!-- .row -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <?php DynamicFormWidget::end(); ?>
                </div>
              </div>
            </div>
    </div>




    <div class="col-sm-4">
    <?= $form->field($model, 'VD')->textInput(['maxlength' => true])->label('V.D. ($)')?>
    </div>
    <div class="col-sm-4">    
    </div>
    <div class="col-sm-4">
    <?= $form->field($model, 'Flete')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-4">
    <?= $form->field($model, 'Factura')->textInput()->label('Factura N°')?>
    </div>
    <div class="col-sm-4">    
    </div>
    <div class="col-sm-4">
    <?= $form->field($model, 'Seguro')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-sm-4">
    <?= $form->field($model, 'CReembolso')->textInput(['maxlength' => true])->label('G/Reem.')?>
    </div>
    <div class="col-sm-4">    
    </div>
    <div class="col-sm-4">
    <?= $form->field($model, 'GCReembolso')->textInput(['maxlength' => true])->label('G.C/Reem.')?>
    </div>

    
    <div class="col-sm-4">
    
    </div>
    <div class="col-sm-4">         
    </div>  
    <div class="col-sm-4">
    <?= $form->field($model, 'Total')->textInput(['maxlength' => true]) ?>
    </div>
 
      



</div>
    <div class="box-footer">
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success', 'data' => ['confirm' => 'Esta por generar un Remito ¿Desea continuar?']]) ?>        
    </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>