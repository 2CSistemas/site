<?php
$options = softo_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

//Light Logo Settings
$light_logo = $options->get( 'light_logo' );
$light_logo_dimension = $options->get( 'light_logo_dimension' );


$logo_type = '';
$logo_text = '';
$logo_typography = ''; ?>


    <header id="header" class="header header-type3 bg-header-s2 bg-color">    
        <div class="container">    
            <div class="flex-header">    
                <div class="d-flex">    
                    <div class="col-left">    
                        <div class="content-menu content-menu-type3">    
                            <div class="nav-wrap">    
                                <div class="btn-menu"><span></span></div>
    
                                <nav id="mainnav" class="mainnav">    
                                    <ul class="menu">    
                                    <?php wp_nav_menu( array( 'theme_location' => 'main_menu_2', 'container_id' => 'navbar-collapse-1',
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
                        </div>    
                    </div>
    
                    <div class="col-center position-relative">    
                        <div id="logo" class="logo">    
                            <?php echo softo_logo( $logo_type, $light_logo, $light_logo_dimension, $logo_text, $logo_typography ); ?>    
                        </div>    
                    </div>
    				<?php if($options->get('phone_no_v3') || $options->get('email_address_v3')){ ?>
                    <div class="col-right">    
                        <ul class="flat-information flat-information-type2 color-s2">    
                            <?php if($options->get('phone_no_v3')){ ?><li class="phone"><a href="tel:<?php echo esc_attr($options->get('phone_no_v3')); ?>" title="Phone"><?php echo wp_kses($options->get('phone_no_v3'), true); ?></a></li><?php } ?>    
                            <?php if($options->get('email_address_v3')){ ?><li class="email"><a href="mailto:<?php echo esc_attr($options->get('email_address_v3')); ?>" title="Email"><?php echo wp_kses($options->get('email_address_v3'), true); ?></a></li><?php } ?>
                        </ul>    
                    </div>
                    <?php } ?>   
                </div>    
            </div>    
        </div>    
    </header><!-- header -->    
