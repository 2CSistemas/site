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
class About_Tabs extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_about_tabs';
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
        return esc_html__( 'About Tabs', 'softo' );
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
            'about_tabs',
            [
                'label' => esc_html__( 'About Tabs', 'softo' ),
            ]
        );
		$this->add_control(
        	'services', 
				[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['tab_btn_title' => esc_html__('Who We Are?', 'softo')],
					['tab_btn_title' => esc_html__('Softo History', 'softo')],
					['tab_btn_title' => esc_html__('Our Mission', 'softo')],
					['tab_btn_title' => esc_html__('Our Vission', 'softo')]
				],
			'fields' => 
				[
					[
						'name' => 'tab_btn_title',
						'label' => esc_html__('Tab Button Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'title',
						'label' => esc_html__('Title', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'text',
						'label' => esc_html__('Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'mission_title',
						'label' => esc_html__('Mission Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'mission_text',
						'label' => esc_html__('Mission Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'vission_title',
						'label' => esc_html__('Vission Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'vission_text',
						'label' => esc_html__('Vission Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'about_image',
						'label' => __( 'About Image V1', 'softo' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'about_image_v2',
						'label' => __( 'About Image V2', 'softo' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'about_image_v3',
						'label' => __( 'About Image V3', 'softo' ),
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
						'label'       => __( 'Enable/Disable Video Circle Pattern', 'softo' ),
						'type' => Controls_Manager::SWITCHER,
						'label_on' => __( 'Show', 'softo' ),
						'label_off' => __( 'Hide', 'softo' ),
						'return_value' => 'yes',
						'default' => 'no',
					],
					[
						'name' => 'experience_image',
						'label' => __( 'Experience Image', 'softo' ),
						'type' => Controls_Manager::MEDIA,
						'default' => ['url' => Utils::get_placeholder_image_src(),],
					],
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'quote_text',
						'label' => esc_html__('Quote Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'experience_desc',
						'label' => esc_html__('Experience Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'experience_text',
						'label' => esc_html__('Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
				],
				'title_field' => '{{tab_btn_title}}',
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
	
    <div class="about-us">
        <div class="container">
            <div class="flat-tabs flat-tabs-type2">
                <ul class="menu-tab border-corner d-flex justify-content-lg-between justify-content-center flex-lg-nowrap flex-wrap">
                    <?php $count = 1; foreach($settings['services'] as $key => $item): ?>
                    <li <?php if($count == 1) echo 'class="active"' ?>><?php echo wp_kses($item['tab_btn_title'], true);?></li>
                    <?php $count++; endforeach; ?>
                </ul>

                <div class="content-tab">
                    <?php $counts = 1; foreach($settings['services'] as $key => $item): ?>
                    <div class="content-inner <?php if($counts == 1) echo 'active' ?>">
                        <div class="who-we-are who-we-are-type3 who-we-are-style4">
                            <div class="row">
                                
                                <div class="col-lg-7 col-12">
                                    <?php if($item['title'] || $item['text']){ ?>
                                    <div class="text-content">
                                        <?php if($item['title']){ ?><h3 class="title title-big"><?php echo wp_kses($item['title'], true);?></h3><?php } ?>
                                        <?php if($item['text']){ ?><p><?php echo wp_kses($item['text'], true);?></p><?php } ?>
                                    </div>
									<?php } ?>
                                    <div class="row">
                                        <?php if($item['mission_title'] || $item['mission_text']){ ?>
                                        <div class="col-md-6 col-12">
                                            <div class="text-content">
                                                <h3 class="title"><?php echo wp_kses($item['mission_title'], true);?></h3>
                                                <p><?php echo wp_kses($item['mission_text'], true);?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <?php if($item['vission_title'] || $item['vission_text']){ ?>
                                        <div class="col-md-6 col-12">
                                            <div class="text-content">
                                                <h3 class="title"><?php echo wp_kses($item['vission_title'], true);?></h3>
                                                <p><?php echo wp_kses($item['vission_text'], true);?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-12">
                                    <div class="featured-post position-relative">
                                        <div class="row">
                                            <?php if($item['about_image']['id']){ ?>
                                            <div class="col-12 mg-b30">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['about_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                                            </div>
                                            <?php } ?>
                                            <?php if($item['about_image_v2']['id']){ ?>
                                            <div class="col-md-6 col-12 mg-smobi">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['about_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                                            </div>
                                            <?php } ?>
                                            <?php if($item['about_image_v3']['id']){ ?>
                                            <div class="col-md-6 col-12">
                                                <img src="<?php echo esc_url(wp_get_attachment_url($item['about_image_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                                            </div>
                                            <?php } ?>
                                        </div>
										<?php if($item['video_link']['url']){ ?>
                                        <div class="btn-play-animation videobox">
                                            <a href="<?php echo esc_url($item['video_link']['url']);?>" data-type="iframe" class="play-box s2 fancybox">
                                                <span class="fa fa-play" aria-hidden="true"></span>
                                                <span class="ripple"></span>
                                            </a>
                                        </div>
										<?php } ?>
                                        <?php if($item['show_pattern']) { ?>
                                        <div class="circle-border circle-border1 none-767"></div>
                                        <div class="circle-border circle-border2 none-767"></div>
                                        <div class="circle-border circle-border3 none-767"></div>
                                        <div class="circle-border circle-border4 none-767"></div>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div><!-- who-we-are -->

                        <div class="who-we-are who-we-are-style5">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-5 col-12">
                                    <div class="featured-post position-relative">
                                        <?php if($item['experience_image']['id']){ ?>
                                        <div class="entry-image">
                                            <img src="<?php echo esc_url(wp_get_attachment_url($item['experience_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>">
                                        </div>
                                        <?php } ?>
                        
										<?php if($item['icons']){ ?>
                                        <div class="iconbox-award">
                                            <span class="<?php echo esc_attr($item['icons']);?>"></span>
                                            <div class="spinning-circle"></div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-7 col-12">
                                    <div class="flat-spacer" data-desktop="0" data-sdesktop="0" data-mobi="50" data-smobi="50"></div>
                                    <div class="content">
                                        <?php if($item['quote_text']){ ?><blockquote><?php echo wp_kses($item['quote_text'], true);?></blockquote><?php } ?>
										<?php if($item['experience_desc']){ ?>
                                        <div class="title d-lg-flex align-items-center">
                                            <?php echo wp_kses($item['experience_desc'], true);?>
                                        </div>
                                        <?php } ?>
                                        <?php if($item['experience_text']){ ?><p><?php echo wp_kses($item['experience_text'], true);?></p><?php } ?>
                                    </div>
                                </div> 
                            </div>
                        </div><!-- who-we-are -->

                    </div>
					<?php $counts++; endforeach; ?>
                </div>
            </div>
        </div> 
    </div><!-- about-us -->
       	
	<?php
    }
}
