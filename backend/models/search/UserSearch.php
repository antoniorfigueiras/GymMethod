<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Perfil;

/**
 * ClienteSearch represents the model behind the search form of `common\models\Perfil`.
 */
class UserSearch extends Perfil
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'telemovel', 'altura', 'nif'], 'integer'],
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
    public function search($params, $value)
    {
        $query = Perfil::find();

        $query->select('perfil.user_id, nomeproprio, apelido, telemovel, nif, codpostal')
            ->from('user');
        $query->join = [
            ['JOIN', 'perfil', 'perfil.user_id = user.id']];

        $query->where('user.status = 1');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['user_id'] = [

            'asc' => ['user.status' => SORT_ASC],
            'desc' => ['user.status' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
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
            ->andFilterWhere(['like', 'morada', $this->morada])
            ->andFilterWhere(['like', 'nif', $this->nif]);
        return $dataProvider;
    }
}
