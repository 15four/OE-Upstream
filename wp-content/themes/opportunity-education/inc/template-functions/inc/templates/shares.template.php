<?php
namespace template;

/**
 * Template for the shares
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-shares o-button-container o-button-container--spacious o-button-container--single-row s-no-print u-display--flex u-flex--align-center '
		. $args['additional_classes']
);

// Grab global post
global $post;

// Get the title of the current post
$site_title = get_the_title( $post );

// Get the URL of the current post
$url = urlencode( get_the_permalink( $post ) );

// Get the excerpt of the current post
$excerpt = urlencode( strip_tags( \template\get_the_better_excerpt( $post, 1000 ) ) );

// Get the site title
$site_title = urlencode( get_bloginfo( 'title' ) );

// Get the site description
$site_description = urlencode( get_bloginfo( 'description' ) );

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<?php if ( in_array( 'linkedin', $args['methods'] ) ): ?>
		<a class="c-shares__method o-button o-button--unstyled u-text--heading-tiny" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&source=<?php echo $site_title; ?>" target="_blank">
			<span class="screen-reader-text">Share on LinkedIn</span><i class="fab fa-linkedin-in"></i>
		</a>
	<?php endif; ?>

	<?php if ( in_array( 'facebook', $args['methods'] ) ): ?>
		<a class="c-shares__method o-button o-button--unstyled u-text--heading-tiny" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank">
			<span class="screen-reader-text">Share on Facebook</span><i class="fab fa-facebook-f"></i>
		</a>
	<?php endif; ?>

	<?php if ( in_array( 'twitter', $args['methods'] ) ): ?>
		<a class="c-shares__method o-button o-button--unstyled u-text--heading-tiny" href="https://twitter.com/home?status=<?php echo $site_title . ' | ' . $site_description . '%0A%0A' . $url; ?>" target="_blank">
			<span class="screen-reader-text">Share on Twitter</span><i class="fab fa-twitter"></i>
		</a>
	<?php endif; ?>

	<?php if ( in_array( 'email', $args['methods'] ) ): ?>
		<a class="c-shares__method o-button o-button--unstyled u-text--heading-tiny" href="mailto:?&amp;subject=<?php echo $site_title . ' | ' . $title; ?>&amp;body=<?php echo $excerpt; ?>%0A%0A<?php echo $url; ?>" target="_blank">
			<span class="screen-reader-text">Share via email</span><i class="fas fa-envelope"></i>
		</a>
	<?php endif; ?>

	<?php if ( in_array( 'print', $args['methods'] ) ): ?>
		<a class="c-shares__method o-button o-button--unstyled u-text--heading-tiny" onClick="window.print()" href="javascript:void(0)" target="_blank">
			<span class="screen-reader-text">Print</span><i class="fas fa-print"></i>
		</a>
	<?php endif; ?>

</div>
