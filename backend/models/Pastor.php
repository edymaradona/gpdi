<?php

namespace backend\models;

use Yii;
use backend\models\Parameter;

/**
 * This is the model class for table "pastor".
 *
 * @property integer $id
 * @property string $pastor_name
 * @property string $front_title
 * @property string $back_title
 * @property string $birth_place
 * @property string $birth_date
 * @property integer $gender_id
 * @property string $address
 * @property string $address1
 * @property string $address2
 * @property string $handphone
 * @property string $email
 * @property string $remark
 * @property integer $created_at
 * @property integer $updated_at
 */
class Pastor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pastor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pastor_name', 'birth_place', 'birth_date', 'created_at', 'updated_at'], 'required'],
            [['birth_date'], 'safe'],
            [['gender_id', 'created_at', 'updated_at'], 'integer'],
            [['remark'], 'string'],
            [['pastor_name', 'birth_place', 'handphone', 'email'], 'string', 'max' => 100],
            [['front_title', 'back_title'], 'string', 'max' => 25],
            [['address', 'address1', 'address2'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pastor_name' => 'Pastor Name',
            'front_title' => 'Front Title',
            'back_title' => 'Back Title',
            'birth_place' => 'Birth Place',
            'birth_date' => 'Birth Date',
            'gender_id' => 'Gender ID',
            'address' => 'Address',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'handphone' => 'Handphone',
            'email' => 'Email',
            'remark' => 'Remark',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getGender()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'gender_id'],['group_name'=>"gender"]);
    }

}
