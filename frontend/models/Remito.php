<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "remito".
 *
 * @property int $idRemito
 * @property int $idPersona
 * @property string $Codigo
 * @property string $Fecha
 * @property int $idDestinatario
 * @property string $Flete
 * @property string $Seguro
 * @property string $GCReembolso
 * @property string $Total
 * @property string $VD
 * @property int $Factura
 * @property string $CReembolso
 * @property string $Pagado
 * @property string $Estado
 */
class Remito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'remito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona', 'idCamionero', 'Codigo', 'Fecha', 'idDestinatario', 'Total'], 'required'],
            [['Factura'], 'integer'],
            [['Fecha', 'idCamionero', 'idDestinatario', 'idPersona'], 'safe'],
            [['Flete', 'Seguro', 'GCReembolso', 'Total', 'VD', 'CReembolso', 'Cobrado', 'Diferencia'], 'number'],
            [['Codigo'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRemito' => 'Id Remito',
            'idPersona' => 'Id Persona',
            'idCamionero' => 'Id Camionero',
            'Codigo' => 'Codigo',
            'Fecha' => 'Fecha',
            'idDestinatario' => 'Id Destinatario',
            'Flete' => 'Flete',
            'Seguro' => 'Seguro',
            'GCReembolso' => 'Gc Reembolso',
            'Total' => 'Total',
            'Cobrado' => 'Cobrado',
            'Diferencia' => 'Diferencia',
            'VD' => 'Vd',
            'Factura' => 'Factura',
            'CReembolso' => 'C Reembolso',
            'Estado' => 'Estado',
        ];
    }

    public function getLineasremito()
    {
        return $this->hasMany(Lineasremito::className(), ['idRemito' => 'idRemito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Personas::className(), ['idPersona' => 'idPersona']);
    }

    public function getCamionero()
    {
        return $this->hasOne(Camionero::className(), ['idCamionero' => 'idCamionero']);
    }

    public function getDestinatario()
    {
        return $this->hasOne(Personas::className(), ['idPersona' => 'idDestinatario']);
    }
}
