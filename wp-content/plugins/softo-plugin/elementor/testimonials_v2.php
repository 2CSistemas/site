<?php

namespace SOFTOPLUGIN\Element;

use Elementor\Controls_Manager;
use Elementor\Controls_Stack;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Scheme_Color;
use Elementor\Group_Control_Border;
use Elementor\Repeater;
use Elementor\Widget_Base;
use Elementor\Utils;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Plugin;

/**
 * Elementor button widget.
 * Elementor widget that displays a button with the ability to control every
 * aspect of the button design.
 *
 * @since 1.0.0
 */
class Testimonials_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'softo_testimonials_v2';
	}

	/**
	 * Get widget title.
	 * Retrieve button widget title.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Testimonials V2', 'softo' );
	}

	/**
	 * Get widget icon.
	 * Retrieve button widget icon.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-library-open';
	}

	/**
	 * Get widget categories.
	 * Retrieve the list of categories the button widget belongs to.
	 * Used to determine where to display the widget in the editor.
	 *
	 * @since  2.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'softo' ];
	}
	
	/**
	 * Register button widget controls.
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'testimonials_v2',
			[
				'label' => esc_html__( 'Testimonials V2', 'softo' ),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Sub Title', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'softo' ),
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'softo' ),
			]
		);
		$this->add_control(
			'text_limit',
			[
				'label'   => esc_html__( 'Text Limit', 'softo' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'softo' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'softo' ),
					'title'      => esc_html__( 'Title', 'softo' ),
					'menu_order' => esc_html__( 'Menu Order', 'softo' ),
					'rand'       => esc_html__( 'Random', 'softo' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'softo' ),
					'ASC'  => esc_html__( 'ASC', 'softo' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
			  'type' => Controls_Manager::SELECT,
			  'label' => esc_html__('Category', 'softo'),
			  'label_block' => true,
			  'options' => get_testimonials_categories()
			]
		);
		$this->add_control(
            'style_two', 
			[
			  	'label'   => esc_html__( 'Choose Different Style', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Enable Top Space', 'softo' ),
					'two' => esc_html__( 'Disable Top Space', 'softo' ),
				),
			]
		);
		$this->end_controls_section();
	}

	/**
	 * Render button widget output on the frontend.
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since  1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
        $allowed_tags = wp_kses_allowed_html('post');
		
        $paged = softo_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-softo' );
		$args = array(
			'post_type'      => 'testimonials',
			'posts_per_page' => softo_set( $settings, 'query_number' ),
			'orderby'        => softo_set( $settings, 'query_orderby' ),
			'order'          => softo_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( softo_set( $settings, 'query_category' ) ) $args['testimonials_cat'] = softo_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
		{ ?>
		
        <div class="testimonial <?php if($settings['style_two'] == 'two') echo 'testimonial-style4'; else echo 'testimonial-style2'; ?> ">
            <div class="container">    
                <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="title-section text-center">    
                    <?php if($settings['subtitle']) { ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>
                	<?php if($settings['title']) { ?><h2 class="flat-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>   
                </div>
    			<?php } ?>
                <div class="custom-nav-testimonial">    
                    <div class="banners-z">    
                        
                        <div class="flat-carousel-box data-effect clearfix" data-zero="0" data-gap="30" data-column="2" data-column2="1" data-column3="1" data-column4="1" data-column5="1" data-dots="false" data-auto="true" data-nav="true" data-loop="true">    
                            <div class="owl-carousel">    
                                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="testimonial-box-type2">    
                                    <div class="endorser d-sm-flex align-items-center">    
                                        <div class="avatar"><?php the_post_thumbnail('softo_174x174'); ?></div>    
                                        <div class="info">    
                                            <h3 class="name"><?php the_title(); ?></h3>    
                                            <p class="role"><?php echo (get_post_meta( get_the_id(), 'author_designation', true ));?></p>    
                                            <div class="star-rating">    
                                            <?php
												$ratting = get_post_meta( get_the_id(), 'testimonial_rating', true ); 
												for ($x = 1; $x <= 5; $x++) {
												if($x <= $ratting) echo '<i class="fa fa-star" aria-hidden="true"></i>'; else echo '<i class="fa fa-star-o" aria-hidden="true"></i>'; 
												}
											?>    
                                            </div>    
                                        </div>    
                                    </div>
    
                                    <div class="flat-spacer" data-desktop="199" data-sdesktop="20" data-mobi="20" data-smobi="20"></div>    
                                    <div class="content-testimonial">    
                                        <div class="text-bold"><?php echo (get_post_meta( get_the_id(), 'quote_description', true ));?></div>    
                                        <p><?php echo wp_kses(softo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
										<?php
                                            $icons = get_post_meta( get_the_id(), 'testimonials_social_profile', true );
                                            if ( ! empty( $icons ) ) :
                                        ?> 
                                        <div class="socials-list bg-linear-gradient text-center">    
										<?php
                                            foreach ( $icons as $h_icon ) :
                                            $header_social_icons = json_decode( urldecode( softo_set( $h_icon, 'data' ) ) );
                                            if ( softo_set( $header_social_icons, 'enable' ) == '' ) {
                                                continue;
                                            }
                                            $icon_class = explode( '-', softo_set( $header_social_icons, 'icon' ) );
                                            ?>
                                            <a href="<?php echo esc_url(softo_set( $header_social_icons, 'url' )); ?>" <?php if( softo_set( $header_social_icons, 'background' ) || softo_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(softo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(softo_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fa <?php echo esc_attr( softo_set( $header_social_icons, 'icon' ) ); ?>"></i></a>
                                        <?php endforeach; ?>    
                                        </div>
    									<?php endif; ?>
                                    </div>    
                                </div> 
                                <?php endwhile; ?>    
                            </div>    
                        </div>    
                    </div>    
                </div>    
            </div>     
        </div><!-- testimonial -->
                	
        <?php }
		wp_reset_postdata();
	}

}
