<section id="experience" class="resume">
    <div class="section-header">
        <h2><?php if(isset($page_title)) {echo html_escape($page_title);} ?></h2>
    </div>

    <div class="row">
        <?php $i=1; foreach ($blog_posts as $post): ?>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="blog-item shadow-lg" data-aos="zoom-in-up" data-aos-delay="<?php echo $i*150; ?>">
            
                    <a href="<?php echo base_url('post/'.$user->slug.'/'.$post->slug) ?>" class="work-image">
                        <div class="thumb blog" style="background-image: url(<?php echo base_url($post->image) ?>);">
                        </div>
                    </a>

                    <div class="blog-title">
                        <p><?php echo html_escape($post->category) ?> - <?php echo my_date_show($post->created_at) ?></p>
                        <h2><?php echo html_escape($post->title) ?></h2>
                    </div>
                </div>
            </div>
        <?php $i++; endforeach ?>
    </div>
</section>