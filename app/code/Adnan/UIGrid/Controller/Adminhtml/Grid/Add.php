<?php
namespace Adnan\UIGrid\Controller\Adminhtml\Grid;
 
use Magento\Framework\Controller\ResultFactory;
 
class Add extends \Magento\Backend\App\Action
{
    /**
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        $this->_view->loadLayout();
		$this->_view->renderLayout();
    }
}