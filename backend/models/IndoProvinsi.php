<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "indo_provinsi".
 *
 * @property integer $id_prov
 * @property string $nama
 */
class IndoProvinsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'indo_provinsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_prov', 'nama'], 'required'],
            [['id_prov'], 'integer'],
            [['nama'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_prov' => 'Id Prov',
            'nama' => 'Nama',
        ];
    }
}
