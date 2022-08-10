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
class About_Us extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_about_us';
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
        return esc_html__( 'About Us', 'softo' );
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
            'about_us',
            [
                'label' => esc_html__( 'About Us', 'softo' ),
            ]
        );
		$this->add_control(
			'about_image',
			[
				'label' => __( 'About Image', 'softo' ),
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
			'quote_text',
			[
				'label'       => __( 'Quote Description', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Quote Description', 'softo' ),
			]
		);
		$this->add_control(
			'experience_desc',
			[
				'label'       => __( 'Experience Description', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Experience Description', 'softo' ),
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description', 'softo' ),
				'type'        => Controls_Manager::TEXTAREA,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Description', 'softo' ),
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
	
	<section class="who-we-are who-we-are-style1">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-5 col-12">
                    <div class="featured-post position-relative">
                        <?php if($settings['about_image']['id']){ ?>
                        <div class="entry-image">
                            <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                        </div>
                        <?php } ?>
                        
						<?php if($settings['icons']){ ?>
                        <div class="iconbox-award">
                            <span class="<?php echo esc_attr($settings['icons']);?>"></span>
                            <div class="spinning-circle"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-7 col-12">
                    <div class="flat-spacer" data-desktop="0" data-sdesktop="0" data-mobi="50" data-smobi="50"></div>
                    <div class="content">
                        <?php if($settings['quote_text']){ ?><blockquote><?php echo wp_kses($settings['quote_text'], true);?></blockquote><?php } ?>
                        <?php if($settings['experience_desc']){ ?>
                        <div class="title d-lg-flex align-items-center">
                            <?php echo wp_kses($settings['experience_desc'], true);?>
                        </div>
                        <?php } ?>
						<?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- who-we-are -->
    	
	<?php
    }
}
