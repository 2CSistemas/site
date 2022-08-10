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
class Funfacts_V3 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_funfacts_v3';
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
        return esc_html__( 'Funfacts V3', 'softo' );
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
            'funfacts_v3',
            [
                'label' => esc_html__( 'Funfacts V3', 'softo' ),
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
        	'services', 
				[
					'label' => esc_html__('Feature Services', 'softo'),
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title2' => esc_html__('Focus on your business', 'softo')],
					['block_title2' => esc_html__('We take care of your technology', 'softo')]
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
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'block_text2',
						'label' => esc_html__('Description', 'softo'),
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'ext_link',
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
		
		$this->add_control(
        	'our_funfact', 
				[
					'label' => esc_html__('Our Funfacts', 'softo'),
					'type' => Controls_Manager::REPEATER,
					'separator' => 'before',
					'default' => 
				[
					['block_title' => esc_html__('Happy Clients', 'softo')],
					['block_title' => esc_html__('Finished Project', 'softo')],
					['block_title' => esc_html__('Skilled Project', 'softo')],
					['block_title' => esc_html__('Media Posts', 'softo')],
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
						'name' => 'counter_start',
						'label' => esc_html__('Count Start Value', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'counter_stop',
						'label' => esc_html__('Count Stop Value', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXT,
						'default' => esc_html__('', 'softo')
					],
					[
						'name' => 'block_title',
						'label' => esc_html__('Title', 'softo'),
						'label_block' => true,
						'type' => Controls_Manager::TEXTAREA,
						'default' => esc_html__('', 'softo')
					],
				],
				'title_field' => '{{block_title}}',
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
	
    <section class="fact-type4 equalize sm-equalize-auto d-lg-flex">
        <div class="col-left position-relative" <?php if($settings['bg_image']['id']){ ?>style="background-image:url(<?php echo esc_url(wp_get_attachment_url($settings['bg_image']['id'])); ?>); "<?php } ?>>
            <div class="themesflat-content-box" data-padding="82px 50px 78px 39%" data-sdesktoppadding="82px 50px 78px 15px" data-ssdesktoppadding="82px 50px 78px 15px" data-mobipadding="100px 15px 100px 15px" data-smobipadding="100px 15px 100px 15px">
                <div class="section-overlay"></div>
                <div class="position-relative">
                    <?php foreach($settings['services'] as $key => $item): ?>
                    <div class="iconbox-fact">
                        <div class="iconbox-icon"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons_v2']));?>"></span></div>
                        <div class="iconbox-content">
                            <h3 class="title"><a href="<?php echo esc_url($item['ext_link']['url']);?>"><?php echo wp_kses($item['block_title2'], true);?></a></h3>
                            <p><?php echo wp_kses($item['block_text2'], true);?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="col-right">
            <div class="themesflat-content-box" data-padding="124px 21% 0 97px" data-sdesktoppadding="100px 15px 0 15px" data-ssdesktoppadding="100px 15px 0 15px" data-mobipadding="100px 15px 40px 15px" data-smobipadding="100px 15px 40px 15px">
                <div class="row">
                    <?php foreach($settings['our_funfact'] as $key => $item): ?>
                    <div class="col-md-6 col-sm-6 col-12">
                        <div class="counter counter-type4">
                            <div class="content-counter">
                                <div class="icon-count"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                                <div class="numb-count-wrap">
                                    <span class="numb-count" data-from="<?php echo esc_attr($item['counter_start']);?>" data-to="<?php echo esc_attr($item['counter_stop']);?>" data-speed="2000" data-inviewport="yes"><?php echo esc_attr($item['counter_stop']);?></span>
                                </div>
                                <div class="name-count"><?php echo wp_kses($item['block_title'], true);?></div>
                            </div>
                        </div>
                    </div>
					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </section><!-- fact -->
            
	<?php
    }
}
