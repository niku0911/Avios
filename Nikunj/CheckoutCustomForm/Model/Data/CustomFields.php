<?php
/**
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class CustomFields
 *
 * @category Model/Data
 * @package  Nikunj\CheckoutCustomForm\Model\Data
 */
class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{
    /**
     * Get checkout Avios Number
     *
     * @return string|null
     */
    public function getCheckoutAviosNumber()
    {
        return $this->_get(self::CHECKOUT_AVIOS_NUMBER);
    }


    /**
     * Set checkout Avios Number
     *
     * @param string|null $checkoutAviosNumber Avios Number
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutAviosNumber(string $checkoutAviosNumber = null)
    {
        return $this->setData(self::CHECKOUT_AVIOS_NUMBER, $checkoutAviosNumber);
    }

}
