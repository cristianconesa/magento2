<?php
/**
 * Conesa/ScheduleDelivery/Api/Data/ScheduleDataInterface.php
 */
namespace Conesa\ScheduleDelivery\Api\Data;

interface ScheduleDataInterface
{
    const DATE = 'schedule_delivery_date';
    const TIME_SLOT = 'schedule_delivery_time_slot';

    /**
     * @return string|null
     */
    public function getScheduleDeliveryDate();

    /**
     * @param string $date
     * @return $this
     */
    public function setScheduleDeliveryDate($date);

    /**
     * @return string|null
     */
    public function getScheduleDeliveryTimeSlot();

    /**
     * @param string $timeSlot
     * @return $this
     */
    public function setScheduleDeliveryTimeSlot($timeSlot);
}
