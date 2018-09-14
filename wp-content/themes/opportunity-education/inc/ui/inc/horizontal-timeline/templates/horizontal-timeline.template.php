<?php
/**
 * Template for horizontal timeline
 *
 * @package Opportunity_Education
 */


// Set attributes
$attributes = array(
	'class' => 'c-horizontal-timeline js-horizontal-timeline '
		. $args['additional_classes'],
);

// Set periods attributes
$periods_attributes = array(
	'class' => 'c-horizontal-timeline__periods events-content '
		. $args['periods_additional_classes']
);

?>

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $atts ); ?>>

    <div class="c-horizontal-timeine__timeline">
		<div class="c-horizontal-timeine__events-wrapper">
			<div class="c-horizontal-timeine__events">
				<ol>

                    <?php

                        // Loop through periods
                        foreach ( $args['periods'] as $index => $period ) {

                            // Include the event template with each period
                            include( __DIR__ . '/event.template.php' );
                        }
                    ?>
				</ol>

				<span class="c-horizontal-timeine__filling-line" aria-hidden="true"></span>
			</div> <!-- .events -->
		</div> <!-- .events-wrapper -->

		<ul class="c-horizontal-timeine__timeline-navigation">
			<li>
                <a href="#0" class="c-horizontal-timeine__timeline-navigation-item c-horizontal-timeine__timeline-navigation-item--prev js-horizontal-timeine__timeline-navigation-item js-horizontal-timeine__timeline-navigation-item--prev is-inactive">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.png">
                </a>
            </li>
			<li>
                <a href="#0" class="c-horizontal-timeine__timeline-navigation-item c-horizontal-timeine__timeline-navigation-item--next js-horizontal-timeine__timeline-navigation-item js-horizontal-timeine__timeline-navigation-item--next">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow.png">
            </a></li>
		</ul> <!-- .cd-timeline-navigation -->
	</div> <!-- .timeline -->

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $periods_attributes ); ?>>
        <ol>

			<?php

				// Loop through periods
				foreach ( $args['periods'] as $index => $period ) {

					// Include the period template with each period
					include( __DIR__ . '/period.template.php' );
				}
			?>

		</ol>
	</div>

</<?php echo $args['tag']; ?>>
