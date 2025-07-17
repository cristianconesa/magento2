<?php
/**
 * Conesa/ScheduleDelivery/Api/ScheduleDeliveryManagementInterface.php
 */
namespace Conesa\ScheduleDelivery\Api;

/**
 * Interface for managing scheduled delivery information.
 * @api
 */
interface ScheduleDeliveryManagementInterface
{
    /**
     * Save schedule delivery information.
     *
     * @param int $cartId The cart ID.
     * @param \Conesa\ScheduleDelivery\Api\Data\ScheduleDataInterface $scheduleData
     * @return bool
     */
    public function saveScheduleDelivery(
        $cartId,
        \Conesa\ScheduleDelivery\Api\Data\ScheduleDataInterface $scheduleData
    );
}