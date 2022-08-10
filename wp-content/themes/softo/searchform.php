<?php
/**
 * Search Form template
 *
 * @package SOFTO
 * @author Themes Flat
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<div class="widget-search">
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="form-search btn-linear hv-linear-gradient">
        <input type="text" class="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php echo esc_attr__( 'Search', 'softo' ); ?>">
        <button class="btn-search linear-color"><i class="fa fa-search" aria-hidden="true"></i></button>
    </form>
</div>