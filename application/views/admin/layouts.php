<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">

    <div class="row">


      <?php if (check_package_features('vcard', $user->id) == TRUE): ?>
      <div class="col-md-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">Digital Vcards </h3>
          </div>
      
          <div class="col-md-12">
            <div class="row layrow">
     
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style11') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style11') ? 'checked' : '' ?> name="layout" value="style11" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style11.jpg') ?>">
                        </label>
                    </div>
                </div> 

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style12') ? 'active' : '' ?>">
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style12') ? 'checked' : '' ?> name="layout" value="style12" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style12.jpg') ?>">
                        </label>
                    </div>
                </div> 

                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style13') ? 'active' : '' ?>">
                        <span class="new-ribbon">New</span>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style13') ? 'checked' : '' ?> name="layout" value="style13" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style13.png') ?>">
                        </label>
                    </div>
                </div> 
          
            </div>
          </div>

        </div>
      </div>
      <?php endif; ?>

      
      <div class="col-md-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">Templates </h3>
          </div>
      
          <div class="col-md-12">
            <div class="row layrow">
              <?php for ($i=1; $i <= 5; $i++): ?>
                <div class="col-md-3 col-sm-6 col-xs-12 width-10s">
                    <div class="card-box p-0 layout-box parent <?php echo($user->layouts == 'style'.$i) ? 'active' : '' ?>">
                        <?php if ($i == 9): ?>
                          <span class="new-ribbon">New</span>
                        <?php endif ?>
                        <label>
                          <input class="set_layout" type="radio"<?php echo($user->layouts == 'style'.$i) ? 'checked' : '' ?> name="layout" value="style<?php echo $i; ?>" />
                          <img width="100%" src="<?php echo base_url('assets/admin/layouts/style'.$i.'.png') ?>">
                        </label>
                    </div>
                </div> 
              <?php endfor; ?>
            </div>
          </div>

        </div>
      </div>


      <div class="col-md-12">
        <div class="box">

          <div class="box-header with-border">
            <h3 class="box-title">Choose Fonts & Colors</h3>
          </div>
          
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/profile/update_fonts') ?>" role="form" class="form-horizontal">

          <div class="col-md-12 mt-0 mb-20">
            <div class="row layrow">
              <div class="col-md-6">
                  <div class="form-group m-t-10">
                    <label>Select Font</label>
                    <select class="form-control" name="site_font">
                      <?php foreach ($fonts as $fon): ?>
                        <option value="<?php echo $fon->id; ?>" <?php echo (user()->site_font == $fon->id) ? 'selected' : ''; ?>><?php echo ucfirst($fon->name); ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group m-t-10 ">
                      <label>Site Color</label>
                      <span class="color" style="background: #<?php echo html_escape($user->site_color); ?>"></span><br>
                      
                      <input type="text" name="site_color" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->site_color); ?>">
                  </div>
              </div>
            
              <div class="col-md-6">
                  <div class="form-group m-t-10 ">
                      <label>Gradient Background Left Color</label>
                      <input type="text" name="gd_color1" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->gd_color1); ?>">
                  </div>

                  <div class="form-group m-t-10 ">
                      <label>Gradient Background Right Color</label>
                      <input type="text" name="gd_color2" class="colorpicker-default form-control colorpicker-element" value="<?php echo html_escape($user->gd_color2); ?>">
                  </div>
                  <span class="color" style="width: 100%; background: linear-gradient(90deg, <?php echo html_escape($user->gd_color1); ?> 0%, <?php echo html_escape($user->gd_color2); ?> 100%);"></span><br>
              </div>

              <!-- csrf token -->
              <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
              
              <div class="col-md-12" style="padding-left: 17px">
                <button type="submit" class="btn btn-info waves-effect w-md waves-light m-b-5"><i class="fa fa-check"></i> Save Changes</button>
              </div>
            </div>
          </div>

          </form>

        </div>
      </div>

    </div>

  </section>

</div>