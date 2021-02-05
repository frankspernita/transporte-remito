<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Remito;
use kartik\daterange\DateRangeBehavior;

/**
 * RemitoSearch represents the model behind the search form of `frontend\models\Remito`.
 */
class RemitoSearch extends Remito
{

//Agregar metodos publicos
    public $rango_fecha;
    public $fecha_desde;
    public $fecha_hasta;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idRemito', 'Factura'], 'integer'],
            [['Codigo', 'Fecha', 'Estado','rango_fecha' ,'fecha_desde' ,'fecha_hasta', 'idCamionero', 'idPersona', 'idDestinatario'], 'safe'],
            [['Flete', 'Seguro', 'GCReembolso', 'Total', 'VD', 'CReembolso', 'Cobrado', 'Diferencia'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Remito::find();

      
        $query ->joinWith('persona');
        $query ->joinWith('camionero');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idRemito' => $this->idRemito,
           // 'idPersona' => $this->idPersona,
           // 'idCamionero' => $this->idCamionero,
            'Fecha' => $this->Fecha,
           // 'idDestinatario' => $this->idDestinatario,
            'Flete' => $this->Flete,
            'Seguro' => $this->Seguro,
            'GCReembolso' => $this->GCReembolso,
            'Total' => $this->Total,
            'Cobrado' => $this->Cobrado,
            'Diferencia' => $this->Diferencia,
            'VD' => $this->VD,
            'Factura' => $this->Factura,
            'CReembolso' => $this->CReembolso,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'camionero.Nombre', $this->idCamionero])
            ->andFilterWhere(['like', 'personas.Nombre', $this->idPersona])
            ->andFilterWhere(['like', 'personas.Nombre', $this->idDestinatario])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        if (isset($this->rango_fecha) && !empty($this->rango_fecha)) {
        list($this->fecha_desde, $this->fecha_hasta) = explode(' - ', $this->rango_fecha);}
    

        $query->andFilterWhere(['>=', 'Fecha', $this->fecha_desde]);
        $query->andFilterWhere(['<=', 'Fecha', $this->fecha_hasta]);







        return $dataProvider;

    }
}
