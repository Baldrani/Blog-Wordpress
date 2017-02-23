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
    if(!$wp_query->is_home()){
    $currentPostId = $wp_query->post->ID;

    global $wpdb;
    $currentPostStats = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}like_element WHERE id_post = \"".$currentPostId."\"");
    if(empty($currentPostStats)){
      $wpdb->insert("{$wpdb->prefix}like_element", array("id_post" => $currentPostId, "vote_value" => 0));
    }
    $currentPostStats = $wpdb->get_results("SELECT vote_value FROM {$wpdb->prefix}like_element WHERE id_post = \"".$currentPostId."\"");
    $vote = $currentPostStats[0]->vote_value;

    echo '<div class="thumbsup"><i class="fa fa-thumbs-up" aria-hiden="true"></i>';


    echo '<i class="fa fa-thumbs-down" aria-hiden="true"></i>';

    echo "<script>

    $('.fa-thumbs-up').on('click', function($) {
  		var data = {
  			'action': 'my_action',
        'vote': ".$vote.",
        'id': ".$currentPostId.",
  			'upordown': 'up'
  		};
  		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
  		jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
        document.getElementById('nbvotes').innerHTML = response;
  		});
  	});

    $('.fa-thumbs-down').on('click', function($) {
      var data = {
        'action': 'my_action',
        'vote': ".$vote.",
        'id': ".$currentPostId.",
        'upordown': 'down'
      };
      // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
      jQuery.post('/wp-admin/admin-ajax.php', data, function(response) {
        document.getElementById('nbvotes').innerHTML = response;
      });
    });
    </script>";

    echo "<div>
    votes : <span id='nbvotes'>".$vote."</span><br>
    </div></div>";
  }
    echo $args['after_widget'];
  }

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
