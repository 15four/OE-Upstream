<?php
/**
 * Template part for displaying post navigation
 *
 * @package Opportunity_Education
 */

// Get the next post
$next_post = get_next_post();

// Get the previous post
$previous_post = get_previous_post();

?>


<div class="o-button-container s-no-print u-flex--justify-center">

<?php if ( $previous_post ): ?>
	<a class="o-button" href="<?php echo get_the_permalink( $previous_post ); ?>">Previous Post</a>
<?php endif; ?>

	<a class="o-button" href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>">Back to News</a>

<?php if ( $next_post ): ?>
	<a class="o-button" href="<?php echo get_the_permalink( $next_post ); ?>">Next Post</a>
<?php endif; ?>

</div>

