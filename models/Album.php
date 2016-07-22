<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 22.07.16
 * Time: 15:40
 */

namespace app\models;
use yii\db\ActiveRecord;

class Album extends ActiveRecord
{
    const TYPE_PORTFOLIO = '0';
    const TYPE_SERIES = '1';

    public static function tableName()
    {
        return 'album';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}