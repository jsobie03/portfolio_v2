<?php
namespace BooklyPro\Backend\Components\License;

use Bookly\Lib as BooklyLib;
use BooklyPro\Lib;

/**
 * Class Ajax
 * @package BooklyPro\Backend\Components\License
 */
class Ajax extends BooklyLib\Base\Ajax
{
    /**
     * @inheritdoc
     */
    protected static function permissions()
    {
        return array( '_default' => 'user' );
    }

    /**
     * Render form for verification purchase codes.
     */
    public static function verifyPurchaseCodeForm()
    {
        wp_send_json_success( array( 'html' => self::renderTemplate( 'verification', array(), false ) ) );
    }

    /**
     * Purchase code verification.
     */
    public static function verifyPurchaseCode()
    {
        $purchase_code = self::parameter( 'purchase_code' );
        /** @var BooklyLib\Base\Plugin $plugin_class */
        $plugin_class  = self::parameter( 'plugin' ) . '\Lib\Plugin';
        $result = Lib\API::verifyPurchaseCode( $purchase_code, $plugin_class );
        $response = array( 'success' => $result['valid'] );
        if ( $result['valid'] ) {
            $plugin_class::updatePurchaseCode( $purchase_code );
            if ( ! Lib\Config::graceExpired( false ) ) {
                BooklyLib\Proxy\AdvancedGoogleCalendar::reSync();
                BooklyLib\Proxy\OutlookCalendar::reSync();
            }
        } else {
            $response['data']['message'] = $result['error'];
        }

        wp_send_json( $response );
    }

    /**
     * One hour no show message License Required.
     */
    public static function hideGraceNotice()
    {
        update_user_meta( get_current_user_id(), 'bookly_grace_hide_admin_notice_time', strtotime( 'tomorrow' ) );
        wp_send_json_success();
    }

    /**
     * Render window with message license verification succeeded.
     */
    public static function verificationSucceeded()
    {
        wp_send_json_success( array( 'html' => self::renderTemplate( 'verification_succeeded', array(), false ) ) );
    }

    /**
     * Dismiss purchase reminder.
     */
    public static function dismissPurchaseReminder()
    {
        delete_user_meta( get_current_user_id(), 'bookly_show_purchase_reminder' );
    }

    /**
     * Deactivate Bookly Pro add-on
     */
    public static function deactivate()
    {
        deactivate_plugins( array( 'bookly-addon-pro/main.php' ) );
        wp_send_json_success( array( 'target' => BooklyLib\Utils\Common::escAdminUrl( \Bookly\Backend\Modules\Calendar\Page::pageSlug() ) ) );
    }

    /**
     * @inheritdoc
     */
    protected static function hasAccess( $action )
    {
        if ( parent::hasAccess( $action ) ) {
            if ( ! BooklyLib\Utils\Common::isCurrentUserAdmin() ) {
                switch ( $action ) {
                    case 'hideGraceNotice':
                        return BooklyLib\Entities\Staff::query()
                               ->where( 'wp_user_id', get_current_user_id() )
                               ->count() > 0;
                    default:
                        return false;
                }
            }
            return true;
        }

        return false;
    }
}