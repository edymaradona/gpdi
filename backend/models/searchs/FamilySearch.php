<?php

namespace backend\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Family;

/**
 * FamilySearch represents the model behind the search form about `backend\models\Family`.
 */
class FamilySearch extends Family
{
    public static function getPastorGrid($id)
    {
        $query = Family::find();


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->andFilterWhere([
            'parent_id' => $id,
        ]);

        return $dataProvider;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'relation_id', 'gender_id', 'created_at', 'updated_at'], 'integer'],
            [['family_name', 'birth_place', 'birth_date', 'handphone', 'email', 'remark'], 'safe'],
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
        $query = Family::find();

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
            'relation_id' => $this->relation_id,
            'birth_date' => $this->birth_date,
            'gender_id' => $this->gender_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'family_name', $this->family_name])
            ->andFilterWhere(['like', 'birth_place', $this->birth_place])
            ->andFilterWhere(['like', 'handphone', $this->handphone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
