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
 
class UpgradeSchema implements UpgradeDataInterface
{
	 
	 public function upgrade( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
	 }
}