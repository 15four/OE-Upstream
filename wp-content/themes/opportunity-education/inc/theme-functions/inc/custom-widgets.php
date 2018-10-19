<?php
namespace theme;

/**
 * Functions for creating custom widgets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Opportunity_Education
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

// Register and load the widget
function search_and_filter__load_widget() {
    register_widget( '\theme\search_and_filter__widget' );
}
add_action( 'widgets_init', '\theme\search_and_filter__load_widget' );
 
// Creating the widget 
class search_and_filter__widget extends \WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'oe-search-and-filter', 
 
// Widget name will appear in UI
__('Search and Filter Widget', 'search_and_filter__widget_domain'), 
 
// Widget description
array( 'description' => __( 'OE Blog Search and Filter Widget', 'search_and_filter__widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
 
// This is where you run the code and display the output
echo '<form role="search" method="get" class="search-form sidebar-search" action="//localhost:3000/">
        <label>
            <span class="screen-reader-text"></span>
            <div class="o-field--search"><input type="search" class="search-form__field o-field--small" placeholder="Search …" value="" name="s"></div>
        </label>
        <!-- <input type="submit" class="search-form__submit" value="'. esc_attr_x( 'Search', 'submit button' ) .'" /> -->

        <div class="o-field--select"><select name="cat" id="cat" class="postform sidebar-cat o-field--small">
            <option value="-1">Select Category</option>
            <option class="level-0" value="58">Academy</option>
            <option class="level-0" value="63">Curriculum</option>
            <option class="level-0" value="62">Mentors</option>
            <option class="level-0" value="68">Methodology</option>
            <option class="level-0" value="59">Programs</option>
            <option class="level-0" value="64">Research</option>
            <option class="level-0" value="67">School Leaders</option>
            <option class="level-0" value="66">Student/Parents</option>
            <option class="level-0" value="60">Tanzania</option>
            <option class="level-0" value="65">Technology</option>
            <option class="level-0" value="61">United States</option>
        </select></div>
    </form>';

}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'search_and_filter__widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class search_and_filter__widget ends here