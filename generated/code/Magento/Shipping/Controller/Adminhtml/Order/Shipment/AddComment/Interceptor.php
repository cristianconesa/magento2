<?php
namespace Magento\Shipping\Controller\Adminhtml\Order\Shipment\AddComment;

/**
 * Interceptor class for @see \Magento\Shipping\Controller\Adminhtml\Order\Shipment\AddComment
 */
class Interceptor extends \Magento\Shipping\Controller\Adminhtml\Order\Shipment\AddComment implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Shipping\Controller\Adminhtml\Order\ShipmentLoader $shipmentLoader, \Magento\Sales\Model\Order\Email\Sender\ShipmentCommentSender $shipmentCommentSender, \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory, ?\Magento\Sales\Model\Order\Shipment\Comment $shipmentComment = null, ?\Magento\Sales\Model\ResourceModel\Order\Shipment\Comment $shipmentCommentResource = null)
    {
        $this->___init();
        parent::__construct($context, $shipmentLoader, $shipmentCommentSender, $resultLayoutFactory, $shipmentComment, $shipmentCommentResource);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
