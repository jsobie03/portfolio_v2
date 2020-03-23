<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

$image_url = esc_url( PVCP_PLUGIN_URL . 'admin/images/right_click.png' );
?>

<div class="dotstore_plugin_sidebar">
    <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php esc_html_e( 'Important link', PVCP_TEXT_DOMAIN ); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li>
                    <img src="<?php echo esc_url( $image_url ); ?>">
                    <a target="_blank" href="javascript:void(0);"><?php esc_html_e( 'Plugin documentation', PVCP_TEXT_DOMAIN ); ?></a>
                </li> 
                <li>
                    <img src="<?php echo esc_url( $image_url ); ?>">
                    <a target="_blank" href="<?php echo esc_url( "https://www.thedotstore.com/support" ); ?>"><?php esc_html_e( 'Support platform', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
                <li>
                    <img src="<?php echo esc_url( $image_url ); ?>">
                    <a target="_blank" href="<?php echo esc_url( "https://www.thedotstore.com/suggest-a-feature/" ); ?>"><?php esc_html_e( 'Suggest A Feature', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
                <li>
                    <img src="<?php echo esc_url( $image_url ); ?>">
                    <a  target="_blank" href="javascript:void(0);"><?php esc_html_e( 'Changelog', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="dotstore-important-link">
        <h2><span class="dotstore-important-link-title"><?php esc_html_e( 'OUR POPULAR PLUGIN', PVCP_TEXT_DOMAIN ); ?></span></h2>
        <div class="video-detail important-link">
            <ul>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url( PVCP_PLUGIN_URL . 'admin/images/dotstore-plugins/Advance_Extra_Cost_Plugin_for_WooCommerce_sidebar.png' ); ?>">
                    <a target="_blank" href="<?php echo esc_url( "https://www.thedotstore.com/advanced-flat-rate-shipping-method-for-woocommerce" ); ?>"><?php esc_html_e( 'Woocommerce Conditional Extra Fees', PVCP_TEXT_DOMAIN ); ?></a>
                </li> 
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url( PVCP_PLUGIN_URL . 'admin/images/dotstore-plugins/Woocommerce_Blocker_Lite_Prevent_fake_orders_and_Blacklist_fraud_customers.png' ); ?>">
                    <a  target="_blank" href="<?php echo esc_url( "https://www.thedotstore.com/product/woocommerce-blocker-lite-prevent-fake-orders-blacklist-fraud-customers/" ); ?>"><?php esc_html_e( 'Woocommerce Blocker', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url( PVCP_PLUGIN_URL . 'admin/images/dotstore-plugins/advanced_product_Size_Chart_WooCommerce_icone.png' ); ?>">
                    <a target="_blank" href="<?php echo esc_url( "https://www.thedotstore.com/woocommerce-advanced-product-size-charts/t" ); ?>"><?php esc_html_e( 'Woocommerce Advanced Product Size Charts', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
                <li>
                    <img class="sidebar_plugin_icone" src="<?php echo esc_url( PVCP_PLUGIN_URL . 'admin/images/dotstore-plugins/WooCommerce_Enhanced_Ecommerce_Analytics_Integration_with_Conversion_Tracking.png' ); ?>">
                    <a  target="_blank" href="<?php echo esc_url( "http://www.thedotstore.com/woocommerce-enhanced-ecommerce-analytics-integration-with-conversion-tracking" ); ?>"><?php esc_html_e( 'Woo Enhanced Ecommerce Analytics Integration', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
                <li>
                    <img  class="sidebar_plugin_icone" src="<?php echo esc_url( PVCP_PLUGIN_URL . 'admin/images/dotstore-plugins/AMM.png' ); ?>">
                    <a target="_blank" href="<?php echo esc_url( "https://www.thedotstore.com/advance-menu-manager-wordpress/" ); ?>"><?php esc_html_e( 'Advanced Menu Manager For WordPress', PVCP_TEXT_DOMAIN ); ?></a>
                </li>
                </br>
            </ul>
        </div>
        <div class="view-button">
            <a class="view_button_dotstore" target="_blank" href="<?php echo esc_url( "http://www.thedotstore.com/plugins/" ); ?>"><?php esc_html_e( 'VIEW ALL', PVCP_TEXT_DOMAIN ); ?></a>
        </div>
    </div>
    <!-- html end for popular plugin !-->

</div>	
</div>
</body>
</html>
