<?php

/*
 * Team Favorites template
 *
 * @package Fifteen_Four_2018
 */


// Set attributes for component
$atts = array(
    'class' => 'cd-horizontal-timeline '
    . $args['additional_classes']
);

// Content atts
$content_atts = array(
    'class' => ' ' . $args['content_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $atts ); ?>>

    <?php if( have_rows('horizontal_timeline') ): ?>

    <!-- Timeline navigation -->
    <div class="timeline">
		<div class="events-wrapper">
			<div class="events">
                <ol style="list-style:none;">

                    <?php while( have_rows('horizontal_timeline') ): the_row(); 

                        // vars
                        $header = get_sub_field('header');
                        $year = get_sub_field('year');
                        $content = get_sub_field('content');

                        ?>

                        <li><a href="#0" data-tooltip="<?php echo $header; ?>" data-date="01/01/<?php echo $year?>"><?php echo $year; ?></a></li>

                    <?php endwhile; ?>
                
                </ol>

            <!-- Timeline line -->
            <span class="filling-line" aria-hidden="true"></span>

            </div><!-- .events -->
        </div><!-- .events-wrapper -->

        <!-- Timeline arrow buttons -->
        <ul class="cd-timeline-navigation">
			<li><a href="#0" class="prev inactive"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.png"></a></li>
			<li><a href="#0" class="next"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.png"></a></li>
		</ul><!-- .cd-timeline-navigation -->

	</div><!-- .timeline -->

    <!-- Timeline content -->
    <div class="events-content">
		<ol style="list-style-type:none;">

            <?php while( have_rows('horizontal_timeline') ): the_row(); 

                // vars
                $header = get_sub_field('header');
                $year = get_sub_field('year');
                $content = get_sub_field('content');

                ?>

                <li data-date="01/01/<?php echo $year; ?>">
                    <h3 class="u-text--bold u-text--centered u-padding-left--section u-padding-right--section u-padding-top--std"><?php echo $header; ?></h3>
                    <?php echo $content; ?>
                </li>

            <?php endwhile; ?>
            
        </ol>
    </div><!-- .events-content -->

    <div class="c-container">
        <div class="c-grid">
            <div class="c-grid__column c-grid__column--12@xxs c-grid__column--6@lg">

                <div class="<?php echo \fifteen_four\helpers\get_attributes_from_array( $content_atts ); ?>">
                    <?php echo apply_filters( 'the_content', $args['content'] ); ?>
                </div>

            </div>
        </div>
    </div>

    <?php endif; ?>

</<?php echo $args['tag']; ?>>
