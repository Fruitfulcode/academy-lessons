<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage MyFirstTheme
 * @since MyFirstTheme 1.0
 */

 ?>
 
<div id="sidebar-childsidebar" class="sidebar">
	<?php if ( is_active_sidebar( 'childsidebar' ) ) : ?>
		<?php dynamic_sidebar( 'childsidebar' ); ?>
	<?php else : ?>
		<!-- Time to add some widgets! -->
	<?php endif; ?>
</div>