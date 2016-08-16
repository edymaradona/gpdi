<?php

namespace backend\modules\m1\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\components\IndoDateTimeBehavior;

/**
 * This is the model class for table "report".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $period
 * @property integer $congregation
 * @property integer $sector
 * @property integer $kom
 * @property integer $pos_pi
 * @property string $phone_number
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'period'], 'required'],
            [['parent_id', 'period', 'congregation', 'sector', 'kom', 'pos_pi', 'created_at', 'updated_at'], 'integer'],
            [['remark'], 'string'],
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
            'period' => 'Period',
            'congregation' => 'Jemaat',
            'sector' => 'Sektor',
            'kom' => 'KOM',
            'pos_pi' => 'Pos PI',
            'phone_number' => 'No. Telpon',
            'remark' => 'Ket.',
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
            'dateTimeBehavior' => [
                'class' => IndoDateTimeBehavior::className(),
            ]
        ];

    }

}
