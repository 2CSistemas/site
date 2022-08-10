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

	<div class="top-bar top-bar-type2">
        <div class="container">
            <div class="d-lg-flex justify-content-lg-between align-items-center">
                <div id="logo" class="logo st-logo-two d-flex justify-content-center">
                    <?php echo softo_logo( $logo_type, $dark_logo, $dark_logo_dimension, $logo_text, $logo_typography ); ?>
                </div>
				<?php if($options->get('phone_no_v2') || $options->get('email_address_v2')){ ?>
                <ul class="flat-information flat-information-type2 color-s1">
                    <?php if($options->get('phone_no_v2')){ ?><li class="phone"><a href="tel:<?php echo esc_attr($options->get('phone_no_v2')); ?>" title="Phone"><?php echo wp_kses($options->get('phone_no_v2'), true); ?></a></li><?php } ?>
                    <?php if($options->get('email_address_v2')){ ?><li class="email"><a href="mailto:<?php echo esc_attr($options->get('email_address_v2')); ?>" title="Email"><?php echo wp_kses($options->get('email_address_v2'), true); ?></a></li><?php } ?>
                </ul>
                <?php } ?>
				<?php if( $options->get('show_button_v2') ){?>
                <div class="flat-appointment btn-linear hv-linear-gradient d-flex justify-content-center">
                    <a href="<?php echo esc_url($options->get('btn_link_v2')); ?>" class="font-style linear-color border-corner"><?php echo wp_kses($options->get('btn_title_v2'), true); ?><span class="icon-arrow-pointing-to-right"></span></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div><!-- top-bar -->
    
    <header id="header" class="header header-type2 bg-header-s2 bg-color">

        <div class="container">
            <div class="flex-header">
                <div class="content-menu content-menu-type2 d-flex align-items-center justify-content-between">
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
					<?php
						if( $options->get('show_social_share_v2') ):
						$icons = $options->get( 'header_social_share_v2' );
						if ( ! empty( $icons ) ) :
					?>
                    <div class="socials-list">
					<?php
                        foreach ( $icons as $h_icon ) :
                        $header_social_icons = json_decode( urldecode( softo_set( $h_icon, 'data' ) ) );
                        if ( softo_set( $header_social_icons, 'enable' ) == '' ) {
                            continue;
                        }
                        $icon_class = explode( '-', softo_set( $header_social_icons, 'icon' ) );
                        ?>
                        <a href="<?php echo esc_url(softo_set( $header_social_icons, 'url' )); ?>" <?php if( softo_set( $header_social_icons, 'background' ) || softo_set( $header_social_icons, 'color' ) ):?>style="background-color:<?php echo esc_attr(softo_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(softo_set( $header_social_icons, 'color' )); ?>"<?php endif;?>><i class="fa <?php echo esc_attr( softo_set( $header_social_icons, 'icon' ) ); ?>"></i></a>
                    <?php endforeach; ?>
                    </div>
                    <?php endif; endif; ?>
                </div>
            </div>
        </div>
    </header><!-- header -->
