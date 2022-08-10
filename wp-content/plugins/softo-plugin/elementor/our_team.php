<?php
namespace SOFTOPLUGIN\Element;

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
class Our_Team extends Widget_Base {
	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'softo_our_team';
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
		return esc_html__( 'Our Team', 'softo' );
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
			'our_team',
			[
				'label' => esc_html__( 'Our Team', 'softo' ),
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
			'query_number',
			[
				'label'   => esc_html__( 'Number of post', 'softo' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'query_orderby',
			[
				'label'   => esc_html__( 'Order By', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'date',
				'options' => array(
					'date'       => esc_html__( 'Date', 'softo' ),
					'title'      => esc_html__( 'Title', 'softo' ),
					'menu_order' => esc_html__( 'Menu Order', 'softo' ),
					'rand'       => esc_html__( 'Random', 'softo' ),
				),
			]
		);
		$this->add_control(
			'query_order',
			[
				'label'   => esc_html__( 'Order', 'softo' ),
				'label_block' => true,
				'type'    => Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => array(
					'DESC' => esc_html__( 'DESC', 'softo' ),
					'ASC'  => esc_html__( 'ASC', 'softo' ),
				),
			]
		);
		$this->add_control(
            'query_category', 
			[
				'type' => Controls_Manager::SELECT,
				'label' => esc_html__('Category', 'softo'),
				'label_block' => true,
				'options' => get_team_categories()
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
		
        $paged = get_query_var('paged');
		$paged = softo_set($_REQUEST, 'paged') ? esc_attr($_REQUEST['paged']) : $paged;
		
		$this->add_render_attribute( 'wrapper', 'class', 'templatepath-softo' );
		$args = array(
			'post_type'      =>  'team',
			'posts_per_page' => softo_set( $settings, 'query_number' ),
			'orderby'        => softo_set( $settings, 'query_orderby' ),
			'order'          => softo_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		
		if( softo_set( $settings, 'query_category' ) ) $args['team_cat'] = softo_set( $settings, 'query_category' );
		$query = new \WP_Query( $args );
		if ( $query->have_posts() ) 
		{ ?>
        
        <section class="flat-team-members <?php if($settings['style_two'] == 'two') echo 'mg-team-members'; else echo ''; ?>">
            <div class="container">    
                <?php if($settings['subtitle'] || $settings['title']) { ?>
                <div class="title-section text-center">    
                    <?php if($settings['subtitle']) { ?><p class="sub-title"><?php echo wp_kses($settings['subtitle'], true);?></p><?php } ?>    
                	<?php if($settings['title']) { ?><h2 class="flat-title"><?php echo wp_kses($settings['title'], true);?></h2><?php } ?> 
                </div>
    			<?php } ?>
                <div class="row">    
                    <?php 
						while ( $query->have_posts() ) : $query->the_post();
						$term_list = wp_get_post_terms(get_the_id(), 'cases_category', array("fields" => "names")); 
					?>
                    <div class="col-lg-3 col-md-6 col-12">    
                        <div class="team-members border-corner hv-background-before">    
                            <div class="featured-post">    
                                <div class="entry-image">    
                                    <a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_post_thumbnail('softo_170x170'); ?></a>    
                                    <?php
										$icons = get_post_meta( get_the_id(), 'social_profile', true );
										if ( ! empty( $icons ) ) :
									?> 
                                    <div class="icon-work">
									<?php
                                        foreach ( $icons as $h_icon ) :
                                        $header_social_icons = json_decode( urldecode( softo_set( $h_icon, 'data' ) ) );
                                        if ( softo_set( $header_social_icons, 'enable' ) == '' ) {
                                            continue;
                                        }
                                        $icon_class = explode( '-', softo_set( $header_social_icons, 'icon' ) );
                                        ?>
                                        <a href="<?php echo esc_url(softo_set( $header_social_icons, 'url' )); ?>" <?php if( softo_set( $header_social_icons, 'background' ) || softo_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(softo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(softo_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><span class="fa <?php echo esc_attr( softo_set( $header_social_icons, 'icon' ) ); ?>"></span></a>
                                    <?php endforeach; ?>
                                    </div>    
                                    <?php endif; ?>
                                </div>    
                            </div>    
                            <div class="info-content">    
                                <h3 class="name"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>    
                                <p class="role"><?php echo (get_post_meta( get_the_id(), 'designation', true ));?></p>    
                            </div>    
                        </div>    
                    </div>
    				<?php endwhile; ?>
                </div>    
            </div>    
        </section><!-- flat-team-members -->
        
        <?php }
		wp_reset_postdata();
	}
}