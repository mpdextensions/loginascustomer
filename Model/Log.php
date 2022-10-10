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

namespace Mpdextensions\LoginAsCustomer\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Log
 * @package Mpdextensions\LoginAsCustomer\Model
 */
class Log extends AbstractModel implements IdentityInterface
{
    /**
     * Cache tag
     */
    const CACHE_TAG = 'loc_log';

    /**#@-*/
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'mp_loc_log';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Log::class);
    }

    /**
     * Get identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), self::CACHE_TAG . '_' . $this->getIdentifier()];
    }
}
