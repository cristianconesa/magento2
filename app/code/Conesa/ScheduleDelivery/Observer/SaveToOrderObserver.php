<?php
/**
 * Conesa/ScheduleDelivery/Observer/SaveToOrderObserver.php
 */
namespace Conesa\ScheduleDelivery\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class SaveToOrderObserver implements ObserverInterface
{
    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        if ($quote->getScheduleDeliveryDate()) {
            $order->setData('schedule_delivery_date', $quote->getScheduleDeliveryDate());
        }
        if ($quote->getScheduleDeliveryTimeSlot()) {
            $order->setData('schedule_delivery_time_slot', $quote->getScheduleDeliveryTimeSlot());
        }
    }
}