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

namespace MpdExtensions\LoginAsCustomer\Plugin;

use Magento\Sales\Block\Adminhtml\Order\View;
use MpdExtensions\LoginAsCustomer\Helper\Data;

/**
 * Class AddButton
 * Add button plugin class
 */
class AddButton
{
    /**
     * @var Data
     */
    protected $helper;

    /**
     * AddButton constructor.
     *
     * @param Data $helper
     */
    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * Before Get Back Url
     *
     * @param View $subject
     */
    public function beforeGetBackUrl(View $subject)
    {
        $customerId = $subject->getOrder()->getCustomerId();
        if ($customerId && $this->helper->isAllowLogin()) {
            $subject->addButton('login_as_customer', [
                'label'    => __('Login as Customer'),
                'class'    => 'login-as-customer',
                'on_click' => sprintf(
                    "window.open('%s');",
                    $subject->getUrl('mploginascustomer/login/index', ['id' => $customerId])
                )
            ], 60);
        }
    }
}
