<section class="section-padding">
    <div class="container">
        <div class="row mb-20" data-aos="fade-up">
            <div class="col-md-6 col-xs-12">
                <?php foreach ($package_users as $package): ?>
                    <div class="stats-counts">
                        <h4><?php echo html_escape($package->total_user); ?></h4>
                        <p><?php echo html_escape($package->name); ?> Users</p>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="col-md-2 col-xs-12">
                <div class="pull-rights">
                  <label for="sel1">Search by skills</label>
                  <select class="form-control sort_user" id="sel1">
                      <option value="<?php echo base_url('home/users?sort=all') ?>">Select Skills</option>
                      <?php foreach ($skills as $skill): ?>
                        <option <?php if(isset($_GET['skill']) && $_GET['skill'] == $skill->slug){echo "selected";} ?> value="<?php echo base_url('home/users?skill='.$skill->slug) ?>"><?php echo html_escape($skill->name) ?></option>
                      <?php endforeach ?>
                  </select>
                </div>
            </div>

            <div class="col-md-2 col-xs-12">
                <div class="pull-rights">
                  <label for="sel1">Sort Users</label>
                  <select class="form-control sort_user" id="sel1">
                    <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'all'){echo "selected";} ?> value="<?php echo base_url('home/users?sort=all') ?>">All users</option>
                    <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'views'){echo "selected";} ?> value="<?php echo base_url('home/users?sort=views') ?>">Most views</option>
                    <option <?php if(isset($_GET['sort']) && $_GET['sort'] == 'views'){echo "selected";} ?> value="<?php echo base_url('home/users?sort=name') ?>">Alphabetly</option>
                  </select>
                </div>
            </div>

            <?php if (settings()->enable_country == 1): ?>
            <div class="col-md-2 col-xs-12">
                <div class="pull-rights">
                  <label for="sel1">Locations</label>
                  <select class="form-control sort_user" id="sel1">
                       <?php foreach ($countries as $country): ?>
                            <option <?php if(isset($_GET['country']) && $_GET['country'] == $country->id){echo "selected";} ?> value="<?php echo base_url('home/users?country='.$country->id) ?>"><?php echo $country->name ?></option>
                       <?php endforeach ?>
                  </select>
                </div>
            </div>
            <?php endif; ?>

        </div>

        <div class="row">
            <?php if (empty($users)): ?>
                <div class="col-md-12 text-center" style="padding: 100px">
                    <h3>No users found !</h3>
                </div>
            <?php else: ?>
                <?php $i=1; foreach ($users as $user): ?>
                    <div class="col-md-4 col-sm-12" id="item_<?php echo $user->id; ?>" data-aos="fade-up" data-aos-delay="<?php echo $i * 100; ?>">
                         <div class="card-container manual-flip">
                            <div class="card">
                                <div class="front">

                                    <a target="_blank" href="<?php echo base_url($user->slug) ?>">
                                        <div class="user">
                                            <img class="img-circle" src="<?php echo base_url($user->thumb) ?>">
                                            <?php if ($user->account_type == 'pro'): ?>
                                                <label class="label label-warning custom" data-toggle="tooltip" title="Pro Member"><i class="fa fa-star"></i></label>
                                            <?php endif ?>
                                        </div>
                                    </a>

                                    <div class="content">
                                        <div class="main">
                                            <h3 class="name"><?php echo html_escape($user->name) ?> </h3>
                                            <p class="profession"><?php echo html_escape($user->designation) ?></p>
                                            
                                            <?php if ($this->session->userdata('logged_in') == TRUE): ?>
                                                <?php $follow = check_follower($user->id); ?>
                                                    <div class="card-btns text-center">
                                                        <?php if ($follow == 0): ?>
                                                            <a href="#" id="follow_<?php echo $user->id; ?>" data-id="<?php echo $user->id; ?>" class="btn follow mr-5"><i class="fa fa-user-plus"></i> Follow</a>
                                                        <?php else: ?>
                                                            <a href="#" id="unfollow_<?php echo $user->id; ?>" data-id="<?php echo $user->id; ?>" class="btn unfollow mr-5"><i class="fa fa-check"></i> Following</a>
                                                        <?php endif ?>
                                                        <a target="_blank" href="<?php echo base_url($user->slug) ?>" class="btn default"><i class="fa fa-eye"></i> View Profile</a>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="card-btns text-center">
                                                        <a href="<?php echo base_url('login') ?>" class="btn default mr-5"><i class="fa fa-user-plus"></i> Follow</a>

                                                        <a target="_blank" href="<?php echo base_url($user->slug) ?>" class="btn default"><i class="fa fa-eye"></i> View Profile</a>
                                                    </div>
                                                <?php endif ?>

                                            <div class="stats-container">
                                                <div class="stats">
                                                    <h4><?php echo get_total_followers($user->id); ?></h4>
                                                    <p>
                                                        Followers
                                                    </p>
                                                </div>
                                                <div class="stats br">
                                                    <h4><?php echo get_total_followings($user->id); ?></h4>
                                                    <p>
                                                        Following
                                                    </p>
                                                </div>
                                                <div class="stats">
                                                    <h4><?php echo get_total_portfolio($user->id); ?></h4>
                                                    <p>
                                                        Portfolio
                                                    </p>
                                                </div>
                                                <div class="stats">
                                                    <h4><?php echo $user->hit; ?></h4>
                                                    <p>
                                                        Views
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end front panel -->
                            </div> <!-- end card -->
                        </div> <!-- end card-container -->
                    </div>
                <?php $i++; endforeach ?>
            <?php endif ?>

            <div class="col-md-12 text-center">
                <?php echo $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>
</section>