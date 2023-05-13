<?php

use panix\engine\Html;

?>
<div class="card grid">
    <div class="grid-loading"></div>
    <div class="card-header">
        <div class="container-fluid pt-2 pb-2">
            <div class="row">
                <div class="col-sm-6 d-none d-sm-block">
                    <h5><?php if (isset($title)) echo $title; ?></h5>
                </div>
                <div class="col-sm-6 text-right">
                    <?php if (isset($buttons)) { ?>

                        <?php

                        foreach ($buttons as $btn) {
                            $icon = '';

                            if (!isset($btn['options']['class']))
                                $btn['options']['class'] = 'btn btn-sm btn-success';
                            if (!isset($btn['options']['data-pjax']))
                                $btn['options']['data-pjax'] = 1;

                            if (isset($btn['icon'])) {
                                $icon = Html::icon($btn['icon']);
                            }
                            echo Html::a($icon . ' ' . $btn['label'], $btn['url'], $btn['options']);
                        }
                        ?>

                    <?php } ?>
                </div>
            </div>
        </div>


    </div>
    <div class="card-body">
        <?php
        if (isset($beforeContent)) {
            echo $beforeContent;
        }
        ?>

        <div class="table-responsive">{items}</div>
        <?php
        if (isset($afterContent)) {
            echo $afterContent;
        }
        ?>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-md-6">{summary}</div>
            <div class="col-md-6 text-right">{pager}</div>
        </div>
    </div>
</div>