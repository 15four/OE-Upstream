<?php
namespace ui;

/**
 * Template for circle guys
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'c-pull-quote ' . $args['additional_classes']
);

?>

<blockquote <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<div class="c-pull-quote__content u-text--heading-tiny u-text--family-meta-serif u-margin-bottom--sm">
		<?php echo $args['content']; ?>
	</div>

	<?php if ( $args['author'] ): ?>
		<div class="c-pull-quote__author">
			&mdash; <?php echo $args['author']; ?>
		</div>
	<?php endif; ?>
</blockquote>
