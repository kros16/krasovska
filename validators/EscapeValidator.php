<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 24.07.16
 * Time: 1:11
 */

namespace app\validators;

use yii\validators\Validator;

class EscapeValidator extends Validator
{
    public function validateAttribute($model, $attribute)
    {
        $model->$attribute = filter_var($model->$attribute, FILTER_SANITIZE_STRING);
    }
}