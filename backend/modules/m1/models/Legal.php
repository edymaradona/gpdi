<?php

namespace backend\modules\m1\models;

use Yii;
use backend\models\Parameter;
use common\components\IndoDateTimeBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "legal".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $type_id
 * @property string $start_date
 * @property string $end_date
 * @property string $sk_number
 * @property string $description
 * @property integer $status_id
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Legal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'legal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'sk_number', 'start_date', 'end_date'], 'required'],
            [['parent_id', 'type_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:d-m-Y'],
            [['description', 'remark'], 'string'],
            [['sk_number'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'type_id' => 'Type ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'sk_number' => 'Sk Number',
            'description' => 'Description',
            'status_id' => 'Status ID',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getType()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'type_id'])->andWhere(['group_name' => "legal"]);
    }

    public function getStatus()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'status_id'])->andWhere(['group_name' => "status"]);
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            'dateTimeBehavior' => [
                'class' => IndoDateTimeBehavior::className(),
            ]
        ];

    }

}
