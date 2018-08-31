<?php
namespace ui;

/**
 * Template for the content of quote cards
 *
 * @package Opportunity_Education
 */

// Set content column attributes
$content_column_attributes = array(
	'class' => 'c-grid__column c-grid__column--12 '
		. ( !is_null( $args['attachment'] )
			? 'c-grid__column--9@lg'
			: '' )
);

?>

<div class="c-grid c-grid--single-row@lg u-flex--justify-center u-flex--align-center">

	<?php if ( !is_null( $args['attachment'] ) ): ?>
		<div class="c-grid__column c-grid__column--6 c-grid__column--3@lg">
			<?php \ui\circle_guy_from_attachment( $args['attachment'], $args['image_size'] ); ?>
		</div>
	<?php endif; ?>

	<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $content_column_attributes ); ?>>
		<?php
			\ui\pull_quote(
				array(
					'author'  => $args['author'],
					'content' => $args['content']
				)
			);
		?>
	</div>
</div>
