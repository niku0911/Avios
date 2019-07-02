<?php
/**
 * Checkout custom fields interface
 *
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Api\Data;

/**
 * Interface CustomFieldsInterface
 *
 * @category Api/Data/Interface
 * @package  Nikunj\CheckoutCustomForm\Api\Data
 */
interface CustomFieldsInterface
{
    const CHECKOUT_AVIOS_NUMBER = 'checkout_avios_number';

    /**
     * Get Avios Number
     *
     * @return string|null
     */
    public function getCheckoutAviosNumber();

    /**
     * Set checkout Avios Number
     *
     * @param string|null $checkoutAviosNumber Avios Number
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutAviosNumber(string $checkoutAviosNumber = null);

}
