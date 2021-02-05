<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "camionero".
 *
 * @property int $idCamionero
 * @property int $DNI
 * @property string $Nombre
 * @property string $Telefono
 * @property string $Estado
 */
class Camionero extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'camionero';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['DNI'], 'integer'],
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 100],
            [['Telefono'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCamionero' => 'Id Camionero',
            'DNI' => 'Dni',
            'Nombre' => 'Nombre',
            'Telefono' => 'Telefono',
            'Estado' => 'Estado',
        ];
    }
}
