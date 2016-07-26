<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 26.07.16
 * Time: 12:45
 */

namespace app\models;

use yii\db\ActiveRecord;

class ServiceInfo extends ActiveRecord
{
    const VISIBLE_ON = '1';
    const VISIBLE_OFF = '0';

    public static function tableName()
    {
        return 'service_info';
    }
}