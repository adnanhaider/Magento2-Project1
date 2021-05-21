<?php

namespace Adnan\UIGrid\Observer;
use \Magento\Framework\Event\ObserverInterface;
use \Magento\Framework\Event\Observer;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\ObjectManagerInterface;
use \Magento\Checkout\Model\Session as CheckoutSession;

class CustomerActivityLogObserver implements \Magento\Framework\Event\ObserverInterface
{
    protected $messageManager;
    protected $scopeConfig;
    protected $checkoutSession;
    protected $logger;
    protected $_coreSession;
    protected $_customerRepositoryInterface;

    public function __construct(
        ManagerInterface $messageManager,
        ScopeConfigInterface $scopeConfig,
        ObjectManagerInterface $objectmanager,
        CheckoutSession $checkoutSession,
        \Psr\Log\LoggerInterface $logger,
        \Magento\Framework\Session\SessionManagerInterface $coreSession,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepositoryInterface
        ) {

        $this->messageManager = $messageManager;
        $this->scopeConfig = $scopeConfig;
        $this->_objectManager = $objectmanager;
        $this->checkoutSession = $checkoutSession;
        $this->logger = $logger;
        $this->_coreSession = $coreSession;
        $this->_customerRepositoryInterface = $customerRepositoryInterface;

}
	public function execute(\Magento\Framework\Event\Observer $observer)
	{
		// echo 'hello';
        // var_dump('this is customer activity log observer');
        // die();
        $order = $observer->getEvent()->getOrder();
        $objectManager =  \Magento\Framework\App\ObjectManager::getInstance();        
        $storeManager = $objectManager->get('\Magento\Store\Model\StoreManagerInterface');
        $store_id = $storeManager->getStore()->getStoreId();
        $this->logger->debug("storeid==>".$store_id."<");


        // shipping address
        $shippingAddress = $order->getShippingAddress(); 
        $city = $shippingAddress->getCity();
        $country = $shippingAddress->getCountryId();
        $this->logger->debug("-------------------shippingAddress=>".$country."<");
        $this->logger->degub("-------------------shippingAddress=>".$city."<");

		return $this;
	}
}