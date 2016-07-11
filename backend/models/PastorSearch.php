<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pastor;

/**
 * PastorSearch represents the model behind the search form about `backend\models\Pastor`.
 */
class PastorSearch extends Pastor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender_id', 'created_at', 'updated_at'], 'integer'],
            [['pastor_name', 'front_title', 'back_title', 'birth_place', 'birth_date', 'address', 'address1', 'address2', 'handphone', 'email', 'remark'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Pastor::find();

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
            'birth_date' => $this->birth_date,
            'gender_id' => $this->gender_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'pastor_name', $this->pastor_name])
            ->andFilterWhere(['like', 'front_title', $this->front_title])
            ->andFilterWhere(['like', 'back_title', $this->back_title])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'address1', $this->address1])
            ->andFilterWhere(['like', 'address2', $this->address2])
            ->andFilterWhere(['like', 'handphone', $this->handphone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
