<?php

namespace app\web\themes\dashboard;


use yii\web\AssetBundle;
use yii\web\View;


class DropZoneAsset extends AssetBundle
{
    public $sourcePath = "@vendor/enyo/dropzone/dist";

    public $jsOptions = [
        'position' => View::POS_END
    ];

    public $css = [
        'min/dropzone.min.css',

    ];
    public $js = [
        'min/dropzone.min.js'
    ];

}
