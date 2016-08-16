<?php

namespace backend\modules\m1\models;

use Yii;
use backend\models\Parameter;

/**
 * This is the model class for table "education".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $level_id
 * @property string $school_name
 * @property string $city
 * @property string $country
 * @property string $interest
 * @property integer $graduate_year
 * @property integer $created_at
 * @property integer $updated_at
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'required'],
            [['parent_id', 'level_id', 'graduate_year', 'created_at', 'updated_at'], 'integer'],
            [['school_name', 'city', 'country'], 'string', 'max' => 255],
            [['interest'], 'string', 'max' => 100],
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
            'level_id' => 'Level',
            'level.name' => 'Level',
            'school_name' => 'Nama Sekolah',
            'city' => 'Kota',
            'country' => 'Negara',
            'interest' => 'Jurusan',
            'graduate_year' => 'Thn Lulus',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getLevel()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'level_id'])->andWhere(['group_name' => "education"]);
    }


}
