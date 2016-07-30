<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\models\Category;
use yii\grid\CheckboxColumn;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>

<h2><?= Html::a(Html::encode($this->title), ['index']) ?></h2>
<?= Html::a('Добавить', ['create', 'id' => Yii::$app->request->get('id')], ['class' => 'button button-default']) ?>
<div class="clearfix"></div>

<div class="content">

<div class="category-index container-fluid">
    <div class="row">

        <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'emptyText' => 'Подкатегорий не найдено.',
            'tableOptions'=>['class'=>'table table-striped table-hover'],
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
                        $children = Category::find()->where(['parent_id' => $data->id]);
                        return Html::a($data->title . ' <span class="badge">' . $children->count() . '</span>', ['parent', 'id' => $data->id], ['class' => 'btn-block']);
                    },
                    'format' => 'html'
                ],
                /*[
                    'attribute' => 'parent_id',
                    'value' => function($data){
                        return isset($data->category->title) ? $data->category->title : 'Самостоятельная категория';
                    },
                ],*/
                [
                    'attribute' => 'type',
                    'value' => function($data){
                        $color = $data->type == Category::TYPE_SERIES ? 'info' : 'default';
                        return "<span class='label label-$color'>{$data->types[$data->type]}";
                    },
                    'contentOptions' => [
                        //'style' => 'width: 2%',
                        'class' => 'text-center'
                    ],
                    'headerOptions' => [
                        'class' => 'text-center'
                    ],
                    'format' => 'html'
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
                        if( $data->visible == Category::VISIBLE_ON ) {
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
                /*['class' => CheckboxColumn::className()],*/
            ],
        ]); ?>
        </div>
    </div>
</div>

</div> <!-- /.content -->