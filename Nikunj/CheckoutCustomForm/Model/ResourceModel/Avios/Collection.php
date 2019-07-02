<?php
/**
 *
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */

declare(strict_types=1);

namespace Nikunj\CheckoutCustomForm\Model\ResourceModel\Avios;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'avios_data_collection';
	protected $_eventObject = 'avios_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Nikunj\CheckoutCustomForm\Model\Avios', 'Nikunj\CheckoutCustomForm\Model\ResourceModel\Avios');
	}

}
