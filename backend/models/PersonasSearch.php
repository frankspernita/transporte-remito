<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Personas;

/**
 * PersonasSearch represents the model behind the search form of `backend\models\Personas`.
 */
class PersonasSearch extends Personas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPersona'], 'integer'],
            [['Codigo', 'Nombre', 'CUIT', 'DireccionCom', 'LocalidadCom', 'ProvinciaCom', 'CPCom', 'DireccionDep', 'LocalidadDep', 'ProvinciaDep', 'CPDep', 'Rubro', 'CategoriaIVA', 'IIBB', 'Telefono', 'Mail', 'Tipo', 'Estado'], 'safe'],
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
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'CUIT', $this->CUIT])
            ->andFilterWhere(['like', 'DireccionCom', $this->DireccionCom])
            ->andFilterWhere(['like', 'LocalidadCom', $this->LocalidadCom])
            ->andFilterWhere(['like', 'ProvinciaCom', $this->ProvinciaCom])
            ->andFilterWhere(['like', 'CPCom', $this->CPCom])
            ->andFilterWhere(['like', 'DireccionDep', $this->DireccionDep])
            ->andFilterWhere(['like', 'LocalidadDep', $this->LocalidadDep])
            ->andFilterWhere(['like', 'ProvinciaDep', $this->ProvinciaDep])
            ->andFilterWhere(['like', 'CPDep', $this->CPDep])
            ->andFilterWhere(['like', 'Rubro', $this->Rubro])
            ->andFilterWhere(['like', 'CategoriaIVA', $this->CategoriaIVA])
            ->andFilterWhere(['like', 'IIBB', $this->IIBB])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Mail', $this->Mail])
            ->andFilterWhere(['like', 'Tipo', $this->Tipo])
            ->andFilterWhere(['like', 'Estado', $this->Estado]);

        return $dataProvider;
    }
}
