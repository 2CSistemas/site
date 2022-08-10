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
class Who_We_Are extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_who_we_are';
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
        return esc_html__( 'Who We Are', 'softo' );
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
            'who_we_are',
            [
                'label' => esc_html__( 'Who We Are', 'softo' ),
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
        	'about_tabs', 
				[
					'label'       => __( 'Our Tabs', 'softo' ),
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['tab_button_title' => esc_html__('Who We Are?', 'softo')],
					['tab_button_title' => esc_html__('Softo History', 'softo')],
					['tab_button_title' => esc_html__('Our Mission', 'softo')],
					['tab_button_title' => esc_html__('Our Vission', 'softo')],
				],
			'fields' => 
				[
					[
						'name' => 'tab_button_title',
						'label' => esc_html__('Tab Button Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'video_image',
						'label' => __( 'Video Image', 'softo' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'video_link',
						'label' => __( 'Video Link', 'softo' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
					[
						'name' => 'show_pattern',
						'label'       => __( 'Enable/Disable Circle Pattern', 'softo' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'softo' ),
						'label_off' => __( 'Hide', 'softo' ),
						'return_value' => 'yes',
						'default' => 'no',
					],
					[
						'name' => 'text',
						'label' => esc_html__('Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'quote_text',
						'label' => esc_html__('Quote Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'text2',
						'label' => esc_html__('Description V2', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
				],
				'title_field' => '{{tab_button_title}}',
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
	
    <section class="who-we-are who-we-are-type2 who-we-are-style2">
        <div class="container">
            <?php if($settings['subtitle'] || $settings['title']) { ?>
            <div class="title-section text-center">
                <?php if($settings['subtitle']) { ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>    
                <?php if($settings['title']) { ?><h2 class="flat-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?>
            </div>
			<?php } ?>
            <div class="flat-tabs flat-tabs-type1">
                <ul class="menu-tab d-flex justify-content-lg-between justify-content-center flex-lg-nowrap flex-wrap">
                    <?php $count = 1; foreach($settings['about_tabs'] as $key => $item): ?>
                    <li class="<?php if($count == 1) echo 'active'; ?>"><?php echo wp_kses($item['tab_button_title'], true);?></li>
                    <?php $count++; endforeach; ?>
                </ul>

                <div class="content-tab">
                	<?php $count = 1; foreach($settings['about_tabs'] as $key => $item): ?>
                    <div class="content-inner">
                        <div class="col-tab d-lg-flex align-items-center">
                            <div class="col-left">
                                <div class="featured-post position-relative">
                                    <?php if($item['video_image']['id']){ ?><div class="entry-image"><img src="<?php echo esc_url(wp_get_attachment_url($item['video_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></div><?php } ?>
                                    <?php if($item['video_link']['url']){ ?>
                                    <div class="btn-play-animation videobox">
                                        <a href="<?php echo esc_url($item['video_link']['url']);?>" data-type="iframe" class="play-box fancybox">
                                            <span class="fa fa-play" aria-hidden="true"></span>
                                            <span class="ripple"></span>
                                        </a>
                                    </div>
                                    <?php } ?>
                                    <?php if($item['show_pattern']) { ?>
                                    <div class="circle-border circle-border1"></div>
                                    <div class="circle-border circle-border2"></div>
                                    <div class="circle-border circle-border3"></div>
                                    <div class="circle-border circle-border4"></div>
                                    <?php } ?>
                                </div>
                            </div>
							<?php if($item['text'] || $item['quote_text'] || $item['text2']){ ?>
                            <div class="col-right">
                                <div class="flat-spacer" data-desktop="0" data-sdesktop="0" data-mobi="50" data-smobi="50"></div>
                                <div class="text-content">
                                    <?php if($item['text']){ ?><p><?php echo wp_kses($item['text'], true);?></p><?php } ?>
                                    <?php if($item['quote_text']){ ?><blockquote><?php echo wp_kses($item['quote_text'], true);?></blockquote><?php } ?>
                                    <?php if($item['text2']){ ?><p><?php echo wp_kses($item['text2'], true);?></p><?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php $count++; endforeach; ?>
                </div>     

            </div> 
        </div>   
    </section><!-- who-we-are -->
    
	<?php
    }
}
