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
class Call_To_Action extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_call_to_action';
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
        return esc_html__( 'Call To Action', 'softo' );
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
            'call_to_action',
            [
                'label' => esc_html__( 'Call To Action', 'softo' ),
            ]
        );
		$this->add_control(
			'show_pattern',
			[
				'label'       => __( 'Enable/Disable Circle Pattern', 'softo' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'softo' ),
				'label_off' => __( 'Hide', 'softo' ),
				'return_value' => 'yes',
				'default' => 'no',
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
			'icons',
			[
				'label' => esc_html__('Enter The icons', 'softo'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options'  => get_fontawesome_icons(),
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'SUb Title', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
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
				'placeholder' => __( 'Enter your title', 'softo' ),
			]
		);
		$this->add_control(
			'btn_title',
			[
				'label'       => __( 'Button Title', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Button Title', 'softo' ),
			]
		);
		$this->add_control(
			'btn_link',
				[
				  'label' => __( 'Button Url', 'softo' ),
				  'type' => Controls_Manager::URL,
				  'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
				  'show_external' => true,
				  'default' => [
				    'url' => '',
				    'is_external' => true,
				    'nofollow' => true,
				  ],
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
	    
    <section class="cta-type2 parallax parallax3" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <div class="section-overlay"></div>
        <div class="container position-relative text-center">
            
            <div class="cta-content position-relative">
                <?php if($settings['icons']){ ?><div class="icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $settings['icons']));?>"></span></div><?php } ?>
                <?php if($settings['subtitle']){ ?><div class="f-text text-white"><?php echo wp_kses($settings['subtitle'], true);?></div><?php } ?>
                <?php if($settings['title']){ ?><div class="s-text text-white"><?php echo wp_kses($settings['title'], true);?></div><?php } ?>
                <?php if($settings['btn_link']['url'] and $settings['btn_title']){ ?>
                <div class="flat-contact-now btn-linear hv-linear-gradient">
                    <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="font-style linear-color border-corner"><?php echo wp_kses($settings['btn_title'], true);?><span class="icon-arrow-pointing-to-right"></span></a>
                </div>
                <?php } ?>
            </div>
            
			<?php if($settings['show_pattern']) { ?>
            <div class="circle-border circle-border1 none-767"></div>
            <div class="circle-border circle-border2 none-767"></div>
            <div class="circle-border circle-border3 none-767"></div>
			<?php } ?>
        </div>
    </section><!-- cta -->
                  
    <?php
    }
}
