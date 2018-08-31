<?php
namespace ui;

/**
 * Template for launchers
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'data-popover-modal-target' => $args['target']
		? '#' . $args['target']
		: '',
	'class'                     => 'c-launcher c-launcher--' . $args['type'] . ' js-popover-modal__trigger '
		. $args['additional_classes'],
	'tabindex'                  => 0
);

// Set icon name
$icon_name = null;

// Switch the type to determine icon name
switch ( $args['type'] ) {

	// Defaults to play icon
	default:
		$icon_name = 'play';
}

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div class="c-launcher__content">
		<?php echo $args['content']; ?>
	</div>

	<div class="c-launcher__icon">
		<?php
			\ui\svg(
				array(
					'name'    => 'play',
					'color_1' => $args['icon_color']
				)
			);
		?>
	</div>
</div>
