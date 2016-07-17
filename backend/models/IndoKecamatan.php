<?php

namespace backend\models;

use Yii;
use backend\models\IndoKabupaten;

/**
 * This is the model class for table "indo_kecamatan".
 *
 * @property integer $id_kec
 * @property integer $id_kab
 * @property string $nama
 */
class IndoKecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indo_kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kec', 'id_kab', 'nama'], 'required'],
            [['id_kec', 'id_kab'], 'integer'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kec' => 'Id Kec',
            'id_kab' => 'Id Kab',
            'nama' => 'Nama',
        ];
    }

    public function getParent()
    {
        return $this->hasOne(IndoKabupaten::className(), ['id_kab' => 'id_kab']);
    }
}
