<?php
/**
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Nikunj\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class AddCustomFieldsToOrder
 *
 * @category Observer
 * @package  Nikunj\CheckoutCustomForm\Observer
 */
class AddCustomFieldsToOrder implements ObserverInterface
{
    /**
     * Execute observer method.
     *
     * @param Observer $observer Observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();
		$avios_number 	= $quote->getData(CustomFieldsInterface::CHECKOUT_AVIOS_NUMBER);

        $order->setData(
            CustomFieldsInterface::CHECKOUT_AVIOS_NUMBER,
            $avios_number
        );
		$data = array();
		// if($avios_number)
		// {
			// if(isset($quote->getGrandTotal()))
			// {
				// $grandTotal = $quote->getGrandTotal();
				// $data['grand_total'] = $grandTotal;
			// }
			// if(isset($quote->getBillingAddress()))
			// {
				// $billingAddress = $quote->getBillingAddress();
				// $data['address'] = $billingAddress;
			// }
			// if(isset($quote->getCustomerFirstname()))
			// {
				// $lastname = $quote->getCustomerLastname();
				// $firstname = $quote->getCustomerFirstname();
				// $data['customer_name'] = $firstname.' '.$lastname;
			// }
			
			// $data['order_id'] = $quote->getReservedOrderId();
			// $data['avios_number'] = $avios_number;
			// $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			// $aviosModel = $objectManager->create('\Nikunj\CheckoutCustomForm\Model\Avios');
			// $aviosModel->setData($data);
			// $aviosModel->save();
		// }
    }
}
