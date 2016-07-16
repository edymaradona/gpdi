<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Pastor;

/**
 * PastorSearch represents the model behind the search form about `backend\models\Pastor`.
 */
class PastorSearch extends Pastor
{
    public static function getRecentlyCreated()
    {
        $listarray = [];
        $query = Pastor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->orderBy('created_at DESC');
        $query->limit(10);

        foreach ($dataProvider->getModels() as $model) {
            $listarray [] = [
                'id' => $model->id,
                'description' => $model->pastor_name,
                'label' => $model->pastor_name,
                'photo' => $model->photo_path,
                'url' => ['view', 'id' => $model->id,
                ],];
        }

        $returnarray = ['title' => 'Recently Added', 'icon' => 'circle-arrow-up', 'class' => 'info', 'list' => $listarray];

        return $returnarray;
    }

    public static function getRecentlyUpdated()
    {
        $listarray = [];
        $query = Pastor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->orderBy('updated_at DESC');
        $query->limit(10);

        foreach ($dataProvider->getModels() as $model) {
            $listarray [] = [
                'id' => $model->id,
                'description' => $model->pastor_name,
                'label' => $model->pastor_name,
                'photo' => $model->photo_path,
                'url' => ['view', 'id' => $model->id,
                ],];
        }

        $returnarray = ['title' => 'Recently Updated', 'icon' => 'circle-arrow-up', 'class' => 'info', 'list' => $listarray];

        return $returnarray;
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
        $query = Pastor::find()->joinWith('ministry');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
        //return $dataProvider;
        //}

        // grid filtering conditions
        if (!Yii::$app->user->can('AllModuleBundle')) {
            $query->where('ministry.organization_parent_id =' . User::getGroupId());
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'birth_date' => $this->birth_date,
            'gender_id' => $this->gender_id,
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
