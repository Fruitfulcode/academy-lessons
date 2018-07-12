<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage MyFirstTheme
 * @since MyFirstTheme 1.0
 */

 ?>
 
<div id="sidebar-primary" class="sidebar">
	<?php if ( is_active_sidebar( 'primary' ) ) : ?>
		<?php dynamic_sidebar( 'primary' ); ?>
	<?php else : ?>
		<!-- Time to add some widgets! -->
	<?php endif; ?>
</div>