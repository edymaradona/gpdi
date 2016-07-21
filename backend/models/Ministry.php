<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\IndoDateTimeBehavior;

/**
 * This is the model class for table "ministry".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $organization_parent_id
 * @property integer $status_id
 * @property string $start_date
 * @property string $end_date
 * @property string $church_name
 * @property string $sk_number
 * @property string $ministry_address
 * @property string $ministry_address1
 * @property string $ministry_address2
 * @property string $phone_number
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Ministry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ministry';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'organization_parent_id', 'start_date'], 'required'],
            [['parent_id', 'organization_parent_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['remark'], 'string'],
            [
                ['church_name', 'ministry_address', 'ministry_address1', 'ministry_address2', 'ministry_address3'],
                'string',
                'max' => 255
            ],
            [['sk_number'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 100],
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
            //'organization_parent_id' => 'Organization Parent',
            //'organizationParent.organization_name' => 'Organization Parent',
            'status_id' => 'Status',
            'status.description' => 'Status',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'church_name' => 'Church Name',
            'sk_number' => 'SK Number',
            'ministry_address' => 'Address',
            'ministry_address1' => 'Desa/Kelurahan',
            'ministry_address2' => 'Kab/Kodya',
            'ministry_address3' => 'Province',
            'phone_number' => 'Phone Number',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getMinistryParent()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_parent_id']);
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
