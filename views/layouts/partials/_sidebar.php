<?php
use panix\engine\Html;



?>


<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <?=
            \app\web\themes\dashboard\BackendNav::widget([
                'options' => ['id' => 'sidebarnav','class'=>''],
            ]);
            ?>
            <?php
            /*echo \app\web\themes\dashboard\SideBar::widget([
                'encodeLabels' => false,
                'items' => $this->context->module->getAdminSidebar(),
                'options' => ['class' => 'flex-column'],
            ]);*/
            ?>
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    &mdash; <span class="hide-menu ml-2">Personal</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-user-outline"></i>
                        <span class="hide-menu">Dashboard </span>
                        <span class="badge badge-pill badge-info ml-auto m-r-15">3</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="index.html" class="sidebar-link">
                                <i class="icon-user-outline"></i>
                                <span class="hide-menu"> Classic </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index2.html" class="sidebar-link">
                                <i class="icon-user-outline"></i>
                                <span class="hide-menu"> Analytical </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="index3.html" class="sidebar-link">
                                <i class="icon-user-outline"></i>
                                <span class="hide-menu"> Modern </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-user-outline"></i>
                        <span class="hide-menu">Multi level dd</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="icon-instagram"></i>
                                <span class="hide-menu"> item 1.1</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="icon-telegram-outline"></i>
                                <span class="hide-menu"> item 1.2</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class="sidebar-link">
                                <i class="mdi mdi-playlist-check"></i>
                                <span class="hide-menu"> item 1.4</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-small-cap">
                    &mdash; <span class="hide-menu ml-2">Extra</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="authentication-login1.html" aria-expanded="false">
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">Log Out</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>