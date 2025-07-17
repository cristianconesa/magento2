<?php
/**
 * Conesa/ScheduleDelivery/Model/Data/ScheduleData.php
 */
namespace Conesa\ScheduleDelivery\Model\Data;

use Magento\Framework\Api\AbstractSimpleObject;
use Conesa\ScheduleDelivery\Api\Data\ScheduleDataInterface;

class ScheduleData extends AbstractSimpleObject implements ScheduleDataInterface
{
    /**
     * @inheritDoc
     */
    public function getScheduleDeliveryDate()
    {
        return $this->_get(self::DATE);
    }

    /**
     * @inheritDoc
     */
    public function setScheduleDeliveryDate($date)
    {
        return $this->setData(self::DATE, $date);
    }

    /**
     * @inheritDoc
     */
    public function getScheduleDeliveryTimeSlot()
    {
        return $this->_get(self::TIME_SLOT);
    }

    /**
     * @inheritDoc
     */
    public function setScheduleDeliveryTimeSlot($timeSlot)
    {
        return $this->setData(self::TIME_SLOT, $timeSlot);
    }
}