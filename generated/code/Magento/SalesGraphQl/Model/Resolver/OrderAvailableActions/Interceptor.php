<?php
namespace Magento\SalesGraphQl\Model\Resolver\OrderAvailableActions;

/**
 * Interceptor class for @see \Magento\SalesGraphQl\Model\Resolver\OrderAvailableActions
 */
class Interceptor extends \Magento\SalesGraphQl\Model\Resolver\OrderAvailableActions implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\SalesGraphQl\Model\GetOrderAvailableActions $orderAvailableActionProvider)
    {
        $this->___init();
        parent::__construct($orderAvailableActionProvider);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve(\Magento\Framework\GraphQl\Config\Element\Field $field, $context, \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info, ?array $value = null, ?array $args = null) : array
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve($field, $context, $info, $value, $args);
    }
}
