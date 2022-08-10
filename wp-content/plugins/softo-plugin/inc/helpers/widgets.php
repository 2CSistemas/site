<?php
///----Blog widgets---
//Recent Posts
class Softo_Recent_Post extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Softo_Recent_Post', /* Name */esc_html__('Softo Recent Post', 'softo'), array( 'description' => esc_html__('Show the Recent Post', 'softo')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

		<!--Start Single Sidebar Box-->
        <div class="widget-recent-posts">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <ul class="recent-news">
               <?php $query_string = array('showposts'=>$instance['number']);
					if ($instance['cat']) {
						$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
					}
					$this->posts($query_string); 
				?>
            </ul>
        </div>
        
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Latest Post', 'softo');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'softo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'softo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'softo'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'softo'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php
                global $post;
				while ($query->have_posts()): $query->the_post();
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <li>
                <div class="thumb-image" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>)"></div>
                <div class="thumb-content clearfix">
                    <h3 class="thumb-title"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title(); ?></a></h3>
                    <p class="thumb-day"><?php echo get_the_date(); ?></p>
                </div>
            </li>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}


///----footer widgets---
//About Company
class Softo_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Softo_About_Company', /* Name */esc_html__('Softo About Company','softo'), array( 'description' => esc_html__('Show the About Company', 'softo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<div class="widget-text">
                <?php if($instance['widget_logo_img']){ ?>
                <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></a></div>
                <?php } ?>
                <p><?php echo wp_kses_post($instance['content']); ?></p>
                
                <?php if( $instance['show'] ): ?>
				<?php echo wp_kses_post(softo_get_social_icon()); ?>
                <?php endif; ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Enter Logo Image:', 'softo'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'softo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'softo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'softo'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>              
                
		<?php 
	}
	
}

//Footer Latest News
class Softo_Latest_News extends WP_Widget
{
    /** constructor */
    public function __construct()
    {
        parent::__construct( /* Base ID */'Softo_Latest_News', /* Name */esc_html__('Softo Latest News', 'softo'), array( 'description' => esc_html__('Show the Footer Latest News', 'softo')));
    }


    /** @see WP_Widget::widget */
    public function widget($args, $instance)
    {
        extract($args);
        $title = apply_filters('widget_title', $instance['title']);

        echo wp_kses_post($before_widget); ?>

		<div class="mg-widget-mobi">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-latest-news">
                <ul>
                    <?php $query_string = array('showposts'=>$instance['number']);
						if ($instance['cat']) {
							$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
						}
						$this->posts($query_string); 
					?>
                </ul>
            </div>
        </div>
                
        <?php echo wp_kses_post($after_widget);
    }


    /** @see WP_Widget::update */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = $new_instance['number'];
        $instance['cat'] = $new_instance['cat'];

        return $instance;
    }

    /** @see WP_Widget::form */
    public function form($instance)
    {
        $title = ($instance) ? esc_attr($instance['title']) : esc_html__('Latest News', 'softo');
        $number = ($instance) ? esc_attr($instance['number']) : 3;
        $cat = ($instance) ? esc_attr($instance['cat']) : ''; ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'softo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'softo'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'softo'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'softo'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>

        <?php
    }

    public function posts($query_string)
    {
        $query = new WP_Query($query_string);
        if ($query->have_posts()):?>

            <!-- Title -->
            <?php
                global $post;
				while ($query->have_posts()): $query->the_post();
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id); 
			?>
            <li>
                <div class="thumb-image" style="background-image:url(<?php echo esc_url($post_thumbnail_url); ?>)"></div>
                <div class="thumb-content">
                    <h4 class="thumb-title"><a href="<?php echo esc_url(get_the_permalink(get_the_id())); ?>"><?php the_title();?></a></h4>
                    <p class="thumb-day"><?php echo get_the_date(); ?></p>
                </div>
            </li>
            <?php endwhile; ?>

        <?php endif;
        wp_reset_postdata();
    }
}


///----footer Two widgets---
//Contact Info
class Softo_Contact_Info extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Softo_Contact_Info', /* Name */esc_html__('Softo Contact Info','softo'), array( 'description' => esc_html__('Show the Contact Info', 'softo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );		
		echo wp_kses_post($before_widget);?>
      		
			<div class="mg-widget-mobi kcl-widget">
                <div class="widget-contact border-corner">
                    <?php if($instance['widget_logo_img_v2']){ ?>
                    <div class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img_v2']); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></a></div>
                    <?php } ?>
                    <?php if($instance['phone_no'] || $instance['email_address'] || $instance['site_link']){ ?>
                    <div class="info-contact">
                        <?php if($instance['phone_no']){ ?><p><?php echo wp_kses_post($instance['phone_no']); ?></p><?php } ?>
                        <?php if($instance['email_address']){ ?><p><?php echo wp_kses_post($instance['email_address']); ?></p><?php } ?>
                        <?php if($instance['site_link']){ ?><p><?php echo wp_kses_post($instance['site_link']); ?></p><?php } ?>
                    </div>
					<?php } ?>
                    
                    <?php if( $instance['show_v2'] ): ?>
					<?php echo wp_kses_post(softo_get_social_icon()); ?>
                    <?php endif; ?>
				</div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['widget_logo_img_v2'] = $new_instance['widget_logo_img_v2'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['site_link'] = $new_instance['site_link'];
		$instance['show_v2'] = $new_instance['show_v2'];		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$widget_logo_img_v2 = ($instance) ? esc_attr($instance['widget_logo_img_v2']) : '';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$site_link = ($instance) ? esc_attr($instance['site_link']) : '';
		$show_v2 = ($instance) ? esc_attr($instance['show_v2']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img_v2')); ?>"><?php esc_html_e('Enter Logo Image:', 'softo'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'softo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img_v2')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img_v2')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img_v2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'softo'); ?></label>
            <input placeholder="<?php esc_attr_e('+2(305)-587-3407', 'softo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'softo'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'softo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('site_link')); ?>"><?php esc_html_e('Site Url:', 'softo'); ?></label>
            <input placeholder="<?php esc_attr_e('www.softosolution.com', 'softo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('site_link')); ?>" name="<?php echo esc_attr($this->get_field_name('site_link')); ?>" type="text" value="<?php echo esc_attr($site_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_v2')); ?>"><?php esc_html_e('Show Social Icons:', 'softo'); ?></label>
			<?php $selected = ( $show_v2 ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_v2')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show_v2')); ?>" type="checkbox" value="true" />
        </p> 
               
		<?php 
	}
	
}


///----footer Three widgets---
//Subscribe Us
class Softo_Subscribe_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Softo_Subscribe_Us', /* Name */esc_html__('Softo Subscribe Us','softo'), array( 'description' => esc_html__('Show the Subscribe Us', 'softo' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );	
		$title = apply_filters('widget_title', $instance['title']);
			
		echo wp_kses_post($before_widget);?>
      		
			
            <div class="mg-widget-mobi kcl-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="form-email btn-linear hv-linear-gradient">
                    <?php echo do_shortcode($instance['mailchimp_form_url']); ?>
                </div>

                <?php if( $instance['show_v3'] ): ?>
				<?php echo wp_kses_post(softo_get_social_icon()); ?>
                <?php endif; ?>
            </div>
                        
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['mailchimp_form_url'] = $new_instance['mailchimp_form_url'];
		$instance['show_v3'] = $new_instance['show_v3'];		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe Us';
		$mailchimp_form_url = ($instance) ? esc_attr($instance['mailchimp_form_url']) : '';
		$show_v3 = ($instance) ? esc_attr($instance['show_v3']) : '';
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'softo'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'softo');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('mailchimp_form_url')); ?>"><?php esc_html_e('Mailchimp Form Url:', 'softo'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('mailchimp_form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('mailchimp_form_url')); ?>" ><?php echo wp_kses_post($mailchimp_form_url); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show_v3')); ?>"><?php esc_html_e('Show Social Icons:', 'softo'); ?></label>
			<?php $selected = ( $show_v3 ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show_v3')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show_v3')); ?>" type="checkbox" value="true" />
        </p> 
               
		<?php 
	}
	
}