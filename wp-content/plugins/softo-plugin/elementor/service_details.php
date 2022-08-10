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
class Service_Details extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_service_details';
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
        return esc_html__( 'Service Details', 'softo' );
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
            'service_details',
            [
                'label' => esc_html__( 'General', 'softo' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'service_image',
			[
				'label' => __( 'Feature Image V1', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'service_image_v2',
			[
				'label' => __( 'Feature Image V2', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
			]
		);
		$this->add_control(
			'service_image_v3',
			[
				'label' => __( 'Feature Image V3', 'softo' ),
				'type' => Controls_Manager::MEDIA,
				'default' => ['url' => Utils::get_placeholder_image_src(),],
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
			'sub_heading',
			[
				'label'       => __( 'Sub Heading', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Heading', 'softo' ),
			]
		);
		$this->add_control(
			'text2',
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
			'sub_heading2',
			[
				'label'       => __( 'Sub Heading', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'dynamic'     => [
					'active' => true,
				],
				'placeholder' => __( 'Enter your Sub Heading', 'softo' ),
			]
		);
		$this->add_control(
			'text3',
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
		
		//Show Feature Services
		$this->start_controls_section(
            'services_post',
            [
                'label' => esc_html__( 'Feature Services', 'softo' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'show_feature_service',
			[
				'label'       => __( 'Enable/Disable Feature Services Section', 'softo' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'softo' ),
				'label_off' => __( 'Hide', 'softo' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
        	'services', 
				[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Protect Business', 'softo')],
					['block_title' => esc_html__('Optimize IT systems', 'softo')],
					['block_title' => esc_html__('Digital Enablement', 'softo')]
				],
			'fields' => 
				[
					[
						'name' => 'icons',
						'label' => esc_html__('Enter The icons', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'block_text',
						'label' => esc_html__('Description', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'btn_title',
						'label' => esc_html__('Button Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'btn_link',
						'label' => __( 'Button Link', 'softo' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title}}',
			 ]
        );
		
		$this->end_controls_section();
		
		//Show Bamking System
		$this->start_controls_section(
            'banking_post',
            [
                'label' => esc_html__( 'Banking System', 'softo' ),
				'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );
		$this->add_control(
			'show_banking_system',
			[
				'label'       => __( 'Enable/Disable Banking System Section', 'softo' ),
                'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'softo' ),
				'label_off' => __( 'Hide', 'softo' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
        	'banking', 
				[
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title2' => esc_html__('Cards and payments', 'softo')],
					['block_title2' => esc_html__('Corporate Banking', 'softo')],
					['block_title2' => esc_html__('Security and compliance', 'softo')],
					['block_title2' => esc_html__('Risk and compliance', 'softo')]
				],
			'fields' => 
				[
					[
						'name' => 'icons_v2',
						'label' => esc_html__('Enter The icons', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::SELECT2,
						'options'  => get_fontawesome_icons(),
					],
					[
						'name' => 'block_title2',
						'label' => esc_html__('Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'block_text2',
						'label' => esc_html__('Description', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'ext_link2',
						'label' => __( 'External Link', 'softo' ),
						'type' => Controls_Manager::URL,
						'placeholder' => __( 'https://your-link.com', 'plugin-domain' ),
						'show_external' => true,
						'default' => ['url' => '','is_external' => true,'nofollow' => true,],
					],
				],
				'title_field' => '{{block_title2}}',
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
	
    <div class="flat-it-services-banking flat-it-services-style5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-12">
                    <?php if($settings['service_image']['id']){ ?>
                    <div class="image-about"><img src="<?php echo esc_url(wp_get_attachment_url($settings['service_image']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></div>
                    <?php } ?>
					<?php if($settings['service_image_v2']['id'] || $settings['service_image_v3']['id']){ ?>
                    <div class="image-box d-lg-flex">
                        <?php if($settings['service_image_v2']['id']){ ?><div class="image-left"><img src="<?php echo esc_url(wp_get_attachment_url($settings['service_image_v2']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></div><?php } ?>
                        <?php if($settings['service_image_v3']['id']){ ?><div class="image-right"><img src="<?php echo esc_url(wp_get_attachment_url($settings['service_image_v3']['id'])); ?>" alt="<?php esc_attr_e('Awesome Image', 'softo'); ?>"></div><?php } ?>
                    </div>
                    <?php } ?>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="flat-spacer" data-desktop="0" data-sdesktop="0" data-mobi="50" data-smobi="50"></div>
                    <div class="text-content">
                        <?php if($settings['title'] || $settings['text']){ ?>
                        <div class="it-services-banking">
                            <?php if($settings['title']){ ?><h3 class="title title-big"><?php echo wp_kses($settings['title'], true);?></h3><?php } ?>
                            <?php if($settings['text']){ ?><p><?php echo wp_kses($settings['text'], true);?></p><?php } ?>
                        </div>
						<?php } ?>
                        <?php if($settings['sub_heading'] || $settings['text2']){ ?>
                        <div class="it-services-banking">
                            <?php if($settings['sub_heading']){ ?><h3 class="title"><?php echo wp_kses($settings['sub_heading'], true);?></h3><?php } ?>
                            <?php if($settings['text2']){ ?><p><?php echo wp_kses($settings['text2'], true);?></p><?php } ?>
                        </div>
						<?php } ?>
                        <?php if($settings['sub_heading2'] || $settings['text3']){ ?>
                        <div class="it-services-banking">
                            <?php if($settings['sub_heading2']){ ?><h3 class="title"><?php echo wp_kses($settings['sub_heading2'], true);?></h3><?php } ?>
                            <?php if($settings['text3']){ ?><p><?php echo wp_kses($settings['text3'], true);?></p><?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
			
            <?php if($settings['show_feature_service']) { ?>
            <div class="features d-flex features-style3 flex-wrap">
                <?php $count = 1; foreach($settings['services'] as $key => $item): ?>
                <div class="iconbox-features col-lg-4 col-md-6 col-12 hv-background-before <?php if($count == 2) echo 'active'; ?>">
                    <div class="iconbox-icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                    <div class="iconbox-content">
                        <h3 class="title"><?php echo wp_kses($item['block_title'], true);?></h3>
                        <p><?php echo wp_kses($item['block_text'], true);?></p>
                        <div class="discover-more">
                            <a href="<?php echo esc_url($item['btn_link']['url']);?>"><?php echo wp_kses($item['btn_title'], true);?></a>
                        </div>
                    </div>
                </div>
				<?php $count++; endforeach; ?>
            </div>
			<?php } ?>
            
            <?php if($settings['show_banking_system']) { ?>
            <div class="row">
                <?php foreach($settings['banking'] as $key => $item): ?>
                <div class="col-md-6 col-12">
                    <div class="iconbox-banking">
                        <div class="iconbox-icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons_v2']));?>"></span></div>
                        <div class="iconbox-content">
                            <h4 class="title"><a href="<?php echo esc_url($item['ext_link2']['url']);?>"><?php echo wp_kses($item['block_title2'], true);?></a></h4>
                            <p><?php echo wp_kses($item['block_text2'], true);?></p>
                        </div>
                    </div>
                </div>
				<?php endforeach; ?>
            </div><!-- iconbox-banking -->
            <?php } ?>
        </div>
    </div><!-- flat-it-services-banking -->
        	
	<?php
    }
}
