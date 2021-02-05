<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LineasCot */

$this->title = 'Create Lineas Cot';
$this->params['breadcrumbs'][] = ['label' => 'Lineas Cots', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lineas-cot-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
