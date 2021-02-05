<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lineascot".
 *
 * @property int $idLineaCot
 * @property string $idCotizacion
 * @property int $Cantidad
 * @property string $Detalle
 * @property string $Importe
 * @property string $Estado
 *
 * @property Cotizaciones $cotizacion
 */
class Lineascot extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lineascot';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLineaCot', 'idCotizacion', 'Cantidad', 'Detalle', 'Importe', 'Estado'], 'required'],
            [['idLineaCot', 'idCotizacion', 'Cantidad'], 'integer'],
            [['Importe'], 'number'],
            [['Detalle'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 1],
            [['idLineaCot', 'idCotizacion'], 'unique', 'targetAttribute' => ['idLineaCot', 'idCotizacion']],
            [['idCotizacion'], 'exist', 'skipOnError' => true, 'targetClass' => Cotizaciones::className(), 'targetAttribute' => ['idCotizacion' => 'idCotizacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLineaCot' => 'Id Linea Cot',
            'idCotizacion' => 'Id Cotizacion',
            'Cantidad' => 'Cantidad',
            'Detalle' => 'Detalle',
            'Importe' => 'Importe',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizacion()
    {
        return $this->hasOne(Cotizaciones::className(), ['idCotizacion' => 'idCotizacion']);
    }
}
