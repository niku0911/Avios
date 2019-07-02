<?php
/**
 * Checkout custom fields guest repository interface
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
 * Interface CustomFieldsGuestRepositoryInterface
 *
 * @category Api/Interface
 * @package  Nikunj\CheckoutCustomForm\Api
 */
interface CustomFieldsGuestRepositoryInterface
{
    /**
     * Save checkout custom fields
     *
     * @param string  $cartId Guest Cart id
     * @param \Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface $customFields Custom fields
     *
     * @return \Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface
     */
    public function saveCustomFields(
        string $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface;
}
