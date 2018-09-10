<?php
namespace template;

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Opportunity_Education
 */

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( DATE_W3C ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'opportunity-education' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.
}

/**
 * Prints HTML with meta information for the current author.
 */
function posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'opportunity-education' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
}

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'opportunity-education' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'opportunity-education' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'opportunity-education' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'opportunity-education' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link(
			sprintf(
				wp_kses(
					/* translators: %s: post title */
					__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'opportunity-education' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			)
		);
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Edit <span class="screen-reader-text">%s</span>', 'opportunity-education' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
		?>

		<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
		the_post_thumbnail( 'post-thumbnail', array(
			'alt' => the_title_attribute( array(
				'echo' => false,
			) ),
		) );
		?>
	</a>

	<?php endif; // End is_singular().
}

/**
 * Gets or echoes a customized excerpt
 */
function get_the_better_excerpt( $post = null, $max_chars = 100 ) {

	// If the post is null, grab the global
	if ( !$post ) {
		global $post;
	}

	// Get the excerpt field
	$excerpt = get_post_field( 'post_excerpt', $post->ID );

	// Set the appended tag
	$append = ' <a class="o-link--body" href="' . get_the_permalink( $post ) . '">...Read More</a>';

	// If there is no excerpt, make one from the post content
	if ( empty( $excerpt ) ) {

		// Strip shortcodes and tags
		$content = strip_shortcodes( strip_tags( $post->post_content, '<p><br><strong><b><i><em>' ) );

		// If the max chars arg exists, trim the stuff
		if ( $max_chars ) {
			$excerpt = ( strlen( $content ) > $max_chars ? ( substr( $content, 0, strrpos( substr( $content, 0, $max_chars ), ' ' ) ) . $append ) : $content );
		}
	}

	// If there is one, but it's too long, trim it
	else if ( $max_chars && strlen( $excerpt ) > $max_chars ) {
		$excerpt = substr( $excerpt, 0, strrpos( substr( $excerpt, 0, $max_chars ), ' ' ) ) . $append;
	}

	// Return the excerpt
	return $excerpt;
}

function the_better_excerpt( $post = null, $max_chars = 100 ) {
	echo \template\get_the_better_excerpt( $post, $max_chars );
}

/**
 * Gets or echoes markup for page sections as set up with ACF
 */
function get_the_sections( $initial_index = 0 ) {

	// Return false if ACF functions don't exist
	if ( !function_exists( 'get_field' ) ) {
		return false;
	}

	// Otherwise, set output
	$output = '';

	// Set index
	$index = $initial_index;

	// Check to see if there are sections
	while ( have_rows( 'sections' ) ) {

		// Start the row
		the_row();

		// Set args for section
		$section_args = array(
			'index'                  => $index,
			'background_color'       => \fifteen_four\helpers\acf\normalize_select_field( get_sub_field( 'background_color' ) )[0],
			'background_image'       => \fifteen_four\helpers\acf\get_image( get_sub_field( 'background_image' ), 'section' ),
			'background_image_style' => \fifteen_four\helpers\acf\normalize_select_field( get_sub_field( 'background_image_style' ) )[0],
			'background_layers'      => get_sub_field( 'background_layers' ),
			'padding'                => \fifteen_four\helpers\acf\normalize_select_field( get_sub_field( 'padding' ) ),
			'padding_style'          => \fifteen_four\helpers\acf\normalize_select_field( get_sub_field( 'padding_style' ) )[0],
			'constrain_content'      => get_sub_field( 'constrain_content' ),
			'content'                => get_sub_field( 'content' ),
			'additional_classes'     => get_sub_field( 'additional_classes' )
		);

		// Add new section to output
		$output .= \ui\get_section( $section_args );

		// Increment index
		$index ++;
	}

	// Return output
	return $output;
}

function the_sections( $initial_index = 0 ) {
	echo \template\get_the_sections( $initial_index );
}

/**
 * Gets or echoes markup for the page brandscape sections
 */
function get_the_hero_brandscape() {

	// Return false if ACF functions don't exist
	if ( !function_exists( 'get_field' ) ) {
		return false;
	}

	// Otherwise, set output
	$output = '';

	// Set up sections
	$sections = [];

	// Check to see if there are hero sections
	while ( have_rows( 'hero_sections' ) ) {

		// Start the row
		the_row();

		// Get background subject type
		$background_subject_type = \fifteen_four\helpers\acf\normalize_select_field( get_sub_field( 'background_subject_type' ) )[0];

		// Set args for section and push it into array
		array_push(
			$sections,
			array(
				'background_subject_type' => $background_subject_type,
				'background_subject'      => $background_subject_type === 'video'
					? get_sub_field( 'background_video' )
					: \fifteen_four\helpers\acf\get_image( get_sub_field( 'background_image' ), 'brandscape' ),
				'content'                 => get_sub_field( 'content' )
			)
		);
	}

	// Return brandscape
	return \ui\get_brandscape(
		array(
			'type'             => get_field( 'hero_type' ),
			'background_image' => \fifteen_four\helpers\acf\get_image( get_field( 'background_image' ), 'brandscape' ),
			'sections'         => $sections
		)
	);
}

function the_hero_brandscape() {
	echo \template\get_the_hero_brandscape();
}

/**
 * Gets or echoes markup for the cookie consent bar
 */
function get_the_cookies_consent_bar( $args = array() ) {

	// Get the cookies consent bar text option
	$cookies_consent_bar_text = get_option( 'cookies_consent_bar_text' );

	// Merge args with default args
	$args = array_merge(
		array(
			'background_color' => 'zest'
		),
		$args
	);

	// If the cookies consent bar text is not set, return false
	if ( empty( $cookies_consent_bar_text ) ) {
		return false;
	}

	// Otherwise, add the text to the content arg
	$args['content'] = $cookies_consent_bar_text;

	// Get and return the template
	return \fifteen_four\helpers\get_include( __DIR__ . '/templates/cookies-consent-bar.template.php', $args );
}

function the_cookies_consent_bar( $args = array() ) {
	echo \template\get_the_cookies_consent_bar( $args );
}

/**
 * Gets or echoes markup for shares
 */
function get_the_shares( $args = array() ) {

	// Merge args with default args
	$args = array_merge(
		array(
			'methods'            => ['linkedin', 'facebook', 'twitter', 'email', 'print'],
			'additional_classes' => ''
		)
	);

	// Get and return the template
	return \fifteen_four\helpers\get_include( __DIR__ . '/templates/shares.template.php', $args );
}

function the_shares( $args = array() ) {
	echo \template\get_the_shares( $args );
}

/**
 * Gets or echoes markup for related posts
 */
function get_the_related_posts( $args = array() ) {

	// Merge args with default args
	$args = array_merge(
		array(
			'post_count'         => 4,
			'additional_classes' => ''
		)
	);

	// Get and return the template
	return \fifteen_four\helpers\get_include( __DIR__ . '/templates/related-posts.template.php', $args );
}

function the_related_posts( $args = array() ) {
	echo \template\get_the_related_posts();
}

/**
 * Gets or echoes markup for byline
 */
function get_the_byline( $args = array() ) {

	// Merge args with default args
	$args = array_merge(
		array(
			'additional_classes' => ''
		)
	);

	// Get and return the template
	return \fifteen_four\helpers\get_include( __DIR__ . '/templates/byline.template.php', $args );
}

function the_byline( $args = array() ) {
	echo \template\get_the_byline();
}
