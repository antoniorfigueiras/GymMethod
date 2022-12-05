<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Perfil;

/**
 * NutricionistaSearch represents the model behind the search form of `common\models\Perfil`.
 */
class NutricionistaSearch extends Perfil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'telemovel', 'altura'], 'integer'],
            [['peso'], 'number'],
            [['nomeproprio', 'apelido', 'codpostal', 'pais', 'cidade', 'morada'], 'safe'],
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
        $query = Perfil::find();
        $query->select('*')
            ->from('user');
        $query->join = [
            ['JOIN', 'perfil', 'perfil.user_id = user.id'],
            ['JOIN', 'auth_assignment', 'user.id = auth_assignment.user_id']];
        $query->where('auth_assignment.item_name = "nutricionista"');
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
            'id' => $this->id,
            'user_id' => $this->user_id,
            'telemovel' => $this->telemovel,
            'peso' => $this->peso,
            'altura' => $this->altura,
        ]);

        $query->andFilterWhere(['like', 'nomeproprio', $this->nomeproprio])
            ->andFilterWhere(['like', 'apelido', $this->apelido])
            ->andFilterWhere(['like', 'codpostal', $this->codpostal])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'morada', $this->morada]);

        return $dataProvider;
    }
}
