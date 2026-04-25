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






function our_coustum_movie(){
    $labels= array(
        'name'                   => _x('Movies','post type general name'),
        'singular_name'          => _x('Movies','post type general name'),
        'add_new'                => _x('Add New','movie'),
        'add_new_item'           => _('Add New movie'),
        'edit_item'              => _('Edit movie'),
        'new_item'               => _('All movie'),
        'all_items'              => _('View movie'),
        'view_item'              => _('View movie'),
        'search_items'           => _('All movie'),
        'not_found'              => _('All movie'),
        'not_found_in_trash'     => _('All movie'),
        'parent_item_colon'      => _('All movie'),
        'menu_name'              => _('All movie')
    );

    $args = array(
        'labels'            =>$labels,
        'description'       =>'movies and single movies'
        'public'            =>true,
        'publicly_queryable'=>true,
        'menu_position'     =>5,
        'supports'          =>array('title','editor','thumbnail','excerpt','comments'),
        'has_archive'       =>true,
        'rewrite'           =array('slug'=>'movies'),
        'show_in_rest'      =true
    ):

    register_post_type('movies',$args);

}
add_action('init','our_coustum_movie');