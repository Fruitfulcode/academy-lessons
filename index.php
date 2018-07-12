<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage MyChildTheme
 * @since 1.0
 * @version 1.0
 */
 
 ?>
 
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<h2><?php bloginfo( 'description' ); ?></h2>
	</header>

	<div class="middle">
	<?php
		// циклы вывода записей
		// если записи найдены
		if ( have_posts() ){
			while ( have_posts() ){
				the_post();
				
				?>
				
				<h3><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title() ?></a></h3>
				
				<?php 

				echo get_the_excerpt();
			}
		}
		// еcли записей не найдено
		else { ?>
			 <p>
			<?php esc_html_e('Записей нет...', 'mytextdomain'); ?></p>
		<?php } ?>
	</div>

	<footer class="footer">
		<?php echo date('Y') esc_html_e('&copy; Я и компания моя', 'mytextdomain'); ?>
	</footer>

	<?php wp_footer(); ?>
</body>

</html>