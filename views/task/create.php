<?php

use app\models\Task;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $model Task */

$this->title = 'Добавить задачу';
$this->params['breadcrumbs'][] = ['label' => 'Список задач', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

 <h1><?= Html::encode($this->title) ?></h1>

<?= $this->render('_form', [
    'model' => $model,
]) ?>