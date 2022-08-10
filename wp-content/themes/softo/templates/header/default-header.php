<?php

$options = softo_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Dark Logo Settings
$dark_logo = $options->get( 'dark_logo' );
$dark_logo_dimension = $options->get( 'dark_logo_dimension' );

$logo_type = '';
$logo_text = '';
$logo_typography = ''; 

?>
    <?php if( $options->get('show_topbar_v1') ){ ?>   
    <div class="top-bar top-bar-type1">
        <div class="container">    
            <div class="row">    
                <?php if($options->get('phone_no_v1') || $options->get('email_address_v1')){ ?>
                <div class="col-md-8 col-12 d-lg-flex align-items-center">    
                    <ul class="flat-information flat-information-type1">    
                        <?php if($options->get('phone_no_v1')){ ?><li class="phone"><a href="tel:<?php echo esc_attr($options->get('phone_no_v1')); ?>" title="Phone"><?php echo wp_kses($options->get('phone_no_v1'), true); ?></a></li><?php } ?>
                        <?php if($options->get('email_address_v1')){ ?><li class="email"><a href="mailto:<?php echo esc_attr($options->get('email_address_v1')); ?>" title="Email"><?php echo wp_kses($options->get('email_address_v1'), true); ?></a></li><?php } ?>   
                    </ul>    
                </div>
    			<?php } ?>
                
				<?php if( $options->get('show_seach_form_v1') ){?>
                <div class="col-md-4 col-12 d-flex justify-content-md-end justify-content-center">    
                    <div id="quik-search-btn" class="show-search">    
                        <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>    
                    </div>
    				<div class="dlab-quik-search">    
                    	<?php get_template_part('searchform1')?> 
                    </div>
       			</div>
                <?php } ?> 
                  
            </div>    
        </div>    
    </div><!-- top-bar -->
    <?php } ?>
    <header id="header" class="header header-type1 bg-header-s1 bg-color">    
        <div class="container">    
            <div class="flex-header d-flex">    
                <div id="logo" class="logo d-flex align-items-center justify-content-start">    
                    <?php echo softo_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>   
                </div>    
                <div class="content-menu d-flex align-items-center justify-content-end">    
                    <div class="nav-wrap">    
                        <div class="btn-menu"><span></span></div>    
                        <nav id="mainnav" class="mainnav">    
                            <ul class="menu">    
                            <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
								'container_class'=>'navbar-collapse collapse navbar-right',
								'menu_class'=>'nav navbar-nav',
								'fallback_cb'=>false,
								'items_wrap' => '%3$s',
								'container'=>false,
								'depth'=>'3',
								'walker'=> new Bootstrap_walker()
							)); ?>
                            </ul>
                        </nav>    
                    </div>
					<?php if( $options->get('show_button_v1') ){?>
                    <div class="flat-appointment btn-linear hv-linear-gradient">    
                        <a href="<?php echo esc_url($options->get('btn_link_v1')); ?>" class="font-style linear-color border-corner"><?php echo wp_kses($options->get('btn_title_v1'), true); ?></a>    
                    </div>
					<?php } ?>
                </div>    
            </div>    
        </div>    
    </header><!-- header -->