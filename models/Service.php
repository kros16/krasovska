<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 26.07.16
 * Time: 11:21
 */

namespace app\models;

use yii\db\ActiveRecord;

class Service extends ActiveRecord
{
    const TYPE_SINGLE = '0';
    const TYPE_PACKAGE = '1';

    const VISIBLE_ON = '1';
    const VISIBLE_OFF = '0';

    public static function tableName()
    {
        return 'service';
    }
}