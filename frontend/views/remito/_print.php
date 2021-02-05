<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cotizaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizaciones-form">
    
    <table style="width:100%">
    <tr>
        <td>
            <?= Html::img('@frontend/web/logo/logo-sd.jpg',['width' => '60%','height' => '15%']);?>
            <center><h5> De Transportistas Leila SAS</h5></center>
        </td>
        <td style="width:50%">
            <p style="font-size: 10px;">Documento No Válido como Factura</p>
            <b>CARTA PORTE</b> 
            <p>N° <?= $model->idRemito ?></p>
            <br>
            <p>Fecha: <?= Yii::$app->formatter->asDate($model->Fecha, 'd/M/y'); ?></p>
        </td>
    <tr>
    <tr>
        <td>
            <center><h5>Lavalle 3380 - S. M. de Tucumán</h5></center>
            <center><h5>Teléfono: 3816462214 / 3816662842</h5></center>
            <p style="font-size: 7px;"><center>RESPONSABLE INSCRIPTO</center></p>              
        </td>
        <td>
            
            <pre style="font-size: 10px;">C.U.I.T. N°:            30-71680497-2</pre>
            <pre style="font-size: 10px;">Ingresos Brutos:        30-71680497-2</pre>
            <pre style="font-size: 10px;">Inicio de Actividades:  03/2020</pre>
            
        </td>
    </tr>    
    <tr>
        <td>
            <br>
        </td>
        <td>
            <br>
        </td>
    </tr>
    </table>
    <hr>
    <table style="width:100%">  
    <tr>
        <td>
            <b>Remitente: </b>
            <?= $cliente->Nombre ?>
        </td>
        <td>
            <b>Localidad: </b>
            <?= $cliente->LocalidadCom ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Domicilio: </b>
            <?= $cliente->DireccionCom ?>
        </td>
        <td>
            <b>C.U.I.T.: </b>
            <?= $cliente->CUIT ?>
        </td>
    </tr>
    </table>
    <hr>
    <table style="width:100%">
    <tr>
        <td>
            <b>Remitente: </b>
            <?= $destino->Nombre ?>
        </td>
        <td>
            <b>Localidad: </b>
            <?= $destino->LocalidadCom ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>Domicilio: </b>
            <?= $destino->DireccionCom ?>
        </td>
        <td>
            <b>C.U.I.T.: </b>
            <?= $destino->CUIT ?>
        </td>
    </tr>
    </table>
    <br>
    
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                     
                    
                    <table style="width:100%;" >
                        <tr>
                            <th align="center">Bultos</th>
                            <th align="center">Detalles</th>
                            <th align="center">Kgs.</th>
                            <th align="center">Aforo</th>
                            <th align="center">Importe</th>
                        <tr>
                        <?php foreach ($modelsLineas as $i => $modelLinea): ?>
                        <tr>
                            <td style="border-bottom: 1px solid #bfbfbf;" align="center" >
                                <?= $modelLinea->Bultos ?>
                            </td>
                            <td style="border-bottom: 1px solid #bfbfbf;" >
                                <?= $modelLinea->Detalle ?>
                            </td>
                            <td style="border-bottom: 1px solid #bfbfbf;" align="center">
                                <?= $modelLinea->Peso ?>
                            </td>
                            <td style="border-bottom: 1px solid #bfbfbf;" align="center">
                                <?= $modelLinea->Aforo ?>
                            </td>
                            <td style="border-bottom: 1px solid #bfbfbf;" align="center">
                                $<?= $modelLinea->Importe ?>
                            </td>
                        <tr>
                        <?php endforeach; ?>
                    </table>
                    
                    
                </div>
              </div>
            </div>
    </div>
    
    <table style="width:100%">
    <tr>
        <td>
            <b>V.D.  </b>
            $<?= $model->VD ?>
        </td>        
        <td>            
        </td>
        <td align="left" style="padding-left: 50px">
            <b>FLETE </b>            
        </td>
        <td>
            $<?= $model->Flete ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>FACTURA N° </b>
            <?= $model->Factura ?>
        </td>
        <td>            
        </td>
        <td align="left" style="padding-left: 50px">
           <b>SEGURO </b>
            
        </td>
        <td>
            $<?= $model->Seguro ?>
        </td>
        
    </tr>
    <tr>
        <td>
            <b>REMITO N° </b>
            <?= $model->idRemito ?>
        </td>
        <td>            
        </td>
        <td align="left" style="padding-left: 50px">
            <b>G.C/REEM </b>
            
        </td>
        <td>
            $<?= $model->GCReembolso ?>
        </td>
    </tr>
    <tr>
        <td>
            <b>C/REEM </b>
            $<?= $model->CReembolso ?>
        </td>
        <td align="center">
            <b>.........................................</b>
            <p style="font-size: 10px;"><center>Recibí Conforme</center></p>
        </td>
        <td align="left" style="padding-left: 50px">
            <b>TOTAL </b>  
            
        </td>
        <td>
            $<?= $model->Total ?>
        </td>
        
    </tr>
    </table>
    <hr>
    <div class="row">
         <p style="font-size: 15px;"><i>SERVICIO: Retiro de carga a domicilio SIN CARGO</i></p>
         <p style="font-size: 15px;"><i>NOTA: Pasada las 48 hs de conformada la presente, no se aceptan reclamos por faltantes de mercadería</i></p>
         <p style="font-size: 15px;"><i>SIN EXCEPCION. El precio no incluye IVA</i></p>       
    </div>
</div>
