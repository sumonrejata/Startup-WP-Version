<?php

function RST_startup_theme_setup(){
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_image_size('our_team',340,340);
	add_image_size('latest_post',341,238);

	register_nav_menus(array(
		'main_menu'		=> __('Main Menu','rst_startup'),
		'footer_1'		=> __('Footer 1','rst_startup'),
		'footer_2'		=> __('Footer 2','rst_startup'),
	));

} 
add_action('after_setup_theme','RST_startup_theme_setup');

// Start Startup all css

function RST_Startup_CSS(){

	wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'font_awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'owl_carousel_min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'animate_min', get_template_directory_uri() . '/assets/css/animate.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'bootstrap_min_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );

	wp_enqueue_style( 'theme_default_style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'theme_style', get_stylesheet_uri() );


	// Theme JS Load

	 wp_enqueue_script( 'jquery_main', get_template_directory_uri() . '/assets/js/jquery-3.4.1.min.js', array('jquery'), '1.0.0', true );

	 wp_enqueue_script( 'bootstrap_bundle', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0', true );

	 wp_enqueue_script( 'wow_min', get_template_directory_uri() . '/assets/js/wow.min.js', array('jquery'), '1.0.0', true );

	 wp_enqueue_script( 'waypoints_min', get_template_directory_uri() . '/assets/js/waypoints.min.js', array('jquery'), '1.0.0', true );

	 wp_enqueue_script( 'counterup_min', get_template_directory_uri() . '/assets/js/counterup.min.js', array('jquery'), '1.0.0', true );

	 wp_enqueue_script( 'owl_carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '1.0.0', true );

	 wp_enqueue_script( 'main_js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true );
}
add_action('wp_enqueue_scripts','RST_Startup_CSS');


// Startup Custom Post 

if( file_exists(dirname(__FILE__)) . '/inc/startupe_custom_post.php' ){
	require_once( dirname(__FILE__) . '/inc/startupe_custom_post.php' );
}


// Sider Bar Register

function Startup_getin_tuch() {
    register_sidebar( array(
	'name'          => __( 'Get In Touch', 'company' ),
	'id'            => 'get_in_tuch',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="text-light mb-0">',
	'after_title'   => '</h3></div>',
	) ); 
}
add_action( 'widgets_init', 'Startup_getin_tuch' );

function Startup_Footer_1() {
    register_sidebar( array(
	'name'          => __( 'Quick Links', 'company' ),
	'id'            => 'footer_1',
	'description'	=>'This Widget for footer Quick Links',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="text-light mb-0">',
	'after_title'   => '</h3></div>',
	) ); 
}
add_action( 'widgets_init', 'Startup_Footer_1' );

function Startup_Footer_2() {
    register_sidebar( array(
	'name'          => __( 'Popular Links', 'company' ),
	'id'            => 'footer_2',
	'description'	=>'This Widget for footer Popular Links',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<div class="section-title section-title-sm position-relative pb-3 mb-4">
        <h3 class="text-light mb-0">',
	'after_title'   => '</h3></div>',
	) ); 
}
add_action( 'widgets_init', 'Startup_Footer_2' );



// Stratup Recent Post Widget

class Startup_get_in_tuch extends WP_Widget {
 
    function __construct() {
    parent::__construct(
     
        'startup_recent_widget', 
        __('Get In Touch', 'startup'), 
        array( 'description' => __( 'Sample widget based on Get In Touch', 'startup' ), )
        );
    }
     
    // Creating widget front-end
     
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
     
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    echo $args['after_widget'];
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 5
    );
    $query = new WP_Query($args);
    if($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();
            ?>
                <div class="d-flex rounded overflow-hidden mb-3">
                    <img class="img-fluid" src="<?php the_post_thumbnail_url();?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                    <a href="<?php the_permalink();?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?php the_title();?>
                    </a>
                </div>
            <?php
        }
        wp_reset_postdata(  );
    }
?>

<?php


    
    }
     
    // Widget Backend
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
    $title = $instance[ 'title' ];
    }
    else {
    $title = __( 'Categories', 'wpb_widget_domain' );
    }
    // Widget admin form
    ?>
    <p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
    }
     
    // Class wpb_widget ends here
    } 
     
    // Register and load the widget
    function Startup_getintuch_Widget() {
        register_widget( 'Startup_get_in_tuch' );
    }
add_action( 'widgets_init', 'Startup_getintuch_Widget' );






// My Widget 

class Getin_Tuch_Widget extends WP_Widget {
	public function __construct(){
		parent::__construct(
			'get_in_tuch_widget',
			'Get In Touch',
			array('description' =>'RST Startup Get In Tuch Widget'),
		);

		add_action( 'widgets_init', function() {
            register_widget( 'Getin_Tuch_Widget' );
        });
	}

	public function widget($args, $instance){
		$title = apply_filters( 'widget_title', $instance['title'] );
	 	$footer_addres = $instance['footer_addres'];
	 	$footer_email = $instance['footer_email'];
	 	$footer_phone = $instance['footer_phone'];
	 	$footer_twt_link = $instance['footer_twt_link'];
	 	$footer_lind_link = $instance['footer_lind_link'];
	 	$footer_inst_link = $instance['footer_inst_link'];
	 	$footer_fb_link = $instance['footer_fb_link'];
	 	$link_test = $instance['link_test'];
	 	$footer_ins_link = $instance['footer_ins_link'];

		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		if($footer_addres) {
			?>
			<div class="d-flex mb-2">
				<i class="fas fa-home text-primary me-2 mt-1"></i>
				<p class="mb-0"><?php echo $footer_addres;?></p>
			</div>
			<?php
		}
		if($footer_email){ ?>
			<div class="d-flex mb-2">
                <i class="far fa-envelope text-primary me-2 mt-1"></i>
                <p class="mb-0"><?php echo $footer_email; ?></p>
            </div>
		<?php }
		if ($footer_phone) { ?>
			<div class="d-flex mb-2">
	            <i class="fas fa-phone-alt text-primary me-2 mt-1"></i>
	            <p class="mb-0">+880 <?php echo $footer_phone;?></p>
	        </div>
		<?php }

		?>
		<div class="d-flex mt-4">

			<?php if($footer_twt_link){ ?>
            <a class="btn btn-primary btn-square me-2" href="<?php echo $footer_twt_link;?>"><i class="fab fa-twitter fw-normal"></i></a>
	        <?php } ?>

	        <?php if($footer_fb_link){ ?>
            <a class="btn btn-primary btn-square me-2" href="<?php echo $footer_fb_link;?>"><i class="fab fa-facebook-f fw-normal"></i></a>
	        <?php } ?>


	        <?php if ($footer_lind_link) { ?>
	        	<a class="btn btn-primary btn-square me-2" href="<?php echo $footer_lind_link;?>"><i class="fab fa-linkedin-in fw-normal"></i></a>
	        <?php } ?>

	        <?php if ($footer_inst_link) { ?>
	        	<a class="btn btn-primary btn-square me-2" href="<?php echo $footer_inst_link;?>"><i class="fab fa-instagram fw-normal"></i></a>
	        <?php } ?>

            
        </div>
		<?php

		 echo $args['after_widget'];
	

	 }



	public function form($instance){
		if (isset($instance['title'])) {
			$title = $instance['title'];
		}
		else{
			$title = __( 'Get in touch', 'rst_startup' );
		}
		$footer_addres = $instance['footer_addres'];
		$footer_email  = $instance['footer_email'];
		$footer_phone = $instance['footer_phone'];
		$footer_twt_link = $instance['footer_twt_link'];
		$footer_fb_link = $$instance['footer_fb_link'];
		$footer_lind_link = $instance['footer_lind_link'];
		$footer_inst_link = $instance['footer_inst_link'];
		?>

		<!-- Start Footer Location And address -->
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Get In Touch:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'footer_addres' ) ); ?>"><?php echo esc_html__( 'Address:', 'text_domain' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'footer_addres' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'footer_addres' ) ); ?>" type="text" value="<?php echo esc_attr( $footer_addres ); ?>">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('footer_email');?>"><?php echo esc_html__('Enter Your Email :','rst_startup');?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('footer_email') );?>" name="<?php echo $this->get_field_name('footer_email');?>" type="text" value="<?php echo esc_attr($footer_email);?>" >
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('footer_phone');?>"><?php echo esc_html__('Footer Phone :','rst_startup');?></label>
			<input class="widefat" type="text" id="<?php echo $this->get_field_id('footer_phone');?>" name="<?php echo $this->get_field_name('footer_phone');?>" value="<?php echo esc_attr($footer_phone);?>">
		</p>

		<!-- End Footer Location And address -->

		<!-- Start Footer Social Link -->

		<p>
			<label for="<?php echo $this->get_field_id('footer_twt_link'); ?>" ><?php echo esc_html__('Twitter Link :','rst_startup');?></label>
			<input class="widefat" type="url" id="<?php echo $this->get_field_id('footer_twt_link');?>" name="<?php echo $this->get_field_name('footer_twt_link');?>" value="<?php echo esc_attr($footer_twt_link);?>"/>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('footer_lind_link');?>"><?php echo esc_html__('Linkedin Link :','rst_startup');?></label>
			<input class="widefat" type="url" id="<?php echo $this->get_field_id('footer_lind_link' ); ?>" name="<?php echo $this->get_field_name('footer_lind_link');?>" value="<?php echo esc_attr( $footer_lind_link ); ?>"/>
		</p>

		<p>
        <label for="<?php echo $this->get_field_id( 'footer_inst_link' ); ?>"><?php _e( 'Instragram Link:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'footer_inst_link' ); ?>" name="<?php echo $this->get_field_name( 'footer_inst_link' ); ?>" type="url" value="<?php echo esc_attr( $footer_inst_link ); ?>" />
    	</p>

    	<p>
        <label for="<?php echo $this->get_field_id( 'footer_fb_link' ); ?>"><?php _e( 'Facebook Link:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'footer_fb_link' ); ?>" name="<?php echo $this->get_field_name( 'footer_fb_link' ); ?>" type="url" value="<?php echo esc_attr( $footer_fb_link ); ?>" />
    	</p>


		<?php 
	}


	 public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['footer_addres'] = $new_instance['footer_addres'];
        $instance['footer_email'] = $new_instance['footer_email'];
        $instance['footer_phone'] = $new_instance['footer_phone'];
        $instance['footer_twt_link'] = $new_instance['footer_twt_link'];
        $instance['footer_fb_link'] = $new_instance['footer_fb_link'];
        $instance['footer_lind_link'] = $new_instance['footer_lind_link'];
        $instance['footer_inst_link'] = $new_instance['footer_inst_link'];
        return $instance;
    }




}
$object = new Getin_Tuch_Widget();







// Starrup Search Widget
class Startup_Search_Widget extends WP_Widget {
 
// The construct part
function __construct() {
	parent::__construct(
		
	);
 
}
 
// Creating widget front-end
public function widget( $args, $instance ) {
 
}
 
// Creating widget Backend
public function form( $instance ) {
 
}
 
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
 
}
 
// Class wpb_widget ends here
}


function Startup_Serch_Widget_Register() {
    register_widget( 'Startup_Search_Widget' );
}
add_action( 'widgets_init', 'Startup_Serch_Widget_Register' );












// ACF Json File
 
function Startup_ACF_Jason( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;  
}
add_filter('acf/settings/save_json', 'Startup_ACF_Jason');


// ACF Theme Options
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Title Options',
		'menu_title'	=> 'Theme Title Options',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Social Settings',
		'menu_title'	=> 'Header Social',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Logo',
		'menu_title'	=> 'Header Logo',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Counter',
		'menu_title'	=> 'Theme Counter',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Service Settings',
		'menu_title'	=> 'Theme Service',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Pricing Settings',
		'menu_title'	=> 'Theme Pricing',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Testimonial Settings',
		'menu_title'	=> 'Theme Testimonial',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Team Members Settings',
		'menu_title'	=> 'Team Members',
		'parent_slug'	=> 'theme-general-settings',
	));
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Vendor Options',
		'menu_title'	=> 'Vendor Options',
		'parent_slug'	=> 'theme-general-settings',
	));



	
}













  





