<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "lineasremito".
 *
 * @property int $idLineasRemitos
 * @property int $idRemito
 * @property int $Bultos
 * @property string $Detalle
 * @property double $Peso
 * @property string $Aforo
 * @property string $Importe
 */
class Lineasremito extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lineasremito';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Detalle', 'Peso', 'Aforo', 'Importe', 'Bultos'], 'required'],
            [['idRemito', 'Bultos'], 'integer'],
            [['Peso', 'Importe'], 'number'],
            [['Detalle'], 'string', 'max' => 200],
            [['Aforo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLineasRemitos' => 'Id Lineas Remitos',
            'idRemito' => 'Id Remito',
            'Bultos' => 'Bultos',
            'Detalle' => 'Detalle',
            'Peso' => 'Peso',
            'Aforo' => 'Aforo',
            'Importe' => 'Importe',
        ];
    }

    public function getRemito()
    {
        return $this->hasOne(Remito::className(), ['idRemito' => 'idRemito']);
    }
}
