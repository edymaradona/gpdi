<?php
/**
 * User: Peter J. Kambey
 * Date: 14-07-2016
 * Time: 00:22
 */
namespace common\components;

use Yii;
use yii\base\Behavior;
use yii\db\ActiveRecord;

/**
 * Class SqlToTimestampBehavior
 * @package common\behaviors
 */
class IndoDateTimeBehavior extends Behavior
{
    /**
     * Attribute names that should be converted
     * @var array
     */
    public $attributes = [];

    /**
     * The format to convert to and from
     * @var string
     */
    public $indoFormatDate = 'php:d-m-Y';
    public $indoFormatDateTime = 'php:d-m-Y H:i';

    /**
     * @return array
     */
    public function events()
    {
        return [
            //ActiveRecord::EVENT_BEFORE_INSERT => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_UPDATE => 'beforeSave',
            ActiveRecord::EVENT_BEFORE_VALIDATE => 'beforeSave',

            //ActiveRecord::EVENT_AFTER_VALIDATE => 'afterFind',
            //ActiveRecord::EVENT_AFTER_INSERT => 'afterFind',
            //ActiveRecord::EVENT_AFTER_UPDATE => 'afterFind',
            ActiveRecord::EVENT_AFTER_FIND => 'afterFind',
        ];
    }

    /**
     * @param $event
     */
    public function beforeSave($event)
    {
        foreach ($event->sender->tableSchema->columns as $columnName => $column) {
            if (($column->dbType == 'date')) {
                $event->sender->$columnName = Yii::$app->formatter->asDate($event->sender->$columnName, 'php:Y-m-d');
            }
            if (($column->dbType == 'datetime')) {
                if (strlen($event->sender->$columnName) == 5)
                    $event->sender->$columnName = date("d-m-Y") . " " . $event->sender->$columnName;

                $event->sender->$columnName = Yii::$app->formatter->asDate($event->sender->$columnName, 'PHP:Y-m-d H:i:s');
            }
        }
        return true;
    }

    public function afterFind($event)
    {
        foreach ($event->sender->tableSchema->columns as $columnName => $column) {
            if (($column->dbType != 'date') and ($column->dbType != 'datetime'))
                continue;
            if (!strlen($event->sender->$columnName)) {
                $event->sender->$columnName = null;
                continue;
            }
            if ($column->dbType == 'date' && $event->sender->$columnName != null) {
                $event->sender->$columnName = Yii::$app->formatter->asDate($event->sender->$columnName, $this->indoFormatDate);
            } elseif ($column->dbType == 'datetime' && $event->sender->$columnName != null) {
                $event->sender->$columnName = Yii::$app->formatter->asDate($event->sender->$columnName, $this->indoFormatDateTime);
            }
        }
        return true;
    }

}