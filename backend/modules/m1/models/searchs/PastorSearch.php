<?php

namespace backend\modules\m1\models\searchs;

use backend\models\User;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\m1\models\Pastor;
use kartik\helpers\Html;

/**
 * PastorSearch represents the model behind the search form about `backend\modules\m1\models\Pastor`.
 */
class PastorSearch extends Pastor
{
    public static function getRecentlyCreated()
    {
        $listArray = [];
        $query = Pastor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        if (!Yii::$app->user->can('AllModuleBundle')) {
            $query->joinWith('ministry');
            $query->where('ministry.organization_parent_id =' . User::getGroupId());
        }

        $query->orderBy('created_at DESC');
        $query->limit(10);

        foreach ($dataProvider->getModels() as $model) {
            $listArray [] = [
                'id' => $model->id,
                //'heading' => $model->pastor_name,
                'body' =>
                    '<strong>' . $model->pastor_name . '</strong><br/>'
                    . $model->address2 . ' ' . $model->address3,
                'img' => $model->getPhotoPathReal(),
                'src' => ['/m1/pastor/view', 'id' => $model->id,],
                'imgOptions' => ['style' => 'width:50px']
            ];
        }

        $returnArray = [
            'title' => 'Recently Added',
            'icon' => 'circle-arrow-up',
            'type' => 'info',
            'list' => $listArray
        ];

        return $returnArray;
    }

    public static function getRecentlyUpdated()
    {
        $listArray = [];
        $query = Pastor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        if (!Yii::$app->user->can('AllModuleBundle')) {
            $query->joinWith('ministry');
            $query->where('ministry.organization_parent_id =' . User::getGroupId());
        }

        $query->orderBy('updated_at DESC');
        $query->limit(10);

        foreach ($dataProvider->getModels() as $model) {
            $listArray [] = [
                'id' => $model->id,
                //'heading' => $model->pastor_name,
                'body' =>
                    '<strong>' . $model->pastor_name . '</strong><br/>'
                    . $model->address2 . ' ' . $model->address3,
                'img' => $model->getPhotoPathReal(),
                'src' => ['/m1/pastor/view', 'id' => $model->id,],
                'imgOptions' => ['style' => 'width:50px']
            ];
        }

        $returnArray = [
            'title' => 'Recently Updated',
            'icon' => 'circle-arrow-up',
            'type' => 'info',
            'list' => $listArray
        ];

        return $returnArray;
    }

    public static function getBirthdayToday()
    {

        $listArray = [];
        $query = Pastor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false
        ]);

        if (!Yii::$app->user->can('AllModuleBundle')) {
            $query->joinWith('ministry');
            $query->where('ministry.organization_parent_id =' . User::getGroupId());
        }

        $query->orderBy('updated_at DESC');
        $query->limit(10);

        $items = [];
        $detail = [];
        foreach ($dataProvider->getModels() as $model) {
            $detail['title'] = $model->pastor_name;
            $detail['start'] = date('Y') . '-' . date('m', strtotime($model->birth_date)) . '-' . date('d',
                    strtotime($model->birth_date));
            $detail['color'] = '#CC0000';
            $detail['allDay'] = true;
            //$detail['url'] = Html::url('/m1/person/view', ['id' => $model->id]);
            $items[] = $detail;
        }

        return $items;
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

        //if (!$this->validate()) {
        // uncomment the following line if you do not want to return any records when validation fails
        // $query->where('0=1');
        //return $dataProvider;
        //}

        if (!Yii::$app->user->can('AllModuleBundle')) {
            $query->joinWith('ministry');
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
