<?php

namespace Adnan\CustomerLogs\Block\Adminhtml\Customeredit\Tab;

class View extends \Magento\Backend\Block\Template implements \Magento\Ui\Component\Layout\Tabs\TabInterface
{
    protected $_template = 'customeredit/tab/view.phtml';//your template file path
    protected $request;
    protected $customerLog;
    protected $orderRepository;
    protected $_customerFactory;

    public function __construct(
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Sales\Api\OrderRepositoryInterface $orderRepository,
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Adnan\CustomerLogs\Model\CustomerActivityLogFactory $customerActivityLogFactory,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        array $data = []
    ) {
        $this->_customerFactory = $customerFactory;
        $this->request = $request;
        $this->customerLog = $customerActivityLogFactory;
        $this->_coreRegistry = $registry;
        $this->orderRepository = $orderRepository;
        parent::__construct($context, $data);
    }

    
    public function getCustomerId()
    {
        return $this->_coreRegistry->registry(\Magento\Customer\Controller\RegistryConstants::CURRENT_CUSTOMER_ID);
    }
    public function getTabLabel()
    {
        return __('Activity Log');
    }
    public function getTabTitle()
    {
        return __('Activity Log');
    }

    public function canShowTab()
    {
        if ($this->getCustomerId()) {
            return true;
        }
        return false;
    }
    public function isHidden()
    {
        if ($this->getCustomerId()) {
            return false;
        }
        return true;
    }
    public function getTabClass()
    {
        return '';
    }

    public function getTabUrl()
    {
        return '';
    }
    public function isAjaxLoaded()
    {
        return false;
    }
    public function get_inc_id($id){
        $order = $this->orderRepository->get($id);
        return $order->getIncrementId();
    }
    public function getOrderedProducts($id)
    {
        $order = $this->orderRepository->get($id);
        $products = $order->getAllItems();

        // var_dump($products[2]->getData()['product_id']);
        // die();
        // $json
        $asscArr = [];
        $arr = [];
        foreach($products as $item){
            // $asscArr['product_id'] = $item->getData()['product_id']; 
            // $asscArr['name'] = $item->getData()['name']; 
            // $asscArr['qty_ordered'] = $item->getData()['qty_ordered']; 
            // $asscArr['price'] = $item->getData()['price']; 
            array_push($arr, $item->getData()['name']);
            // var_dump($item->getData());
        }
        // die();
        return implode(', ', $arr);
        // return json_encode($arr);
        // foreach($products as $product){
        //     var_dump($product->getData());
        // }

    }
    public function get_Data(){
        
        $id = $this->request->getParam('id');
        $customer = $this->_customerFactory->create()->load($id);
        $customLogs = $this->customerLog->create()->getCollection();//->addFieldToFilter("id", ['eq' => 13])->load();
        // echo '<pre/>';
        // var_dump($customLogs->getData()[0]['order_id']);
        // die();  
        // $order = $this->orderRepository->get($customLogs['order_id']);
        // echo '<pre/>';
        // print_r($customer->getEmail());
        // die();
        $filteredOrders = $customLogs->addFieldToFilter('customer_email',['eq' => $customer->getEmail()]);
        // var_dump($d['customer_email']);
        // var_dump($filteredOrders->getIncrementId());
        // foreach($customLogs as $d){
        // }
        // die();
        // $incrementId = $order->getIncrementId();
        // var_dump($incrementId);
        // die();
        // echo '<pre>';
        // $arr = $this->getOrderedProducts($id);
        //     foreach($arr as $a){
        //         var_dump(json_decode($a['product_id']));
        //     }
        // die();
        return $filteredOrders->getData();//;, $incrementId];
    }
}