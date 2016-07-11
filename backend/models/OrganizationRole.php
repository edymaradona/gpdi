<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "organization_role".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property integer $organization_id
 * @property string $start_date
 * @property string $end_date
 * @property integer $role_id
 * @property string $title
 * @property integer $report_to_id
 * @property integer $status_id
 * @property integer $created_at
 * @property integer $updated_at
 */
class OrganizationRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'organization_id', 'created_at', 'updated_at'], 'required'],
            [['parent_id', 'organization_id', 'role_id', 'report_to_id', 'status_id', 'created_at', 'updated_at'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['title'], 'string', 'max' => 100],
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
            'organization_id' => 'Organization ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'role_id' => 'Role ID',
            'title' => 'Title',
            'report_to_id' => 'Report To ID',
            'status_id' => 'Status ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
