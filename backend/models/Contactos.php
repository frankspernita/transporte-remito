<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "contactos".
 *
 * @property string $idPersona
 * @property int $idContacto
 * @property string $Nombre
 * @property string $Telefono
 * @property string $Email
 * @property string $Estado
 *
 * @property Personas $persona
 * @property Cotizaciones[] $cotizaciones
 * @property Ordenes[] $ordenes
 */
class Contactos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contactos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona', 'idContacto', 'Estado'], 'required'],
            [['idPersona', 'idContacto'], 'integer'],
            [['Nombre', 'Email'], 'string', 'max' => 100],
            [['Telefono'], 'string', 'max' => 30],
            [['Estado'], 'string', 'max' => 1],
            [['idPersona', 'idContacto'], 'unique', 'targetAttribute' => ['idPersona', 'idContacto']],
            [['idPersona'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['idPersona' => 'idPersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPersona' => 'Id Persona',
            'idContacto' => 'Id Contacto',
            'Nombre' => 'Nombre',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Personas::className(), ['idPersona' => 'idPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCotizaciones()
    {
        return $this->hasMany(Cotizaciones::className(), ['idPersona' => 'idPersona', 'idContacto' => 'idContacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenes()
    {
        return $this->hasMany(Ordenes::className(), ['idPersona' => 'idPersona', 'idContacto' => 'idContacto']);
    }
}
