<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "organization".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $start_date
 * @property string $end_date
 * @property string $organization_name
 * @property string $description
 * @property string $sk_number
 * @property string $ministry_address
 * @property string $ministry_address1
 * @property string $ministry_address2
 * @property string $phone_number
 * @property integer $status_id
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'start_date', 'organization_name', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['remark'], 'string'],
            [['organization_name', 'phone_number'], 'string', 'max' => 100],
            [['description', 'ministry_address', 'ministry_address1', 'ministry_address2'], 'string', 'max' => 255],
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
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'organization_name' => 'Organization Name',
            'description' => 'Description',
            'sk_number' => 'Sk Number',
            'ministry_address' => 'Ministry Address',
            'ministry_address1' => 'Ministry Address1',
            'ministry_address2' => 'Ministry Address2',
            'phone_number' => 'Phone Number',
            'status_id' => 'Status ID',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];

    }

}
