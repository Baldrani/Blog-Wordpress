<?php
class Zero_Newsletter_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct('zero_newsletter', 'Newsletter', array('description' => 'Un formulaire d\'inscription à la newsletter.'));
    }

    public function widget($args, $instance)
    {
        echo 'widget newsletter';
    }

    public function form($instance){
        $title = isset($instance['title']) ? $instance['title'] : '';
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo  $title; ?>" />
        </p>
        <?php
        // $form = '<p><label for="'. echo $this->get_field_name("title"); .'">'. _e("Title:"); .'</label>
        //     <input class="widefat" id="'.echo $this->get_filed_id('title'); .'" name="'.echo $this->get_field_name('title');.'" type="text" value="'.echo $title; .'"/>
        // </p>
        // ';
        // echo $form;
    }
}
