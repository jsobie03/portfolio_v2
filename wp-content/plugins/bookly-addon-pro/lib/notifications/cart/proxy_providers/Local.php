<?php
namespace BooklyPro\Lib\Notifications\Cart\ProxyProviders;

use Bookly\Lib\DataHolders\Booking\Order;
use Bookly\Lib\Notifications\Cart\Proxy;
use BooklyPro\Lib\Notifications\Cart\Sender;

/**
 * Class Local
 * @package BooklyPro\Lib\Notifications\Cart\ProxyProviders
 */
abstract class Local extends Proxy\Pro
{
    /**
     * @inheritdoc
     */
    public static function sendCombinedToClient( Order $order )
    {
        Sender::sendCombined( $order );
    }
}