<?php
/**
 * Conesa/ScheduleDelivery/Block/Adminhtml/Order/View/ScheduleInfo.php
 */
namespace Conesa\ScheduleDelivery\Block\Adminhtml\Order\View;

use Magento\Backend\Block\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Sales\Api\Data\OrderInterface;

class ScheduleInfo extends Template
{
    /**
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve current order instance
     *
     * @return OrderInterface
     */
    public function getOrder()
    {
        return $this->coreRegistry->registry('current_order');
    }
}