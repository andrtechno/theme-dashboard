<?php

use yii\helpers\Html;

?>


<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">



        <li class="dropdown notification-list topbar-dropdown">


            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <?= Html::img($this->theme->asset[1] . "/images/language/" . Yii::$app->languageManager->active->code . ".svg", ['class' => 'me-0 me-sm-1', 'width' => 20]); ?>

                <span class="align-middle d-none d-sm-inline-block"><?= Yii::$app->languageManager->active->name; ?></span>
                <i
                        class="mdi mdi-chevron-down d-none d-sm-inline-block align-middle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu">
                <?php
                foreach (Yii::$app->languageManager->getLanguages() as $lang) {
                    $active = ($lang->code == Yii::$app->language) ? $lang->code . ' active' : $lang->code;
                    // $link = ($lang->is_default) ? CMS::currentUrl() : '/' . $lang->code . CMS::currentUrl();
                    ?>


                    <?php
                    echo Html::a(Html::img($this->theme->asset[1] . "/images/language/{$lang->code}.svg", ['class' => 'me-1', 'width' => 20]) . ' <span class="align-middle">' . $lang->name . '</span>', ['/dashboard/set-language', 'lang' => $lang->code, 'redirect' => Yii::$app->request->url], ['class' => $active . ' dropdown-item notify-item']);
                    ?>

                <?php } ?>


            </div>
        </li>

        <li class="dropdown notification-list d-none2">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
               aria-haspopup="false" aria-expanded="false">
                <i class="fad fa-bell noti-icon"></i>
                <span class="noti-icon-badge pulse-red"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg">

                <!-- item-->
                <div class="dropdown-item noti-title">
                    <h5 class="m-0">
                                            <span class="float-end">
                                                <a href="javascript: void(0);" class="text-dark">
                                                    <small>Clear All</small>
                                                </a>
                                            </span>Notification
                    </h5>
                </div>

                <div style="max-height: 230px;" data-simplebar>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">1 min ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-account-plus"></i>
                        </div>
                        <p class="notify-details">New user registered.
                            <small class="text-muted">5 hours ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-2.jpg"
                                 class="img-fluid rounded-circle" alt=""></div>
                        <p class="notify-details">Cristina Pride</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Hi, How are you? What about our next meeting</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary">
                            <i class="mdi mdi-comment-account-outline"></i>
                        </div>
                        <p class="notify-details">Caleb Flakelar commented on Admin
                            <small class="text-muted">4 days ago</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon">
                            <img src="https://coderthemes.com/hyper/saas/assets/images/users/avatar-2.jpg"
                                 class="img-fluid rounded-circle" alt=""></div>
                        <p class="notify-details">Karen Robinson</p>
                        <p class="text-muted mb-0 user-msg">
                            <small>Wow ! this admin looks good and awesome design</small>
                        </p>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info">
                            <i class="mdi mdi-heart"></i>
                        </div>
                        <p class="notify-details">Carlos Crouch liked
                            <b>Admin</b>
                            <small class="text-muted">13 days ago</small>
                        </p>
                    </a>


                </div>

                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                    View All
                </a>

            </div>
        </li>



        <li class="notification-list item-switch-theme">
            <div class="nav-link d-flex align-items-center" style="height:70px">
                <input type="checkbox" <?= (Yii::$app->session->get('dashboard_theme') == 'light')?'':'checked="checked"';?>  id="switch-theme" data-css="<?= $this->theme->asset[1]; ?>/css/dark.css" data-switch="theme"/>
                <label for="switch-theme" data-on-label="Light" data-off-label="Dark"></label>
            </div>
        </li>

        <li class="dropdown notification-list2">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class="account-user-avatar">


                                        <?= Html::img(Yii::$app->user->getAvatarUrl('50x50'),['class'=>'rounded-circle']); ?>
                                    </span>
                <span>
                                        <span class="account-user-name"><?= Yii::$app->user->displayName; ?></span>
                    <span class="account-position"><strong
                                class="text-dark"><?= Yii::$app->user->username; ?></strong></span>
                                    </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                 data-popper-placement="bottom-end">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <?= Html::a('<i class="fad fa-user me-1"></i><span>Профиль</span>', ['/admin/user/default/update','id'=>Yii::$app->user->id], ['class' => 'dropdown-item notify-item']); ?>
                <?= Html::a('<i class="fad fa-sign-out me-1"></i><span>Выход</span>', ['/user/default/logout'], ['class' => 'dropdown-item notify-item']); ?>

            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="fad fa-bars"></i>
    </button>

</div>
