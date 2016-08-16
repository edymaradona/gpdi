<?php

namespace backend\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "parameter".
 *
 * @property integer $id
 * @property string $group_name
 * @property string $description
 * @property integer $status_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class Parameter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parameter';
    }

    /**
     * @param string $groupName
     * @return array
     */
    public static function getDropDown($groupName = 'status')
    {
        $arrayList = [];

        $query = Parameter::find()->where(['group_name'=>$groupName]);

        $arrayList = arrayHelper::map($query,'id','description');        

        return $arrayList;

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'group_name', 'description'], 'required'],
            [['id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['group_name'], 'string', 'max' => 10],
            [['description'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'group_name' => 'Group Name',
            'description' => 'Description',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

}
