<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 26.07.16
 * Time: 14:14
 */

namespace app\models;

use yii\db\ActiveRecord;
use app\validators\EscapeValidator;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use Yii;

class Response extends ActiveRecord
{
    const VISIBLE_ON = '1';
    const VISIBLE_OFF = '0';

    public $reCaptcha;

    public static function tableName()
    {
        return 'response';
    }

    public function rules()
    {
        return [
            [['name', 'text', 'email', 'reCaptcha'], 'required'],
            [['name', 'email', 'text'], 'trim'],
            [['name', 'text'], EscapeValidator::className()],
            ['email', 'email'],
            [['reCaptcha'], ReCaptchaValidator::className()],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->ip = Yii::$app->request->userIP;
                $this->time = time();
            }
            return true;
        } else {
            return false;
        }
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше Имя',
            'email' => 'Ваш Email',
            'text' => 'Ваш отзыв',
            'reCaptcha' => 'Подтвердите, что Вы не робот'
        ];
    }

    public function contact($email)
    {
        if ($this->save()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject('Новый отзыв на сайте')
                ->setTextBody($this->text)
                ->send();

            return true;
        }
        return false;
    }
}