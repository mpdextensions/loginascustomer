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

namespace Mpdextensions\LoginAsCustomer\Ui\Component\Listing\Columns;

use Exception;
use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;

/**
 * Class Customer
 * @package Mpdextensions\LoginAsCustomer\Ui\Component\Listing\Columns
 */
class Customer extends Column
{
    /**
     * @var CustomerRepository
     */
    protected $customerRepository;

    /**
     * Customer constructor.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param CustomerRepository $customerRepository
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CustomerRepository $customerRepository,
        array $components = [],
        array $data = []
    ) {
        $this->customerRepository = $customerRepository;

        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $customerId = $item['customer_id'];
                try {
                    $customer            = $this->customerRepository->getById($customerId);
                    $item['customer_id'] = $customer->getFirstname() . ' ' .
                        $customer->getLastname() . ' <' . $customer->getEmail() . '>';
                } catch (Exception $e) {
                    $item['customer_id'] = $item['customer_name'] . ' <' . $item['customer_email']
                        . '> Note: Customer\'s account has been deleted.';
                }

            }
        }

        return $dataSource;
    }
}