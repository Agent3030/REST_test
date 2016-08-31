<?php

use yii\db\Migration;

class m160829_195136_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),

        ], $tableOptions);

        $this->createTable('{{%lesson}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ], $tableOptions);

        $this->createTable('{{%user_to_lesson}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'lesson_id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey('fk_user', '{{%user_to_lesson}}', 'user_id', '{{%user}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('fk_lesson', '{{%user_to_lesson}}', 'lesson_id', '{{%lesson}}', 'id', 'cascade', 'cascade');

    }

    public function down()
    {
        $this->dropForeignKey('fk_user', '{{%user_to_lesson}}');
        $this->dropForeignKey('fk_lesson', '{{%user_to_lesson}}');
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%lesson}}');
        $this->dropTable('{{%user_to_lesson}}');

    }


}
