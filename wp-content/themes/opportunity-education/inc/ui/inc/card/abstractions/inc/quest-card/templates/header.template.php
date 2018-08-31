<?php
namespace ui;

/**
 * Template for the header of cards from quests
 *
 * @package Opportunity_Education
 */

?>

<div class="u-display--flex u-flex--align-center">
	<?php
		\ui\circle_guy(
			array(
				'size'               => 'tiny',
				'image'              => get_the_post_thumbnail_url( $args['quest']->ID, 'thumbnail' ),
				'additional_classes' => 'u-border--color-light-gray u-flex--shrink-0 u-margin-right--micro u-margin-bottom--none'
			)
		);
	?>
	<h3 class="u-text--heading-tiny u-text--family-roboto u-text--squished u-text--medium u-margin-bottom--none">
		<?php echo get_the_title( $args['quest'] ); ?>
	</h3>
</div>
