<?php

namespace Adnan\UIGrid\Controller\Adminhtml\Grid;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Adnan\UIGrid\Model\ItemFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Save extends Action
{
    protected $resultPageFactory;
    protected $extensionFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        ItemFactory $extensionFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->extensionFactory = $extensionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $model = $this->extensionFactory->create();
                $model->setData($data)->save();
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        // $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('uigrid/grid/index');

        // $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        // return $resultRedirect;

    }
}