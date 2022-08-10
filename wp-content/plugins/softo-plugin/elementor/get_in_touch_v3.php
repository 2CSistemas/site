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
class Get_In_Touch_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_get_in_touch_v3';
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
        return esc_html__( 'Get In Touch V3', 'softo' );
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
            'get_in_touch_v3',
            [
                'label' => esc_html__( 'Get In Touch V3', 'softo' ),
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
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Title', 'softo' ),
			]
		);
		$this->add_control(
			'get_in_touch_form_v3',
			[
				'label'       => __( 'Get In Touch Form Url', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'softo' ),
			]
		);
		$this->add_control(
			'google_map_iframe2',
			[
				'label'       => __( 'Google Map Iframe Code', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Google Map Iframe Code', 'softo' ),
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
	
    <div class="get-in-touch-type2 get-in-touch-style3 parallax parallax2 position-relative clearfix" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <div class="section-overlay"></div>
        <div class="container position-relative">
            <?php if($settings['subtitle'] || $settings['title']){ ?>
            <div class="title-section text-center">
                <?php if($settings['subtitle']){ ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>
                <?php if($settings['title']){ ?><h2 class="flat-title text-white"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
			<?php } ?>
            
            <?php if($settings['get_in_touch_form_v3']){ ?>
            <div id="contactform" class="form-git form-submit">
                <?php echo do_shortcode($settings['get_in_touch_form_v3']);?>
            </div>
            <?php } ?>
        </div>
    </div><!-- get-in-touch -->
    
    <?php if($settings['google_map_iframe2']){ ?>
    <div class="flat-map-type3">
        <div class="container">
            <div class="flat-map">
				<?php echo do_shortcode($settings['google_map_iframe2']);?>
            </div>
        </div>
    </div><!-- flat-map -->
    <?php } ?>
                              
    <?php
    }
}
