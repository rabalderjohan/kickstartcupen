<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Kickstartcupen
 * @since Kickstartcupen 1.0
 */
get_header();
?>
		<div class="container">
			<h1>Sidan kunde inte hittas.</h1>
		</div>
			<?php
			if (have_posts()) :
   				while (have_posts()) :?>

      				<?php the_post(); ?>

						<?php the_title(); ?>


						<?php the_time('F jS, Y') ?>  by <?php the_author() ?>
					</div>
      				<?php the_content(); ?>

					<?php
					the_tags('<a class="simpler">Taggar: </a>', '', '');
					?>

   				<?php endwhile; ?>
			<?php posts_nav_link('','Next','Previous'); ?>
			<?php endif; ?>

<?php
get_footer();
?>
