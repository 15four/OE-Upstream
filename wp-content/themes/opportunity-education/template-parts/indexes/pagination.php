<?php
/**
 * Template part for displaying pagination on index pages
 *
 * @package Opportunity_Education
 */

// Grab global WP query
global $wp_query;

// Get previous page link
$previous_page_link = get_previous_posts_page_link();

// Get next page link
$next_page_link = get_next_posts_page_link();

// Get current page number
$current_page = $wp_query->query_vars['paged'];
$current_page = $current_page ? $current_page : 1;

// Determine whether or not to display previous page link
$display_previous_page_link = $previous_page_link && $current_page !== 1;

// Determine if there are posts on the next page
$are_posts_on_next_page = $wp_query->found_posts > $current_page * $wp_query->query_vars['posts_per_page'];

// Determine whether or not to display the next page link
$display_next_page_link = $next_page_link && $are_posts_on_next_page;

?>

<?php if ( $display_previous_page_link || $display_next_page_link ): ?>

	<div class="o-button-container u-flex--justify-center">

	<?php if ( $display_previous_page_link ): ?>
		<a class="o-button" href="<?php echo $previous_page_link; ?>">Previous Page</a>
	<?php endif; ?>

	<?php if ( $display_next_page_link ): ?>
		<a class="o-button" href="<?php echo $next_page_link; ?>">Next Page</a>
	<?php endif; ?>

	</div>

<?php endif; ?>
