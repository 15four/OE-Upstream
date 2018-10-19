<?php
namespace theme;

/**
 * Template for search filter widget
 *
 * @package Opportunity_Education
 */

 ?>

<form role="search" method="get" class="search-form sidebar-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="screen-reader-text"></span>
        <div class="o-field--search"><input type="search" class="search-form__field o-field--small" placeholder="Search …" value="<?php echo get_search_query();?>" name="s"></div>
    </label>
    <!-- <input type="submit" class="search-form__submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" /> -->

    <div class="o-field--select">
        <select name="cat" id="cat" class="postform sidebar-cat o-field--small">
            <?php

                // Get cats
                $cats = get_categories( array(
                    'hide_empty' => 0,
                ) );

                // Get query variable for cat
                $queried_cat = get_query_var( 'cat' );

                foreach( $cats as $cat ) {
                    
                    // Set option attributes
                    $option_attributes = array(
                        'value'    => $cat->term_id,
                        'selected' => $cat->term_id === $queried_cat
                    );

                    echo \fifteen_four\helpers\wrap_with_tag(
                        $cat->name,
                        'option',
                        $option_attributes
                    );
                }

            ?>
        </select>
    </div>
</form>