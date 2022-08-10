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
class Our_Mission extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_our_mission';
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
        return esc_html__( 'Our Mission', 'softo' );
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
            'our_mission',
            [
                'label' => esc_html__( 'Our Mission', 'softo' ),
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
		$this->add_control(
        	'services', 
				[
					'label'       => __( 'Mission and Vission Info', 'softo' ),
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Our Mission', 'softo')],
					['block_title' => esc_html__('Our Vission', 'softo')]
				],
			'fields' => 
				[
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Text', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
				],
				'title_field' => '{{block_title}}',
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
			'about_image_v2',
			[
				'label' => __( 'About Image V2', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'about_image_v3',
			[
				'label' => __( 'About Image V3', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'video_link',
				[
				  'label' => __( 'Video Url', 'softo' ),
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
		$this->add_control(
			'show_pattern',
			[
				'label'       => __( 'Enable/Disable Video Circle Pattern', 'softo' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'softo' ),
				'label_off' => __( 'Hide', 'softo' ),
				'return_value' => 'yes',
				'default' => 'no',
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
	
    <section class="who-we-are who-we-are-type3 who-we-are-style3">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <?php if($settings['title'] || $settings['text']){ ?>
                    <div class="text-content">
                        <?php if($settings['title']){ ?><h3 class="title title-big"><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
                        <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                    </div>
					<?php } ?>
                    <div class="row">
                        <?php foreach($settings['services'] as $key => $item): ?>
                        <div class="col-md-6 col-12">
                            <div class="text-content">
                                <h3 class="title"><?php echo wp_kses($item['block_title'], true);?></h3>
                                <p><?php echo wp_kses($item['block_text'], true);?></p>
                            </div>
                        </div>
						<?php endforeach; ?>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="featured-post position-relative">
                        <div class="row">
                            <?php if($settings['about_image']['id']){ ?>
                            <div class="col-12 mg-b30">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                            </div>
                            <?php } ?>
							<?php if($settings['about_image_v2']['id']){ ?>
                            <div class="col-md-6 col-12 mg-smobi">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                            </div>
                            <?php } ?>
							<?php if($settings['about_image_v3']['id']){ ?>
                            <div class="col-md-6 col-12">
                                <img src="<?php echo esc_url(wp_get_attachment_url($settings['about_image_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                            </div>
							<?php } ?>
                        </div>
						<?php if($settings['video_link']['url']){ ?>
                        <div class="btn-play-animation videobox">
                            <a href="<?php echo esc_url($settings['video_link']['url']);?>" data-type="iframe" class="play-box s2 fancybox">
                                <span class="fa fa-play" aria-hidden="true"></span>
                                <span class="ripple"></span>
                            </a>
                        </div>
						<?php } ?>
                        <?php if($settings['show_pattern']) { ?>
                        <div class="circle-border circle-border1 none-767"></div>
                        <div class="circle-border circle-border2 none-767"></div>
                        <div class="circle-border circle-border3 none-767"></div>
                        <div class="circle-border circle-border4 none-767"></div>
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- who-we-are -->
    	
	<?php
    }
}
