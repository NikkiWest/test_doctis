<?php

use app\assets\TaskAsset;
use yii\base\InvalidConfigException;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $dataProvider ActiveDataProvider */

try {
    $this->registerAssetBundle(TaskAsset::class, View::POS_BEGIN);
} catch (InvalidConfigException $e) {
    echo $e->getMessage();
    echo $e->getTraceAsString();
}

$this->title = 'Список задач';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php Pjax::begin(['linkSelector' => false, 'id' => 'task-grid']);

    try {
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'rowOptions' => function ($model) {
                return ['class' => $model->status->color . '-card-color'];
            },
            'tableOptions' => [
                'class' => 'table table-bordered'
            ],
            'columns' => [
                [
                    'attribute' => 'id',
                    'headerOptions' => ['width' => '20'],
                    'contentOptions' => ['width' => '20'],
                ],
                'name',
                'desc',
                [
                    'label' => 'Статус',
                    'attribute' => 'status_id',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return $model->status->name;
                    }
                ],
                [
                    'attribute' => 'dt_create',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return date('d.m.Y H:i', $model->dt_create);
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete} ',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            $customUrl = '/task/' . intVal($model->id);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $customUrl);
                        },
                    ]

                ]
            ]
        ]);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    Pjax::end();
    ?>

</div>