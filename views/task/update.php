<?php

use app\models\Task;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model Task|null */

$this->title = 'Обновить задачу ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список Задач', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Обновление задачи';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

