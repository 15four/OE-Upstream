<?php
namespace ui;

/**
 * Template for icon list items
 *
 * @package Opportunity_Education
 */

// Merge item with defaults
$item = array_merge(
	array(
		'width'              => 6,
		'breakpoint'         => 'lg',
		'icon'               => null,
		'content'            => '',
		'additional_classes' => ''
	),
	$item
);

// Set attributes
$attributes = array(
	'class' => 'c-icon-list__item u-display--flex u-flex--align-start '	. $args['item_additional_classes'] . ' ' . $item['additional_classes']
);

// Set up grid column classes
$grid_column_attributes = array(
	'class' => 'c-grid__column c-grid__column--12 '
		. ( ( int ) $item['width'] !== 12
			? 'c-grid__column--' . $item['width'] . '@' . $item['breakpoint']
			: '' )
);

// Set icon attributes
$icon_attributes = array(
	'class' => 'c-icon-list__icon '
		. ( $args['type'] === 'numbered'
			? 'c-icon-list__icon--numbered u-text--heading-micro'
			: '' )
);

// Get icon image src
$icon_img_src = \helpers\get_current_directory_uri() . '/assets/icon-' . $args['type'] . '.png';

// If the type is custom,figure out which one to use
if ( $args['type'] === 'custom' ) {

	// If the item has a valid url as the icon property, use it
	if ( filter_var( $item['icon'], FILTER_VALIDATE_URL ) ) {
		$icon_img_src = $item['icon'];
	}

	// Otherwise, if it is not null, assume it links to something from the icons asset folder
	else if ( !is_null( $item['icon'] ) ){
		$icon_img_src = \helpers\get_current_directory_uri() . '/assets/icon-' . $item['icon'] . '.png';
	}
}

?>

<?php if ( $args['columns'] ): ?>
	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $grid_column_attributes ); ?>>
<?php endif; ?>

<li <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<div class="c-icon-list__item-icon-container">
		<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $icon_attributes ); ?>>
			<?php if ( $args['type'] !== 'numbered' ): ?>
				<img src="<?php echo $icon_img_src; ?>" class="u-display--block" />
			<?php endif; ?>
		</div>
	</div>

	<div class="c-icon-list__item-content">
		<?php echo $item['content']; ?>
	</div>

</li>

<?php if ( $args['columns'] ): ?>
	</div>
<?php endif; ?>
