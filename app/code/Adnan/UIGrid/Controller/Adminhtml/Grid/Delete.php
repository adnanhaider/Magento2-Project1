<?php
namespace Adnan\UIGrid\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Adnan\UIGrid\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;



/**
 * Class MassDisable
 */
class Delete  extends \Magento\Backend\App\Action
{
    /**
     * @var Filter
     */
    protected $filter;

    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;
    // protected $resultuserFactory;


    /**
     * @param Context $context
     * @param Filter $filter
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(Context $context, Filter $filter, CollectionFactory $collectionFactory)
    {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        // die('~');
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        $recordDeleted = 0;
        foreach ($collection as $item) {
            $deleteItem = $this->_objectManager->get('\Adnan\UIGrid\Model\Item')->load($item->getId());
            $deleteItem->delete();
            $recordDeleted++;
        }
        $this->messageManager->addSuccess(__('A total of %1 record(s) have been deleted.', $recordDeleted));
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}