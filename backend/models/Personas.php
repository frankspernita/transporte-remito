<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "personas".
 *
 * @property string $idPersona
 * @property string $Codigo
 * @property string $Nombre
 * @property string $CUIT
 * @property string $DireccionCom
 * @property string $LocalidadCom
 * @property string $ProvinciaCom
 * @property string $CPCom
 * @property string $DireccionDep
 * @property string $LocalidadDep
 * @property string $ProvinciaDep
 * @property string $CPDep
 * @property string $Rubro
 * @property string $CategoriaIVA
 * @property string $IIBB
 * @property string $Telefono
 * @property string $Mail
 * @property string $Tipo
 * @property string $Estado
 *
 * @property Contactos[] $contactos
 * @property Pedidos[] $pedidos
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
            [['idPersona', 'Codigo', 'Nombre', 'CUIT', 'DireccionCom', 'LocalidadCom', 'ProvinciaCom', 'CPCom', 'DireccionDep', 'LocalidadDep', 'ProvinciaDep', 'CPDep', 'Telefono', 'Mail', 'Tipo', 'Estado'], 'required'],
            [['idPersona'], 'integer'],
            [['Codigo', 'CPCom', 'CPDep'], 'integer'],
            [['Nombre', 'DireccionCom', 'LocalidadCom', 'DireccionDep', 'LocalidadDep', 'CategoriaIVA', 'Mail'], 'string', 'max' => 100],
            [['mail'], 'email'],
            [['CUIT'], 'string', 'max' => 20],
            [['ProvinciaCom', 'ProvinciaDep', 'Telefono'], 'string', 'max' => 30],
            [['Rubro'], 'string', 'max' => 50],
            [['IIBB'], 'string', 'max' => 45],
            [['Tipo', 'Estado'], 'string', 'max' => 1],
            [['idPersona'], 'unique'],
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
            'CPCom' => 'Cpcom',
            'DireccionDep' => 'Direccion Dep',
            'LocalidadDep' => 'Localidad Dep',
            'ProvinciaDep' => 'Provincia Dep',
            'CPDep' => 'Cpdep',
            'Rubro' => 'Rubro',
            'CategoriaIVA' => 'Categoria Iva',
            'IIBB' => 'Iibb',
            'Telefono' => 'Telefono',
            'Mail' => 'Mail',
            'Tipo' => 'Tipo',
            'Estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contactos::className(), ['idPersona' => 'idPersona']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::className(), ['idPersona' => 'idPersona']);
    }
}
