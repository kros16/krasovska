<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $alias
 * @property string $title
 * @property string $type
 * @property integer $position
 * @property string $visible
 * @property string $keywords
 * @property string $description
 *
 * @property Album[] $albums
 */
class Category extends \yii\db\ActiveRecord
{
    const TYPE_PORTFOLIO = '0';
    const TYPE_SERIES = '1';

    const VISIBLE_ON = '1';
    const VISIBLE_OFF = '0';

    const PARENT = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent_id']);
    }

    public static function getTypes()
    {
        return [
            static::TYPE_PORTFOLIO => 'Плитки',
            static::TYPE_SERIES => 'Лента',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'position'], 'integer'],
            ['position', 'default', 'value' => 0],
            [['alias', 'title'], 'required'],
            [['type', 'visible'], 'string'],
            [['alias', 'title'], 'string', 'max' => 128],
            [['keywords', 'description'], 'string', 'max' => 255],
            [['alias'], 'unique'],
            ['alias', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№',
            'parent_id' => 'Родительская категория',
            'alias' => 'Алиас',
            'title' => 'Название',
            'type' => 'Тип',
            'position' => 'Порядок',
            'visible' => 'Статус',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlbums()
    {
        return $this->hasMany(Album::className(), ['category_id' => 'id']);
    }

    public static function findParents($id = null)
    {
        $parents = self::find()->where(['parent_id' => static::PARENT]);
        if ($id) {
            $parents->andWhere(['not in', 'id', $id]);
        }
        return $parents;
    }
}
