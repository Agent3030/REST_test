<?php

use yii\db\Migration;

class m160829_201043_seed_data extends Migration
{
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'name' => 'Миша',
            'created_at' => time(),
            'updated_at' => time()
        ]);

        $this->insert('{{%user}}', [
            'id' => 2,
            'name' => 'Маша',
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 3,
            'name' => 'Саша',
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 4,
            'name' => 'Паша',
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 5,
            'name' => 'Наташа',
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%user}}', [
            'id' => 6,
            'name' => 'Даша',
            'created_at' => time(),
            'updated_at' => time()
        ]);
        $this->insert('{{%lesson}}', [
            'id' => 1,
            'name' => 'Математика',
        ]);
        $this->insert('{{%lesson}}', [
            'id' => 2,
            'name' => 'Физика',
        ]);
        $this->insert('{{%lesson}}', [
            'id' => 3,
            'name' => 'Химия',
        ]);
        $this->insert('{{%lesson}}', [
            'id' => 4,
            'name' => 'Программирование',
        ]);
        $this->insert('{{%lesson}}', [
            'id' => 5,
            'name' => 'Биология',
        ]);
        $this->insert('{{%lesson}}', [
            'id' => 6,
            'name' => 'Глубокий здоровый сон',
        ]);

        $k = 1;
        for ($i = 1; $i <=36; $i++) {

            $this->insert('{{%user_to_lesson}}', [
                'id' => $i,
                'user_id' => $k,
                'lesson_id' => mt_rand(1, 6)
            ]);

            if ($i%6 === 0) {
                $k++;
            }

        }



    }


    public function safeDown()
    {

        $this->delete('{{%user_to_lesson}}', [
            'user_id' => [1, 2, 3, 4, 5, 6]
        ]);

        $this->delete('{{%user}}', [
            'id' => [1, 2, 3, 4, 5, 6]
        ]);

        $this->delete('{{%lesson}}', [
            'id' => [1, 2, 3, 4, 5, 6]
        ]);


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
