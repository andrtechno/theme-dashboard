<?php

use app\web\themes\dashboard\sidebar\Sidebar;
use panix\engine\Html;

?>
<?=
$items = new Sidebar();

foreach ($items->items as $item) { ?>

<?php } ?>
<div class="leftside-menu">

    <a href="/dashboard" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="<?= $this->theme->asset[1]; ?>/images/logo.svg" alt="" height="40">
                    </span>
        <span class="logo-sm">
                        <img src="<?= $this->theme->asset[1]; ?>/images/logo-small.svg" alt="" height="40">
                    </span>
    </a>
    <a href="/dashboard" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="<?= $this->theme->asset[1]; ?>/images/logo-dark.svg" alt="" height="40">
                    </span>
        <span class="logo-sm">
                        <img src="<?= $this->theme->asset[1]; ?>/images/logo-small.svg" alt="" height="40">
                    </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <ul class="side-nav">
            <?php foreach ($items->items as $key => $app) { ?>
                <li class="side-nav-title side-nav-item text-white  d-none2"><?= $app['label'] ?></li>
                <?php
                Sidebar::sortList($app['items']);
                foreach ($app['items'] as $skey => $item) { ?>
                    <?php //if ($item['visible']) { ?>
                        <li class="side-nav-item d-none2">
                            <?php if (isset($item['items'])) { ?>
                                <a data-bs-toggle="collapse" href="#sidebars-<?= $key; ?>-<?= $skey; ?>"
                                   aria-expanded="false"
                                   aria-controls="sidebars-<?= $key; ?>-<?= $skey; ?>" class="side-nav-link">
                                    <i class="icon-<?= $item['icon'] ?>"></i>
                                    <span> <?= $item['label'] ?> </span>

                                    <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebars-<?= $key; ?>-<?= $skey; ?>">
                                    <ul class="side-nav-second-level">
                                        <?php
                                        Sidebar::sortList($item['items']);
                                        foreach ($item['items'] as $i) { ?>
                                            <li>
                                                <?php if (isset($i['url'])) {
                                                    echo Html::a($i['label'], $i['url']);
                                                } else {
                                                    echo $i['label'];
                                                }
                                                ?>
                                            </li>

                                        <?php } ?>

                                    </ul>
                                </div>
                            <?php } else {
                                $badge = '';
                                if (isset($item['badge'])) {
                                    $badge = Html::tag('span', $item['badge'], ['class' => 'badge badge-success float-right']);
                                }

                                echo Html::a('<i class="icon-' . $item['icon'] . '"></i><span>' . $item['label'] . '</span>' . $badge . '', $item['url'], ['class' => 'side-nav-link']);
                                ?>

                            <?php } ?>
                        </li>
                    <?php //} ?>
                <?php } ?>
            <?php } ?>


            <li class="side-nav-title side-nav-item mt-1">Поддержка</li>


            <li class="side-nav-item">
                <?= Html::a('<i class="fad fa-info-circle"></i><span> ' . Yii::t('app/default', 'Как это работает?') . ' </span>', ['/product/index'], ['class' => 'side-nav-link']); ?>
            </li>
            <li class="side-nav-item">
                <?= Html::a('<i class="fad fa-user-headset"></i><span> 123 </span>', ['/category/index'], ['class' => 'side-nav-link']); ?>
            </li>
            <li class="side-nav-item">
                <?= Html::a('<i class="fad fa-question"></i><span> Написать нам </span>', ['/category/index'], ['class' => 'side-nav-link']); ?>
            </li>


        </ul>


        <div class="help-box text-white text-center">
            <a href="javascript: void(0);" class="float-end close-btn text-white d-none">
                <i class="icon-delete"></i>
            </a>
            <i class="fad fa-user-headset fa-3x text-danger"></i>
            <h5 class="mt-3">Поддержка</h5>
            <p class="mb-3">Телефон:<span class="d-block"><?= Html::tel('+380634892695'); ?></span></p>
            <a href="javascript: void(0);" class="btn btn-outline-success btn-sm">Написать нам</a>
        </div>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>

