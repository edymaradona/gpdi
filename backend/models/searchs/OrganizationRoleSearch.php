<?php

namespace backend\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrganizationRole;

/**
 * OrganizationRoleSearch represents the model behind the search form about `backend\models\OrganizationRole`.
 */
class OrganizationRoleSearch extends OrganizationRole
{
    public static function getPastorGrid($id)
    {
        $query = OrganizationRole::find();


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
            [
                [
                    'id',
                    'parent_id',
                    'organization_id',
                    'role_id',
                    'report_to_id',
                    'status_id',
                    'created_at',
                    'updated_at'
                ],
                'integer'
            ],
            [['start_date', 'end_date', 'title'], 'safe'],
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
        $query = OrganizationRole::find();

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
            'organization_id' => $this->organization_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'role_id' => $this->role_id,
            'report_to_id' => $this->report_to_id,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }

}
