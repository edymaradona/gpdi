<?php

use yii\db\Migration;

class m160712_035010_add_photo_path extends Migration
{
    public function up()
    {
        $this->addColumn('pastor', 'photo_path', 'VARCHAR(255) AFTER `remark`');
        $this->addColumn('family', 'photo_path', 'VARCHAR(255) AFTER `remark`');
        $this->addColumn('organization', 'photo_path', 'VARCHAR(255) AFTER `remark`');
    }

    public function down()
    {
        echo "m160712_035010_add_photo_path cannot be reverted.\n";

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
