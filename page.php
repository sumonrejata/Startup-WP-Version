<?php get_header();?>

<?php get_template_part( 'templates/content', 'breadcrumb' ); ?>	 

    <section class="page-area">
    	<div class="container">
    		<div class="row">
    			<div class="col-12">
    				<div class="page-content">
    					<?php
    						while(have_posts()){
    							the_post(); ?>
    							<h1><?php the_title();?></h1>
    							<p><?php the_content();?></p>
    						<?php }
    					?>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
<?php get_footer();?>