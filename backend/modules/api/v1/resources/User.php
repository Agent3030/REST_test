<?php
/**
 * Created by PhpStorm.
 * User: dzozulya
 * Date: 30.08.16
 * Time: 22:32
 */

namespace app\modules\api\v1\resources;


use app\models\Lesson;

/**
 * This is the REST resource class extended from User model.
 * fields:
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 */

class User extends \app\models\User
{
    /**
     * @return  array
     */
    public function fields()
    :array {
        return ['id', 'name', 'created_at', 'updated_at'];
    }


}