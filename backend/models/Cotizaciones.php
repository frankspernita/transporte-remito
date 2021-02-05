<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cotizaciones".
 *
 * @property string $idCotizacion
 * @property string $idUsuario
 * @property int $idContacto
 * @property string $idPersona
 * @property string $Fecha
 * @property string $FormaPago
 * @property string $LugarEntrega
 * @property int $PlazoEntrega
 * @property string $ValidezEntrega
 * @property string $Nota
 * @property string $Alicuota
 * @property string $Observaciones
 * @property string $Estado
 *
 * @property Contactos $persona
 * @property Lineascot[] $lineascots
 * @property Ordenes[] $ordenes
 */
class Cotizaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cotizaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUsuario', 'idContacto', 'idPersona', 'Fecha', 'FormaPago', 'LugarEntrega', 'PlazoEntrega', 'ValidezEntrega', 'Nota', 'Alicuota', 'Observaciones', 'Estado'], 'required'],
            [['idUsuario', 'idContacto', 'idPersona', 'PlazoEntrega'], 'integer'],
            [['Fecha', 'ValidezEntrega'], 'safe'],
            [['Alicuota'], 'number'],
            [['Observaciones'], 'string'],
            [['FormaPago', 'LugarEntrega', 'Nota'], 'string', 'max' => 100],
            [['Estado'], 'string', 'max' => 1],
            [['idPersona', 'idContacto'], 'exist', 'skipOnError' => true, 'targetClass' => Personas::className(), 'targetAttribute' => ['idPersona' => 'idPersona', 'idContacto' => 'idPersona']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idCotizacion' => 'Id Cotizacion',
            'idUsuario' => 'Id Usuario',
            'idContacto' => 'Id Contacto',
            'idPersona' => 'Id Persona',
            'Fecha' => 'Fecha',
            'FormaPago' => 'Forma Pago',
            'LugarEntrega' => 'Lugar Entrega',
            'PlazoEntrega' => 'Plazo Entrega',
            'ValidezEntrega' => 'Validez Entrega',
            'Nota' => 'Nota',
            'Alicuota' => 'Alicuota',
            'Observaciones' => 'Observaciones',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Contactos::className(), ['idPersona' => 'idPersona', 'idContacto' => 'idContacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineascots()
    {
        return $this->hasMany(Lineascot::className(), ['idCotizacion' => 'idCotizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenes()
    {
        return $this->hasMany(Ordenes::className(), ['idCotizacion' => 'idCotizacion']);
    }
}
