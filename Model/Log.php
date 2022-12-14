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

namespace MpdExtensions\LoginAsCustomer\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;

/**
 * Class Log
 * MpdExtensions\LoginAsCustomer\Model
 */
class Log extends AbstractModel implements IdentityInterface
{
    const CACHE_TAG = 'loc_log';

    /**
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * @var string
     */
    protected $_eventPrefix = 'mp_loc_log';

    /**
     * Contructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\Log::class);
    }

    /**
     * Get Identities
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId(), self::CACHE_TAG . '_' . $this->getIdentifier()];
    }
}
