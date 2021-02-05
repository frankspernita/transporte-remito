<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pagosremito".
 *
 * @property int $idPagosRemito
 * @property int $idRemito
 * @property string $Fecha
 * @property string $Pago
 * @property string $Observacion
 * @property string $Estado
 */
class Pagosremito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pagosremito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRemito', 'Fecha', 'Pago'], 'required'],
            [['idRemito'], 'integer'],
            [['Fecha'], 'safe'],
            [['Pago'], 'number'],
            [['Observacion'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPagosRemito' => 'Id Pagos Remito',
            'idRemito' => 'Id Remito',
            'Fecha' => 'Fecha',
            'Pago' => 'Pago',
            'Observacion' => 'Observacion',
            'Estado' => 'Estado',
        ];
    }

    public function getRemito()
    {
        return $this->hasOne(Remito::className(), ['idRemito' => 'idRemito']);
    }
}
