<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Personas;

/**
 * PersonasSearch represents the model behind the search form of `frontend\models\Personas`.
 */
class PersonasSearch extends Personas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona', 'Codigo'], 'integer'],
            [['Nombre', 'CUIT', 'DireccionCom', 'LocalidadCom', 'ProvinciaCom', 'Rubro', 'Telefono', 'Email', 'Estado'], 'safe'],
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
        $query = Personas::find();

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
            'idPersona' => $this->idPersona,
            'Codigo' => $this->Codigo,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'CUIT', $this->CUIT])
            ->andFilterWhere(['like', 'DireccionCom', $this->DireccionCom])
            ->andFilterWhere(['like', 'LocalidadCom', $this->LocalidadCom])
            ->andFilterWhere(['like', 'ProvinciaCom', $this->ProvinciaCom])
            ->andFilterWhere(['like', 'Rubro', $this->Rubro])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
