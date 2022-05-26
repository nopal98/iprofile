<!-- Start content -->
<div class="content-wrapper">
  <section class="content">

    <div class="row">

      <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12">
          <div class="box">
              <div class="box-header with-border text-center">
                  <h3 class="box-title pt-2">Generate QR Code using profile link</h3>
                  <h5 class="pt-1">Scan to cehck for result</h5>
              </div>
              <div class="box-body">
                  <div class="row">
                    <div class="col-md-12 text-center">
                        <img class="b-2" src="<?php echo base_url(user()->qr_code) ?>">
                    </div>

                    <div class="col-md-12 mt-4 text-center">
                      <a href="<?php echo base_url('admin/profile/download_qrcode') ?>" class="btn btn-info"><i class="fa fa-cloud-download"></i> Download</a>
                    </div>

                  </div>
              </div>
          </div>
      </div>
     

    </div>

  </section>
</div>
