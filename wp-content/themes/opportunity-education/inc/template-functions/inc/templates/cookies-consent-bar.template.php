<?php
namespace template;

/**
 * Template for the cookies consent bar
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'class' => 'cookies-consent-bar js-cookies-consent-bar u-display--flex u-flex--justify-between u-flex--align-center '
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '
		. 'u-text--caption'
);

?>

<div <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

	<p class="cookies-consent-banner__content u-margin-top--none u-margin-right--sm u-margin-bottom--none">
		<?php echo $args['content']; ?>
	</p>

	<button class="cookies-consent-bar__closer o-button--unstyled js-cookies-consent-bar__closer">
		<?php \ui\svg( array( 'name' => 'x' ) ); ?>
	</button>

</div>
