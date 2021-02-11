<?php

use app\models\Status;
use app\models\Task;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model Task */
/* @var $form ActiveForm */

$statuses = ArrayHelper::map(Status::find()->all(), 'id', 'name');
?>

<div class="task-form">
    <?php $form = ActiveForm::begin([
        'id' => 'task-form',
        'layout' => 'horizontal',
        'class' => 'form-horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{endWrapper}",
            'horizontalCssClasses' => [
                'label' => 'col-sm-3',
                'offset' => 'col-sm-offset-3',
                'wrapper' => 'col-sm-6',
                'error' => '',
                'hint' => '',
            ],
        ]
    ]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'desc')->textarea() ?>

    <?= $form->field($model, 'status_id')->dropDownList($statuses)->label('Статус') ?>

    <div class="form-group">
        <div class="col-sm-3 col-sm-offset-3">
            <?= Html::a('Отмена', 'index', ['class' => 'btn btn-default']) ?>
            <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?></div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
