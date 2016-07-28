<?php

namespace backend\modules\m1\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\IndoDateTimeBehavior;
use backend\models\Organization;
use backend\models\Parameter;

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
            [['parent_id', 'organization_parent_id', 'church_name', 'start_date'], 'required'],
            [['parent_id', 'organization_parent_id', 'status_id', 'created_at', 'updated_at', 'type_id', 'ownership_id', 'pastor_status_id'], 'integer'],
            [['start_date', 'end_date'], 'date', 'format' => 'php:d-m-Y'],
            [['remark'], 'string'],
            [
                ['church_name', 'ministry_address', 'ministry_address1', 'ministry_address2', 'ministry_address3'],
                'string',
                'max' => 255
            ],
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
            'organization_parent_id' => 'Organization Parent',
            'status_id' => 'Status',
            'status.description' => 'Status',
            'type_id' => 'Type',
            'ownership_id' => 'Kepemilikan',
            'start_date' => 'Tgl Mulai',
            'end_date' => 'Tgl Akhir',
            'church_name' => 'Nama Gereja',
            'ministry_address' => 'Alamat',
            'ministry_address1' => 'Desa/Kelurahan',
            'ministry_address2' => 'Kab/Kodya',
            'ministry_address3' => 'Propinsi',
            'phone_number' => 'No. Telpon',
            'pastor_status_id' => 'Jabatan Pelayanan',
            'remark' => 'Keterangan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'ministryParent.name' => 'Wilayah'
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
