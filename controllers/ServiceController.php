<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 26.07.16
 * Time: 11:18
 */

namespace app\controllers;

use app\models\Service;
use app\models\ServiceInfo;

class ServiceController extends AppController
{
    public function actionIndex()
    {
        $services = Service::find()
            ->where(['visible' => Service::VISIBLE_ON])
            ->orderBy(['position' => SORT_ASC])
            ->all();


        $services_info = ServiceInfo::find()
            ->where(['visible' => ServiceInfo::VISIBLE_ON])
            ->orderBy(['position' => SORT_ASC])
            ->all();

        return $this->render('index', compact('services', 'services_info'));
    }
}