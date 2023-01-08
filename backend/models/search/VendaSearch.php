<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Venda;

/**
 * VendaSearch represents the model behind the search form of `common\models\Venda`.
 */
class VendaSearch extends Venda
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'estado', 'created_at', 'created_by'], 'integer'],
            [['preco_total'], 'number'],
            [['nomeproprio', 'apelido', 'email', 'transacao_id', 'paypal_order_id'], 'safe'],
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
        $query = Venda::find();

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
            'preco_total' => $this->preco_total,
            'estado' => $this->estado,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'nomeproprio', $this->nomeproprio])
            ->andFilterWhere(['like', 'apelido', $this->apelido])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'transacao_id', $this->transacao_id])
            ->andFilterWhere(['like', 'paypal_order_id', $this->paypal_order_id]);

        return $dataProvider;
    }
}
