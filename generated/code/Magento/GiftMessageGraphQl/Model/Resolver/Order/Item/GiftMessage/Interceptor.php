<?php
namespace Magento\GiftMessageGraphQl\Model\Resolver\Order\Item\GiftMessage;

/**
 * Interceptor class for @see \Magento\GiftMessageGraphQl\Model\Resolver\Order\Item\GiftMessage
 */
class Interceptor extends \Magento\GiftMessageGraphQl\Model\Resolver\Order\Item\GiftMessage implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\GiftMessage\Api\OrderItemRepositoryInterface $orderItemRepository, \Magento\GiftMessageGraphQl\Model\Config\Messages $messagesConfig, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($orderItemRepository, $messagesConfig, $logger);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
