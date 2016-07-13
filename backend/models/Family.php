<?php

namespace backend\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;


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
            [['email'], 'email'],
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
            'relation_id' => 'Relation',
            'familyRelation.description' => 'Relation',
            'family_name' => 'Family Name',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'gender_id' => 'Gender',
            'gender.description' => 'Gender',
            'handphone' => 'Handphone',
            'email' => 'Email',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getFamilyRelation()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'relation_id'])->andWhere(['group_name' => "family"]);
    }

    public function getGender()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'gender_id'])->andWhere(['group_name' => "gender"]);
    }

    public function behaviors()
    {
        /*return   [
            ' dateTimeStampBehavior '  => [
                'class'  =>  DateTimeBehavior::className(),
                'dateTimeFields'  =>  'birth_date' , //атрибут model that will change
                'format'          =>  'd-m-Y H:i' ,    // date format for the user
            ]
        ];*/
        return [
            [
                'class' => TimestampBehavior::className(),
                //'createdAtAttribute' => 'create_time',
                //'updatedAtAttribute' => 'update_time',
                //'value' => new Expression('NOW()'),
            ],
        ];

    }

}
