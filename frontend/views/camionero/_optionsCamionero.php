<?php
    use yii\helpers\Html;
 ?>
<!-- <div class="row"> -->
<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-file-text"></i>  Pagos de Remitos </h3>
    </div>
    <div class="box-body">

        <div class="row">

            <div class="col-sm-4">
                <?=
                  Html::a('<i class="fa fa-files-o"></i>
                  Estados de Remitos', ['remito/docspagos', 'id' => $model->idCamionero],
                  ['class' => 'btn btn-block btn-lg'])
                ?>
            </div>

    </div>
</div>
<!-- </div> -->
</div>