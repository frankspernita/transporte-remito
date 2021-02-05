<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Personas */

$this->title = 'Update Personas: ' . $model->idPersona;
$this->params['breadcrumbs'][] = ['label' => 'Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPersona, 'url' => ['view', 'id' => $model->idPersona]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
