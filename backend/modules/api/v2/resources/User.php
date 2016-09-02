<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 30.08.16
 * Time: 22:32
 */

namespace app\modules\api\v2\resources;


use app\models\Lesson;

/**
 * This is the REST resource class extended from User model.
 * fields:
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 * extra-fields (URI?expand=lessons)
 * @property array $lessons
 */

class User extends \app\models\User
{
    /**
     * @return  array
     */

    public function behaviors()
    {
        return
            \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
                'corsFilter' => [
                    'class' => \yii\filters\Cors::className(),
                ],
            ]);
    }
    public function fields()
    :array {
        return ['id', 'name', 'created_at', 'updated_at','lessons' => function($model){
            $lesson_out = [];
            $i=1;
            $lessons = $model->userToLessons;
            foreach ($lessons as $lesson) {
                $lesson_id = $lesson['lesson_id'];

                $lesson = Lesson::find()->where(['id' => $lesson_id])->all();
                foreach ($lesson as $lname) {
                    $lesson_out['lesson' . '#' . $i] = $lname->name;
                    $i++;
                }
            }
            return $lesson_out;
        }];

    }


}