<section class="au-breadcrumb m-t-45">
                <div class="section__content section__content--p10">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <a href="<?=APP_URL?>dashboard">Dashboard</a>
                                        <span>&nbsp;/&nbsp;</span>
                                        <span>Account Details</span>
                                    </div>
                                    <!--<button class="au-btn au-btn-icon au-btn--green">
                                        <i class="zmdi zmdi-plus"></i>add item</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="m-t-45">
                <div class="section__content section__content--p75">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Personal Information</div>
                                    <div class="card-body">
                                        <form action="" method="post" novalidate="novalidate">
                                            <div class="form-group">
                                                <label for="fname" class="control-label mb-1">Name</label>
                                                <input id="fname" name="fname" type="text" class="form-control" aria-required="true" aria-invalid="false" value="<?=$this->userdata['fullname']?>" required disabled>
                                            </div>
                                            <div class="form-group has-success">
                                                <label for="userid" class="control-label mb-1">User ID</label>
                                                <input id="userid" value="<?=$this->userdata['userid']?>" name="userid" type="text" class="form-control cc-name valid" disabled required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cc-number" class="control-label mb-1">Username</label>
                                                <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="<?=$this->userdata['username']?>" disabled required>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Mobile Money</strong>
                                        <small> Details</small>
                                    </div>
                                    <div class="card-body card-block">
                                        
                                        <div class="form-group">
                                            <label for="company" class=" form-control-label">Account Name</label>
                                            <input type="text" id="company" placeholder="Enter your company name" class="form-control" value="<?=$this->userdata['momo_name']?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="vat" class=" form-control-label">Mobile Money Type</label>
                                            <select name="selectSm" id="SelectLm" class="form-control-sm form-control">
                                                <option>Select Network Operator</option>
                                                <?php  
                                                foreach ($GLOBALS['momo_options'] as $options => $optvalue) {
                                                ?>
                                                    <option value="<?=$options?>" <?=(strtolower($this->userdata['momo_type'])==$options) ? "selected" : "" ;?>><?=$optvalue?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="mobile" class=" form-control-label">Mobile Money Number</label>
                                            <input type="text" id="mobilele" placeholder="Enter mobile Number" class="form-control" value="<?=$this->userdata['mobile']?>">
                                        </div>

                                    </div>
                                </div>
                            </div>
                            
                        </div>

            </div>
        </div>
    </section>