<?php
/**
 * Template sample quest slider controls
 *
 * @package Opportunity_Education
 */

?>

<?php
    \ui\circle_guy(
        array(
            'size'               => 'sm',
            'image'              => get_the_post_thumbnail_url( $args['quest'], 'thumbnail' ),
            'additional_classes' => 'u-block--centered u-margin-bottom--tiny'
        )
    );
?>
<div class="u-text--squished u-text--no-transform u-text--bold u-margin-bottom--tiny">
	<?php
		echo !is_null( $args['title'] )
			? $args['title']
			: get_the_title( $args['quest'] );
	?>
</div>
