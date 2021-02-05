<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Camionero */

$this->title = 'Cargar Camionero';
$this->params['breadcrumbs'][] = ['label' => 'Camioneros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="row">
        <div class="col-sm-6">
            <div class="box box-primary">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </div>
    </div>

</div>
