<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Model;

use Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface;
use Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class CustomerActivityLog extends \Magento\Framework\Model\AbstractModel
{

    protected $dataObjectHelper;

    protected $_eventPrefix = 'adnan_customerlogs_customeractivitylog';
    protected $customeractivitylogDataFactory;


    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param CustomerActivityLogInterfaceFactory $customeractivitylogDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog $resource
     * @param \Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        CustomerActivityLogInterfaceFactory $customeractivitylogDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog $resource,
        \Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog\Collection $resourceCollection,
        array $data = []
    ) {
        $this->customeractivitylogDataFactory = $customeractivitylogDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve customeractivitylog model with customeractivitylog data
     * @return CustomerActivityLogInterface
     */
    public function getDataModel()
    {
        $customeractivitylogData = $this->getData();
        
        $customeractivitylogDataObject = $this->customeractivitylogDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $customeractivitylogDataObject,
            $customeractivitylogData,
            CustomerActivityLogInterface::class
        );
        
        return $customeractivitylogDataObject;
    }
}

