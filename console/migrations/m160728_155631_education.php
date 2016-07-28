<?php

use yii\db\Migration;

class m160728_155631_education extends Migration
{
    public function up()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }


        $this->createTable('{{%education}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'level_id' => $this->smallInteger()->notNull()->defaultValue(1),
            'school_name' => $this->string(),
            'city' => $this->string(),
            'country' => $this->string(),
            'interest' => $this->string(100),
            'graduate_year' => $this->smallInteger(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        echo "m160728_155631_education cannot be reverted.\n";

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
