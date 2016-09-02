<?php

namespace app\modules\api\v1\controllers;


use yii\rest\ActiveController;
use Yii;
use app\modules\api\v1\resources\User;
/**
 * @inheritdoc
 * @var object $modelClass
 */


class UserController extends ActiveController
{
    public $modelClass = 'app\modules\api\v1\resources\User';
    public function behaviors()
    {
        return
            \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
                'corsFilter' => [
                    'class' => \yii\filters\Cors::className(),
                ],
            ]);
    }
    /**
     * custom REST action to get courses list for every Student
    * @param $id integer
     * @return  array
    */
    public function actionGetStudentCourses(int $id)
    :array {
        $user = User::findOne($id);

        return $user->lessons;
    }

}


