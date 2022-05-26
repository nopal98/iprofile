
<?php if ($user->enable_skill == 1 && check_package_features('skill', $user->id) == TRUE): ?>
    <section id="skill" class="skill">
        <div class="row">
            <?php $i=1; foreach ($skills as $skill): ?>
                <div class="col-md-6 col-sm-6 col-xs-12" data-aos="fade-up">
                    <div class="section-header">
                        <h2><?php echo html_escape($skill['name']) ?></h2>
                    </div>

                    <div class="skills">
                        <div class="row">
                            <?php foreach ($skill['sub_skills'] as $sub_skill): ?>
                            <div class="col-md-12 item inro">
                                <div class="skill-info clearfix">
                                    <h3 class="pull-left"><?php echo html_escape($sub_skill['name']) ?></h3>
                                    <span class="pull-right"><?php echo html_escape($sub_skill['skill_level']) ?>%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo html_escape($sub_skill['skill_level']) ?>"
                                    aria-valuemin="0" aria-valuemax="100" style="width:<?php echo html_escape($sub_skill['skill_level']) ?>%">
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php $i++; endforeach ?>
        </div>
    </section>
<?php endif ?>


<?php if ($user->enable_experience == 1 && check_package_features('experience', $user->id) == TRUE): ?>
    <section id="experience" class="resume" data-aos="fade-up" data-aos-delay="250">
        <?php foreach ($experiences as $exp): ?>
            <div class="section-header">
                <h2><?php echo html_escape($exp['name']) ?></h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="timeline_item shadow-lg">
                        <ul class="timeline">
                            <?php foreach ($exp['sub_exp'] as $sub_exp): ?>
                                <li>
                                    <div class="top-item resume-item">
                                        <h2><?php echo html_escape($sub_exp['name']) ?></h2>
                                        <span><?php echo html_escape($sub_exp['company']) ?> | <?php echo html_escape($sub_exp['date']) ?></span>
                                        <p><?php echo html_escape($sub_exp['details']) ?></p>
                                    </div>
                                </li>
                           <?php endforeach ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </section>
<?php endif ?>


