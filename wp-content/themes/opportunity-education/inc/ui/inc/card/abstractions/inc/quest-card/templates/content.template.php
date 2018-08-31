<?php
namespace ui;

/**
 * Template for the content of cards from quests
 *
 * @package Opportunity_Education
 */

// Set driving question attributes
$driving_question_attributes = array(
	'class' => 'u-display--flex u-flex--align-center u-flex--justify-around u-text--heading-micro u-text--squished u-text--family-roboto u-text--bold u-text--centered u-margin-bottom--tiny'
);

?>

<<?php echo $args['driving_question_tag'] . ' ' . \fifteen_four\helpers\get_attributes_from_array( $driving_question_attributes ); ?>>
	<?php echo get_field( 'driving_question', $args['quest']->ID ); ?>
</<?php echo $args['driving_question_tag']; ?>>

<<?php echo $args['subheader_tag']; ?> class="u-text--body u-text--family-roboto u-text--bold u-margin-bottom--none">
	Overview
</<?php echo $args['subheader_tag']; ?>>

<p class="u-text--caption u-text--compact u-margin-top--none">
	<?php \template\the_better_excerpt( $args['quest'], false ); ?>
</p>

<<?php echo $args['subheader_tag']; ?> class="u-text--body u-text--family-roboto u-text--bold u-margin-bottom--none">
	Artifacts
</<?php echo $args['subheader_tag']; ?>>

<?php

	// Set up icon list args for artifacts
	$icon_list_args = array(
		'type'               => 'artifact',
		'columns'            => false,
		'items'              => [],
		'additional_classes' => 'u-text--caption u-text--compact'
	);

	// Get artifacts
	$artifacts = get_field( 'artifacts', $args['quest']->ID );
	$artifacts = is_array( $artifacts ) ? $artifacts : [];

	// Set items to be the artifact descriptions
	$icon_list_args['items'] = array_map(
		function( $artifact ) {
			return array(
				'content'            => $artifact['description'],
				'additional_classes' => 'u-flex--align-center'
			);
		},
		$artifacts
	);

	// Echo the list
	\ui\icon_list( $icon_list_args );

?>
