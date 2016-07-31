<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Album;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Альбомы';
?>

<h2><?= Html::a(Html::encode($this->title), ['index']) ?></h2>
<?= Html::a('Добавить', ['create', 'id' => Yii::$app->request->get('id')], ['class' => 'button button-default']) ?>
<div class="clearfix"></div>

<div class="content">

    <div class="album-index container-fluid">
        <div class="row">

            <div class="table-responsive">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => false,
                'tableOptions'=>['class'=>'table table-striped table-hover table-condensed'],
                'columns' => [
                    /*['class' => 'yii\grid\SerialColumn'],*/

                    [
                        'attribute' => 'id',
                        'headerOptions' => [
                            'class' => 'text-center',
                            'style' => 'width: 36px'
                        ],
                        'contentOptions' => [
                            'class' => 'text-center',
                        ]
                    ],
                    [
                        'attribute' => 'title',
                        'value' => function($data){
                            return Html::a("<img class='img img-mb-0' src='{$data->getImage()->getUrl('45x45')}'>" .$data->title, ['view', 'id' => $data->id], ['class' => 'btn-block']);
                        },
                        'format' => 'html'
                    ],
                    [
                        'attribute' => 'category_id',
                        'value' => function($data){
                            return $data->category->title;
                        },
                    ],
//                    'alias',
//                    'img',
                    [
                        'attribute' => 'shooting_date',
                        'headerOptions' => [
                            'class' => 'text-center',
                        ],
                        'contentOptions' => [
                            'class' => 'text-center',
                        ]
                    ],
                    [
                        'attribute' => 'position',
                        'contentOptions' => [
                            'class' => 'text-center',
                            //'style' => 'width: 2%'
                        ],
                        'headerOptions' => [
                            'class' => 'text-center'
                        ],
                    ],
                    [
                        'attribute' => 'visible',
                        'value' => function($data){
                            if( $data->visible == Album::VISIBLE_ON ) {
                                $visible = 'on';
                                $switch = 'off';
                                $txtColor = '';
                            } else {
                                $visible = 'off';
                                $switch = 'on';
                                $txtColor = 'muted';
                            }
                            return Html::a("<i class='fa fa-2x fa-toggle-$visible' aria-hidden='true'></i>", ["toggle-$switch", 'id' => $data->id], ['class' => "text-$txtColor"]);
                        },
                        'format' => 'html',
                        'contentOptions' => [
                            'class' => 'text-center',
                            //'style' => 'width: 2%'
                        ],
                        'headerOptions' => [
                            'class' => 'text-center'
                        ],
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => 'Действия',
                        'headerOptions' => [
                            'class' => 'text-center'
                        ],
                        'contentOptions' => [
                            'class' => 'text-center'
                        ]
                    ],
                ],
            ]); ?>
            </div>
        </div>
    </div>
</div>
