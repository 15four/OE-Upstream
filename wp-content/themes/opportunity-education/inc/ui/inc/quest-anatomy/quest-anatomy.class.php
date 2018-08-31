<?php
namespace ui;

/**
 * Class for quest anatomy
 *
 * @package Opportunity_Education
 */

class Quest_Anatomy extends \ui\UI_Component {

	// Path to the component
	protected $_component_directory = __DIR__;

    // Name of the template
	protected $_template_name = 'quest-anatomy';

	// Argument schema
	protected $_arg_schema = array(
		'tag'                      => 'div',
		'reviews_offset'           => '41.1',
		'reviews_content'          => 'Learners are able to submit reviews of quests.',
		'effort_offset'            => '41.1',
		'effort_content'           => 'Every quest gets rated in terms of the effort required by the learner.',
		'artifacts_offset'         => '89',
		'artifacts_content'        => 'At the center of every quest is the production of an artifact.',
		'driving_question_offset'  => '63',
		'driving_question_content' => 'Every quest starts with a Driving Question.',
		'image'                    => null,
		'additional_classes'       => ''
	);
}
