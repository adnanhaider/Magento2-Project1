<?php

namespace Adnan\UIGrid\Controller\Index;

class CustomerActivityLog extends \Magento\Framework\App\Action\Action
{
    protected $logger;
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

	public function execute()
	{
		$this->_eventManager->dispatch('checkout_controller_onepage_saveOrder');

        $cust_id = $this->_coreRegistry->registry(\Magento\Customer\Controller\RegistryConstants::CURRENT_CUSTOMER_ID);
        echo $cust_id;
        $this->logger->info($cust_id);
        $this->logger->debug($cust_id);

		// $textDisplay = new \Magento\Framework\DataObject(array('text' => 'Mageplaza'));
		// echo $textDisplay->getText();
		// exit;
	}
}