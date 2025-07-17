<?php
/**
 * Conesa/ScheduleDelivery/Setup/UpgradeData.php
 *
 * @category  Conesa
 * @package   Conesa_ScheduleDelivery
 * @author    Tu Nombre
 */

namespace Conesa\ScheduleDelivery\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * Upgrades data for the module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            $this->addScheduleDeliveryColumnsToOrderGrid($setup);
        }

        $setup->endSetup();
    }

    /**
     * Add schedule delivery columns to sales_order_grid table
     *
     * @param ModuleDataSetupInterface $setup
     * @return void
     */
    private function addScheduleDeliveryColumnsToOrderGrid(ModuleDataSetupInterface $setup)
    {
        $connection = $setup->getConnection();
        $tableName = $setup->getTable('sales_order_grid');

        // Check if table exists
        if ($connection->isTableExists($tableName)) {
            // Add schedule_delivery_date column if it doesn't exist
            if (!$connection->tableColumnExists($tableName, 'schedule_delivery_date')) {
                $connection->addColumn(
                    $tableName,
                    'schedule_delivery_date',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Scheduled Delivery Date'
                    ]
                );
            }

            // Add schedule_delivery_time_slot column if it doesn't exist
            if (!$connection->tableColumnExists($tableName, 'schedule_delivery_time_slot')) {
                $connection->addColumn(
                    $tableName,
                    'schedule_delivery_time_slot',
                    [
                        'type' => Table::TYPE_TEXT,
                        'length' => 255,
                        'nullable' => true,
                        'comment' => 'Scheduled Delivery Time Slot'
                    ]
                );
            }
        }
    }
}