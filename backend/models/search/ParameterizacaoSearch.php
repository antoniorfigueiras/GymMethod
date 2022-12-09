<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Parameterizacao;

/**
 * ParameterizacaoSearch represents the model behind the search form of `common\models\Parameterizacao`.
 */
class ParameterizacaoSearch extends Parameterizacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'series', 'seriesCliente', 'repeticoes', 'repeticoesCliente', 'peso', 'pesoCliente'], 'integer'],
            [['data', 'tempo'], 'safe'],
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
        $query = Parameterizacao::find();

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
            'data' => $this->data,
            'series' => $this->series,
            'seriesCliente' => $this->seriesCliente,
            'repeticoes' => $this->repeticoes,
            'repeticoesCliente' => $this->repeticoesCliente,
            'peso' => $this->peso,
            'pesoCliente' => $this->pesoCliente,
            'tempo' => $this->tempo,
        ]);

        return $dataProvider;
    }
}
