<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Pagosremito;

/**
 * PagosremitoSearch represents the model behind the search form of `frontend\models\Pagosremito`.
 */
class PagosremitoSearch extends Pagosremito
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPagosRemito', 'idRemito'], 'integer'],
            [['Fecha', 'Observacion', 'Estado'], 'safe'],
            [['Pago'], 'number'],
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
        $query = Pagosremito::find();

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
            'idPagosRemito' => $this->idPagosRemito,
            'idRemito' => $this->idRemito,
            'Fecha' => $this->Fecha,
            'Pago' => $this->Pago,
        ]);

        $query->andFilterWhere(['like', 'Observacion', $this->Observacion])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
