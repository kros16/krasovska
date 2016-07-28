<?php
/**
 * Created by PhpStorm.
 * User: kros
 * Date: 26.07.16
 * Time: 14:19
 */

namespace app\controllers;

use app\models\Response;
use yii\data\ActiveDataProvider;
use Yii;

class ResponseController extends AppController
{
    public function actionIndex()
    {
        $model = new Response();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('responseFormSubmitted');

            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Response::find()
                ->where(['visible' => Response::VISIBLE_ON])
                ->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 3,
                'pageSizeParam' => false
            ],
        ]);

        $this->setMeta('Отзывы', ['keywords' => 'Отзывы', 'description' => 'Страница отзывов']);

        return $this->render('index', compact('responses', 'dataProvider', 'model'));
    }
}