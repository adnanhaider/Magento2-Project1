<?php
namespace Adnan\UIGrid\Cron;

use Adnan\UIGrid\Model\ItemFactory;

class AddItem
{
    protected $resultPageFactory;
    protected $stockState;
    protected $_stockRegistry;

    private $itemFactory;
    
    public function __construct(
        ItemFactory $itemFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\CatalogInventory\Api\StockStateInterface $stockState,
        \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry
    ) {
        $this->itemFactory = $itemFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->stockState = $stockState;
        $this->_stockRegistry = $stockRegistry;
    }

    public function execute()
    {
        $collection = $this->_productCollectionFactory->create()->addAttributeToSelect('*');
        $data = $collection->getData();
        foreach ($data as $product) {

            $stocksQty = $this->stockState->getStockQty($product['entity_id'], '1');
            $stockItem = $this->_stockRegistry->getStockItem($product['entity_id']);
            $stockItem->setData('qty', $stocksQty + 10);
            $stockItem->save();
        }
    }
}
