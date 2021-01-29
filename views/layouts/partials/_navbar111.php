<?php

use panix\engine\Html;
use \panix\mod\admin\widgets\sidebar\BackendNav;

//use panix\engine\widgets\langSwitcher\LangSwitcher;
use panix\engine\CMS;
use panix\mod\admin\models\Notification;

/**
 * @var \yii\web\View $this
 */


if (isset(Yii::$app->queue)) {
    $queueDoneCount = (new \yii\db\Query())->select(['done_at'])
        ->from(Yii::$app->queue->tableName)
        ->where(['done_at' => null])
        ->createCommand()
        ->query()
        ->count();

    if ($queueDoneCount) {

        $js = <<<JS
var queue_notify =[];

queue();
setInterval(function() {
    queue();
}, 5000);

function queue(){
	$.ajax({
        url:common.url('/admin/app/default/queue-counter'),
        type:'GET',
        dataType:'json',
        success:function(response){
console.log(response);
            if(response.length){

                $.each(response,function(key,data) {

                    if(!queue_notify.hasOwnProperty(key)) {
                        queue_notify[key] = $.notify({message: 'Loading...'},{
                            type: 'warning',
                            allow_dismiss: false,
                            showProgressbar:true,
                            timer:0,
                            placement: {from: 'bottom', align: 'left'},
                            
                            
                           // template:'<div class=\"toast\" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\"><div class=\"toast-header\"><strong class=\"mr-auto\">Bootstrap</strong><small class=\"text-muted\">just now</small><button type=\"button\" class=\"ml-2 mb-1 close\" data-dismiss=\"toast\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button></div><div class=\"toast-body\">See? Just like this.</div></div>'
                            
                            template: '<div data-notify=\"container\" class=\"alert alert-{0}\" role=\"alert\"><button type=\"button\" aria-hidden=\"true\" class=\"close\" data-notify=\"dismiss\">&times;</button><span data-notify=\"icon\"></span> <span data-notify=\"title\">{1}</span> <span data-notify=\"message\">{2}</span><div class=\"progress\" data-notify=\"progressbar\"><div class=\"progress-bar bg-{0}\" role=\"progressbar\" aria-valuenow=\"0\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: 0%;\"></div></div><a href=\"{3}\" target=\"{4}\" data-notify=\"url\"></a></div>'
                        });
                    }

                    queue_notify[key].update({title:data.title,message: data.message, progress: data.percent});
                    if(!data.total){
                        queue_notify[key].update({title:data.title,message: 'Готово',type: 'success'});
                    }
             
                });
            }else{
                console.log(queue_notify);
                $.each(queue_notify,function(key,notify) {
                    console.log(queue_notify[key],key);
                    notify.update({
                        message: 'Готово',
                        type: 'success',
                        progress:99.9,
                    });

                    queue_notify[key].close();
                    queue_notify.splice(key, 1);

           
                });

            }
        }
	});
}
JS;


        $this->registerJs($js, \yii\web\View::POS_END);
    }
}
?>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark">

        <?= Html::a('<span class="d-none d-md-block">PIXELION</span>', ['/admin'], ['class' => 'navbar-brand']); ?>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div id="navbar" class="collapse navbar-collapse mr-auto">
            <?=
            BackendNav::widget([
                'options' => ['class' => 'nav navbar-nav mr-auto'],
            ]);
            ?>
        </div>


        <?php


        $langManager = Yii::$app->languageManager;
        $languages = $langManager->getLanguages();
        $currentDataArray = [];
        foreach ($languages as $l) {
            $currentDataArray[$l->code] = $l->name;
        }

        $current = $currentDataArray[Yii::$app->language];

        $langItems = [];
        if (count($languages) > 0) {
            foreach ($languages as $lang) {

                $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->slug . CMS::currentUrl();

                $langItems[] = [
                    'label' => Html::img($lang->getFlagUrl(), ['alt' => $lang->name]) . ' ' . $lang->name,
                    'url' => $link,
                    'options' => ['class' => ($langManager->active->id == $lang->id) ? 'active' : '']
                ];
            }
        }

        /*foreach ($languages as $lang) {

            $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();
            $class = ($langManager->active->id == $lang->id) ? 'active' : '';
            $temp = [];
            $temp['label'] = $lang->name;
            $temp['url'] = $link;
            $temp['options']=['class'=>$class];
            array_push($items, $temp);
        }*/


        // print_r($langItems);die;


        $notifications = Notification::find()->limit(5)->orderBy(['id' => SORT_DESC])->all();

        $notificationsCount = Notification::find()
            ->read([Notification::STATUS_NO_READ, Notification::STATUS_NOTIFY])
            ->count();


        $notificationItems = [];
        foreach ($notifications as $notification) {
            $notificationItems[] = [
                'label' => $notification->text,
                'url' => ($notification->url) ? $notification->url : null,
                'dropdownOptions' => ['test' => 'adsdsa'],
            ];
        }
        echo BackendNav::widget([
            'enableDefaultItems' => false,
            'encodeLabels' => false,
            'dropdownOptions' => [
                'options' => [
                    'class' => 'dropdown-menu dropdown-menu-right',
                ]
            ],
            'items' => [
                [
                    'label' => Html::icon('user-outline') . ' ' . Yii::$app->user->displayName,
                    'url' => ['/site/index']
                ],
                [
                    'label' => Html::icon('notification-outline'),
                    'url' => '#',
                    'options' => ['id' => 'dropdown-notification'],
                    'badgeOptions' => ['class' => 'navbar-badge-notifications badge badge-success badge-pulse-success'],
                    'badge' => $notificationsCount,
                    //'items' => $notificationItems,
                    'items' => '<div id="dropdown-notification-container" class="dropdown-menu dropdown-menu-right">' . $this->render('@admin/views/admin/notification/_notifications', ['notifications' => $notifications]) . '</div>',
                    'dropdownOptions' => ['id' => 'dropdown-notification-container']
                ],
                [
                    'label' => Html::icon('home'),
                    'url' => ['/'],
                    'options' => ['class' => "d-none d-md-block"]
                ],
                [
                    'label' => Html::icon('logout'),
                    'url' => ['/user/logout'],
                    'options' => ['data-method' => "post"]
                ],
                [
                    'label' => Html::img('/uploads/language/' . $langManager->active->slug . '.png', ['alt' => '']),
                    'url' => '#',
                    'items' => $langItems,

                ],
            ],
            'options' => ['class' => 'navbar-right'],
        ]);
        ?>


        <!--<ul class="navbar-right nav">
        <li class="nav-item">
            <?= Html::a(Html::icon('user-outline') . ' ' . Yii::$app->user->displayName, '/', ['class' => 'nav-link']); ?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" aria-haspopup="true"
               aria-expanded="false" data-toggle="dropdown">
                <i class="icon-notification"></i><span id="navbar-badge-notifications" class="badge badge-success"><?= $notificationsCount; ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                dasdsadas
            </div>
        </li>
        <li class="d-none d-md-block nav-item">
            <a class="nav-link" href="/">
                <i class="icon-home"></i><span class="badge badge-success"></span>
            </a>
        </li>
        <li class="nav-item" data-method="post">
            <a class="nav-link" href="/user/logout" aria-haspopup="true"
               aria-expanded="false"><i class="icon-locked"></i><span
                        class="badge badge-success"></span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" aria-haspopup="true"
               aria-expanded="false" data-toggle="dropdown">
                <img src="/uploads/language/ru.png" alt=""><span class="badge badge-success"></span></a>
            <ul id="w8" class="dropdown-menu">
                <li class="active">
                    <a class="nav-link" href="/admin/app/mail-template" tabindex="-1"><img
                                src="/uploads/language/ru.png" alt="Русский"> Русский</a>
                </li>
            </ul>
        </li>
    </ul>-->

    </nav>

<?php
$this->registerJs("
$('#dropdown-notification').on('show.bs.dropdown', function () {
    $.ajax({
        url:'/admin/app/notification/read',
        type:'POST',
        success:function(){
        
        }
    });
})
");