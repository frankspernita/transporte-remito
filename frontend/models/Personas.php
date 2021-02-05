<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property int $idPersona
 * @property int $Codigo
 * @property string $Nombre
 * @property string $CUIT
 * @property string $DireccionCom
 * @property string $LocalidadCom
 * @property string $ProvinciaCom
 * @property string $Rubro
 * @property string $Telefono
 * @property string $Email
 * @property string $Estado
 */
class Personas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'personas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Codigo'], 'integer'],
            [['Nombre', 'CUIT', 'DireccionCom', 'LocalidadCom', 'ProvinciaCom'], 'required'],
            [['Nombre', 'DireccionCom', 'LocalidadCom'], 'string', 'max' => 100],
            [['CUIT'], 'string', 'max' => 20],
            [['ProvinciaCom'], 'string', 'max' => 30],
            [['Rubro', 'Telefono'], 'string', 'max' => 50],
            [['Estado'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'Codigo' => 'Codigo',
            'Nombre' => 'Nombre',
            'CUIT' => 'Cuit',
            'DireccionCom' => 'Direccion Com',
            'LocalidadCom' => 'Localidad Com',
            'ProvinciaCom' => 'Provincia Com',
            'Rubro' => 'Rubro',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Estado' => 'Estado',
        ];
    }
}
