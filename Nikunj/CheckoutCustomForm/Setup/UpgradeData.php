<?php
/**
 * Upgrade custom checkout Data
 *
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Setup;
 
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
 
class UpgradeData implements UpgradeDataInterface
{
	 
	 public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
		if ( version_compare($context->getVersion(), '1.1.5', '<' )) {
			$installer = $setup;
			$installer->startSetup();
			if (!$installer->tableExists('avios_data')) {
				$table = $installer->getConnection()->newTable(
					$installer->getTable('avios_data')
				)
					->addColumn(
						'id',
						\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
						null,
						[
							'identity' => true,
							'nullable' => false,
							'primary'  => true,
							'unsigned' => true,
						],
						'Avios ID'
					)
					->addColumn(
						'order_id',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						['nullable => false'],
						'Order Id'
					)
					->addColumn(
						'avios_number',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Avios Number'
					)
					->addColumn(
						'customer_name',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Customer Name'
					)
					->addColumn(
						'address',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Address'
					)
					->addColumn(
						'grand_total',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Grand Total'
					)
					->addColumn(
						'awarded_price',
						\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
						255,
						[],
						'Awarded Price'
					)
					->addColumn(
						'created_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
						'Created At'
					)->addColumn(
						'updated_at',
						\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
						null,
						['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
						'Updated At')
					->setComment('Avios Table');
				$installer->getConnection()->createTable($table);

			}
			$installer->endSetup();
		 }
	 }
}