<section id="contact" class="contact" data-aos="fade-up">
            
    <div class="section-header">
        <h2>Appointment</h2>
    </div>

    <div class="row">

        <div class="col-md-12 text-left">
            <?php if (!empty($this->session->flashdata('msg'))): ?>
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $this->session->flashdata('msg'); ?> !</strong>
                </div>
            <?php endif ?>
        </div>

        <div class="col-md-6">  
            <form method="post" class="site-form" action="<?php echo base_url('book-appointment/'.html_escape($user->slug)); ?>">

                <div class="row"><!-- Row -->

                    <div class="col-md-12 col-sm-12"><!-- Name input -->
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Appointment Title" required>
                        </div>
                    </div>


                    <div class="col-md-12 col-sm-12"><!-- Email input -->
                        <div class="form-group">
                            <div class='input-group date' id=''>
                              <input type='text' name="book_time" class="form-control datetimepicker1" value="" autocomplete="off" required />
                              <span class="input-group-addon">
                                  <span class="icon-calendar"></span>
                              </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12"><!-- Email input -->
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12"><!-- message input -->
                        <div class="form-group">
                            <textarea class="form-control" name="details" placeholder="Enter message here"></textarea>
                        </div>
                    </div>


                </div><!-- Row end -->

                <!-- csrf token -->
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                <input type="hidden" name="user_id" value="<?php echo html_escape($user->id) ?>">

                <input type="submit" name="submit" id="submit" value="Send Message" class="btn btn-primary pull-left"><!-- Send Button -->

            </form>
        </div>  

        <div class="col-md-6">
            <div class="appointment-info">
                
                <?php if (!empty($user->appointment_info)): ?>
                    <h5><i class="fa fa-info-circle"></i> <?php echo $user->appointment_info ?></h5>
                <?php endif ?>
                
                <?php $days = get_days(); ?>

                <ul>
                    <?php if (empty($my_days)): ?>
                        <li><i class="fa fa-ban"></i> No days selected for appointment</li>
                    <?php else: ?>
                        <?php  $i=1; foreach ($days as $day): ?>
                                
                            <?php foreach ($my_days as $asnday): ?>
                              <?php if ($asnday['day'] == $i) {
                                $check = 'check text-success';
                                break;
                              } else {
                                $check = 'close text-danger';
                              }
                              ?>
                            <?php endforeach ?>

                            <li>
                                <span>
                                    <i class="icon-<?php echo $check; ?>"></i> <?php echo $day ?> 
                                    <?php if (!empty($my_days[$i-1]['start'])): ?>
                                        &emsp; (<?php echo $my_days[$i-1]['start'].' - '.$my_days[$i-1]['end'] ?>)
                                    <?php else: ?>
                                        &emsp; <span class="text-danger">(Close)</span>
                                    <?php endif ?>
                                </span>
                            </li>
                        <?php  $i++; endforeach ?>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>

</section>
