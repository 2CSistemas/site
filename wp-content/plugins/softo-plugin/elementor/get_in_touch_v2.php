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
class Get_In_Touch_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_get_in_touch_v2';
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
        return esc_html__( 'Get In Touch V2', 'softo' );
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
            'get_in_touch_v2',
            [
                'label' => esc_html__( 'Get In Touch V2', 'softo' ),
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
			'icons',
			[
				'label' => esc_html__('Enter The icons', 'softo'),
				'label_block' => true,
				'type' => Controls_Manager::SELECT2,
				'options'  => get_fontawesome_icons(),
			]
		);
		$this->add_control(
			'phone_no',
			[
				'label'       => __( 'Phone Number', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Phone Number', 'softo' ),
			]
		);
		$this->add_control(
			'email_address',
			[
				'label'       => __( 'Email Address', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Email Address', 'softo' ),
			]
		);
		$this->add_control(
			'website_link',
			[
				'label'       => __( 'Website Link', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Website Link', 'softo' ),
			]
		);
		$this->add_control(
			'get_in_touch_form_v2',
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
			'google_map_iframe',
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
	
    <section class="get-in-touch-type4 get-in-touch-style2" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <div class="container">
            
            <div class="contact-info">
                <div class="row d-flex align-items-center">
                    <?php if($settings['title']){ ?>
                    <div class="col-lg-5 col-12">
                        <div class="text-contact"><?php echo wp_kses($settings['title'], true);?></div>
                    </div>
					<?php } ?>
                    
					<?php if($settings['icons']){ ?>
                    <div class="col-lg-2 col-12 d-flex justify-content-center">
                        <div class="represent-icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $settings['icons']));?>"></span></div>
                    </div>
					<?php } ?>
                    
                    <?php if($settings['phone_no'] || $settings['email_address'] || $settings['website_link']){ ?>
                    <div class="col-lg-5 col-12">
                        <div class="info-contact">
                            <?php if($settings['phone_no']){ ?><p><?php echo wp_kses($settings['phone_no'], true);?></p><?php } ?>
                            <?php if($settings['email_address']){ ?><p><?php echo wp_kses($settings['email_address'], true);?></p><?php } ?>
                            <?php if($settings['website_link']){ ?><p><?php echo wp_kses($settings['website_link'], true);?></p><?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
			
            <div class="row">
                <?php if($settings['get_in_touch_form_v2']){ ?>
                <div class="col-lg-7">
                    <div class="form-leave-comment">
                      	<?php echo do_shortcode($settings['get_in_touch_form_v2']);?>
                    </div>
                </div>
                <?php } ?>
                
                <?php if($settings['google_map_iframe']){ ?>
                <div class="col-lg-5">
                    <div class="flat-map-type2">
                        <?php echo do_shortcode($settings['google_map_iframe']);?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section><!-- get-in-touch -->
                          
    <?php
    }
}
