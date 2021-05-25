<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Model;

use Adnan\CustomerLogs\Api\CustomerActivityLogRepositoryInterface;
use Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterfaceFactory;
use Adnan\CustomerLogs\Api\Data\CustomerActivityLogSearchResultsInterfaceFactory;
use Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog as ResourceCustomerActivityLog;
use Adnan\CustomerLogs\Model\ResourceModel\CustomerActivityLog\CollectionFactory as CustomerActivityLogCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class CustomerActivityLogRepository implements CustomerActivityLogRepositoryInterface
{

    protected $customerActivityLogCollectionFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $dataCustomerActivityLogFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $customerActivityLogFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;


    /**
     * @param ResourceCustomerActivityLog $resource
     * @param CustomerActivityLogFactory $customerActivityLogFactory
     * @param CustomerActivityLogInterfaceFactory $dataCustomerActivityLogFactory
     * @param CustomerActivityLogCollectionFactory $customerActivityLogCollectionFactory
     * @param CustomerActivityLogSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceCustomerActivityLog $resource,
        CustomerActivityLogFactory $customerActivityLogFactory,
        CustomerActivityLogInterfaceFactory $dataCustomerActivityLogFactory,
        CustomerActivityLogCollectionFactory $customerActivityLogCollectionFactory,
        CustomerActivityLogSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->customerActivityLogFactory = $customerActivityLogFactory;
        $this->customerActivityLogCollectionFactory = $customerActivityLogCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataCustomerActivityLogFactory = $dataCustomerActivityLogFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface $customerActivityLog
    ) {
        /* if (empty($customerActivityLog->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $customerActivityLog->setStoreId($storeId);
        } */
        
        $customerActivityLogData = $this->extensibleDataObjectConverter->toNestedArray(
            $customerActivityLog,
            [],
            \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface::class
        );
        
        $customerActivityLogModel = $this->customerActivityLogFactory->create()->setData($customerActivityLogData);
        
        try {
            $this->resource->save($customerActivityLogModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the customerActivityLog: %1',
                $exception->getMessage()
            ));
        }
        return $customerActivityLogModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($customerActivityLogId)
    {
        $customerActivityLog = $this->customerActivityLogFactory->create();
        $this->resource->load($customerActivityLog, $customerActivityLogId);
        if (!$customerActivityLog->getId()) {
            throw new NoSuchEntityException(__('CustomerActivityLog with id "%1" does not exist.', $customerActivityLogId));
        }
        return $customerActivityLog->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customerActivityLogCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Adnan\CustomerLogs\Api\Data\CustomerActivityLogInterface $customerActivityLog
    ) {
        try {
            $customerActivityLogModel = $this->customerActivityLogFactory->create();
            $this->resource->load($customerActivityLogModel, $customerActivityLog->getCustomeractivitylogId());
            $this->resource->delete($customerActivityLogModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the CustomerActivityLog: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($customerActivityLogId)
    {
        return $this->delete($this->get($customerActivityLogId));
    }
}

