<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ExercicioPlano;

/**
 * ExercicioPlanoSearch represents the model behind the search form of `common\models\ExercicioPlano`.
 */
class ExercicioPlanoSearch extends ExercicioPlano
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'parameterizacao_id', 'exercicio_id', 'plano_id'], 'integer'],
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
        $query = ExercicioPlano::find();

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
            'parameterizacao_id' => $this->parameterizacao_id,
            'exercicio_id' => $this->exercicio_id,
            'plano_id' => $this->plano_id,
        ]);

        return $dataProvider;
    }
}
