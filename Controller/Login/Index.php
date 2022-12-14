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

namespace MpdExtensions\LoginAsCustomer\Controller\Login;

use Exception;
use Magento\Checkout\Model\Cart;
use Magento\Customer\Model\Account\Redirect as AccountRedirect;
use Magento\Customer\Model\SessionFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\Forward;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\ResultInterface;
use MpdExtensions\LoginAsCustomer\Helper\Data;
use MpdExtensions\LoginAsCustomer\Model\LogFactory;

/**
 * Class Index
 * MpdExtensions\LoginAsCustomer\Controller\Login
 */
class Index extends Action
{
    /**
     * @var AccountRedirect
     */
    protected $accountRedirect;

    /**
     * @var SessionFactory
     */
    protected $session;

    /**
     * @var LogFactory
     */
    protected $_logFactory;

    /**
     * @var Cart
     */
    protected $checkoutCart;

    /**
     * @var Data
     */
    protected $helperData;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param SessionFactory $customerSession
     * @param AccountRedirect $accountRedirect
     * @param Cart $checkoutCart
     * @param Data $helper
     * @param LogFactory $logFactory
     */
    public function __construct(
        Context $context,
        SessionFactory $customerSession,
        AccountRedirect $accountRedirect,
        Cart $checkoutCart,
        Data $helper,
        LogFactory $logFactory
    ) {
        $this->session         = $customerSession;
        $this->accountRedirect = $accountRedirect;
        $this->checkoutCart    = $checkoutCart;
        $this->_logFactory     = $logFactory;
        $this->helperData      = $helper;

        parent::__construct($context);
    }

    /**
     * Execute Function
     *
     * @return ResponseInterface|Forward|Redirect|ResultInterface
     */
    public function execute()
    {
        $token   = $this->getRequest()->getParam('key');
        $session = $this->session->create();

        $log = $this->_logFactory->create()->load($token, 'token');
        if (!$log || !$log->getId() || $log->getIsLoggedIn() || !$this->helperData->isEnabled()) {
            return $this->_redirect('noRoute');
        }

        try {
            if ($session->isLoggedIn()) {
                $session->logout();
            } else {
                $this->checkoutCart->truncate()->save();
            }
        } catch (Exception $e) {
            $this->messageManager->addNoticeMessage(__('Cannot truncate cart items.'));
        }

        try {
            $session->loginById($log->getCustomerId());
            $session->regenerateId();

            $log->setIsLoggedIn(true)
                ->save();

            $redirectUrl = $this->accountRedirect->getRedirectCookie();
            if (!$this->helperData->getConfigValue('customer/startup/redirect_dashboard') && $redirectUrl) {
                $this->accountRedirect->clearRedirectCookie();
                $resultRedirect = $this->resultRedirectFactory->create();
                $resultRedirect->setUrl($this->_redirect->success($redirectUrl));

                return $resultRedirect;
            }
        } catch (Exception $e) {
            $this->messageManager->addError(
                __('An unspecified error occurred. Please contact us for assistance.')
            );
        }

        return $this->accountRedirect->getRedirect();
    }
}
