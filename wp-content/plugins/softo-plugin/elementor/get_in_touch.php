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
class Get_In_Touch extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_get_in_touch';
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
        return esc_html__( 'Get In Touch', 'softo' );
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
            'get_in_touch',
            [
                'label' => esc_html__( 'Get In Touch', 'softo' ),
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
			'text',
			[
				'label'       => __( 'Description', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'softo' ),
			]
		);
		$this->add_control(
			'get_in_touch_form',
			[
				'label'       => __( 'Get In Touch Form Url', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Contact Form 7 Url', 'softo' ),
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
	
    <section class="get-in-touch-type3 get-in-touch-style1 parallax parallax4 position-relative" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
        <div class="section-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="contact-address">
                        <div class="flat-spacer" data-desktop="112" data-sdesktop="112" data-mobi="0" data-smobi="0"></div>
                        <?php if($settings['icons']){ ?><span class="<?php echo esc_attr(str_replace( "icon ",  "", $settings['icons']));?>"></span><?php } ?>
                        <?php if($settings['phone_no'] || $settings['email_address']){ ?>
                        <ul class="contact-details">
                            <?php if($settings['phone_no']){ ?><li><?php echo wp_kses($settings['phone_no'], true);?></li><?php } ?>
                            <?php if($settings['email_address']){ ?><li><?php echo wp_kses($settings['email_address'], true);?></li><?php } ?>
                        </ul>
                        <?php } ?>
                        <?php if($settings['text']){ ?>
                        <div class="text">
                            <?php echo wp_kses($settings['text'], true);?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php if($settings['get_in_touch_form']){ ?>
                <div class="col-lg-6 col-12">
                    <div id="contactform" class="form-git2 form-submit">
                        <?php echo do_shortcode($settings['get_in_touch_form']);?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section><!-- get-in-touch -->
                      
    <?php
    }
}
