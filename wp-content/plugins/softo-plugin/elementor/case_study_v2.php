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
class Case_Study_V2 extends Widget_Base {

	/**
	 * Get widget name.
	 * Retrieve button widget name.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'softo_case_study_v2';
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
		return esc_html__( 'Case Study V2', 'softo' );
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
			'case_study_v2',
			[
				'label' => esc_html__( 'Case Study V2', 'softo' ),
			]
		);
		$this->add_control(
			'number',
			[
				'label'   => esc_html__( 'Number of post', 'softo' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
			]
		);
		$this->add_control(
			'cat_exclude',
			[
				'label'       => esc_html__( 'Exclude', 'softo' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'description' => esc_html__( 'Exclude categories, etc. by ID with comma separated.', 'softo' ),
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
		
		$paged = softo_set($_POST, 'paged') ? esc_attr($_POST['paged']) : 1;
		$this->add_render_attribute( 'wrapper', 'class', 'themeexpo-softo' );
		$args = array(
			'post_type'      => 'cases',
			'posts_per_page' => softo_set( $settings, 'number' ),
			'orderby'        => softo_set( $settings, 'query_orderby' ),
			'order'          => softo_set( $settings, 'query_order' ),
			'paged'         => $paged
		);
		$terms_array = explode(",",softo_set( $settings, 'cat_exclude' ));
		if(softo_set( $settings, 'cat_exclude' )) $args['tax_query'] = array(array('taxonomy' => 'cases_cat','field' => 'id','terms' => $terms_array,'operator' => 'NOT IN',));
		$allowed_tags = wp_kses_allowed_html('post');
		$query = new \WP_Query( $args );
		$t = '';
		$data_filtration = '';
		$data_posts = '';
		if ( $query->have_posts() ) 
		{
		ob_start();
		?>
  
		<?php 
            $count = 0; 
            $fliteration = array();
            while( $query->have_posts() ): $query->the_post();
            global  $post;
            $meta = ''; //printr($meta);
            $meta1 = ''; //_WSH()->get_meta();
            $post_terms = get_the_terms( get_the_id(), 'cases_cat');// printr($post_terms); exit();
            foreach( (array)$post_terms as $pos_term ) $fliteration[$pos_term->term_id] = $pos_term;
            $temp_category = get_the_term_list(get_the_id(), 'cases_cat', '', ', ');
            
            $post_terms = wp_get_post_terms( get_the_id(), 'cases_cat'); 
            $term_slug = '';
            if( $post_terms ) foreach( $post_terms as $p_term ) $term_slug .= $p_term->slug.' ';
        	
			$term_list = wp_get_post_terms(get_the_id(), 'cases_cat', array("fields" => "names"));
			$post_thumbnail_id = get_post_thumbnail_id($post->ID);
			$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			
            ?>
            
			<div class="case clearfix <?php echo esc_attr($term_slug); ?>">        
                <div class="flat-case border-corner">        
                    <div class="case-content">        
                        <p><?php echo implode( ', ', (array)$term_list );?></p>        
                        <h3 class="title"><a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>"><?php the_title(); ?></a></h3>        
                    </div>        
                    <div class="featured-post">        
                        <div class="entry-image bg-linear-gradient position-relative">        
                            <?php the_post_thumbnail('softo_370x371'); ?>   
                            <a href="<?php echo esc_url( the_permalink( get_the_id() ) ); ?>" class="arrow-link"><span class="icon-arrow-pointing-to-right"></span></a>        
                        </div>        
                    </div>        
                </div>        
            </div>
            			   
			<?php endwhile;?>

            <?php wp_reset_postdata();
            $data_posts = ob_get_contents();
            ob_end_clean();
            
            ob_start();?>
            
            <?php $terms = get_terms(array('cases_cat')); ?>

			<div class="flat-case-study flat-case-study-type4 flat-case-study-style4">
                <div class="container">
        
                    <div class="case-study border-corner">        
                        <ul class="flat-filter-isotope d-flex justify-content-lg-between justify-content-center flex-lg-nowrap flex-wrap">        
                            <li class="active"><a href="#" data-filter="*"><?php esc_attr_e('All Case', 'softo');?></a></li>        
                            <?php foreach( $fliteration as $t ): ?>
                            <li><a href="#" data-filter=".<?php echo esc_attr(softo_set( $t, 'slug' )); ?>"><?php echo softo_set( $t, 'name'); ?></a></li>        
                            <?php endforeach;?>       
                        </ul>        
                    </div>
        
                    <div class="flat-cases clearfix isotope-case">        
                        <?php echo wp_kses($data_posts, true); ?>
                    </div>        
                </div>        
            </div><!-- flat-case-study -->
            
       <?php }
	}

}
