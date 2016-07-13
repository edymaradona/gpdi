<?php

namespace backend\models;

use Yii;
use backend\models\Parameter;
use kartik\helpers\Html;
use yii\data\ActiveDataProvider;

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
 * @property string $photo_path
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
            [['pastor_name', 'birth_place', 'birth_date', 'address', 'handphone'], 'required'],
            [['birth_date'], 'safe'],
            [['gender_id', 'created_at', 'updated_at'], 'integer'],
            [['remark'], 'string'],
            [['email'], 'email'],
            [['pastor_name', 'birth_place', 'handphone', 'email'], 'string', 'max' => 100],
            [['front_title', 'back_title'], 'string', 'max' => 25],
            [['address', 'address1', 'address2', 'photo_path'], 'string', 'max' => 255],
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
            'gender_id' => 'Gender',
            'gender.description' => 'Gender',
            'address' => 'Address',
            'address1' => 'Kab/Kodya',
            'address2' => 'Province',
            'handphone' => 'Handphone',
            'email' => 'Email',
            'remark' => 'Remark',
            'photo_path' => 'Photo Path',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getGender()
    {
        return $this->hasOne(Parameter::className(), ['id' => 'gender_id'])->andWhere(['group_name' => "gender"]);
    }

    public function getPhotoPath()
    {
        $options = ['width' => '100%', 'id' => 'photo', 'align' => 'left', 'class' => 'class-image'];
        if ($this->photo_path != null && $this->getPhotoExist()) {
            if ($this->getPhotoExistThumb()) {
                $path = Html::img('@web/images/thumb/' . $this->photo_path, $options);
            } else {
                $path = Html::img('@web/images/' . $this->photo_path, $options);
            }
        } else {
            if ($this->gender_id == 1) {
                $path = Html::img('@web/images/nophoto.jpg', $options);
            } else {
                $path = Html::img('@web/images/nophotoW.jpg', $options);
            }
        }

        return $path;
    }

    public function getPhotoExist()
    {
        if ($this->photo_path != null) {
            return is_file(Yii::getAlias('@app') . '/web/images/' . $this->photo_path) ? true : false;
        } else
            return false;
    }

    public function getPhotoExistThumb()
    {
        if ($this->photo_path != null) {
            return is_file(Yii::getAlias('@web') . '/web/images/thumb/' . $this->photo_path) ? true : false;
        } else
            return false;
    }

    public function getPhotoPathReal()
    {
        if ($this->photo_path != null && $this->PhotoExist) {
            if ($this->getPhotoExistThumb()) {
                $path = '@web/images/thumb/' . $this->photo_path;
            } else {
                $path = '@web/images/' . $this->photo_path;
            }
        } else {
            if ($this->gender_id == 1) {
                $path = '@web/images/nophoto.jpg';
            } else {
                $path = '@web/images/nophotoW.jpg';
            }
        }

        return $path;
    }
    
}
