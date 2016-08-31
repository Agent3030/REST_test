<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property integer $id
 * @property string $name
 *
 * @property UserToLesson[] $userToLessons
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessonsToUsers()
    {
        return $this->hasMany(UserToLesson::className(), ['lesson_id' => 'id']);
    }

    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])
            ->via('LessonsToUsers');
    }
}
