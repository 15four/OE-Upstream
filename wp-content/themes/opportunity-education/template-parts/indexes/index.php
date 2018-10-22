<?php
/**
 * Template part for displaying the blog section
 *
 * @package Opportunity_Education
 */

?>

<section id="section-1" class="c-section u-background--light u-background--light-gray u-padding-top--section u-padding-bottom--section">
	<div class="c-section__content">
		<div class="c-container">

            <div class="c-grid c-grid--single-row@lg u-flex--justify-between">

                <div class="main-content-column c-grid__column c-grid__column--12 c-grid__column--8@lg">

                    <?php

                        // Get global WP Query
                        global $wp_query;

                        // If the main query has posts, start it
                        if ( $wp_query->have_posts() ):

                            // Start main loop
                            while ( $wp_query->have_posts() ):

                                // Set post object
                                $wp_query->the_post();
                    ?>

                        <div class="o-block">
                            <div class="c-grid u-flex--justify-center">
                                <div class="c-grid__column c-grid__column--12 c-grid__column--10@lg">
                                    <div class="o-block u-padding-bottom--section u-border-bottom--solid-sm u-border--color-light-mid-gray">
                                        <div class="c-grid c-grid--single-row@md">
                                            <!-- <div class="c-grid__column c-grid__column--12 c-grid__column--4@md c-grid__column--5@lg">
                                                <a class="o-link--plain" href="<?php //echo get_the_permalink(); ?>">
                                                    <?php
                                                        // echo get_the_post_thumbnail(
                                                        // 	$post,
                                                        // 	'card',
                                                        // 	array(
                                                        // 		'class' => 'u-display--block'
                                                        // 	)
                                                        // );
                                                    ?>
                                                </a>
                                            </div> -->
                                            <div class="c-grid__column c-grid__column--12">
                                                <div class="u-text--caption u-text--family-roboto u-text--bold u-text--uppercase u-text--color-mid-gray u-margin-bottom--micro">
                                                    <?php the_date(); ?>
                                                </div>
                                                <h2>
                                                    <a class="o-link--plain" href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <p>
                                                    <?php \template\the_better_excerpt( $post, 240 ); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                        // End loop and reset post data
                        endwhile;
                        wp_reset_postdata();

                        // Get pagination template part
                        get_template_part( 'template-parts/indexes/pagination' );

                        // Otherwise, output 'nothing found' notice
                        else:
                    ?>

                        <div class="c-grid u-flex--justify-center">
                            <div class="c-grid__column c-grid__column--12 c-grid__column--8@lg">
                                <h2 class="u-text--align-center">
                                    Uh Oh! Nothing Matched Your Criteria
                                </h2>
                                <p class="u-text--align-center">
                                    Do you think there's some information missing? Is there something you'd like to see here? <a href="<?php echo get_the_permalink( \constants\IMPORTANT_PAGES['contact_us'] ); ?>">Send us a message</a> and let us know!
                                </p>
                            </div>
                        </div>

                    <?php endif; ?>
            
                </div>
                <div class="sidebar-column c-grid__column c-grid__column--12 c-grid__column--4@lg s-no-print">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                    <?php //\template\the_related_posts(); ?>
                </div>
            </div>

		</div>
	</div>
</section>
