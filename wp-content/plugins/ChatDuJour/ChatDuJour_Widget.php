<?php
class ChatDuJour_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('chatdujour_sql', 'Chat du jour', array('description' => 'Afficher un chat aléatoire'));
    }

    public function form($instance)
    {
        $title = isset($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text"     value="<?php echo  $title; ?>" />
        </p>
        <?php
    }

    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        echo $args['before_title'];
        echo apply_filters('widget_title', $instance['title']);
        echo $args['after_title'];

        global $wpdb;
        $curDate = $wpdb->get_var("SELECT CURDATE()");
        $previousCats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}chat_du_jour");
        $addCat = true;

        foreach ($previousCats as $cat) {
            if ($cat->date_jour == $curDate) {
                $addCat = false;
            }
        }

        if ($addCat) {
            $nbOfCats = $wpdb->get_var("SELECT COUNT(ID) FROM {$wpdb->prefix}posts WHERE post_status = \"publish\" AND ping_status = \"open\" AND post_type = \"post\"");
            $catsId = $wpdb->get_results("SELECT ID FROM {$wpdb->prefix}posts WHERE post_status = \"publish\" AND ping_status = \"open\" AND post_type = \"post\"");
            $randomCat = mt_rand(0, ($nbOfCats - 1));
            $theCatId = $catsId[$randomCat]->ID;
            $wpdb->insert("{$wpdb->prefix}chat_du_jour", array("id_post" => $theCatId, "date_jour" => $curDate));
        }

        $dayCatId = $wpdb->get_var("SELECT id_post FROM {$wpdb->prefix}chat_du_jour WHERE date_jour = \"".$curDate."\"");
        $theCat = get_post($dayCatId);
        $url = get_permalink($theCat);

        echo "<p><a href=\"".$url."\">".$theCat->post_title."</a></p>";
        echo $args['after_widget'];
    }
}
