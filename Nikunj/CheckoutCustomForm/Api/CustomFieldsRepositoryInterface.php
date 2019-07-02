<?php
/**
 * Checkout custom fields repository interface
 *
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Api;

use Magento\Sales\Model\Order;
use Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Interface CustomFieldsRepositoryInterface
 *
 * @category Api/Interface
 * @package  Nikunj\CheckoutCustomForm\Api
 */
interface CustomFieldsRepositoryInterface
{
    /**
     * Save checkout custom fields
     *
     * @param int                                                      $cartId       Cart id
     * @param \Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface $customFields Custom fields
     *
     * @return \Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        int $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface;

    /**
     * Get checkoug custom fields
     *
     * @param Order $order Order
     *
     * @return CustomFieldsInterface
     */
    public function getCustomFields(Order $order) : CustomFieldsInterface;
}
