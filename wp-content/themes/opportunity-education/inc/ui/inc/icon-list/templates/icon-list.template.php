<?php
namespace ui;

/**
 * Template for icon lists
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
    'class' => 'c-icon-list c-icon-list--' . $args['type'] . ' '
		. $args['additional_classes']
);

// Get tag
$tag = $args['type'] === 'numbered'
	? 'ol'
    : 'ul';

// Determine layout

// If type is numbered and layout is not specified
if ( $args['type'] === 'numbered' && !$args['layout'] ) {
    $args['layout'] = 'vertical';
}

// Otherwise, if it is just not specified, default it to horizontal
else if ( !$args['layout'] ) {
    $args['layout'] = 'horizontal';
}

// Set item defaults
$item_defaults = array(
    'width'              => 6,
    'breakpoint'         => 'lg',
    'icon'               => null,
    'content'            => '',
    'additional_classes' => ''
);

    
?>

<<?php echo $tag . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

    <?php if ( $args['columns'] ): ?>
    
		<div class="c-grid">

            <?php if ( $args['layout'] === 'horizontal' ): ?>

                <?php foreach ( $args['items'] as $index => $item ): ?>

                    <?php

                        // Merge in item defaults
                        $item = array_merge( $item_defaults, $item );

                        // Set up grid column classes
                        $grid_column_attributes = array(
                            'class' => 'c-grid__column c-grid__column--12 '
                                . ( ( int ) $item['width'] !== 12
                                    ? 'c-grid__column--' . $item['width'] . '@' . $item['breakpoint']
                                    : '' )
                        );

                    ?>

                    <div <?php echo \fifteen_four\helpers\get_attributes_from_array( $grid_column_attributes ); ?>>
                        <?php include( __DIR__ . '/item.template.php' ); ?>
                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <?php

                    // Create a new item array with the items split into columns
                    $items_by_column = [[], []];

                    // Loop through items and add them to items by column
                    foreach ( $args['items'] as $index => &$item ) {

                        // Merge in item defaults
                        $item = array_merge( $item_defaults, $item );

                        // Add to correct column array
                        $items_by_column[$index % 2][] = $item;
                    }

                    // Set up grid column classes
                    $grid_column_attributes = array(
                        'class' => 'c-grid__column c-grid__column--12 c-grid__column--6' . '@' . $item['breakpoint']
                    );

                ?>

                <?php foreach ( $items_by_column as $column_items ): ?>

                    <div <?php echo \fifteen_four\helpers\get_attributes_from_array( $grid_column_attributes ); ?>>

                        <?php foreach ( $column_items as $index => $item ): ?>
                             <?php include( __DIR__ . '/item.template.php' ); ?>
                        <?php endforeach; ?>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

	<?php endif; ?>

</<?php echo $tag; ?>>
