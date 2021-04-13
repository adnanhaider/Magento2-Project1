<?php
namespace Adnan\UIGrid\Controller\Adminhtml\Grid;
 
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;
use Adnan\UIGrid\Model\ItemFactory;

 
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;
    private $_itemFactory;
    public function __construct(
        Context $context,
        PageFactory $rawFactory,
        ItemFactory $itemFactory
    )
    {
        $this->pageFactory = $rawFactory;
        $this->_itemFactory = $itemFactory;
        parent::__construct($context);
    }
    
    public function execute()
    {
        return $this->pageFactory->create();
        
    }
}