<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Ministry;

/**
 * MinistrySearch represents the model behind the search form about `backend\models\Ministry`.
 */
class MinistrySearch extends Ministry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'organization_parent_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['start_date', 'end_date', 'church_name', 'sk_number', 'ministry_address', 'ministry_address1', 'ministry_address2', 'phone_number', 'remark'], 'safe'],
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
        $query = Ministry::find();

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
            'parent_id' => $this->parent_id,
            'organization_parent_id' => $this->organization_parent_id,
            'status_id' => $this->status_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'church_name', $this->church_name])
            ->andFilterWhere(['like', 'sk_number', $this->sk_number])
            ->andFilterWhere(['like', 'ministry_address', $this->ministry_address])
            ->andFilterWhere(['like', 'ministry_address1', $this->ministry_address1])
            ->andFilterWhere(['like', 'ministry_address2', $this->ministry_address2])
            ->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
