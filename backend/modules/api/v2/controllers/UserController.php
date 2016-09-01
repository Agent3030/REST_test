<?php

namespace app\modules\api\v2\controllers;


use yii\rest\ActiveController;
use Yii;
use app\modules\api\v1\resources\User;
/**
 * @inheritdoc
 * @var object $modelClass
 */

class UserController extends ActiveController
{
    public $modelClass = 'app\modules\api\v2\resources\User';
    public function behaviors()
    {
        return
            \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
                'corsFilter' => [
                    'class' => \yii\filters\Cors::className(),
                ],
            ]);
    }

}


