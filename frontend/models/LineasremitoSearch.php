<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Lineasremito;

/**
 * LineasremitoSearch represents the model behind the search form of `frontend\models\Lineasremito`.
 */
class LineasremitoSearch extends Lineasremito
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idLineasRemitos', 'idRemito', 'Bultos'], 'integer'],
            [['Detalle', 'Aforo'], 'safe'],
            [['Peso', 'Importe'], 'number'],
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
        $query = Lineasremito::find();

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
            'idLineasRemitos' => $this->idLineasRemitos,
            'idRemito' => $this->idRemito,
            'Bultos' => $this->Bultos,
            'Peso' => $this->Peso,
            'Importe' => $this->Importe,
        ]);

        $query->andFilterWhere(['like', 'Detalle', $this->Detalle])
            ->andFilterWhere(['like', 'Aforo', $this->Aforo]);

        return $dataProvider;
    }
}
