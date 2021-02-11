<?php


namespace app\assets;


use yii\web\AssetBundle;

class TaskAsset extends AssetBundle
{
    public $sourcePath = '@app/assets/resources/task';

    public $css = [
        'css/task.scss',
    ];

    public $js = [
        'js/task.js',
    ];

    public $depends = [
        'app\assets\AppAsset',
    ];
}