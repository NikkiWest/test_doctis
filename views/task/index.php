<?php

use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Список задач';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p><?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?></p>

    <?php Pjax::begin(['linkSelector' => false, 'id' => 'task-grid']); ?>


    <?= ListView::widget([
        'emptyText' => 'Нет задач',
        'dataProvider' => $dataProvider,
        'itemView' => 'task_item',
        'layout' => "<div class='row task-row'>{items}</div><div>{pager}</div>",
    ]);
    ?>

</div>