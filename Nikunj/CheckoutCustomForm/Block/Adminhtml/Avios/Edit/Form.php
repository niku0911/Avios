<?php
/**
 * @package   Nikunj\CheckoutCustomForm
 * @author    Nikunj Patel <nikunjpatel443@gmail.com>
 * @copyright © 2019 Nikunj Patel
 * @license   See LICENSE file for license details.
 *
 */
namespace Nikunj\CheckoutCustomForm\Block\Adminhtml\Avios\Edit;


/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) 
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {

        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form', 
                            'enctype' => 'multipart/form-data', 
                            'action' => $this->getData('action'), 
                            'method' => 'post'
                        ]
            ]
        );

        $form->setHtmlIdPrefix('avgrid_');
        if ($model->getId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
        }

        $fieldset->addField(
            'order_id',
            'text',
            [
                'name' => 'order_id',
                'label' => __('Order ID'),
                'id' => 'order_id',
                'title' => __('Order ID'),
                'class' => 'required-entry',
                'disabled' => 'disabled',
            ]
        );

        $fieldset->addField(
            'avios_number',
            'text',
            [
                'name' => 'avios_number',
                'label' => __('Avios Number'),
                'id' => 'avios_number',
                'title' => __('Avios Number'),
                'class' => 'required-entry',
                'disabled' => 'disabled',
            ]
        );
        $fieldset->addField(
            'customer_name',
            'text',
            [
                'name' => 'customer_name',
                'label' => __('Customer Name'),
                'id' => 'customer_name',
                'title' => __('Customer Name'),
                'class' => 'required-entry',
                'disabled' => 'disabled',
            ]
        );
        $fieldset->addField(
            'address',
            'text',
            [
                'name' => 'address',
                'label' => __('Customer Address'),
                'id' => 'address',
                'title' => __('Customer Address'),
                'class' => 'required-entry',
                'disabled' => 'disabled',
            ]
        );
        $fieldset->addField(
            'grand_total',
            'text',
            [
                'name' => 'grand_total',
                'label' => __('Grand Total'),
                'id' => 'grand_total',
                'title' => __('Grand Total'),
                'class' => 'required-entry',
                'disabled' => 'disabled',
            ]
        );
        $fieldset->addField(
            'awarded_price',
            'text',
            [
                'name' => 'awarded_price',
                'label' => __('Awarded Price'),
                'id' => 'awarded_price',
                'title' => __('Awarded Price'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );


        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}