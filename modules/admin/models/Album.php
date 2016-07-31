<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $alias
 * @property string $title
 * @property string $img
 * @property string $shooting_date
 * @property string $type
 * @property integer $position
 * @property string $visible
 * @property string $keywords
 * @property string $description
 *
 * @property Category $category
 */
class Album extends \yii\db\ActiveRecord
{
    const VISIBLE_ON = '1';
    const VISIBLE_OFF = '0';

    public $image;
    public $gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'alias', 'title'], 'required'],
            [['category_id', 'position'], 'integer'],
            ['position', 'default', 'value' => 0],
            [['shooting_date'], 'safe'],
            [['type', 'visible'], 'string'],
            [['alias', 'title'], 'string', 'max' => 128],
            [['img', 'keywords', 'description'], 'string', 'max' => 255],
            [['alias'], 'unique'],
            ['alias', 'match', 'pattern' => '/^[a-z0-9-]+$/'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {

            $this->type = $this->category->type;
            return true;

        } else {
            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'alias' => 'Алиас',
            'title' => 'Название',
            'image' => 'Фото',
            'gallery' => 'Галерея',
            'shooting_date' => 'Дата съемки',
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
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }

    public function uploadGallery(){
        if($this->validate()){
            foreach ($this->gallery as $file) {
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }
}
