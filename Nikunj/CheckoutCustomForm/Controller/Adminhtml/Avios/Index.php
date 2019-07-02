<?php
/**
 *
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */
 
namespace Nikunj\CheckoutCustomForm\Controller\Adminhtml\Avios;

class Index extends \Magento\Backend\App\Action
{
	protected $resultPageFactory = false;

	public function __construct(
		\Magento\Backend\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Nikunj_CheckoutCustomForm::avios_menu');
		$resultPage->getConfig()->getTitle()->prepend((__('Avios')));

		return $resultPage;
	}
    /**
     * Check Grid List Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Nikunj_CheckoutCustomForm::avios_menu');
    }


}