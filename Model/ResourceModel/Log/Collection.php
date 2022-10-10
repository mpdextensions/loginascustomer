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

namespace Mpdextensions\LoginAsCustomer\Model\ResourceModel\Log;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Mpdextensions\LoginAsCustomer\Model\ResourceModel\Log;

/**
 * Class Collection
 * @package Mpdextensions\LoginAsCustomer\Model\ResourceModel\Log
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'log_id';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'mp_loc_log_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'log_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Mpdextensions\LoginAsCustomer\Model\Log::class, Log::class);
    }
}
