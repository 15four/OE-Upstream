<?php

/*
 * At a glance template
 *
 * @package Fifteen_Four_2018
 */


// Set attributes
$attributes = array(
	'class' => 'c-grid u-padding--std '
		. \helpers\prepare_background_class_names( $args['background_color'] ) . ' '
		. $args['additional_classes']
);

?>

<div class="c-at-a-glance c-grid u-display--flex u-flex--justify-end">

<div class="c-grid__column c-grid__column--12 c-grid__column--8@md c-grid__column--4@lg">

<<?php echo $args['tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $attributes ); ?>>

    <div class="c-grid">

        <div class="c-grid__column c-grid__column--12 u-margin-bottom--none">

            <p class="u-text--uppercase u-text--bold u-text--color-rich-white u-margin-bottom--none">Quest Forward Schools</p>
            <p class="u-text--uppercase u-text--bold u-text--color-light-victoria u-margin-top--none">In Tanzania</p>

        </div>

        <div class="c-grid__column c-grid__column--12 u-margin-bottom--tiny">
            <p class="u-text--color-rich-white u-margin-bottom--none">Our Year At a Glance</p>
        </div>

        <div class="c-grid__column c-grid__column--4 u-margin-bottom--none">
            <p class="u-text--color-light-victoria u-margin-bottom--negative">Schools</p>
            <h2 class="u-text--color-rich-white"><?php echo $args['schools']; ?></h2>
        </div>

        <div class="c-grid__column c-grid__column--4 u-margin-bottom--none">
            <p class="u-text--color-light-victoria u-margin-bottom--negative">Students</p>
            <h2 class="u-text--color-rich-white"><?php echo $args['students']; ?></h2>
        </div>

        <div class="c-grid__column c-grid__column--4 u-margin-bottom--none">
            <p class="u-text--color-light-victoria u-margin-bottom--negative">Mentors</p>
            <h2 class="u-text--color-rich-white"><?php echo $args['mentors']; ?></h2>
        </div>

    </div>

</<?php echo $args['tag']; ?>>

</div>

</div>
