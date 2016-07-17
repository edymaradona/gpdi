<?php

namespace backend\models;

use Yii;
use backend\models\IndoProvinsi;

/**
 * This is the model class for table "indo_kabupaten".
 *
 * @property integer $id_kab
 * @property integer $id_prov
 * @property string $nama
 */
class IndoKabupaten extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indo_kabupaten';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kab', 'id_prov', 'nama'], 'required'],
            [['id_kab', 'id_prov'], 'integer'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kab' => 'Id Kab',
            'id_prov' => 'Id Prov',
            'nama' => 'Nama',
        ];
    }

    public function getParent()
    {
        return $this->hasOne(IndoProvinsi::className(), ['id_prov' => 'id_prov']);
    }

}
