<?php namespace SOFTOPLUGIN\Element;

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
class Our_Clients extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_our_clients';
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
        return esc_html__( 'Our Clients', 'softo' );
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
            'our_clients',
            [
                'label' => esc_html__( 'Our Clients', 'softo' ),
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
		  	'client', 
			[
				'label' => esc_html__( 'Our Client Image', 'softo' ),
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
		$this->add_control(
            'style_two', 
			[
			  	'label'   => esc_html__( 'Choose Different Style', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Disable Top Space', 'softo' ),
					'two' => esc_html__( 'Enable Top Space', 'softo' ),
					'three' => esc_html__( 'Enable Heading/Title', 'softo' ),
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
	?>
	
    <div class="partners <?php if($settings['style_two'] == 'three') echo 'partners-style3'; elseif($settings['style_two'] == 'two') echo 'partners-style2'; else echo 'partners-style1'; ?>">
        <div class="container">
        	<?php if($settings['style_two'] == 'three') { ?>
            <div class="title-section text-center">
                <h2 class="flat-title"><?php echo wp_kses($settings['title'], true);?></h2>
            </div>
            <?php } ?>
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
        	
	<?php
    }
}
