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


<div class="c-grid c-grid--single-row@lg u-flex--justify-between">
    <div class="c-grid__column c-grid__column--6">
        <div class="page-links__title">Previous:</div>
        <?php if ( $previous_post ): ?>
            <a class="page-links--styled u-text--family-meta-serif u-text--heading-micro" href="<?php echo get_the_permalink( $previous_post ); ?>"><?php echo $previous_post->post_title; ?></a>
        <?php endif; ?>
    </div>
    <div class="c-grid__column c-grid__column--6">
        <div class="page-links__title">Next:</div>
        <?php if ( $next_post ): ?>
            <a class="page-links--styled u-text--family-meta-serif u-text--heading-micro" href="<?php echo get_the_permalink( $next_post ); ?>"><?php echo $next_post->post_title; ?></a>
        <?php endif; ?>
    </div>
</div>







<!--<div class="o-button-container s-no-print u-flex--justify-center">-->

<?php //if ( $previous_post ): ?>
	<!--<a class="o-button" href="<?php //echo get_the_permalink( $previous_post ); ?>"><?php// echo $previous_post->post_title; ?></a>-->
<?php //endif; ?>

	<!--<a class="o-button" href="<?php //echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>">Back to News</a>-->

<?php //if ( $next_post ): ?>
	<!--<a class="o-button" href="<?php //echo get_the_permalink( $next_post ); ?>"><?php //echo $next_post->post_title; ?></a>-->
<?php //endif; ?>

<!--</div>-->

