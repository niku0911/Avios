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
 * Class AddCustomFieldsToAvios
 *
 * @category Observer
 * @package  Nikunj\CheckoutCustomForm\Observer
 */
class AddCustomFieldsToAvios implements ObserverInterface
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
        // $quote = $observer->getEvent()->getQuote();
		$avios_number 	= $order->getData(CustomFieldsInterface::CHECKOUT_AVIOS_NUMBER);

		$data = array();
		if($avios_number)
		{
			if($order->getGrandTotal())
			{
				$grandTotal = $order->getGrandTotal();
				$data['grand_total'] = $grandTotal;
			}
			if($order->getBillingAddress()->getData('street'))
			{
				$street1 =	$order->getBillingAddress()->getStreet(1);
				$street2 = $order->getBillingAddress()->getStreet(2);
				$data['address'] = $order->getBillingAddress()->getData('street');
			}
			if($order->getBillingAddress()->getData('firstname'))
			{
				$firstname = $order->getBillingAddress()->getData('firstname');
				$lastname = $order->getBillingAddress()->getData('lastname');
				$data['customer_name'] = $firstname.' '.$lastname;
			}
			
			$data['order_id'] = $order->getIncrementId();
			$data['avios_number'] = $avios_number;
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$aviosModel = $objectManager->create('\Nikunj\CheckoutCustomForm\Model\Avios');
			$aviosModel->setData($data);
			$aviosModel->save();
		}
    }
}
