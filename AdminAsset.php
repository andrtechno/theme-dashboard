<?php

namespace app\web\themes\dashboard;


use yii\web\AssetBundle;
use yii\web\View;
use Yii;

class AdminAsset extends AssetBundle
{
   // public $basePath = '@app/themes/basic/assets';
    //public $baseUrl = '@web/themes/basic/assets';

    public function init()
    {
       // $this->_theme = \Yii::$app->settings->get('app', 'theme');
        $this->sourcePath = __DIR__."/assets";
        parent::init();

        if(Yii::$app->session->get('dashboard_theme') == 'dark'){
            $this->css[] = 'css/dark.css';
        }

    }
    public $jsOptions = [
        'position' => View::POS_END
    ];

    public $css = [
        'css/fontawesome.min.css',
        'css/duotone.min.css',

        'css/style.css',
        //'css/light.min.css',

    ];
    public $js = [
        'js/vendor.js',
       // 'fontawesome/js/duotone.min.js',
        'js/app.js',
        'js/interactive.v0.0.2.js',
        'js/ss.js',
        'bootbox/bootbox.min.js',
        //'js/theme-switch.js',
        //'js/dropzone.min.js',
       // 'js/fileupload.js',
        'js/jquery.playSound.js',
        //'js/queue.js'
    ];
    public $depends = [
        'yii\jui\JuiAsset',
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'app\web\themes\dashboard\BootstrapIconsAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
        //'panix\engine\assets\CommonAsset',
        'panix\engine\assets\IconAsset'
        //'panix\engine\assets\BootstrapNotifyAsset'

    ];
}
