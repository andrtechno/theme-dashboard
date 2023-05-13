<?php

namespace app\web\themes\dashboard;


use yii\web\AssetBundle;


class BootstrapIconsAsset extends AssetBundle
{
    public $sourcePath = '@npm/bootstrap-icons';
    //public $baseUrl = '@web';
    public $css = [
        'font/bootstrap-icons.css'
    ];
    public $js = [

    ];
    public $depends = [
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
