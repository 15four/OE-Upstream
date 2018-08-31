<?php
namespace ui;

/**
 * Template for the content of bio cards
 *
 * @package Opportunity_Education
 */

// Get user avatar URL
$avatar = array( 'src' => [null] );

// If the wp user avatar function exists, get the avatar
if ( function_exists( '\get_wp_user_avatar' ) ) {
	$avatar = new \SimpleXMLElement( \get_wp_user_avatar( $args['user']->ID, 'square' ) );
}

$avatar_url = $avatar['src'];

// Set title attributes
$title_attributes = array(
	'class' => 'u-text--heading-md'
);

?>

<div class="c-grid c-grid--single-row@lg u-flex--justify-center">

	<div class="c-grid__column c-grid__column--4 c-grid__column--3@lg">
		<?php

			// Set up circle guy args
			$circle_guy_args = array(
				'image' => $avatar_url[0]
			);

			\ui\circle_guy( $circle_guy_args );
		?>
	</div>

	<div class="c-grid__column c-grid__column--12 c-grid__column--9@lg">

		<<?php echo $args['title_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $title_attributes ); ?>>
			<?php echo $args['user']->display_name; ?>
		</<?php echo $args['title_tag']; ?>>

		<p>
			<?php echo $args['user']->description; ?>
		</p>

	</div>
</div>
