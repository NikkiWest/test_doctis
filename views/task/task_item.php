<?php
/** @var Task $model */

use app\models\Task;
?>
<div class="col-sm-3">
    <div class="box-task <?= $model->status->color; ?>-card-color">
        <div class="header__box-task">
            <div class="title__box-task"><?= $model->name; ?></div>
            <div class="actions__box-task">
                <a href="/task/<?= $model->id; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                <span class="delete-task glyphicon glyphicon-remove" data-id="<?= $model->id; ?>"></span>
            </div>
        </div>
        <div class="desc__box-task"><?= $model->desc; ?></div>
        <div class="established__box-task">
            Создана <?= Yii::$app->formatter->asDate($model->dt_create, 'd MMMM Y H:mm'); ?></div>
    </div>
</div>