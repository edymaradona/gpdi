<?php

use yii\db\Migration;

class m160716_080034_add_user_id extends Migration
{
    public function up()
    {
        $this->addColumn('pastor', 'user_id', 'INTEGER(11) NULL AFTER `photo_path`');

    }

    public function down()
    {
        echo "m160716_080034_add_user_id cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
