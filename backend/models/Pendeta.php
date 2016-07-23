<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\IndoDateTimeBehavior;

/**
 * This is the model class for table "pendeta".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $pendeta_id
 * @property string $start_date
 * @property string $sk_number
 * @property string $event_name
 * @property string $place
 * @property integer $status_id
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pendeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pendeta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'start_date'], 'required'],
            [['parent_id', 'pendeta_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['start_date'], 'safe'],
            [['remark'], 'string'],
            [['sk_number'], 'string', 'max' => 50],
            [['event_name', 'place'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent',
            'pendeta_id' => 'Status Pendeta',
            'pendeta.description' => 'Status Pendeta',
            'start_date' => 'Tgl. Mulai',
            'sk_number' => 'No SK',
            'event_name' => 'Pada Acara',
            'place' => 'Tempat',
            'status_id' => 'Status',
            'status.description' => 'Status',
            'remark' => 'Keterangan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getPendeta()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'pendeta_id'])->andWhere(['group_name' => "pendeta"]);
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
