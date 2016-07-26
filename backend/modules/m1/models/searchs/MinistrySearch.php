<?php

namespace backend\modules\m1\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\m1\models\Ministry;

/**
 * MinistrySearch represents the model behind the search form about `backend\modules\m1\models\Ministry`.
 */
class MinistrySearch extends Ministry
{
    public static function getPastorGrid($id)
    {
        $query = Ministry::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere([
            'parent_id' => $id,
        ]);

        return $dataProvider;
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
