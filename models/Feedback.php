<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 24.07.16
 * Time: 0:49
 */

namespace app\models;

use app\validators\EscapeValidator;
use himiklab\yii2\recaptcha\ReCaptchaValidator;
use yii\db\ActiveRecord;
use yii;

class Feedback extends ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_VIEW = 1;
    const STATUS_ANSWERED = 2;

    public $reCaptcha;

    public static function tableName()
    {
        return 'feedback';
    }

    public function rules()
    {
        return [
            [['name', 'email', 'text', 'reCaptcha'], 'required'],
            [['name', 'email', 'phone', 'text'], 'trim'],
            [['name', 'text'], EscapeValidator::className()],
            ['email', 'email'],
            ['phone', 'match', 'pattern' => '/^[\d\s-\+\(\)]+$/'],
            [['reCaptcha'], ReCaptchaValidator::className()],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->ip = Yii::$app->request->userIP;
                $this->time = time();
                $this->status = self::STATUS_NEW;
            }
            return true;
        } else {
            return false;
        }
    }

    /*public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        if($insert){
            $this->mailAdmin();
        }
    }*/

    public function attributeLabels()
    {
        return [
            'email' => 'Ваш Email',
            'name' => 'Ваше Имя',
            'text' => 'Сообщение',
            'answer_subject' => 'Тема',
            'answer_text' => 'Текст',
            'phone' => 'Ваш телефон',
            'reCaptcha' => 'Подтвердите, что Вы не робот'
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->save()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject('Новое сообщение с сайта')
                ->setTextBody($this->text)
                ->send();

            return true;
        }
        return false;
    }

    /*public function mailAdmin()
    {
        $settings = Yii::$app->getModule('admin')->activeModules['feedback']->settings;

        if(!$settings['mailAdminOnNewFeedback']){
            return false;
        }
        return Mail::send(
            Setting::get('admin_email'),
            $settings['subjectOnNewFeedback'],
            $settings['templateOnNewFeedback'],
            ['feedback' => $this, 'link' => Url::to(['/admin/feedback/a/view', 'id' => $this->primaryKey], true)]
        );
    }*/

    /*public function sendAnswer()
    {
        $settings = Yii::$app->getModule('admin')->activeModules['feedback']->settings;

        return Mail::send(
            $this->email,
            $this->answer_subject,
            $settings['answerTemplate'],
            ['feedback' => $this],
            ['replyTo' => Yii::$app->params['adminEmail']]
        );
    }*/
}