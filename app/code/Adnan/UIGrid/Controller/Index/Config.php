<?php

namespace Adnan\UIGrid\Controller\Index;
use Magento\Framework\Controller\ResultFactory;


class Config extends \Magento\Framework\App\Action\Action
{

	protected $helperData;
    protected $_resultPageFactory;
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
		\Adnan\UIGrid\Helper\Data $helperData
	)
	{
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $pageFactory;
		$this->helperData = $helperData;
		return parent::__construct($context);
	}

	public function execute()
	{
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
	}
}