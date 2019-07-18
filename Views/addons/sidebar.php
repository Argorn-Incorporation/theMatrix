<!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2 d-block">
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="<?=IMAGE_PATH?>avatar.png" alt="<?=$this->userdata['fullname']?>" />
                        </div>
                        <h4 class="name"><?=$this->userdata['fullname']?></h4>
                        <a href="<?=APP_URL?>logout">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?= ($this->pageName=="dashboard") ? "active" : "" ?>" title="Dashboard">
                            <a class="js-arrow" href="<?=APP_URL ?>dashboard">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="navbar_desc">Dashboard</span>
                            </a>
                        </li>
                        <li class="<?= ($this->pageName=="account") ? "active" : "" ?>" title="Account">
                            <a href="<?=APP_URL?>dashboard/account">
                                <i class="far fa-user"></i>
                                <span class="navbar_desc">My Account</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#scrollmodal" class="<?php if($this->notifs['rowCount']) echo("has-noti")?>">
                                <i class="far fa-bell"></i>
                                <span class="navbar_desc">Inbox</span>
                            </a>
                                <?php  
                                if ($this->notifs['rowCount']) {
                                ?>
                                    <span class="inbox-num d-none d-lg-block"><?=$this->notifs['rowCount']?></span>
                                <?php
                                }
                                ?>
                            
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#upgrademodal" class="<?php if($this->UpdateReqs['rowCount']) echo("has-noti")?>">
                                <i class="fas fa-arrow-up"></i>
                                <span class="navbar_desc">Upgrade Requests</span>
                                <?php  
                                if ($this->UpdateReqs['rowCount']) {
                                ?>
                                    <span class="inbox-num d-none d-lg-block"><?=$this->UpdateReqs['rowCount']?></span>
                                <?php
                                }
                                ?>
                            </a>
                        </li>
                        <li>
                            <a href="https://wa.me/233543183937">
                                <i class="zmdi zmdi-comment"></i>
                                <span class="navbar_desc">Customer Support</span>

                            </a>
                        </li>
                        <!--
                        <li>
                            <a href="https://wa.me/233543183937">
                                <i class="far fa-smile-o"></i>
                                <span class="navbar_desc">Testimony</span>
                                
                            </a>
                        </li>
                        -->
                        <li>
                            <a href="<?=APP_URL?>logout">
                                <i class="fa fa-power-off"></i>
                                <span class="navbar_desc">Logout</span>
                                
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->
