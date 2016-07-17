<?php

namespace backend\models;

use Yii;
use backend\models\IndoKecamatan;

/**
 * This is the model class for table "indo_kelurahan".
 *
 * @property string $id_kel
 * @property integer $id_kec
 * @property string $nama
 */
class IndoKelurahan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indo_kelurahan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kel'], 'required'],
            [['id_kel', 'id_kec'], 'integer'],
            [['nama'], 'string', 'max' => 40],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kel' => 'Id Kel',
            'id_kec' => 'Id Kec',
            'nama' => 'Nama',
        ];
    }

    public function getParent()
    {
        return $this->hasOne(IndoKecamatan::className(), ['id_kec' => 'id_kec']);
    }

}
