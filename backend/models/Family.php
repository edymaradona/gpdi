<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "family".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $relation_id
 * @property string $family_name
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $gender_id
 * @property string $handphone
 * @property string $email
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Family extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'family';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'family_name', 'birth_place', 'birth_date', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'relation_id', 'gender_id', 'created_at', 'updated_at'], 'integer'],
            [['birth_date'], 'safe'],
            [['remark'], 'string'],
            [['family_name', 'birth_place', 'handphone', 'email'], 'string', 'max' => 100],
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
            'relation_id' => 'Relation ID',
            'family_name' => 'Family Name',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'gender_id' => 'Gender ID',
            'handphone' => 'Handphone',
            'email' => 'Email',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
