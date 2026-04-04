<?php>

add_action('wp_enqueue_scripts', 'ds_add_bootstrap_cdn');



function themename_widgets_init(){
    register_sidebar(array(
        'name'              => __('Primary Sidebar','theme_name'),
        'id'                => 'sidebar-1',
        'before_widget'     =>'<aside id="%1$s" class="widget %2$s">',
        'after_widget'      => '</aside>',
        'before_title'      =>'<h3 class="widget-title">',
        'after_title'       => '</h3>'
    ));
}
add_action('widgets_init','themename_widgets_init');


class Foo_Widget extends WP_Widget{



    public function __construct(){
        parent::__construct(
            'foo_widget',
            'A foo Widget'
        );
    }


    public function widget($args, $instance){
        echo $args['before_widget'];
         echo '<p> hello world </p>';
         echo '<p> hello grupiii 1 D </p>';
         echo $args['after_widget'];


    }
    public function form($instance){
        echo '<p> no options yet</p>';


    }
    public function update($new_instance,$old_instance){
        return $new_instance;
    }
}


function register_foo_widget(){
    register_widget('Foo_Widget');
}


add_action('widgets_init','register_foo_widget');

?>