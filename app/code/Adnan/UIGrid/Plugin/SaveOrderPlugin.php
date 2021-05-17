<?php

namespace Adnan\UIGrid\Plugin;
class SaveOrderPlugin {

    protected $_logger;
    protected $order;
    public function __construct(\Psr\Log\LoggerInterface $logger
    ,
    \Magento\Sales\Model\Order $order
    )
    {
        $this->order = $order;
        $this->_logger = $logger;
    }
    public function afterExecute(\Magento\Checkout\Controller\Onepage\Success $subject)
    {
        $last_order_id = $subject->getOnepage()->getCheckout()->getData('last_order_id');
        $last_quote_id = $subject->getOnepage()->getCheckout()->getData('last_quote_id');
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $order = $objectManager->create('Magento\Sales\Model\Order')->load($last_order_id);
        $quote = $objectManager->create('Magento\Quote\Model\Quote')->loadByIdWithoutStore($last_quote_id);
        echo "<pre>";
        $items = $order->getAllItems();
        var_dump($items[0]->getId());
        die();
        $custFirstName= $order->getCustomerFirstname();
        $custLastName= $order->getCustomerLastname();
        $product_id= $quote->getProduct();
        // echo "<pre>";
        // var_dump($last_quote_id);
        // var_dump($custFirstName);
        // var_dump($custLastName);
        // var_dump($product_id);
        // die('l');

        // $order = $subject->getData();
        
        // foreach(){

        // }
        $last_order = $this->order->getOrder($last_order_id);
        echo "<pre>";
        echo "Customer Name : ".$custFirstName. " ". $custLastName."\n";
        echo "Order Id : ".$last_order_id."\n";
        echo "Product Id : ".$product_id."\n";
       
        var_dump($subject->getOnepage()->getCheckout()->getData());die(';');

        $string_subject = json_encode($subject);
        var_dump($string_subject);
        $array = json_decode($string_subject, true);
        var_dump($array);
        die('l');
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get('\Psr\Log\LoggerInterface');
        $logger->debug(__METHOD__ . ' ----------- this is custom log message ----------- ' . __LINE__);
    }
}