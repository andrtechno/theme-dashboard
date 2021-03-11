<?php

use panix\engine\Html;
use panix\engine\CMS;
use panix\mod\admin\models\Notification;
?>
<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header" data-logobg="skin5">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                <i class="icon-delete icon-menu "></i>
            </a>
            <div class="navbar-brand">

                <a href="/admin" class="logo light-logo">
                    <span class="d-none d-md-block">PIXELION</span>
                </a>
                <a class="sidebartoggler d-none d-md-block" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                    <i class="icon-menu icon-delete font-20 "></i>
                </a>
            </div>

            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
               data-toggle="collapse" data-target="#navbarSupportedContent"
               aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="icon-menu"></i>
            </a>
        </div>

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <ul class="navbar-nav float-left mr-auto">
                <!-- <li class="nav-item d-none d-md-block">
                    <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                        <i class="mdi mdi-menu font-24"></i>
                    </a>
                </li> -->
                <li class="nav-item search-box">
                    <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                        <div class="d-flex align-items-center">
                            <i class="mdi mdi-magnify font-20 mr-1"></i>
                            <div class="ml-1 d-none d-sm-block">
                                <span>Search</span>
                            </div>
                        </div>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control" placeholder="Search &amp; enter">
                        <a class="srh-btn text-dark">
                            <i class="icon-delete"></i>
                        </a>
                    </form>
                </li>
            </ul>
            <ul class="navbar-nav float-right">
                <li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" id="2" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="font-22 icon-telegram"></i>

                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown" aria-labelledby="2">
                                <span class="with-arrow">
                                    <span class="bg-danger"></span>
                                </span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title text-white bg-danger">
                                    <h4 class="m-b-0 m-t-5">5 New</h4>
                                    <span class="font-light">Messages</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-center message-body">
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="<?= $this->params['asset']->baseUrl; ?>/images/users/1.jpg"
                                                         alt="user" class="rounded-circle">
                                                    <span class="profile-status online pull-right"></span>
                                                </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:30 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="<?= $this->params['asset']->baseUrl; ?>/images/users/2.jpg"
                                                         alt="user" class="rounded-circle">
                                                    <span class="profile-status busy pull-right"></span>
                                                </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Sonu Nigam</h5>
                                            <span class="mail-desc">I've sung a song! See you at</span>
                                            <span class="time">9:10 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="<?= $this->params['asset']->baseUrl; ?>/images/users/3.jpg"
                                                         alt="user" class="rounded-circle">
                                                    <span class="profile-status away pull-right"></span>
                                                </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Arijit Sinh</h5>
                                            <span class="mail-desc">I am a singer!</span>
                                            <span class="time">9:08 AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)" class="message-item">
                                                <span class="user-img">
                                                    <img src="<?= $this->params['asset']->baseUrl; ?>/images/users/4.jpg"
                                                         alt="user" class="rounded-circle">
                                                    <span class="profile-status offline pull-right"></span>
                                                </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Pavan kumar</h5>
                                            <span class="mail-desc">Just see the my admin!</span>
                                            <span class="time">9:02 AM</span>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center link text-dark" href="javascript:void(0);">
                                    <b>See all e-Mails</b>
                                    <i class="icon-telegram"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <?php
                $langManager = Yii::$app->languageManager;
                $languages = $langManager->getLanguages();
                $currentDataArray = [];
                foreach ($languages as $l) {
                    $currentDataArray[$l->code] = $l->name;
                }

                $current = $currentDataArray[Yii::$app->language];


                ?>
                <li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle d-flex align-items-center waves-effect waves-dark" href="" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                        <?php
                        echo Html::img('/uploads/language/' . $langManager->active->slug . '.png', ['alt' => ''])
                        ?>
<span class="ml-2 text-uppercase"><?= Yii::$app->language; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <?php foreach ($languages as $lang) {
                            $fl = Html::img($lang->getFlagUrl(), ['alt' => $lang->name, 'class' => 'mr-2']);
                            $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->slug . CMS::currentUrl();
                            ?>
                            <?= Html::a($fl . $lang->name, $link, ['class' => 'dropdown-item d-flex align-items-center ' . (($langManager->active->id == $lang->id) ? 'active' : '')]); ?>
                        <?php } ?>

                    </div>
                </li>


                <?php
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
                ?>
                <li class="nav-item dropdown border-right">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <?= Html::icon('notification-outline',['class'=>'font-22']); ?>
                        <span class="badge badge-pill badge-info noti">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                        <ul class="list-style-none">
                            <li>
                                <div class="drop-title bg-primary text-white">
                                    <h4 class="m-b-0 m-t-5">4 New</h4>
                                    <span class="font-light">Notifications</span>
                                </div>
                            </li>
                            <li>
                                <div class="message-center notifications">
                                    <?php

                                    foreach ($notifications as $notification) {
                                      //  CMS::dump($notification);die;
                                    ?>
                                    <a href="javascript:void(0)" class="message-item">
                                                <span class="btn btn-danger btn-circle">
                                                    <i class="fa fa-link"></i>
                                                </span>
                                        <div class="mail-contnet">
                                            <h5 class="message-title">Luanch Admin</h5>
                                            <span class="mail-desc"><?= $notification->text; ?></span>
                                            <span class="time"><?= CMS::date($notification->created_at); ?></span>
                                        </div>
                                    </a>
                                    <?php } ?>

                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center m-b-5 text-dark" href="javascript:void(0);">
                                    <strong>Все уведомления</strong>
                                    <i class="icon-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark pro-pic" href="" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <?php
                        $img = Yii::$app->user->getAvatarUrl('50x50');
                        ?>
                        <?= Html::img($img, ['class' => 'rounded-circle', 'width' => '40']); ?>

                        <span class="m-l-5 font-medium d-none d-sm-inline-block"><?= Yii::$app->user->getDisplayName(); ?> <i
                                    class="icon-arrow-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                        <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                            <div class="">
                                <?= Html::img($img, ['class' => 'rounded-circle', 'width' => '60']); ?>
                            </div>
                            <div class="m-l-10">
                                <h4 class="m-b-0"><?= Yii::$app->user->getDisplayName(); ?></h4>
                                <p class=" m-b-0"><?= Yii::$app->user->email; ?></p>
                            </div>
                        </div>
                        <div class="profile-dis scrollable">

                            <?= Html::a(Html::icon('user-outline', ['class' => ' m-r-5 m-l-5']) . 'Профиль', ['/user/logout'], ['class' => 'dropdown-item']); ?>
                            <div class="dropdown-divider"></div>
                            <?= Html::a(Html::icon('logout', ['class' => ' m-r-5 m-l-5']) . 'Выход', ['/user/logout'], ['class' => 'dropdown-item']); ?>
                            <div class="dropdown-divider"></div>
                        </div>
                        <div class="p-l-30 p-10">
                            <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>