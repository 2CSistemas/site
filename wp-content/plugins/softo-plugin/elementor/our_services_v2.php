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
class Our_Services_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'softo_our_services_v2';
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
		return esc_html__( 'Our Services V2', 'softo' );
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
			'our_services_v2',
			[
				'label' => esc_html__( 'Our Services V2', 'softo' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Image', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
				'placeholder' => __( 'Enter your Sub Title', 'softo' ),
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
			  'options' => get_service_categories()
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
		
        $paged = get_query_var('paged');
		$paged = softo_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;

		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-softo' );
		$args = array(
			'post_type'      => 'service',
			'posts_per_page' => softo_set( $settings, 'query_number' ),
			'orderby'        => softo_set( $settings, 'query_orderby' ),
			'order'          => softo_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( softo_set( $settings, 'query_category' ) ) $args['service_cat'] = softo_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	
    <section class="flat-it-services flat-it-services-type1 flat-it-services-style2 parallax parallax5 position-relative" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <div class="section-overlay"></div>
        <div class="container position-relative">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="title-section text-center">
                <?php if($settings['subtitle']) { ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>
                <?php if($settings['title']) { ?><h2 class="flat-title text-white"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
			<?php } ?>
            <div class="row">
                <?php 
					while ( $query->have_posts() ) : $query->the_post(); 
                ?>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="service-iconbox border-corner hv-background-before">
                        <div class="iconbox-icon">
                            <span class="<?php echo esc_attr(str_replace( "icon ",  "", get_post_meta(get_the_id(), 'service_icon', true))); ?>"></span>
                        </div>

                        <div class="iconbox-content">
                            <h3 class="title"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_kses(softo_trim(get_the_content(), $settings['text_limit']), true); ?></p>
                            <div class="link-arrow"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'service_url', true ));?>"><span class="icon-arrow-pointing-to-right"></span></a></div>
                        </div>
                    </div>
                </div>
				<?php endwhile; ?>
            </div>
        </div>
    </section><!-- flat-it-services -->

	<?php }
    wp_reset_postdata();
	}

}