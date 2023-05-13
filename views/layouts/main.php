<?php

/* @var $this \yii\web\View */

/* @var $content string */

use panix\engine\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap5\Breadcrumbs;
use app\web\themes\dashboard\AdminAsset;

AdminAsset::register($this);



?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= Yii::t('app/admin', 'ADMIN_PANEL'); ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
</head>
<body class="loading"
      data-leftbar-compact-mode="condensed"
      data-layout-mode="fluid"
      data-leftbar-theme="dark"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<?php $this->beginBody() ?>




<div class="pre-loader-container">
    <div class="loader-logo"></div>
    <div class="loader-text">Loading...</div>
</div>



<!-- Begin page -->
<div class="wrapper">

    <?= $this->render('partials/_sidebar'); ?>

    <div class="content-page">
        <div class="content">

            <?= $this->render('partials/_navbar'); ?>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="page-title-box">
                            <div class="page-title-right">


                                <?php
                                if (!isset($this->context->buttons)) {
                                    if (method_exists($this->context, 'actionCreate')) {
                                        echo Html::a(Yii::t('app', 'CREATE'), ['create'], ['title' => Yii::t('app', 'CREATE'), 'class' => 'btn btn-success']);
                                    }
                                } else {
                                    if ($this->context->buttons == true) {
                                        if (is_array($this->context->buttons)) {

                                            if (count($this->context->buttons) > 1) {
                                                echo Html::beginTag('div', ['class' => 'btn-group']);
                                            }
                                            foreach ($this->context->buttons as $button) {
                                                if (isset($button['icon'])) {
                                                    $icon = Html::icon($button['icon']) . ' ';
                                                } else {
                                                    $icon = '';
                                                }
                                                if (!isset($button['options']['class'])) {
                                                    $button['options']['class'] = ['btn btn-secondary'];
                                                }
                                                if (!empty($icon))
                                                    $button['label'] = '<span class="d-none d-sm-inline">' . $button['label'] . '</span>';

                                                if (empty($icon))
                                                    $button['options']['title'] = $button['label'];

                                                echo Html::a($icon . $button['label'], $button['url'], $button['options']);
                                            }
                                            if (count($this->context->buttons) > 1) {
                                                echo Html::endTag('div');
                                            }
                                        }
                                    }
                                }
                                ?>

                            </div>
                            <h4 class="page-title"><?= $this->context->pageName; ?></h4>
                        </div>
                        <div class="page-title-box">
                            <div class="page-title-right">
                                <?php
                                if (isset($this->params['breadcrumbs'])) {
                                    echo Breadcrumbs::widget([
                                        'homeLink' => [
                                            'label' => '<i class="icon-home"></i>',
                                            'url' => ['/dashboard'],
                                            'encode' => false
                                        ],
                                        'links' => $this->params['breadcrumbs'],
                                        'options' => ['class' => 'm-0']
                                    ]);

                                }
                                ?>

                            </div>
                            <h4 class="page-title"><?= $this->context->pageName; ?></h4>
                        </div>
                    </div>
                </div>


                <?= $content; ?>
<div class="card widget-flat">
                                            <div class="card-body">
                                                <div class="float-end">
                                                    <i class="mdi mdi-account-multiple widget-icon"></i>
                                                </div>
                                                <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                                                <h3 class="mt-3 mb-3">36,254</h3>
                                                <p class="mb-0 text-muted">
                                                    <span class="text-success me-2"><i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                                                    <span class="text-nowrap">Since last month</span>  
                                                </p>
                                            </div> <!-- end card-body-->
                                        </div>

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <?= Yii::$app->powered() ?> &mdash; <?= Yii::$app->version ?>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end footer-links d-none d-md-block">
                            <a href="javascript: void(0);" class="test">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>


</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
