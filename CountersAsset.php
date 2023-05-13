<?php

namespace app\web\themes\dashboard;

use panix\engine\web\AssetBundle;

/**
 * Class CountersAsset
 * @package app\web\themes\dashboard
 */
class CountersAsset extends AssetBundle
{


    public function init()
    {
        $this->sourcePath = \Yii::$app->view->theme->basePath . '/assets';
        parent::init();
    }

    public $js = [
        'js/jquery.playSound.js',
        'js/counters.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        'panix\engine\assets\CommonAsset'
    ];

}
