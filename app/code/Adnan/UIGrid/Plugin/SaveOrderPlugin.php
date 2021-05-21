<?php

namespace Adnan\UIGrid\Plugin;

use \Magento\Framework\Event\ObserverInterface;
// use \Magento\Framework\Event\Observer;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\ObjectManagerInterface;
use \Magento\Checkout\Model\Session as CheckoutSession;

class SaveOrderPlugin {

    protected $messageManager;
    protected $scopeConfig;
    protected $checkoutSession;
    protected $logger;
    protected $_coreSession;
    protected $_customerRepositoryInterface;
    protected $order;

    public function __construct(
        ManagerInterface $messageManager,
        \Magento\Sales\Model\Order $order,
        ScopeConfigInterface $scopeConfig,
        ObjectManagerInterface $objectmanager,
        CheckoutSession $checkoutSession,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Session\SessionManagerInterface $coreSession,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
    ){
        $this->messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
        $this->_objectManager = $objectmanager;
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
        $this->_coreSession = $coreSession;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->order = $order;
    }

    public function afterExecute(\Magento\Checkout\Controller\Onepage\Success\Interceptor $subject)
    {
        $order = $observer->getEvent()->getOrder();
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        $store_id = $storeManager->getStore()->getStoreId();
        $this->logger->debug("storeid==>".$store_id."<");
        
        
        // shipping address
        $shippingAddress = $order->getShippingAddress(); 
        $city = $shippingAddress->getCity();
        $country = $shippingAddress->getCountryId();
        $this->logger->debug("shippingAddress=>".$country."<");
        $this->logger->degub("shippingAddress=>".$city."<");
        echo 'hello world from save order plugin';
        die(' 0123 ');

        // $last_order_id = $subject->getOnepage()->getCheckout()->getData('last_order_id');
        // $last_quote_id = $subject->getOnepage()->getCheckout()->getData('last_quote_id');
        // $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        // $order = $objectManager->create('Magento\Sales\Model\Order')->load($last_order_id);
        // $quote = $objectManager->create('Magento\Quote\Model\Quote')->loadByIdWithoutStore($last_quote_id);
        // echo "<pre>";
        // $items = $order->getAllItems();
        // // var_dump();
        // // die();
        // $custFirstName= $order->getCustomerFirstname();
        // $custLastName= $order->getCustomerLastname();
        // $product_id= $quote->getProduct();
        
        
        // $last_order = $this->order->getOrder($last_order_id);
        
        // var_dump($subject->getOnepage()->getCheckout()->getData());die(';');
        // $string_subject = json_encode($subject);
        // var_dump($string_subject);
        // $array = json_decode($string_subject, true);
        // var_dump($array);
        // die('l');

        // $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        // $logger->debug(__METHOD__ . ' ----------- this is custom log message ----------- ' . __LINE__);

    }
}