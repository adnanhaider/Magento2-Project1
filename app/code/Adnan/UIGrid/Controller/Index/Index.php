<?php
namespace Adnan\UIGrid\Controller\Frontend\Index;

use Magento\Framework\App\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory; 


use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;
    protected $stockState;
    protected $stock;
    protected $_productCollectionFactory;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $rawFactory
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory,
        CollectionFactory $productCollectionFactory,
        \Magento\CatalogInventory\Api\StockRegistryInterface  $stock,
        \Magento\InventoryApi\Api\StockRepositoryInterface $productStockRepository
    ) {
        
        $this->stock = $stock;
        $this->pageFactory = $rawFactory;
        $this->_productCollectionFactory = $productCollectionFactory; 
        parent::__construct($context);
    }

    /**
     * Add the main Admin Grid page
     *
     * @return Page
     */
    public function execute(): Page
    {
        $collection = $this->_productCollectionFactory->create()->addAttributeToSelect('*');
        $data = $collection->getData();
        die($data);
        foreach ($data as $product) {
            $oldQty = $this->stock->getStockItem($product['entity_id'])->getQty();
            $newQty = $this->stock->getStockItem($product['entity_id'])->setData('qty', $oldQty + 10);
            $newQty->save();
            // die($oldQty);
        }
    }
}
