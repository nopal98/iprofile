<?php header("Content-type: text/css; charset: UTF-8"); ?>
<?php $site_color = $_GET['color']; ?>


.profile-card {
    background: #<?=$site_color?> !important;
}

.estate figure .imgout .price, .site-btn, .timeline li:first-child i, nav ul li a:after, .owl-theme .owl-controls .owl-page span, .skill-list .progress .percentage, ul.profile-information li:first-child:before{
    background: #<?=$site_color?> !important;
}

header nav ul li a:hover, .events ul li .datenlocation span, .namenprice .price, .portfolio-content p span, #blog-post .blog-sidebar ul.category-list li a:hover, #blog-post .blog-sidebar .popular-posts ul li a .info{
    color: #ddd !important;
}

.cbp-filter-item-active{
    color: #<?=$site_color?> !important;
}

.estate figure .imgout .price, .timeline li:first-child i, nav ul li a:after, .owl-theme .owl-controls .owl-page span, .skill-list .progress .percentage, ul.profile-information li:first-child:before {
    background: #<?=$site_color?> !important;
}

.timeline li:first-child i{
    background: #<?=$site_color?> !important;
    color:#fff;
}
.active{
    border-bottom: 2px solid #fff;
    border-radius: 0px;
}

.spinner:before{
    border-top-color: #<?=$site_color?>;  
}

ul.profile-information li:before{
	border-color: #<?=$site_color?>; 
}


/* Hover Color*/

.section-title h1, .section-title h2, .section-title h3, .section-title h4 ,.section-title h5{
    font-size: 18px;
    font-weight: 600;
    position: relative;  
    <!-- border-bottom: 2px solid #<?=$site_color?>; -->
    line-height: 26px;
}

/* Opacity Color*/

#portfolio .cbp-item .portfolio-image .icon i, #portfolio .cbp-item figure .icon i{
    background: rgb(255, 197, 1);
}

/* for light colors */

header nav a.home-btn i, ul.profile-information li:first-child:before, #blog .blog-box .date span, #blog .blog-box .date span, .cbp-l-loadMore-link{
	color: #fff !important;
}


.timeline li:before, ul.profile-information li:before{
	border-color: #<?=$site_color?> !important;
}

.tab.active a, #blog-post .post-list ul li a, #blog-post .post-comment ul li .comment-content a{
	color: #fff;
}

ul.profile-information li:first-child:after{
    background: url(../../images/glasses.png) no-repeat; 
    background-size: 27px 10px;
}

.main-nav {
    background: #<?=$site_color?>;
    height: 200px;
    position: relative;
}

svg {
    background: #<?=$site_color?> !important;
    position: absolute;
    top: 200px;
    right: 0;
}

.user-text h2 {
    font-size: 60px;
    margin-bottom: 8px;
    font-weight: 600;
    color: #<?=$site_color?>;
    text-shadow: 0px 4px 3px rgba(0,0,0,0.3),
                 0px 8px 13px rgba(0,0,0,0.1),
                 0px 18px 23px rgba(0,0,0,0.1);
}


.contact-info ul li span i {
    color: #<?=$site_color?>;
    margin-right: 6px;
    border-radius: 50%;
}

.tagcloud a:hover {
    background: #<?=$site_color?>;
    color: #fff;
}

.service:hover {
    background: #<?=$site_color?>;
    color: #fff;
    transform: translateY(-5px);
}

.input-group-addon {
    padding: 6px 12px;
    font-size: 14px;
    font-weight: normal;
    line-height: 1;
    color: #fff;
    text-align: center;
    background: #<?=$site_color?>;
    border-radius: 4px;
}

.site-btn {
    background: #<?=$site_color?>;
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    border: 1px solid #<?=$site_color?>;
    border-radius: 50px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 50px;
    padding: 2px 12px;
    line-height: 32px;
    webkit-transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    -ms-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
}

.site-btn:hover {
    background: #fff !important;
    border: 1px solid #<?=$site_color?>;
    color: #<?=$site_color?>;
}

.profile-usermenu ul li.active a {
  color: #<?=$site_color?>;
  background-color: #fafafa;
  border-right: 3px solid #<?=$site_color?>;
  margin-right: 0px;
}

#download-cv:hover {
    background: #<?=$site_color?> !important;
    color: #fff;
    transition: .3s;
}

#view-cv:hover {
    background: #<?=$site_color?> !important;
    color: #fff;
    transition: .3s;
}

a.site-btn i.fa {
    padding: 4px;
    background: none !important;
    border-radius: 50%;
    margin-left: 5px;
    font-size: 12px;
}

.profile-usermenu ul li a:hover {
    background-color: #fafcfd;
    color: #<?=$site_color?> !important;
    transition: .3s;
}


.section-header h2::after {
    content: '';
    background-color: #<?=$site_color?> !important;
    border-radius: 0.5rem;
    height: 4px;
    position: absolute;
    bottom: -0.5rem;
    left: 0;
    width: 3.12rem;
    z-index: 1;
}

.header .main-nav ul li a:hover,.header .main-nav ul li a:focus {
    background: #<?=$site_color?> !important;
    color: #fff !important;
    text-decoration: none;
}

.resume-download:hover, .view-resume:hover {
    background: #<?=$site_color?> !important;
    color: #FFF;
}


.works .control ul li a:hover {
    background: #<?=$site_color?> !important;
    color: #fff;
    text-decoration: none;
}

.works .control ul li.active a {
    background: #<?=$site_color?> !important;
    color: #fff;
}

.works .item-outer .item .overlay {
    background: #<?=$site_color?> !important;
    height: 100%;
    left: 0;
    opacity: 0;
    top: 0;
    position: absolute;
    width: 100%;
    z-index: 1;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    transition: all .3s ease-in-out;
}

.header .main-nav ul li a.active {
    background: #<?=$site_color?> !important;
    color: #fff;
}

.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 1px;
    color: #fff;
    text-align: center;
    background-color: #<?=$site_color?> !important;;
    -webkit-box-shadow: none;
    box-shadow: none;
    -webkit-transition: width .6s ease;
    -o-transition: width .6s ease;
    transition: width .6s ease;
}