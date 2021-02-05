<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Ingresar a Transportes LEILA';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

<div class="login-box">
    <div class="login-logo">
      <?php echo '<a href="#">'.Html::img('@web/logo/logo-sd.jpg', ['width' => '100%','height' => '100%']) ?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <h4 class="login-box-msg">Inicie Sesión para ingresar</h4>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('Nombre de Usuario')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('Contraseña')]) ?>


            <div class="col-xs-12 col-lg-12">
           <?= Html::a('Olvide mi contraseña', '?r=site/request-password-reset',['class' => 'btn btn-primary btn-block btn-flat']) ?>
           <br>
            </div>

            <div class="row">
            
            <!-- /.col -->
            <div class="col-xs-12">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>

            <!-- /.col -->
            </div>
           
        <?php ActiveForm::end(); ?>
         

        <br> 
   

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->
