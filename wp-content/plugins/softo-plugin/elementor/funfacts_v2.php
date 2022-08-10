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
class Funfacts_V2 extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_funfacts_v2';
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
        return esc_html__( 'Funfacts V2', 'softo' );
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
            'funfacts_v2',
            [
                'label' => esc_html__( 'Funfacts V2', 'softo' ),
            ]
        );
		$this->add_control(
        	'our_funfact', 
				[
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
		$this->add_control(
            'style_two', 
			[
			  	'label'   => esc_html__( 'Choose Different Style', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'one',
				'options' => array(
					'one' => esc_html__( 'Enable Top Space', 'softo' ),
					'two' => esc_html__( 'Disable Top Space', 'softo' ),
				),
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
	
    <section class="<?php if($settings['style_two'] == 'two') echo 'fact-type1'; else echo 'fact-type3'; ?>">
        <div class="container justify-content-lg-between justify-content-center d-flex flex-lg-nowrap flex-wrap">
            <?php foreach($settings['our_funfact'] as $key => $item): ?>
            <div class="counter counter-type3">
                <div class="content-counter">
                    <div class="icon-count"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                    <div class="numb-count-wrap">
                        <span class="numb-count" data-from="<?php echo esc_attr($item['counter_start']);?>" data-to="<?php echo esc_attr($item['counter_stop']);?>" data-speed="2000" data-inviewport="yes"><?php echo esc_attr($item['counter_stop']);?></span>
                    </div>
                    <div class="name-count"><?php echo wp_kses($item['block_title'], true);?></div>
                </div>
            </div>
			<?php endforeach; ?>
        </div>
    </section><!-- fact -->
        
	<?php
    }
}
