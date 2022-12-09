<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Exercicio;

/**
 * ExercicioSearch represents the model behind the search form of `common\models\Exercicio`.
 */
class ExercicioSearch extends Exercicio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'equipamento_id', 'tipo_exercicio_id'], 'integer'],
            [['nome', 'descricao', 'dificuldade', 'exemplo'], 'safe'],
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
        $query = Exercicio::find();

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
            'equipamento_id' => $this->equipamento_id,
            'tipo_exercicio_id' => $this->tipo_exercicio_id,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descricao', $this->descricao])
            ->andFilterWhere(['like', 'dificuldade', $this->dificuldade])
            ->andFilterWhere(['like', 'exemplo', $this->exemplo]);

        return $dataProvider;
    }
}
