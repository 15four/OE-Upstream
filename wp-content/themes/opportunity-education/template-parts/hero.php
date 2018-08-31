<?php
/**
 * Template part for displaying the page hero
 *
 * @package Opportunity_Education
 */

// Set attributes
$attributes = array(
	'id'    => 'hero',
	'class' => 'page-header'
);

?>

<!-- #hero -->
<section <?php echo \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>
	<?php \template\the_hero_brandscape(); ?>
</section>
<!-- #hero -->
