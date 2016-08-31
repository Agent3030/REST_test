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

}


