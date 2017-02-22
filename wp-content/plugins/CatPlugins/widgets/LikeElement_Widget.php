<?php
class LikeElement_Widget extends WP_Widget
{
  public function __construct()
  {
    parent::__construct('likeelement_sql', 'Like Element', array('description' => 'Permet de liker ou disliker un element'));
  }

  public function widget($args, $instance)
  {
    echo $args['before_widget'];
    echo $args['before_title'];
    echo apply_filters('widget_title', $instance['title']);
    echo $args['after_title'];


    global $wp_query;
    $currentPostId = $wp_query->post->ID;

    global $wpdb;

    echo "<h1>".$currenPostStats."</h1>";

    $currentPostStats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}like_element WHERE id_post = \"".$currentPostId."\"");
    if(empty($currentPostStats)){
      $wpdb->insert("{$wpdb->prefix}like_element", array("id_post" => $currentPostId, "vote_value" => 0));
    }
    $currentPostStats = $wpdb->get_results("SELECT vote_value FROM {$wpdb->prefix}like_element WHERE id_post = \"".$currentPostId."\"");
    $vote = $currentPostStats[0]->vote_value;

    echo '<div class="thumbs" id="thumbs-up" onclick="'.$this->likeAction($vote,$currentPostId).'">';
      echo '<i class="fa fa-thumbs-up" aria-hiden="true"></i>';
    echo '</div>';


    echo '<div class="thumbs" id="thumbs-down" onclick="'.$this->dislikeAction($vote,$currentPostId).'">';
      echo '<i class="fa fa-thumbs-down" aria-hiden="true"></i>';
    echo '</div>';

    echo "votes : ".$vote."<br>";

    echo $args['after_widget'];
  }

  public function likeAction($vote,$currentPostId){
    global $wpdb;
    $vote = $vote + 1;
    echo "+1".$vote;
    $wpdb->update("{$wpdb->prefix}like_element",array("vote_value" => $vote),array("id_post" => $currentPostId));
  }

  public function dislikeAction($vote,$currentPostId){
    global $wpdb;
    $vote = $vote - 1;
    echo "-1".$vote;
    $wpdb->update("{$wpdb->prefix}like_element",array("vote_value" => $vote),array("id_post" => $currentPostId));
  }
}
