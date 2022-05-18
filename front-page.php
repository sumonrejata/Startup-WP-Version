<?php get_header();
/*
    Template Name: Home
*/
?>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                  $slider = null;
                  $slider = new WP_query(array(
                    'post_type' => 'slider',
                    'posts_per_page' => -1,
                  ));
                  if( $slider->have_posts() ){
                    $x = 0;
                    while ($slider->have_posts() ){
                        $x++;
                        $slider->the_post();
                        $slider_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                        ?>

                        <div class="carousel-item <?php if($x==1){ echo 'active'; } ?>">
                            <img class="w-100" src="<?php the_post_thumbnail_url();?>" alt="<?php the_title();?>">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 900px;">
                                    <?php if (get_field('slider_sub_heading')) : ?>
                                    <h5 class="text-white text-uppercase mb-3 animated slideInDown"><?php esc_html(the_field('slider_sub_heading'));?></h5>
                                    <?php endif;?>
                                    <h1 class="display-1 text-white mb-md-4 animated zoomIn"><?php the_title();?></h1>
                                    <?php if (get_field('slider_button_1')) : ?>
                                    <a href="<?php esc_url(the_field('slider_button_url_1'));?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"><?php esc_html(the_field('slider_button_1'));?>
                                    </a>
                                    <?php endif;?>
                                    <?php if (get_field('slider_button_2')) : ?>
                                    <a href="<?php esc_url(the_field('slider_button_url_2'));?>" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight"><?php esc_html(the_field('slider_button_2'));?></a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                    <?php }
                  }
                  else{
                    echo "You have not slider post";
                  }
                  wp_reset_postdata();
                  ?>
                

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->

    <!-- Facts Start -->
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <?php
                 $counter = get_field('counter_info','option');
                 foreach($counter  as $counters){
                ?>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="<?php echo $counters['counter_icon'];?> text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0"><?php echo $counters['counter_title'];?></h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up"><?php echo $counters['counter_number'];?></h1>
                        </div>
                    </div>
                </div>

            <?php } ?>
            </div>
        </div>
    </div>
    <!-- Facts Start -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <?php
                         $about_title=get_field('about_title','option');
                         $about_sub_title=get_field('about_sub_title','option');
                         $about_desc=get_field('about_desc','option');
                        ?>
                        <h5 class="fw-bold text-primary text-uppercase"><?php echo $about_title;?></h5>
                        <h1 class="mb-0"><?php echo $about_sub_title;?></h1>
                    </div>
                    <p class="mb-4"><?php echo $about_desc;?></p>
                    <div class="row g-0 mb-3">
                        <?php
                         $about_sub_info = get_field('about_sub_info','option');
                         foreach($about_sub_info as $about_sub_infos){
                        ?>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i><?php echo $about_sub_infos['about_sub_info_title'];?></h5>
                        </div>

                    <?php } ?>
                    </div>
                    <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                        <?php 
                        $about_contact_title = get_field('about_contact_title','option');
                        $about_contact_phone = get_field('about_contact_phone','option');
                        $about_contact_icon = get_field('about_contact_icon','option');
                        $about_button_text = get_field('about_button_text','option');
                        $about_btn_url = get_field('about_btn_url','option');
                        $about_image = get_field('about_image','option');
                        ?>
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="<?php echo $about_contact_icon;?> text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?php echo $about_contact_title;?></h5>
                            <h4 class="text-primary mb-0">+880<?php echo $about_contact_phone;?></h4>
                        </div>
                    </div>
                    <a href="<?php echo $about_btn_url;?>" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s"><?php echo $about_button_text;?></a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo $about_image['url'];?>" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Features Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <?php
             $why_choose_title = get_field('why_choose_title','option');
             $why_choose_sub_title = get_field('why_choose_sub_title','option');
            ?>
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $why_choose_sub_title;?></h5>
                <h1 class="mb-0"><?php echo $why_choose_title;?></h1>
            </div>
            <div class="row g-5">
                <?php
                $why_choose_info = get_field('why_choose_info','option');
                foreach($why_choose_info as $why_choose_infos){
                ?>
                <div class="col-lg-4">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="<?php echo $why_choose_infos['why_choose_info_icon'];?> text-white"></i>
                        </div>
                        <h4><?php echo $why_choose_infos['why_choose_info_title'];?></h4>
                        <p class="mb-0"><?php echo $why_choose_infos['why_choose_infor_desc'];?></p>
                    </div>
                </div>
            <?php } ?>

            </div>
        </div>
    </div>
    <!-- Features Start -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <?php $service_sub_title = get_field('service_sub_title','option');?>
                <?php $service_title = get_field('service_title','option');?>
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $service_sub_title;?></h5>
                <h1 class="mb-0"><?php echo $service_title;?></h1>
            </div>
            <div class="row g-5">
                <?php
                $basicpost = null;
                $basicpost = new WP_query(array(
                    'post_type' => 'service',
                    'posts_per_page' => -1,
                ));
                if( $basicpost->have_posts() ){
                    while ($basicpost->have_posts() ){
                        $basicpost->the_post();
                        $ser_btn_icon = get_field('service_icon');
                        ?>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                                <div class="service-icon">
                                    <i class="<?php echo $ser_btn_icon;?> text-white"></i>
                                </div>
                                <h4 class="mb-3"><?php the_title();?></h4>
                                <p class="m-0"><?php echo wp_trim_words(get_the_content(),10,'....');?></p>
                                <a class="btn btn-lg btn-primary rounded" href="<?php the_permalink();?>">
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php }
                }
                else{
                    echo "No Post";
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Pricing Plan Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <?php $pricing_sub_title = get_field('pricing_sub_title','option');?>
                <?php $pricing_title = get_field('pricing_title','option');?>
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $pricing_sub_title;?></h5>
                <h1 class="mb-0"><?php echo $pricing_title;?></h1>
            </div>
            <div class="row g-0">
               <?php
               $pricing = null;
               $pricing = new WP_query(array(
                'post_type' => 'pricing',
                'posts_per_page' => -1,
                'order'            =>'ASC'
            ));
               if( $pricing->have_posts() ){
                $x = 0;
                while ($pricing->have_posts() ){
                    $x++;
                    $pricing->the_post();
                    $pri_sub_title = esc_html(get_field('pricing_sub_title'));
                    $pricing_currency = get_field('pricing_currency');
                    $pricing_amount = get_field('pricing_amount');
                    $monthly_title = get_field('monthly_title');
                    $pricing_feature_title = get_field('pricing_feature_title');
                    $button_text = get_field('button_text');
                    $button_url = get_field('button_url');
                    ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                        <div class="<?php if(($x % 2)==0){echo 'bg-white rounded shadow position-relative';} else{echo 'bg-light rounded';}?> ">
                            <div class="border-bottom py-4 px-5 mb-4">
                                <h4 class="text-primary mb-1"><?php the_title();?></h4>
                                <small class="text-uppercase"><?php echo $pri_sub_title;?></small>
                            </div>
                            <div class="p-5 pt-0">
                                <h1 class="display-5 mb-3">
                                    <small class="align-top" style="font-size: 22px; line-height: 45px;"><?php echo $pricing_currency;?></small><?php echo $pricing_amount;?><small
                                    class="align-bottom" style="font-size: 16px; line-height: 40px;">/ <?php echo $monthly_title['value'];?></small>
                                </h1>
                                <?php foreach($pricing_feature_title as $features){ ?>
                                    <div class="d-flex justify-content-between mb-3"><span><?php echo $features['feature_title'];?></span><i class="<?php if($features['feature_icon']['value']=='hide'){echo 'fa fa-times text-danger';}
                                    else {echo 'fa fa-check text-primary';}?> pt-1"></i></div>

                                <?php } ?>

                                <a href="<?php echo esc_url($button_url);?>" class="btn btn-primary py-2 px-4 mt-4"><?php echo esc_html($button_text);?></a>
                            </div>
                        </div>
                    </div>

                <?php }
            }
            else{
                echo "You have not pricing post";
            }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
    <!-- Pricing Plan End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <?php
                         $quote_title = get_field('quote_title','option');
                         $quote_sub_title = get_field('quote_sub_title','option');
                        ?>
                        <h5 class="fw-bold text-primary text-uppercase">Request A Quote</h5>
                        <h1 class="mb-0">Need A Free Quote? Please Feel Free to Contact Us</h1>
                    </div>
                    
                    <div class="row gx-3">
                        <?php
                         $quote_support = get_field('quote_support','option');
                         foreach($quote_support as $quote_supports){
                        ?>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-4"><i class="<?php echo $quote_supports['quote_support_icon'];?> text-primary me-3"></i><?php echo $quote_supports['quote_support_title'];?></h5>
                        </div>
                    <?php } ?>
                    </div>
                    <?php $quote_description = get_field('quote_description','option');?>
                    <p class="mb-4"><?php echo $quote_description; ?></p>
                    <?php
                         $quote_call_us = get_field('quote_call_us','option');
                         foreach($quote_call_us as $quote_call_uss){
                        ?>
                    <div class="d-flex align-items-center mt-2 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="<?php echo $quote_call_uss['quote_call_us_icon'];?> text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?php echo $quote_call_uss['quote_call_us_title'];?></h5>
                            <h4 class="text-primary mb-0">+880<?php echo $quote_call_uss['quote_phone_number'];?></h4>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <div class="col-lg-5">
                    <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <?php echo do_shortcode('[contact-form-7 id="216" title="Quote Contact"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
                <?php $testimonial_sub_title = get_field('testimonial_sub_title','option');?>
                <?php $testimonial_title = get_field('testimonial_title','option');?>
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $testimonial_sub_title;?></h5>
                <h1 class="mb-0"><?php echo $testimonial_title;?></h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
                <?php
                  $testimonial = null;
                  $testimonial = new WP_query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => -1,
                    'or'            =>'ASC'
                  ));
                  if( $testimonial->have_posts() ){
                    while ($testimonial->have_posts() ){
                        $testimonial->the_post();
                        $client_image = get_field('client_image');
                        $designation = esc_html(get_field('designation'));
                        $description = esc_html(get_field('description'));
                        ?>
                        <div class="testimonial-item bg-light my-4">
                            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                                <img class="img-fluid rounded" src="<?php echo $client_image['url'];?>" style="width: 60px; height: 60px;" >
                                <div class="ps-4">
                                    <h4 class="text-primary mb-1"><?php the_title();?></h4>
                                    <small class="text-uppercase"><?php echo $designation;?></small>
                                </div>
                            </div>
                            <div class="pt-4 pb-5 px-5">
                                <?php echo $description;?>
                            </div>
                        </div>
                    <?php }
                  }
                  else{
                    echo "You have not Testimonial Post";
                  }
                  wp_reset_postdata();
                  ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <?php $team_sub_title = get_field('team_sub_title','option');?>
                <?php $team_title = get_field('team_title','option');?>
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $team_sub_title; ?></h5>
                <h1 class="mb-0"><?php echo $team_title; ?></h1>
            </div>
            <div class="row g-5">
            <?php
              $our_team = null;
              $our_team = new WP_query(array(
                'post_type' => 'our_team',
                'posts_per_page' => -1,
              ));
              if( $our_team->have_posts() ){
                while ($our_team->have_posts() ){
                    $our_team->the_post();
                    $designation = esc_html(get_field('team_designation'));
                    $team_social_info = get_field('team_social_info');
                    ?>
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <div class="team-item bg-light rounded overflow-hidden">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="<?php the_post_thumbnail_url('our_team');?>" alt="">
                                <div class="team-social">
                                    <?php foreach($team_social_info as $team_info) { ?>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="<?php echo $team_info['team_social_icon'];?> fw-normal"></i></a>
                                    <?php } ?>
                                    <!-- <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                                    <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a> -->
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <h4 class="text-primary"><?php the_title();?></h4>
                                <p class="text-uppercase m-0"><?php echo $designation;?></p>
                            </div>
                        </div>
                    </div>
                <?php }
              }
              else{
                echo "No Post";
              }
              wp_reset_postdata();
              ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Blog Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <?php
             $blog_title = get_field('blog_title','option');
             $blog_sub_title = get_field('blog_sub_title','option');
            ?>
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase"><?php echo $blog_title;?></h5>
                <h1 class="mb-0"><?php echo $blog_sub_title;?></h1>
            </div>
            <div class="row g-5">
                <?php
                  $latest_post = null;
                  $latest_post = new WP_query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                  ));
                  if( $latest_post->have_posts() ){
                    while ($latest_post->have_posts() ){
                        $latest_post->the_post();
                        $categories = get_the_category();
                        $post_date = get_the_date('j,F Y');
                        ?>

                        <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                            <div class="blog-item bg-light rounded overflow-hidden">
                                <div class="blog-img position-relative overflow-hidden">
                                    <img class="img-fluid" src="<?php the_post_thumbnail_url('latest_post');?>" alt="">
                                    <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href=""><?php echo $categories[0]->name;?></a>
                                </div>
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small class="me-3"><i class="far fa-user text-primary me-2"></i><?php the_author(); ?></small>
                                        <small><i class="far fa-calendar-alt text-primary me-2"></i><?php echo $post_date;?></small>
                                    </div>
                                    <h4 class="mb-3"><?php the_title();?></h4>
                                    <p><?php echo wp_trim_words(get_the_content(),'15','......');?></p>                                    
                                    <a class="text-uppercase" href="<?php the_permalink();?>">Read More <i class="fas fa-long-arrow-alt-right"></i></a>
                                </div>
                            </div>
                        </div>

                    <?php }
                  }
                  else{
                    echo "You have not post";
                  }
                  wp_reset_postdata();
                  ?>
            </div>
        </div>
    </div>
    <!-- Blog Start -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5 mb-5">
            <div class="bg-white">
                <div class="owl-carousel vendor-carousel">
                    <?php
                     $vendor_section =get_field('vendor_section','option');
                     foreach($vendor_section as $vendor_sections){
                    ?>
                    <img src="<?php echo $vendor_sections['vendor_image']['url'];?>" alt="">
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    <?php get_footer();?>
    