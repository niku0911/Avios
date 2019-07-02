<?php

/**
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 */
 
namespace Nikunj\CheckoutCustomForm\Controller\Adminhtml\Avios;

class Save extends \Magento\Backend\App\Action
{

    /**
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('nikunj_checkoutcustomform/avios/index');
            return;
        }
        try {
            // $rowData = $this->gridFactory->create();
			$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
			$rowData = $objectManager->create('\Nikunj\CheckoutCustomForm\Model\Avios');
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Row data has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('nikunj_checkoutcustomform/avios/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Nikunj_CheckoutCustomForm::save');
    }
}