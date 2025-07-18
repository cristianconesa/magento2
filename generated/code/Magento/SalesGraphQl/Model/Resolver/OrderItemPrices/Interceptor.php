<?php
namespace Magento\SalesGraphQl\Model\Resolver\OrderItemPrices;

/**
 * Interceptor class for @see \Magento\SalesGraphQl\Model\Resolver\OrderItemPrices
 */
class Interceptor extends \Magento\SalesGraphQl\Model\Resolver\OrderItemPrices implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\SalesGraphQl\Model\OrderItemPrices\PricesProvider $pricesProvider)
    {
        $this->___init();
        parent::__construct($pricesProvider);
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
