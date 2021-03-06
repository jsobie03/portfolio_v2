<?php
namespace Bookly\Lib\DataHolders\Booking;

use Bookly\Lib;

/**
 * Class Series
 * @package Bookly\Lib\DataHolders\Booking
 */
class Series extends Item
{
    /** @var Lib\Entities\Series */
    protected $series;
    /** @var Item[] */
    protected $items = array();

    /**
     * Constructor.
     *
     * @param Lib\Entities\Series $series
     */
    public function __construct( Lib\Entities\Series $series )
    {
        $this->type   = Item::TYPE_SERIES;
        $this->series = $series;
    }

    /**
     * @inheritdoc
     */
    public function getAppointment()
    {
        return $this->getFirsItem()->getAppointment();
    }

    /**
     * @inheritdoc
     */
    public function getCA()
    {
        return $this->getFirsItem()->getCA();
    }

    /**
     * @inheritdoc
     */
    public function getDeposit()
    {
        return $this->getFirsItem()->getDeposit();
    }

    /**
     * @inheritdoc
     */
    public function getExtras()
    {
        return $this->getFirsItem()->getExtras();
    }

    /**
     * Add item.
     *
     * @param string $id
     * @param Item $item
     * @return $this
     */
    public function addItem( $id, Item $item )
    {
        $this->items[ $id ] = $item;

        return $this;
    }

    /**
     * Get items.
     *
     * @return Item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @inheritdoc
     */
    public function getService()
    {
        return $this->getFirsItem()->getService();
    }

    /**
     * @inheritdoc
     */
    public function getServiceDuration()
    {
        return $this->getFirsItem()->getServiceDuration();
    }

    /**
     * @inheritdoc
     */
    public function getServicePrice()
    {
        return $this->getFirsItem()->getServicePrice();
    }

    /**
     * Get series.
     *
     * @return Lib\Entities\Series
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @inheritdoc
     */
    public function getStaff()
    {
        return $this->getFirsItem()->getStaff();
    }

    /**
     * @inheritdoc
     */
    public function getTax()
    {
        if ( ! $this->tax ) {
            $rates = Lib\Proxy\Taxes::getServiceTaxRates();
            if ( $rates ) {
                foreach ( $this->getItems() as $item ) {
                    $this->tax += Lib\Proxy\Taxes::calculateTax( $item->getServicePrice(), $rates[ $item->getService()->getId() ] );
                }
            }
        }

        return $this->tax;
    }

    /**
     * Set tax.
     *
     * @param float $tax
     * @return $this
     */
    public function setTax( $tax )
    {
        $this->tax = $tax;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTotalEnd()
    {
        return $this->getFirsItem()->getTotalEnd();
    }

    /**
     * @inheritdoc
     */
    public function getTotalPrice()
    {
        $price = 0.0;
        $break_on_first = get_option( 'bookly_recurring_appointments_payment' ) == 'first';
        foreach ( $this->items as $item ) {
            $price += $item->getTotalPrice();
            if ( $break_on_first ) {
                break;
            }
        }

        return $price;
    }

    /**
     * @inheritdoc
     */
    public function setStatus( $status )
    {
        foreach ( $this->items as $item ) {
            $item->setStatus( $status );
        }
    }

    /**
     * Create new item.
     *
     * @param Lib\Entities\Series $series
     * @return static
     */
    public static function create( Lib\Entities\Series $series )
    {
        return new static( $series );
    }

    /**
     * Get fist item from array items.
     *
     * @return Item
     */
    protected function getFirsItem()
    {
        // Keep internal pointer of items array
        $clone = $this->items;

        return reset( $clone );
    }
}