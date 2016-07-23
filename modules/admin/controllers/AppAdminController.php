<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 23.07.16
 * Time: 18:07
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;

class AppAdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]

                ]
            ]
        ];
    }
}