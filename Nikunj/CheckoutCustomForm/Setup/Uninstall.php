<?php
/**
 * Uninstall checkout custom data
 *
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;
use Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class Uninstall
 *
 * @category Uninstall
 * @package  Nikunj\CheckoutCustomForm\Setup
 */
class Uninstall implements UninstallInterface
{
    /**
     * SchemaSetupInterface
     *
     * @var SchemaSetupInterface
     */
    protected $setup;

    /**
     * Uninstall data
     *
     * @param SchemaSetupInterface   $setup   SchemaSetupInterface
     * @param ModuleContextInterface $context ModuleContextInterface
     *
     * @return void
     */
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->setup = $setup->startSetup();
        $this->uninstallQuoteData();
        $this->uninstallSalesData();
        $this->setup = $setup->endSetup();
    }

    /**
     * Uninstall quote custom data
     *
     * @return void
     */
    public function uninstallQuoteData()
    {
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('quote'),
            CustomFieldsInterface::CHECKOUT_AVIOS_NUMBER
        );
    }

    /**
     * Uninstall sales custom data
     *
     * @return void
     */
    public function uninstallSalesData()
    {
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('sales_order'),
            CustomFieldsInterface::CHECKOUT_AVIOS_NUMBER
        );
    }
}
