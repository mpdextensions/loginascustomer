<?php
/**
 * Mpdextensions
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mpdextensions.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mpdextensions.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mpdextensions
 * @package     Mpdextensions_LoginAsCustomer
 * @copyright   Copyright (c) Mpdextensions (https://www.mpdextensions.com/)
 * @license     https://www.mpdextensions.com/LICENSE.txt
 */

namespace Mpdextensions\LoginAsCustomer\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Class Log
 * @package Mpdextensions\LoginAsCustomer\Model\ResourceModel
 */
class Log extends AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('mpdextensions_login_as_customer', 'log_id');
    }
}