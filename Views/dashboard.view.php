       
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-45">
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <h4>Hello <strong><?=$this->userdata['fullname'] ?></strong>,&nbsp;<?=$this->userdata['stage_info']?></h4>
                                    </div>
                                    <!--<button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->
            <?php  

            if ($this->userdata['stage']==0) {
            ?>

                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Warning</span>
                    &nbsp;Your account expires on <?=$this->userdata['timer']?>. <?=$this->userdata['stage_info']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php
            }
            elseif($this->userdata['stage_completed']==1 && $this->userdata['stage']==3) {
                if ($this->userdata['upgrade_requested']==0) {
            ?>
                <div class="sufee-alert alert alert-success fade show">
                    <span class="badge badge-pill badge-success">Congratulations</span>
                    &nbsp;You have completed Stage 3. Chillax&nbsp;</em> and enjoy the results of your hardwork. But don't forget!...You have 3hours to recycle back to stage 1 with Ghc5. Your account expires on <?=$this->userdata['timer']?>;

                    <div class="pad10">
                        <a href="<?=APP_URL?>dashboard/upgrade">Click here to Recycle back to Stage 1</a>
                    </div>
                </div>
            <?php  
                }
            }
            elseif ($this->userdata['stage_completed']==1) {
                if ($this->userdata['upgrade_requested']==0) {
                
            ?>
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    <span class="badge badge-pill badge-success">Congratulations</span>
                    &nbsp;You have completed&nbsp;<strong>Stage <?=$this->userdata['stage']?></strong>. Upgrade yourself to Stage <?=$this->userdata['stage']+1?> with <?=$GLOBALS['StageUpgradeAmount'][$this->userdata['stage']];?>,&nbsp;the remaining <?=$GLOBALS['StageProfit'][$this->userdata['stage']]?> is yours to keep.
                    <div class="pad10">
                        <a href="<?=APP_URL?>dashboard/upgrade">Click here to Upgrade to Stage <?=$this->userdata['stage']+1?></a>
                    </div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <?php 
                }
            }
            else {
            ?>
                <div class="sufee-alert alert alert-info fade show">
                    <span class="badge badge-pill badge-info">NOTE</span>
                    &nbsp;You are at Stage&nbsp;<?=$this->userdata['stage']?> now. Use your referral link below to invite more people to join. 
                </div>
            <?php  
            }

            if ($this->userdata['upgrade_requested']) {
            ?>
                <div class="sufee-alert alert alert-info fade show">
                    <span class="badge badge-pill badge-info">Message</span>
                    &nbsp;You have made an upgrade request. Your upline will upgrade you to Stage <?=(($this->userdata['stage']+1)>3) ? 1 : $this->userdata['stage']+1?> after you have made Ghc<?=$GLOBALS['StageUpgradeAmount'][$this->userdata['stage']]?>. Use&nbsp;<strong>P2P-<?=$this->userdata['username']?></strong>&nbsp;as&nbsp;<strong>Reference number</strong>&nbsp;when making payment via your Mobile money account. But in case you make payment through a merchant,&nbsp;call your upline and notify him.
                    <div class="row">
                        <div class="col"><strong>Name:</strong></div> 
                        <div class="col"><?=$this->userdata['upliner_details']['fullname']?></div>
                    </div>
                    <div class="row">
                        <div class="col"><strong>Mobile Number:</strong></div> 
                        <div class="col"><?=$this->userdata['upliner_details']['mobile']?></div>
                    </div>
                    <div class="row">
                        <div class="col"><strong>Mobile Money Type:</strong></div> 
                        <div class="col"><?=$this->userdata['upliner_details']['momo_type']?></div>
                    </div>
                    <div class="row">
                        <div class="col"><strong>Mobile Money Name:</strong></div>
                        <div class="col"><?=$this->userdata['upliner_details']['momo_name']?></div>
                    </div>
                </div>
            <?php 
            }
            ?>

            <!-- STATISTIC-->
            <section class="pad10">
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item overview-item item--c1 text-white">
                                    <h2 class="number text-white"><?=$this->userdata['stage_name'] ?></h2>
                                    <span class="desc text-light">Current Stage</span>
                                    <div class="icon">
                                        <i class="fas fa-trophy text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item overview-item item--c2 text-white">
                                    <h2 class="number text-white"><?=$this->userdata['downlines'] ?></h2>
                                    <span class="desc text-light">Downlines</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item overview-item item--c3 text-white">
                                    <h2 class="number text-white"><?=$this->userdata['stage_downlines']?></h2>
                                    <span class="desc text-light">Stage Downlines</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note text-white"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item overview-item item--c4 text-white">
                                    <h2 class="number text-white">Ghc<?=number_format($this->userdata['total_earning']) ?></h2>
                                    <span class="desc text-light">total earnings</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-4">
                                <!-- TASK PROGRESS-->
                                <div class="task-progress">
                                    <h3 class="title-3">progress</h3>
                                    <div class="au-skill-container">
                                        <div class="au-progress">
                                            <span class="au-progress__title">Newbie</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?=$this->userdata['stage_progress'][0]?>">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">Stage 1</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?=$this->userdata['stage_progress'][1]?>">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">Stage 2</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?=$this->userdata['stage_progress'][2]?>">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="au-progress">
                                            <span class="au-progress__title">Stage 3</span>
                                            <div class="au-progress__bar">
                                                <div class="au-progress__inner js-progressbar-simple" role="progressbar" data-transitiongoal="<?=$this->userdata['stage_progress'][3]?>">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TASK PROGRESS-->
                            </div>

                            <div class="col-xl-8">
                                    <div class="card" style="background: <?=$GLOBALS['$stage_colors'][$this->userdata['stage']][0]?>;">
                                        <div class="card-header text-white" style="background:  <?=$GLOBALS['$stage_colors'][$this->userdata['stage']][1]?>;">
                                            <strong class="card-title">Current Stage Info - <?=$this->userdata['stage_name']?></strong>
                                        </div>
                                        <div class="card-body text-white">
                                            <p class="card-text text-light">
                                                <ul>
                                                    <?=$GLOBALS['stage_info'][$this->userdata['stage']]?>
                                                </ul>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card alert alert-success" role="alert">
                                            <p>User ID:&nbsp;<span class="alert-link"><?=$this->userdata['userid']?></span></p>
                                            <p>Username:&nbsp;<span class="alert-link"><?=$this->userdata['username']?></span></p>
                                            <p>Mobile Money Type:&nbsp;<span class="alert-link"><?=$this->userdata['momo_type']?></span></p>
                                            <p>Mobile Money Number:&nbsp;<span class="alert-link"><?=$this->userdata['mobile']?></span></p>
                                    </div>

                                    <div class="card alert alert-warning" role="alert">
                                            <h4>Your referral Links</h4>
                                            <p><span class="alert-link"><?=APP_URL?>register/<?=$this->userdata['userid']?></span></p>
                                            <p>Or</p>
                                            <p><span class="alert-link"><?=APP_URL?>register/<?=$this->userdata['username']?></span></p>
                                    </div>

                                    <div class="sufee-alert alert alert-info">
                                            <span class="badge badge-pill badge-info">NOTE</span>
                                            &nbsp;If your downline asks for Sponsor ID,&nbsp;give them your User ID..
                                    </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>

