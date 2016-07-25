<?php

namespace backend\models;

use Yii;
use backend\modules\m1\models\Pastor;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $fullname
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $default_group_id
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public static function getGroupId()
    {
        $query = User::find(['default_group_id' => (int)Yii::$app->user->id])->one();

        return isset($query) ? $query->default_group_id : -1;
    }

    public static function getFullname()
    {
        $query = User::find()->where(['id' => Yii::$app->user->id])->one();

        return isset($query) ? $query->fullname : $query->username;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'fullname', 'auth_key', 'password_hash', 'email'], 'required'],
            [['password', 'password_repeat'], 'required', 'on' => 'password'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            [['default_group_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'fullname', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['password', 'password_repeat'], 'string', 'max' => 50],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['email'], 'email'],
            [['password_reset_token'], 'unique'],
            [['username', 'password'], 'string', 'min' => 5, 'max' => 255],
            [
                'username',
                'match',
                'pattern' => '/^[\w0-9.]+$/',
                'message' => 'can\'t use space, comma or any symbols (except dot .)  Only Word and/or Number... '
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'fullname' => 'Full Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'default_group_id' => 'Default Group',
            'defaultGroup.name' => 'Default Group',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getPastorLink()
    {
        return $this->hasOne(Pastor::className(), ['id' => 'id']);
    }

    public function getDefaultGroup()
    {
        return $this->hasOne(Organization::className(), ['id' => 'default_group_id']);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


}
