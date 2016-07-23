<?php

namespace app\modules\admin\controllers;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends AppAdminController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->view->title = 'Главная';
        return $this->render('index');
    }
}
