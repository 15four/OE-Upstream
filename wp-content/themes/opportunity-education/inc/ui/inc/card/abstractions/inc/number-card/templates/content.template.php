<?php
namespace ui;

/**
 * Template for the content of number cards
 *
 * @package Opportunity_Education
 */

?>

<div class="c-card__number">
	<div class="c-card__number-inner u-block--full-width">
		<?php echo $args['number']; ?>
	</div>
</div>
<div class="c-card__number-content">
	<?php echo $args['content']; ?>
</div>
