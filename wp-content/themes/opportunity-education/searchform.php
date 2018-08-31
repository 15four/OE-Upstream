<?php
/**
 * The template for displaying the search form
 *
 * @package Opportunity_Education
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text">
			<?php _x( 'Search for:', 'label' ); ?>
		</span>
        <input type="search" class="search-form__field o-field--small" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>" value="<?php echo get_search_query();?>" name="s" />
    </label>
    <!-- <input type="submit" class="search-form__submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" /> -->
</form>
