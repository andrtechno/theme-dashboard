<?php


namespace app\web\themes\dashboard;


use yii\web\AssetBundle;
use yii\web\View;


class AppAsset extends AssetBundle
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
        'css/fontawesome.min.css',
        'css/duotone.min.css',
        'css/brands.min.css',
        'css/light.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/vendor.js',
       // 'fontawesome/js/duotone.min.js',
        'js/app.js',
        'js/ss.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'app\web\themes\dashboard\BootstrapIconsAsset',
        'yii\bootstrap5\BootstrapPluginAsset',

    ];
}
