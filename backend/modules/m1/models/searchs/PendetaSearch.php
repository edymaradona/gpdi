<?php

namespace backend\modules\m1\models\searchs;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\m1\models\Pendeta;
use common\models\User;

/**
 * PendetaSearch represents the model behind the search form about `backend\modules\m1\models\Pendeta`.
 */
class PendetaSearch extends Pendeta
{

    public static function getPastorGrid($id)
    {
        $query = Pendeta::find();


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
        $query = Pendeta::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //if (!$this->validate()) {
        // uncomment the following line if you do not want to return any records when validation fails
        // $query->where('0=1');
        //    return $dataProvider;
        //}

        if (!Yii::$app->user->can('AllModuleBundle')) {
            $query->joinWith('pendeta');
            $query->where('pendeta.organization_parent_id =' . User::getGroupId());
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'pendeta_id' => $this->pendeta_id,
            'start_date' => $this->start_date,
            'status_id' => $this->status_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'sk_number', $this->sk_number])
            ->andFilterWhere(['like', 'event_name', $this->event_name])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
