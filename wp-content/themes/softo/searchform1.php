<?php
/**
 * Search Form template
 *
 * @package SOFTO
 * @author Template Path
 * @version 1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Restricted' );
}
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">    
    <input name="s" value="<?php echo esc_attr(get_search_query()); ?>" type="text" class="form-control" placeholder="<?php echo esc_attr__( 'Search....', 'softo' ); ?>">    
    <span id="quik-search-remove"><i class="fa fa-times" aria-hidden="true"></i></span>    
</form>