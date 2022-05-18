<?php
// This is for Startup Theme Custom Post

function RST_Startup_Custom_Post(){
	register_post_type('slider',
		array(
			'labels' => array(
				'name' =>'Slider',
				'menu_name' =>'Slider Menu',
				'add_new' =>'Add new slider',
				'add_new_item' =>'Add new slider',
				'edit_item' =>'Enter your Slider Title',
				'all_items' =>'All Slider'
			),
			'public' =>true,
			'supports' => array('title','thumbnail'),
			'menu_icon'	=>'dashicons-images-alt'
		)
	);
	register_post_type('service',
		array(
			'labels' => array(
				'name' =>'Services',
				'menu_name' =>'Services',
				'add_new' =>'Add new Services',
				'add_new_item' =>'Add new Services',
				'edit_item' =>'Enter your Services Title',
				'all_items' =>'All Services'
			),
			'public' =>true,
			'supports' => array('title','editor'),
			'menu_icon'	=>'dashicons-admin-tools'
		)
	);
	register_post_type('pricing',
		array(
			'labels' => array(
				'name' =>'Pricing',
				'menu_name' =>'Pricing',
				'add_new' =>'Add new Pricing',
				'add_new_item' =>'Add new Pricing',
				'edit_item' =>'Enter your Pricing Title',
				'all_items' =>'All Pricing'
			),
			'public' =>true,
			'supports' => array('title'),
			'menu_icon'	=>'dashicons-cart'
		)
	);
	register_post_type('testimonial',
		array(
			'labels' => array(
				'name' =>'Testimonial',
				'menu_name' =>'Testimonial',
				'add_new' =>'Add new Testimonial',
				'add_new_item' =>'Add new Testimonial',
				'edit_item' =>'Enter your Testimonial Title',
				'all_items' =>'All Testimonial'
			),
			'public' =>true,
			'supports' => array('title'),
			'menu_icon'	=>'dashicons-list-view'
		)
	);
register_post_type('our_team',
		array(
			'labels' => array(
				'name' =>'Team',
				'menu_name' =>'Team',
				'add_new' =>'Add new Team',
				'add_new_item' =>'Add new Team',
				'edit_item' =>'Enter your Team Title',
				'all_items' =>'All Team'
			),
			'public' =>true,
			'supports' => array('title','thumbnail'),
			'menu_icon'	=>'dashicons-groups'
		)
	);

}
add_action('init','RST_Startup_Custom_Post');