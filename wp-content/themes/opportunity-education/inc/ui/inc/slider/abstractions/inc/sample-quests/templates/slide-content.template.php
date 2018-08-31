<?php
/**
 * Template sample quest slider slide content
 *
 * @package Opportunity_Education
 */

?>

<div class="c-grid c-grid--single-row@lg u-flex--justify-between">
    <div class="c-grid__column c-grid__column--12 c-grid__column--6@lg u-flex--order-1@lg">
        <?php echo \ui\get_quest_card( $args['quest'] ); ?>
    </div>
    <div class="c-grid__column c-grid__column--12 c-grid__column--6@lg">
        <?php echo $args['content']; ?>
    </div>
</div>
