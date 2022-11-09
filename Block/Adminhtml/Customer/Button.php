<?php
/**
 * MpdExtensions
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the mpdextensions.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mpdextensions.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    MpdExtensions
 * @package     MpdExtensions_LoginAsCustomer
 * @copyright   Copyright (c) MpdExtensions (https://www.mpdextensions.com/)
 * @license     https://www.mpdextensions.com/LICENSE.txt
 */

namespace MpdExtensions\LoginAsCustomer\Block\Adminhtml\Customer;

use Magento\Backend\Block\Widget\Context;
use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\Registry;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;
use MpdExtensions\LoginAsCustomer\Helper\Data;

/**
 * Class Button
 * Button class for customer in admin
 */
class Button extends GenericButton implements ButtonProviderInterface
{
    /**
     * @var Data
     */
    protected $_helper;

    /**
     * Button constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param Data $helper
     */
    public function __construct(
        Context $context,
        Registry $registry,
        Data $helper
    ) {
        $this->_helper = $helper;

        parent::__construct($context, $registry);
    }

    /**
     * Get Button Data
     *
     * @return array
     */
    public function getButtonData()
    {
        $customerId = $this->getCustomerId();
        $data       = [];
        if ($customerId && $this->_helper->isAllowLogin()) {
            $data = [
                'label'      => __('Login as Customer'),
                'class'      => 'login-as-customer',
                'on_click'   => sprintf("window.open('%s');", $this->getLoginUrl()),
                'sort_order' => 100,
            ];
        }

        return $data;
    }

    /**
     * Get Login URL
     *
     * @return string
     */
    public function getLoginUrl()
    {
        return $this->getUrl('mploginascustomer/login/index', ['id' => $this->getCustomerId()]);
    }
}
