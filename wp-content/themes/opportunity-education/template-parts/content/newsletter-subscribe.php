<?php
/**
 * Template part for displaying the newsletter subscribe form
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Opportunity_Education
 */

?>

<div class="c-grid c-grid--single-row@lg u-flex--align-center">
    <div class="c-grid__column c-grid__column--12 c-grid__column--6@lg">
        <h2 class="u-text--heading-md u-text--align-center u-text--align-left@lg">Get the latest in our newsletter</h2>
    </div>
    <div class="c-grid__column c-grid__column--12 c-grid__column--6@lg">
		<?php

			// If gForms is installed, echo the newsletter subscribe form
			if ( function_exists( 'gravity_form' ) ) {
				gravity_form( \constants\FORMS['newsletter_subscribe'], false, false, false, false, true );
			}
		?>
    </div>
</div>
