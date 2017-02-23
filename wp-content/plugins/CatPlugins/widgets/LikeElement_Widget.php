<?php
class LikeElement_Widget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct('likeelement_sql', 'Like Element', array('description' => 'Permet de liker ou disliker un element'));
  }

  public function widget($args, $instance)
  {
    global $wp_query;
    $currentPostId = $wp_query->post->ID;

    global $wpdb;
    $currentPostStats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}like_element WHERE id_post = \"".$currentPostId."\"");
    if(empty($currentPostStats)){
      $wpdb->insert("{$wpdb->prefix}like_element", array("id_post" => $currentPostId, "vote_value" => 0));
    }
    $currentPostStats = $wpdb->get_results("SELECT vote_value FROM {$wpdb->prefix}like_element WHERE id_post = \"".$currentPostId."\"");
    $vote = $currentPostStats[0]->vote_value;

    echo '<i class="fa fa-thumbs-up" aria-hiden="true"></i>';


    echo '<i class="fa fa-thumbs-down" aria-hiden="true"></i>';

    echo "votes : ".$vote."<br>";

    echo $args['after_widget'];
  }

  // add_action( 'likeAction', 'likeAction' );
  // add_action( 'dislikeAction', 'dislikeAction' );

  public function likeAction($vote,$currentPostId){
    global $wpdb;
    $vote = $vote + 1;
    $wpdb->update("{$wpdb->prefix}like_element",array("vote_value" => $vote),array("id_post" => $currentPostId));
    echo "<meta http-equiv=\"refresh\" content=\"0\">";
  }

  public function dislikeAction($vote,$currentPostId){
    global $wpdb;
    $vote = $vote - 1;
    $wpdb->update("{$wpdb->prefix}like_element",array("vote_value" => $vote),array("id_post" => $currentPostId));
    echo "<meta http-equiv=\"refresh\" content=\"0\">";
  }
}
