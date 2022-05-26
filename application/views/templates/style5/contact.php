 <section id="contact" class="contact" data-aos="fade-up">
            
    <div class="section-header">
        <h2>Get In Touch</h2>
    </div>

    <div class="row">
        <div class="col-md-6">  
            <?php if (!empty($this->session->flashdata('msg'))): ?>
                <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong><?php echo $this->session->flashdata('msg'); ?> !</strong>
                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">  
            <div class="contact-form">
                <form method="post" class="site-form" action="<?php echo base_url('send-message'); ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="input" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" type="input" name="email" placeholder="E-mail" required>
                            </div>
                        </div>
                        <div class="col-md-12 top_25">
                            <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Message" rows="8" required></textarea>
                            </div>
                        </div>
                        <!-- csrf token -->
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="col-md-12 top_15 bottom_30">
                            <input type="hidden" name="user_id" value="<?php echo html_escape($user->id) ?>">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
                        </div>
                    </div>
                </form>  
            </div>
        </div>

        <div class="col-md-6">  
            <div class="contact-info">
                <ul>
                    <?php if (!empty($user->address)): ?>
                        <li><span><i class="icon-location-pin"></i> Address:</span> <?php echo html_escape($user->address) ?></li>
                    <?php endif ?>
                    <?php if (!empty($user->phone)): ?>
                        <li><span><i class="icon-call-end"></i> Phone:</span> <?php echo html_escape($user->phone) ?></li>
                    <?php endif ?>
                    <?php if (!empty($user->email)): ?>
                        <li><span><i class="icon-envelope-open"></i> E-mail:</span> <?php echo html_escape($user->email) ?></li>
                    <?php endif ?>
                    <?php if (!empty($user->skype)): ?>
                        <li><span><i class="fa fa-skype"></i> Skype:</span> <?php echo html_escape($user->skype) ?></li>
                    <?php endif ?>
                    <?php if (!empty($user->whatsapp)): ?>
                        <li><span><i class="fa fa-whatsapp"></i> Whatsapp:</span> <?php echo html_escape($user->whatsapp) ?></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
    </div>

</section>

