<?php
namespace Adnan\UIGrid\Controller\Adminhtml\Grid;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends Action
{
	protected $resultPageFactory;
	public function __construct(Context $context, PageFactory $resultPageFactory){
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}
	public function execute()
	{
		$this->_view->loadLayout();
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('Items Grid'));
		$resultPage->setActiveMenu('Adnan_UIGrid::gridList_name');
		// return $resultPage;
		$this->_view->renderLayout();
	}
	protected function _isAllowed()
	{
		return true;
	}
}