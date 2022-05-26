<section id="works" class="works clearfix">
            
    <div class="section-header">
        <h2>Portfolio</h2>
    </div>

    <!-- Control -->
    <div class="control">
        <ul>
            <li class="active"><a class="filter" data-filter="all">All</a></li>
            <?php foreach ($categories as $category): ?>
                <li><a class="filter" data-filter="<?php echo html_escape($category->id) ?>"><?php echo html_escape($category->name) ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>

    <!-- Items Outer -->
    <div class="item-outer row clearfix">
        <?php foreach ($portfolios as $portfolio): ?>
            <div class="col-md-4 col-sm-6 col-xs-12 filtr-item" data-category="<?php echo html_escape($portfolio->category_id) ?>" data-sort="value">
                <div class="item" style="background-image: url(<?php echo base_url($portfolio->image) ?>);">
                    <a href="#portfolio_modal_<?php echo html_escape($portfolio->id) ?>" data-toggle="modal" class="work-image">
                        <div class="title">
                            <div class="inner">
                                <h2><?php echo html_escape($portfolio->title) ?></h2>
                            </div>
                        </div>
                    </a>
                    <div class="overlay"></div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    
</section>



<!-- Modal -->
<?php foreach ($portfolios as $portfolio): ?>
<div id="portfolio_modal_<?php echo html_escape($portfolio->id) ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo html_escape($portfolio->title) ?></h4>
      </div>
      <div class="modal-body">
        <img width="100%" src="<?php echo base_url($portfolio->image) ?>" alt=""> <br><br>
        <?php if (!empty($portfolio->link)): ?>
            <a target="_blank" href="<?php echo html_escape($portfolio->link) ?>"><b><i class="fa fa-link" aria-hidden="true"></i> Visit Link </b></a>
        <?php endif ?>
        <p class="m-t-10"><?php echo html_escape($portfolio->details) ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<?php endforeach ?>