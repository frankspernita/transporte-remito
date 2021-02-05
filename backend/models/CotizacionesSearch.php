<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cotizaciones;

/**
 * CotizacionesSearch represents the model behind the search form of `backend\models\Cotizaciones`.
 */
class CotizacionesSearch extends Cotizaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idCotizacion', 'idContacto', 'idPersona', 'PlazoEntrega'], 'integer'],
            [['Fecha', 'FormaPago', 'LugarEntrega', 'ValidezEntrega', 'Nota', 'Observaciones', 'Estado'], 'safe'],
            [['Alicuota'], 'number'],
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
        $query = Cotizaciones::find();

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
            'idCotizacion' => $this->idCotizacion,
            'idContacto' => $this->idContacto,
            'idPersona' => $this->idPersona,
            'Fecha' => $this->Fecha,
            'PlazoEntrega' => $this->PlazoEntrega,
            'ValidezEntrega' => $this->ValidezEntrega,
            'Alicuota' => $this->Alicuota,
        ]);

        $query->andFilterWhere(['like', 'FormaPago', $this->FormaPago])
            ->andFilterWhere(['like', 'LugarEntrega', $this->LugarEntrega])
            ->andFilterWhere(['like', 'Nota', $this->Nota])
            ->andFilterWhere(['like', 'Observaciones', $this->Observaciones])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
