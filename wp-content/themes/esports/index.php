<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php echo do_shortcode("[metaslider id=4]"); ?>
			<?php echo do_shortcode("[metaslider id=24]"); ?>
			
			<div class="leftCol">
				<div class="newsContainer">
					<header>TOP NEWS</header>
					<?php
					$catPost = get_posts('cat=6&posts_per_page=-1'); 
					    foreach ($catPost as $post) : setup_postdata($post); ?>
				    		<div class="newsPostContainer">
								
			    				<div class="newsThumb">
									<?php if ( has_post_thumbnail() ) {
										the_post_thumbnail();
									}?>
								</div>
								<div class="newsBody">
									<h1><a> <?php the_title(); ?></a></h1>
							    	<?php the_excerpt(); ?> 
								</div>
							</div>
						<?php endforeach;?>
				</div>
			</div>
			<div class="rightCol">
				<div class="videoContainer">
					<div class="player">
						<div id="myAlternativeContent"><a href="http://www.twitchtv.com/plumwd"><img class="alignnone size-full wp-image-10" alt="no-flash" src="http://officialesports.com/wp-content/plugins/twitch-tv-embed-suite/images/618x376.gif" /></a></div>
					</div>
				</div>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
get_footer();
