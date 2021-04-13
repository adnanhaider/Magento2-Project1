<?php
namespace Adnan\Grid\Controller\Adminhtml\Grid;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
class Index extends Action
{
	protected $resultPageFactory;
	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}
	public function execute()
	{
		$this->_view->loadLayout();
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend(__('Items Grid'));
		$resultPage->setActiveMenu('Adnan_Grid::gridList_name');
		$resultPage->addBreadcrumb(__('Grid Name Process'), __('Grid Name List'));
		$this->_addContent($this->_view->getLayout()->createBlock('Adnan\Grid\Block\Adminhtml\Grid\Grid'));
		$this->_view->renderLayout();
	}
	protected function _isAllowed()
	{
		return true;
	}
}