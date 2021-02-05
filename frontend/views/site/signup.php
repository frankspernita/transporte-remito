<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Nuevo usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <p>Por favor, llene los siguientes campos:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <div class="box box-success">
                <div class="box-body">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>
                </div>
                <div class="box-footer">
                    <div class="form-group">
                        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    </div>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
