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
class Clients_And_Cases extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'softo_clients_and_cases';
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
		return esc_html__( 'Clients and Cases', 'softo' );
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
			'clients_and_cases',
			[
				'label' => esc_html__( 'General', 'softo' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label' => __( 'BG Pattern Image', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
					'one' => esc_html__( 'Choose Style One', 'softo' ),
					'two' => esc_html__( 'Choose Style Two', 'softo' ),
				),
			]
		);
		$this->end_controls_section();
		
		//Client Section
		$this->start_controls_section(
            'client_view',
            [
                'label' => esc_html__( 'Our Client Section', 'softo' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'show_clients_area',
			[
				'label'       => __( 'Enable/Disable Client Section', 'softo' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'softo' ),
				'label_off' => __( 'Hide', 'softo' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
		  	'client', 
			[
				'type' => Controls_Manager::REPEATER,
				'separator' => 'before',
				'default' => 
					[
						
					],
				'fields' => 
				[
					[
						'name' => 'client_image',
						'label' => esc_html__('Client Image', 'softo'),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'client_link',
						'label' => __( 'Client Link', 'softo' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
			 ]
        );
		$this->end_controls_section();
		
		//Case Study Section
		$this->start_controls_section(
            'casestudy_view',
            [
                'label' => esc_html__( 'Case Study Post', 'softo' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'show_casestudy_area',
			[
				'label'       => __( 'Enable/Disable Case Study Section', 'softo' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'softo' ),
				'label_off' => __( 'Hide', 'softo' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			  'options' => get_cases_categories()
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
			'post_type'      => 'cases',
			'posts_per_page' => softo_set( $settings, 'query_number' ),
			'orderby'        => softo_set( $settings, 'query_orderby' ),
			'order'          => softo_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		if( softo_set( $settings, 'query_category' ) ) $args['cases_cat'] = softo_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );

		if ( $query->have_posts() ) 
	{ ?>
	
    <?php if($settings['style_two'] == 'two') : ?>
    <div class="background-two-section" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <?php if($settings['show_clients_area']) { ?>
        <div class="partners">
            <div class="container">
                <div class="banners-z">
                    <div class="flat-carousel-box data-effect clearfix" data-zero="0" data-gap="70" data-column="6" data-column2="5" data-column3="4" data-column4="2" data-dots="false" data-auto="true" data-nav="false" data-loop="true">
                        <div class="owl-carousel">
							<?php foreach($settings['client'] as $key => $item): ?>
                            <a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></a>
							<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- partners -->
		<?php } ?>
        
        <?php if($settings['show_casestudy_area']) { ?>
        <div class="flat-case-study flat-case-study-type1 flat-case-study-style3">

            <div class="container">
                <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="title-section text-center">
                    <?php if($settings['subtitle']) { ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>
                	<?php if($settings['title']) { ?><h2 class="flat-title text-white"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                </div>
				<?php } ?>
                <div class="row">
                    <?php 
						$count = 1;
						while ( $query->have_posts() ) : $query->the_post();
						$term_list = wp_get_post_terms(get_the_id(), 'cases_cat', array("fields" => "names")); 
					?>
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="flat-case border-corner">
                            <div class="case-content">
                                <p><?php echo implode( ', ', (array)$term_list );?></p>
                                <h3 class="title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>
                            </div>

                            <div class="featured-post">
                                <div class="entry-image bg-linear-gradient position-relative">
                                    <?php the_post_thumbnail('softo_370x371'); ?>
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>" class="arrow-link"><span class="icon-arrow-pointing-to-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $count++; endwhile; ?>
                    
                </div>
            </div>
        </div><!-- flat-case-study -->
        <?php } ?>
    </div><!-- background-two-section -->
    
    <?php else: ?>
    
    <div class="background-two-section" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <?php if($settings['show_clients_area']) { ?>
        <div class="partners">
            <div class="container">
                <div class="banners-z">
                    <div class="flat-carousel-box data-effect clearfix" data-zero="0" data-gap="70" data-column="6" data-column2="5" data-column3="4" data-column4="2" data-dots="false" data-auto="true" data-nav="false" data-loop="true">
                        <div class="owl-carousel">
							<?php foreach($settings['client'] as $key => $item): ?>
                            <a href="<?php echo esc_url($item['client_link']['url']);?>"><img src="<?php echo esc_url(wp_get_attachment_url($item['client_image']['id']));?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></a>
							<?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- partners -->
		<?php } ?>
        
        <?php if($settings['show_casestudy_area']) { ?>
        <div class="flat-case-study flat-case-study-type1 flat-case-study-style1">

            <div class="container">
                <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="title-section text-center">
                    <?php if($settings['subtitle']) { ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>
                	<?php if($settings['title']) { ?><h2 class="flat-title text-white"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
                </div>
				<?php } ?>
                <div class="row">
                    <?php 
						$count = 1;
						while ( $query->have_posts() ) : $query->the_post();
						$term_list = wp_get_post_terms(get_the_id(), 'cases_cat', array("fields" => "names")); 
					?>
                    <div class="col-lg-4 col-sm-6 wow fadeInLeft" data-wow-delay="200ms">
                        <div class="flat-case-service2">
                            <div class="featured-post position-relative">
                                <div class="entry-image">
                                    <?php the_post_thumbnail('softo_370x229'); ?>
                                </div>
                                <span><?php echo implode( ', ', (array)$term_list );?></span>
                            </div>
                            <div class="case-content">
                                <h3 class="title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>
                                <div class="link-arrow"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><span class="icon-arrow-pointing-to-right"></span></a></div>
                            </div>
                        </div>
                    </div>
					<?php $count++; endwhile; ?>
                </div>
            </div>
        </div><!-- flat-case-study -->
        <?php } ?>
        
    </div><!-- background-two-section -->
 	<?php endif; ?>
    
	<?php }
    wp_reset_postdata();
	}

}