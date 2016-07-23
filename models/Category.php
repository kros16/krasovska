<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 22.07.16
 * Time: 15:35
 */

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    const TYPE_PORTFOLIO = '0';
    const TYPE_SERIES = '1';

    public static function tableName()
    {
        return 'category';
    }

    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['category_id' => 'id']);
    }
}