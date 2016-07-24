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

    const VISIBLE_ON = '1';
    const VISIBLE_OFF = '0';

    public static function tableName()
    {
        return 'album';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @param string $type
     * @param int $limit
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findLast($type = self::TYPE_SERIES, $limit = 6)
    {
        return self::find()
            ->select(['alias', 'title', 'img', 'shooting_date'])
            ->where(['type' => $type])
            ->andWhere(['visible' => static::VISIBLE_ON])
            ->orderBy(['id' => SORT_DESC])
            ->limit($limit)
            ->all();
    }

    /**
     * @param $id
     * @param $category_id
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function findRelated($id, $category_id)
    {
        return self::find()
            ->select(['alias', 'title', 'img', 'shooting_date'])
            ->where(['category_id' => $category_id])
            ->andWhere(['not in', 'id', $id])
            ->andWhere(['visible' => static::VISIBLE_ON])
            ->orderBy(['position' => SORT_ASC])
            ->all();
    }
}