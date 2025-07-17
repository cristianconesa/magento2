<?php
/**
 * Conesa/ScheduleDelivery/Model/ScheduleDeliveryManagement.php
 */
namespace Conesa\ScheduleDelivery\Model;

use Conesa\ScheduleDelivery\Api\ScheduleDeliveryManagementInterface;
use Conesa\ScheduleDelivery\Api\Data\ScheduleDataInterface;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\CouldNotSaveException;

class ScheduleDeliveryManagement implements ScheduleDeliveryManagementInterface
{
    /**
     * @var CartRepositoryInterface
     */
    protected $quoteRepository;

    /**
     * @param CartRepositoryInterface $quoteRepository
     */
    public function __construct(CartRepositoryInterface $quoteRepository)
    {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @inheritdoc
     */
    public function saveScheduleDelivery($cartId, ScheduleDataInterface $scheduleData)
    {
        $quote = $this->quoteRepository->getActive($cartId);
        if (!$quote->getItemsCount()) {
            throw new NoSuchEntityException(__('Cart %1 doesn\'t contain products', $cartId));
        }

        $date = $scheduleData->getScheduleDeliveryDate();
        $timeSlot = $scheduleData->getScheduleDeliveryTimeSlot();

        try {
            // Usamos strip_tags para una limpieza básica de seguridad
            $quote->setData('schedule_delivery_date', strip_tags($date));
            $quote->setData('schedule_delivery_time_slot', strip_tags($timeSlot));
            $this->quoteRepository->save($quote);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__('Could not save schedule delivery information.'));
        }

        return true;
    }
}