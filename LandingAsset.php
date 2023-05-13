<?php

namespace app\web\themes\dashboard;


use yii\web\AssetBundle;
use yii\web\View;


class LandingAsset extends AssetBundle
{
   // public $basePath = '@app/themes/basic/assets';
    //public $baseUrl = '@web/themes/basic/assets';

    public function init()
    {
       // $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = __DIR__."/assets";
        parent::init();
    }
    public $jsOptions = [
        'position' => View::POS_END
    ];

    public $css = [
        'css/site.css',
    ];
    public $js = [
        'js/app.js',
        'js/ss.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\web\themes\basic\BootstrapIconsAsset',
        'yii\bootstrap5\BootstrapAsset',
        'yii\bootstrap5\BootstrapPluginAsset',

    ];
}
