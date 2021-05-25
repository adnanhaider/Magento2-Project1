<?php
declare(strict_types=1);

namespace Adnan\CustomerLogs\Plugin;
use Magento\Framework\View\Result\PageFactory;


use Magento\Framework\Controller\ResultFactory;


class SaveOrderPlugin
{
    protected $customerLog;
    protected $orderRepository;
    protected $_resultPageFactory;


    /**
    * Construct
    *
    * @param \Magento\Framework\View\Element\Template\Context $context
    * @param \Magento\Customer\Model\Session $customerSession
    * @param array $data
    */    

    public function __construct(
        PageFactory $resultPageFactory,
        \Adnan\CustomerLogs\Model\CustomerActivityLogFactory $customerActivityLogFactory,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        array $data = []
    ) {
        $this->_resultPageFactory = $resultPageFactory;

        $this->customerLog = $customerActivityLogFactory;
        $this->orderRepository = $orderRepository;
    }
    
    public function afterExecute(\Magento\Checkout\Controller\Onepage\Success\Interceptor $subject) {
        $last_order_id = $subject->getOnepage()->getCheckout()->getData('last_order_id');
        // $last_quote_id = $subject->getOnepage()->getCheckout()->getData('last_quote_id');
        
        $order = $this->orderRepository->get($last_order_id);
        $model = $this->customerLog->create();
        $model->addData([
            "order_id" => $last_order_id,
            "created_at" => $order->getData('created_at'),
            "customer_email" =>$order->getCustomerEmail()
            ]);
        $saveData = $model->save();
        if($saveData)
            return $this->_resultPageFactory->create();
        
    }
}

