<?php

namespace backend\models\search;

use common\models\User;
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

    public $userStatus;
    public function rules()
    {
        return [
            [['user_id', 'telemovel', 'altura'], 'integer'],
            [['peso'], 'number'],
            [['nomeproprio', 'apelido', 'codpostal', 'pais', 'cidade', 'morada', 'userStatus'], 'safe'],
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
       $query->select('perfil.user_id, nomeproprio, apelido, telemovel')//perfil.id, perfil.telemovel, perfil.nomeproprio, user.status
            ->from('user');
        $query->join = [
            ['JOIN', 'perfil', 'perfil.user_id = user.id'],
            ['JOIN', 'auth_assignment', 'user.id = auth_assignment.user_id']];
        $query->where('auth_assignment.item_name = "nutricionista"');

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
            'perfil.user_id' => $this->user_id,

        ]);

        $query->andFilterWhere(['like', 'nomeproprio', $this->nomeproprio])
            ->andFilterWhere(['like', 'apelido', $this->apelido])
            ->andFilterWhere(['like', 'codpostal', $this->codpostal])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'cidade', $this->cidade])
            ->andFilterWhere(['like', 'morada', $this->morada])
            ->andFilterWhere(['like', 'status', $this->userStatus]);

        return $dataProvider;
    }
}
