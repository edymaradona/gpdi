<?php

use yii\db\Migration;

class m160704_141220_audi extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%pastor}}', [
            'id' => $this->primaryKey(),
            'pastor_name' => $this->string(100)->notNull(),
            'front_title' => $this->string(25),
            'back_title' => $this->string(25),
            'birth_place' => $this->string(100)->notNull(),
            'birth_date' => $this->date()->notNull(),
            'gender_id' => $this->smallInteger()->notNull()->defaultValue(1),
            'address' => $this->string(),
            'address1' => $this->string(),
            'address2' => $this->string(),
            'handphone' => $this->string(100),
            'email' => $this->string(100),
            'remark' => $this->text(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%family}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'relation_id' => $this->smallInteger()->notNull()->defaultValue(1),
            'family_name' => $this->string(100)->notNull(),
            'birth_place' => $this->string(100)->notNull(),
            'birth_date' => $this->date()->notNull(),
            'gender_id' => $this->smallInteger()->notNull()->defaultValue(1),
            'handphone' => $this->string(100),
            'email' => $this->string(100),
            'remark' => $this->text(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%ministry}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'organization_parent_id' => $this->integer()->notNull(),
            'status_id' => $this->smallInteger()->notNull()->defaultValue(1),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date(),
            'church_name' => $this->string(),
            'sk_number' => $this->string(50),
            'ministry_address' => $this->string(),
            'ministry_address1' => $this->string(),
            'ministry_address2' => $this->string(),
            'phone_number' => $this->string(100),
            'remark' => $this->text(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%report}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'period' => $this->integer(6),
            'congregation' => $this->smallInteger(),
            'sector' => $this->smallInteger(),
            'kom' => $this->smallInteger(),
            'pos_pi' => $this->smallInteger(),
            'phone_number' => $this->string(100),
            'remark' => $this->text(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%organization_role}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'organization_id' => $this->integer()->notNull(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'role_id' => $this->smallInteger(),
            'title' => $this->string(100),
            'report_to_id' => $this->integer(),
            'status_id' => $this->smallInteger()->notNull()->defaultValue(1),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%parameter}}', [
            'id' => $this->integer()->notNull(),
            'group_name' => $this->string(10),
            'description' => $this->string(100),
            'status_id' => $this->smallInteger()->notNull()->defaultValue(1),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);

        $this->createTable('{{%organization}}', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull(),
            'start_date' => $this->date()->notNull(),
            'end_date' => $this->date(),
            'organization_name' => $this->string(100)->notNull(),
            'description' => $this->string(),
            'sk_number' => $this->string(50),
            'ministry_address' => $this->string(),
            'ministry_address1' => $this->string(),
            'ministry_address2' => $this->string(),
            'phone_number' => $this->string(100),
            'status_id' => $this->smallInteger()->notNull()->defaultValue(1),
            'remark' => $this->text(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ], $tableOptions);
    }

    public function down()
    {
        echo "m160704_141220_audi cannot be reverted.\n";

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
