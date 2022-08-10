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
class Funfacts extends Widget_Base {

    /**
     * Get widget name.
     * Retrieve button widget name.
     *
     * @since  1.0.0
     * @access public
     * @return string Widget name.
     */
    public function get_name() {
        return 'softo_funfacts';
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
        return esc_html__( 'Funfacts', 'softo' );
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
            'funfacts',
            [
                'label' => esc_html__( 'Funfacts', 'softo' ),
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
					['block_title' => esc_html__('Finished Project', 'softo')],
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
						'name' => 'alphabet_letter',
						'label' => esc_html__('Alphabet Letters', 'softo'),
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
	
    <section class="fact-type2">
        
        <div class="container d-flex justify-content-lg-between justify-content-center flex-lg-nowrap flex-wrap">
            <?php foreach($settings['our_funfact'] as $key => $item): ?>
            <div class="counter counter-type2">
                <div class="content-counter hv-background-before">
                    <div class="icon-count"><span class="<?php echo esc_attr(str_replace( "icon ",  "", $item['icons']));?>"></span></div>
                    <div class="numb-count-wrap">
                        <span class="numb-count" data-from="<?php echo esc_attr($item['counter_start']);?>" data-to="<?php echo esc_attr($item['counter_stop']);?>" data-speed="2000" data-inviewport="yes"><?php echo wp_kses($item['counter_stop'], true);?></span>
                        <span class="numb-plus"><?php echo esc_attr($item['alphabet_letter']);?></span>
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
